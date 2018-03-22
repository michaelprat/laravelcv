<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin=[
            "slug"=>"admin", //nama nickname
            "name"=>"Admin",
            "permissions"=>[
                "home"=>true,
                "cvuser"=>true,
                "ubahuser"=>true,
                "detailuser"=>true
            ]
            ];
            Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();
            $adminrole=Sentinel::findRoleByName('Admin');
            $user_admin=["first_name"=>"M","last_name"=>"Admin","email"=>"madmin@mail.com","password"=>"12345678"];
            $adminuser=Sentinel::registerAndActivate($user_admin);
            $adminuser->roles()->attach($adminrole);
    
            $role_user=
            [
                "slug"=>"user",
                "name"=>"User",
                "permissions"=>[
                    "home"=>true,
                    "cvuser"=>true,
                    "detailuser"=>true
                      
                ]
                
                ];
                Sentinel::getRoleRepository()->createModel()->fill($role_user)->save();
                $userrole=Sentinel::findRoleByName('User');
                $user_writer=["first_name"=>"Oda","last_name"=>"E","email"=>"oda@e.com","password"=>"12345678"];
                $writeuser=Sentinel::registerAndActivate($user_writer);
                $writeuser->roles()->attach($userrole);
    }
}
