<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $User =  User::where('email', 'admin@gmail.com')->first();

       if(!$User) {
  			User::Create([
  				'name' 	=> 'Admin',
  				'email'	=> 'admin@gmail.com',
  				'role'	=> 'admin',
  				'password'	=> Hash::make('password'),
  			]);
       }
    }
}
