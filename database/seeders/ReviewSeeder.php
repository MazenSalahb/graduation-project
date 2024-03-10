<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Review::truncate();

        Review::create([
            "rating" => 5,
            "book_id" => 1,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 1,
            "user_id" => 3,
        ]);
        Review::create([
            "rating" => 4.5,
            "book_id" => 1,
            "user_id" => 4,
        ]);

        Review::create([
            "rating" => 4.5,
            "book_id" => 2,
            "user_id" => 5,
        ]);
        Review::create([
            "rating" => 2,
            "book_id" => 2,
            "user_id" => 6,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 2,
            "user_id" => 5,
        ]);

        Review::create([
            "rating" => 2,
            "book_id" => 3,
            "user_id" => 1,
        ]);
        Review::create([
            "rating" => 5,
            "book_id" => 3,
            "user_id" => 1,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 3,
            "user_id" => 2,
        ]);

        Review::create([
            "rating" => 3,
            "book_id" => 4,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 4,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 4,
            "book_id" => 4,
            "user_id" => 2,
        ]);

        Review::create([
            "rating" => 1,
            "book_id" => 5,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 5,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 2,
            "book_id" => 5,
            "user_id" => 2,
        ]);

        Review::create([
            "rating" => 4,
            "book_id" => 6,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 1,
            "user_id" => 2,
        ]);
        Review::create([
            "rating" => 3,
            "book_id" => 2,
            "user_id" => 2,
        ]);
    }
}
