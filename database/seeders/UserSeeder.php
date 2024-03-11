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
            "name" => "mazen",
            "email" => "mazen@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
            'profile_picture' => 'https://api.multiavatar.com/mazen@gmail.com',
        ]);
        User::create([
            "name" => "ahmed",
            "email" => "ahmed@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "Cairo",
            'profile_picture' => 'https://api.multiavatar.com/ahmed@gmail.com',
        ]);
        User::create([
            "name" => "joe",
            "email" => "joe@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "fayom",
            'profile_picture' => 'https://api.multiavatar.com/joe@gmail.com',
        ]);
        User::create([
            "name" => "zaki",
            "email" => "zaki@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
            'profile_picture' => 'https://api.multiavatar.com/zaki@gmail.com',
        ]);
        User::create([
            "name" => "john",
            "email" => "john@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "giza",
            'profile_picture' => 'https://api.multiavatar.com/john@gmail.com',
        ]);
        User::create([
            "name" => "ronaldo",
            "email" => "ronaldo@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "matroh",
            'profile_picture' => 'https://api.multiavatar.com/ronaldo@gmail.com',
        ]);
        User::create([
            "name" => "fady",
            "email" => "fady@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "suez",
            'profile_picture' => 'https://api.multiavatar.com/fady@gmail.com',
        ]);
    }
}
