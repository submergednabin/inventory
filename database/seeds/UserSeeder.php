<?php

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
        $user = [
        	'fullname'=>'Inventory',
        	'phone_number'=>'9823442244',
        	'password'=>Hash::make('password'),
        	'email'=>'admin@admin.com',
        	'username'=>'admin',
        ];

        \App\User::insert($user);
    }
}
