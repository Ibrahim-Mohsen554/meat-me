<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        'first_name' =>'super',
        'last_Name'=>'admin',
        'email' =>'super_admin@gmail.com',
        'password'=> bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
    }
}
