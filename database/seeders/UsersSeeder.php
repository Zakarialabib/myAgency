<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin 1',
                'email'          => 'admin1@admin.com',
                'status'         => '1',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at' => now(),

            ],
            [
                'id'             => 2,
                'name'           => 'Admin 2',
                'email'          => 'admin2@admin.com',
                'status'         => '1',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at' => now(),

            ],
        ];

        User::insert($users);
    }
}
