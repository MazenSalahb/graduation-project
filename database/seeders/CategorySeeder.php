<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::truncate();
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Non-Fiction']);
        Category::create(['name' => 'Science Fiction']);
        Category::create(['name' => 'Fantasy']);
        Category::create(['name' => 'Mystery']);
        Category::create(['name' => 'Thriller']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Horror']);
        Category::create(['name' => 'Biography']);
    }
}
