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
        $user = User::create([
            'name' => 'Tim McQueen',
            'username' => 'tim.mcqueen',
            'email' => 'tim.mcqueen@gmail.com',
            'password' => 'password',
            'address1' => '333 Dogwood Ridge Dr.',
            'city' => 'Wetumpka',
            'state' => 'AL',
            'zip' => '36093',
            'confirmed' => true,
        ]);

        $user->assignRole('admin');
        $user->save();
    }
}
