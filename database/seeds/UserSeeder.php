<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@erp.com',
            'password' => bcrypt('admin'),
            'status'=> 1,
            'image' => 'default.png'
        ]);
        $user->assignRole(1); 
        
        $user = User::create([
            'first_name' => 'Responsable',
            'last_name' => 'Responsable',
            'email' => 'res@erp.com',
            'password' => bcrypt('responsable'),
            'status'=> 1,
            'image' => 'default.png'
        ]);
        $user->assignRole(2);

        $user = User::create([
            'first_name' => 'Employee',
            'last_name' => 'Employee',
            'email' => 'employee@erp.com',
            'password' => bcrypt('employee'),
            'status'=> 1,
            'image' => 'default.png'
        ]);
        $user->assignRole(3);
    }
}