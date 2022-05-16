<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::truncate();

            $array = [
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'username' => 'admin',
                    'password' => Hash::make('12345678'),
                    'roleId' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'User',
                    'email' => 'user@gmail.com',
                    'username' => 'user',
                    'password' => Hash::make('12345678'),
                    'roleId' => 2,
                    'status' => 1,
                ],
                [
                    'name' => 'employee',
                    'email' => 'employee@gmail.com',
                    'username' => 'employee',
                    'password' => Hash::make('12345678'),
                    'roleId' => 2,
                    'status' => 1,
                ],
            ];

            foreach ($array as $each){
                $config = User::where('username', $each['username'])->first();

                if (!$config){
                    $user = new User();
                    $user->name = $each['name'];
                    $user->email = $each['email'];
                    $user->username = $each['username'];
                    $user->password = $each['password'];
                    $user->roleId = $each['roleId'];;
                    $user->status = 1;
                    $user->save();
                }
            }
    }
}
