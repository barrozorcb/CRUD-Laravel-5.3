<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rafael Caldas',
            'email' => 'rafael@laravel.com',
            'password' => bcrypt('1234')
        ]);
    }
}
