<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = ["Admin", "Manager", "Employee"];

        foreach ($roles as $role) {
            Role::create([
                "name" => $role,
                "created_at" => now()
            ]);
        }

        User::create([
            "name" => "Administrador",
            "email" => "chipineiro@gmail.com",
            "password" => bcrypt('admin123'),
            "role_id" => 1,
            "created_at" => now(),
        ]);
    }
}
