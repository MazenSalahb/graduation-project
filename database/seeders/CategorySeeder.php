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
        Category::create(['name' => 'Action', 'color' => 'FFAF40', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FAction.png?alt=media&token=57e5c3bd-8fc9-4a26-80a3-05e65868897f']);

        Category::create(['name' => 'Fiction', 'color' => '62C9B6', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FFiction.png?alt=media&token=95298deb-6d1c-4925-b1e1-408150da8b3d']);

        Category::create(['name' => 'Kids', 'color' => 'FFAF40', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FKids.png?alt=media&token=cf6fcd4c-801c-473d-83ee-d01deea29b7b']);

        Category::create(['name' => 'Comedy', 'color' => 'B2DCFC', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FComedy.png?alt=media&token=a1b14da4-f081-4cc5-84cc-9c4ff2c7e4a4']);

        Category::create(['name' => 'Art', 'color' => 'B2DCFC', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FArt.png?alt=media&token=7e1836ce-3d31-4c77-aca0-5fd28518914e']);

        Category::create(['name' => 'Thriller', 'color' => '1266C9', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FThriller.png?alt=media&token=e7542b8a-db9f-46db-bfb8-0ab2230e9a26']);

        Category::create(['name' => 'Romance', 'color' => 'FFB8A9', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FRomance.png?alt=media&token=57769d9c-f48f-47e2-96db-779f32c50a9f']);

        Category::create(['name' => 'Horror', 'color' => 'D9D9D9', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FHorror.png?alt=media&token=6d40dd06-112d-4b04-a7f8-15fe01948c95']);

        Category::create(['name' => 'Business', 'color' => 'C679EB', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FBusiness.png?alt=media&token=01e37a57-54dd-404a-b522-4e5a68ad08d7']);

        Category::create(['name' => 'History', 'color' => '05A415', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FHistory.png?alt=media&token=8fdeb199-e708-474c-a350-46102f425611']);

        Category::create(['name' => 'Religious', 'color' => 'B2DCFC', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FReligious.png?alt=media&token=65a8e32f-8f2f-4e81-84e1-767998e28d34']);

        Category::create(['name' => 'Sport', 'color' => 'FFB8A9', 'icon' => 'https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/categories%2FSport.png?alt=media&token=b3247900-4055-4842-b7ce-2cdba8c48aa7']);
    }
}
