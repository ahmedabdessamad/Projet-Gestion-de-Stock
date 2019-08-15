<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Admin',
        ]);
        Role::create([
            'title' => 'Responsable',
        ]);

        Role::create([
            'title' => 'Employee',
        ]);

     
    }
}
