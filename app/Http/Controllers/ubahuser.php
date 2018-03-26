<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\User;
use App\cv;
use DB;
use PDF;
use Excel;
use Illuminate\Support\Facades\Input;
class ubahuser extends Controller
{
    public function __construct()
    {
    
        $this->middleware('sentinel');
        $this->middleware('sentinel.role'); //  $this->middleware('sentinel.role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tampung=User::all();
        return view ('Halamandatauser')->with('user',$tampung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function downloadExcel($type)
    { 
     //mengambil semua data dari model terus dijadiin array
    //si data akan disimpan di sebuah file excel baru dengan nama di create
    //di excel sheet menentukan nama Sheet dari excelnya
    //setelah itu bisa di download sesuai tipe yang dimaui lihat di blade
       // $data= DB::table('users')->where('last_name','NOT LIKE','%Admin%')->get()->toArray();
        $data=User::select()->where('last_name','NOT LIKE','%Admin%')->get()->toArray();
     return Excel::create('excel_example',function($excel)use($data)
       {
         $excel->sheet('SheetArticle',function($sheet) use ($data)   
        {
         $sheet->fromArray($data);
          });
        })->download($type);
    }
    public function exportPDF()
    { 
     //mengambil semua data dari model terus dijadiin array
    //si data akan disimpan di sebuah file excel baru dengan nama di create
    //di excel sheet menentukan nama Sheet dari excelnya
    //setelah itu bisa di download sesuai tipe yang dimaui lihat di blade
       $user=User::all();
       view()->share('Users',$user);
       $pdf=PDF::loadView('pdfview');
       return $pdf->download('pdfview.pdf');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find=User::find($id);
        return view('Halamanedituser')->with('data',$find);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
               
              'jenis_kelamin'=>'required|max:255|min:1',
              'no_ktp'=>'required|numeric|min:1',
              'alamat'=>'required|min:1',
              'no_telpon'=>'required|min:1',
              'Pendidikan'=>'required|min:1'
             

        ]);
        User::find($id)->update($request->all());
        $updateus=User::find($id);
        $updateus->alamat=$request->alamat;
        $updateus->save();
        return redirect()->route('listuser.index');

    }
    public function importExcel()
    {

        //untuk import di laravel perlu masukan  
       //di bladenya <input type="hidden" name="_token" value="{{csrf_token()}}"></input> csrf_token untuk mengijinkan import di laravel
       
        if(Input::hasFile('import_file'))//mengecek file sudah masuk atau belum
        {
            $user=User::all();
            $path= Input::file('import_file')->getRealPath(); //ambil location file ada dimana
            $data=Excel::load($path,function($reader){})->get();//load data 
                if(!empty($data)&&$data->count())//jika ada jalanin looping buat masukin data ke model
                {
                    foreach($data as $key=>$val){  //ambil data value dari object
                     foreach($user as $tampil)
                      
                     {
                      if($tampil->id==$val->id)
                      {
                      
                    $updateuser=User::find($val->id);
                       $updateuser->jenis_kelamin=$val->jenis_kelamin;
                       $updateuser->alamat=$val->alamat;
                       $updateuser->no_ktp=$val->no_ktp;
                       $updateuser->no_telpon=$val->no_telpon;
                       $updateuser->Pendidikan=$val->pendidikan;
                       $updateuser->save();
                      }
                     }
                   }
                }
        }
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);//orm (objec relation model)
        $datacv=cv::select('id')->where('id_user', $id)->value('id'); //query builder
        DB::table('activations')->where("user_id",$id)->delete();
        $hapuscv=cv::find($datacv);
        unlink($hapuscv->detail);    
        cv::destroy($datacv);
        return redirect()->route("listuser.index");
    }
}
