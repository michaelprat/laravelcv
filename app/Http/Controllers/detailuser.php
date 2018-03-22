<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\user;
class detailuser extends Controller
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
        
    }

  
    public function store(Request $request)
    {
        $this->validate($request,
        [
               
              'jenis_kelamin'=>'required|max:255|min:1',
              'no_ktp'=>'required|numeric|min:1',
              'alamat'=>'required|min:1',
              'no_telpon'=>'required|min:1',
              'Pendidikan'=>'required|min:1'
             

        ]);
       
        $id=Sentinel::getUser()->id;
        $updateuser=User::find($id);
        $updateuser->jenis_kelamin=$request->jenis_kelamin;
        $updateuser->no_ktp=$request->no_ktp;
        $updateuser->alamat=$request->alamat;
        $updateuser->no_telpon=$request->no_telpon;
        $updateuser->Pendidikan=$request->Pendidikan;
        $updateuser->save();
      return   redirect('home');
        
        
        
        
    }


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
        return redirect()->route('home.index');

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
   


}
