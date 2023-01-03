<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'phoneNum'=>'1234567890',
            'address'=>'Admin street',
            'role'=>'admin'
        ]);

        User::create([
            'username'=>'notadmin',
            'email'=>'notadmin@gmail.com',
            'password'=>bcrypt('password'),
            'phoneNum'=>'1234567890',
            'address'=>'Admin street',
            'role'=>'member'
        ]);
    }
}
