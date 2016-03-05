<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
           'name' => 'Tim McQueen',
           'username' => 'tim.mcqueen',
           'email' => 'tim.mcqueen@gmail.com',
           'password' => bcrypt('password'),
        ]);
    }
}
