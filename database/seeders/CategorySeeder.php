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
        Category::create(['name' => 'Fiction', 'color' => 'A2E2A8']);
        Category::create(['name' => 'Science Fiction', 'color' => 'FFD281']);
        Category::create(['name' => 'Fantasy', 'color' => 'FFCEDE']);
        Category::create(['name' => 'Mystery', 'color' => '9CE6E0']);
        Category::create(['name' => 'Thriller', 'color' => 'D7D9BA']);
        Category::create(['name' => 'Romance', 'color' => 'E9D6FC']);
        Category::create(['name' => 'Horror', 'color' => 'C7E6EB']);
        Category::create(['name' => 'Biography', 'color' => 'F5A4DC']);
    }
}
