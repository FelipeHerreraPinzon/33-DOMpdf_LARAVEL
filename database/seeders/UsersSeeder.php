<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'name'=> 'admin',
                'email'=> 'admin@admin.com',
                'password'=> bcrypt('password'),
                'email_verified_at'=> now()
             ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
