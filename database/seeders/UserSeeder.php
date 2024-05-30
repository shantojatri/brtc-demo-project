<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name"              => "Hasibul Hasan",
                "email"             => "admin@app.com",
                "phone"             => "01755324768",
                "password"          => Hash::make('12345678'),
                "role"              => "admin",
                "email_verified_at" => now(),
            ],
            [
                "name"              => "Demo User 1",
                "email"             => "user1@app.com",
                "phone"             => "01755324769",
                "password"          => Hash::make('12345678'),
                "role"              => "user",
                "email_verified_at" => now(),
            ],
            [
                "name"              => "Demo User 2",
                "email"             => "user2@app.com",
                "phone"             => "01755324770",
                "password"          => Hash::make('12345678'),
                "role"              => "user",
                "email_verified_at" => now(),
            ],
        ];

        User::insert($users);
    }
}
