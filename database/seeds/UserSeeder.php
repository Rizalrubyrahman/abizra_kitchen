<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> bcrypt('rizal001'),
                'role'=>'admin',
                'status'=>'active'
        ]);
    }
}
