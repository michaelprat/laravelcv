<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\User;
use App\cv;
use DB;
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
        cv::destroy($datacv);
        return redirect()->route("listuser.index");
    }
}
