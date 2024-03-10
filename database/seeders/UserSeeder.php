<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::truncate();
        User::create([
            "name" => "user1",
            "email" => "user1@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
        User::create([
            "name" => "user2",
            "email" => "user2@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
        User::create([
            "name" => "user3",
            "email" => "user3@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
        User::create([
            "name" => "user4",
            "email" => "user4@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
        User::create([
            "name" => "user5",
            "email" => "user5@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
        User::create([
            "name" => "user6",
            "email" => "user6@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
        ]);
    }
}
