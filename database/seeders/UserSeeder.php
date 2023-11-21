<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ouedreago',
                'surname' => 'Tassere',
                'email' => 'test1@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user',
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Ouedreago',
                'surname' => 'Fabi',
                'email' => 'test2@gmail.com',
                'email_verified_at' => now(),
                'role' => 'user',
                'password' => Hash::make('123456'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user)  {
            User::create($user);
        }
    }
}
