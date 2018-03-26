<?php
namespace App\Transformer;

class UserTransformer
{
    public function transform($task)
    {
        return[
            'id'=>$task->id,
            'password'=>bcrypt($task->password),
            'first_name'=>$task->first_name,
            'last_name'=>$task->last_name,
            'jenis_kelamin'=>$task->jenis_kelamin,
            'Pendidikan'=>$task->Pendidikan,
            'no_ktp'=>$task->no_ktp,
            'no_telpon'=>$task->no_telpon,
            'tanggal_lahir'=>$task->tanggal_lahir,
            'alamat'=>$task->alamat,
            'email'=>$task->email

        ];
    }
}