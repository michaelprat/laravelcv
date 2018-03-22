<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Sentinel;
use Session;
use Carbon\Carbon;
use App\User;
class UserController extends Controller
{public function signup()
    {
        return view('Signup');//viewnya
    }
    public function signup_store(UserRequest $request)
    {
        $tanggal_lahir=$request->tanggal_lahir;
        $umur=Carbon::parse($request->tanggal_lahir)->age;
        if($umur<18)
        {
            Session::flash('message2','Umur minimal 18 tahun untuk mendaftar');
            return redirect()->back();
        }
        else
        {
           $request->tanggal_lahir=$tanggal_lahir;
          
           $user = Sentinel::registerAndActivate($request->All());
           $updateus=User::find($user->id);
           
           $updateus->tanggal_lahir=$tanggal_lahir;
           $updateus->save();
      Session::flash('message2','Data berhasil terdaftar');
      if($request->last_name!="admin")
      {
          $role=Sentinel::findRoleByName("user");
          $user->roles()->attach($role);
      }
      else
      {
          $role=Sentinel::findRoleByName("admin");
          $user->roles()->attach($role);
      }
   
         return redirect()->back();
        }
    ;
      
    }
}
