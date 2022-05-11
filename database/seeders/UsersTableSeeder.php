<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users =
        [
            [
                'name' => 'JonhDoe',
                'email' => 'john@mail.com',
                'password' => Hash::make('password'),
                'remember_token' => Null,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),

            ],[
                'name' => 'Andi',
                'email' => 'andi@mail.com',
                'password' => Hash::make('password'),
                'remember_token' => Null,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]
        ];
            User::insert($users);
    }
}
