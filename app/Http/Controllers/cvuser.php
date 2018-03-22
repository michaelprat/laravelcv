<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cv;
use App\User;
use Sentinel;
use Session;
class cvuser extends Controller
{


    public function __construct()
    {
    
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
      //  $this->middleware('sentinel.role');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(Sentinel::getUser()->hasAccess('ubahuser'))
        {

            $tampung=User::join('cvs','users.id','=','cvs.id_user')->get();
            return view('Halamandownload')->with('detail',$tampung);
        
        }
        else
        {
        if(Sentinel::getUser()->no_ktp=="")
        {
       return view('Halamanlengkapi');
        }
        else 
        {
            return view('Halamanupload');
        }
        }
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
        $this->validate($request,
        [
            'file'=>'required|mimes:docx,pdf,doc', //berlaku juga untuk file lain tinggal ganti extension di mimes

        ]);
        $masuk=0;
        $check=cv::all();
        foreach($check as $tampung)
        {
             if(Sentinel::getUser()->id==$tampung->id_user)
             {
                 $masuk=1;
             }
        }
        if($masuk==0)
        {
        $cv=new cv($request->input());
        if($file=$request->hasFile('file'))
        {
            $file=$request->file('file');
            $fileName=$file->getClientOriginalName();
            $destinationPath=public_path()."\docs";
            $path=$file->move($destinationPath,$fileName);
            $cv->nama=$fileName;
            $cv->detail=$path;
            $cv->status="unread";
            $cv->id_user=Sentinel::getUser()->id;
        }
   
        $cv->save();
        return redirect()->route('home.index');
         }
         else
         {
            return redirect()->back();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key = cv::select('id')->where('id_user',$id)->value('id');
        $file=cv::find($key);
        $myFile=$file->detail;
        return response()->download($myFile);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key = cv::select('id')->where('id_user',$id)->value('id');
        $find=cv::find($key);
        return view('Halamaneditcv')->with('data',$find);
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
        cv::find($id)->update($request->all());
        return redirect()->route('cv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
