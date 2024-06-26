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
            "phone" => "02111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
            "role" => "admin"
        ]);
        User::create([
            "name" => "ahmed",
            "email" => "ahmed@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "Cairo",
            "phone" => "03111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
        User::create([
            "name" => "joe",
            "email" => "joe@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "fayom",
            "phone" => "01111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
        User::create([
            "name" => "zaki",
            "email" => "zaki@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "alexandria",
            "phone" => "04111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
        User::create([
            "name" => "john",
            "email" => "john@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "giza",
            "phone" => "05111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
        User::create([
            "name" => "ronaldo",
            "email" => "ronaldo@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "matroh",
            "phone" => "06111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
        User::create([
            "name" => "fady",
            "email" => "fady@gmail.com",
            "password" => bcrypt("ma123456"),
            "location" => "suez",
            "phone" => "07111111111",
            'profile_picture' => 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
        ]);
    }
}
