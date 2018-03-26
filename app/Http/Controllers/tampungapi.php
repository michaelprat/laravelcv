<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\User;
use App\Transformer\UserTransformer;
class tampungapi extends Controller
{
    protected $response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Response $response)
    {
     $this->response=$response;
    }
    public function index()
    {
        $tasks=User::paginate(15);
        return $this->response->withPaginator($tasks,new UserTransformer());
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
        if($request->isMethod('put'))
        {
            $user=User::find($request->user_id);
            if(!$user)
            {
                return $this->response->errorNotFound('Task not Found');
            }
        }
        else
            {
                $user=new User;
            }
        
        $user->id=$request->input('user_id');
        $user->password=bcrypt($request->input('password'));
        $user->first_name=$request->input('first_name');
        $user->last_name=$request->input('last_name');
        $user->jenis_kelamin=$request->input('jenis_kelamin');
        $user->Pendidikan=$request->input('Pendidikan');
        $user->no_ktp=$request->input('no_ktp');
        $user->no_telpon=$request->input('no_telpon');
        $user->tanggal_lahir=$request->input('tanggal_lahir');
        $user->alamat=$request->input('alamat');
        $user->email=$request->input('email');
        
      
       
        if($user->save())
        {
            return $this->response->withItem($user,new UserTransFormer());
        }
        else
        {
            return $this->response->errorInternalError('Could not updated/created the user');
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
        $user=User::find($id);
        if(!$user)
        {
            return $this->response->errorNotFound('Task Not Found');
        }
        return $this->response->withItem($user,new UserTransformer());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if(!$user)
        {
            return $this->response->errorNotFound('User Not Found');
        }
        if($user->delete())
        {
            return $this->response->withItem($user,new UserTransformer());
        }
        else
        {
            return $this->response->errorInternalError('Could not deleted  a user');
        }
    }
}
