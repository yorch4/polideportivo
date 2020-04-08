<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->delete();
        User::create(array('name' => 'Jorge', 'last_name' => 'Ruiz', 'email' => 'jorge.rgdaw@gmail.com', 'password' => Hash::make('123456789'), 'role' => 'admin', 'img' => base64_encode('img/users/user.png')));
    }
}
