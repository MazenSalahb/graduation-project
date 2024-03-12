<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Book::truncate();
        Book::create([
            "title" => "The Alchemist",
            "author" => "Paulo Coelho",
            "description" => "The Alchemist follows the journey of an Andalusian shepherd",
            "category_id" => 1,
            "user_id" => 1,
            "status" => "new",
            "availability" => "swap",
            "image" => "/images/theAlchemist.jpg",
        ]);

        Book::create([
            "title" => "Dune: Volume 1",
            "author" => "Frank Herbert",
            "description" => "Directed by Denis Villeneuve, based on the novel Dune by Frank Herbert",
            "category_id" => 3,
            "user_id" => 3,
            "status" => "used",
            "availability" => "swap",
            "image" => "/images/dune.jpeg",
        ]);

        Book::create([
            "title" => "A Court of Wings and Ruin",
            "author" => "Sarah J. Maas",
            "description" => "Feyre has returned to the Spring Court, determined to gather information on Tamlin's actions and learn what she can about the invading king threatening to bring her land to its knees.",
            "category_id" => 5,
            "user_id" => 5,
            "status" => "new",
            "availability" => "swap",
            "image" => "/images/aCroutOfWings.jpeg",
        ]);

        Book::create([
            "title" => "Dune Messiah",
            "author" => "Frank Herbert",
            "description" => "Dune Messiah continues the story of Paul Atreides, better known—and feared—as the man christened Muad’Dib.",
            "category_id" => 6,
            "user_id" => 6,
            "status" => "used",
            "availability" => "swap",
            "image" => "/images/duneMessiah.jpeg",
        ]);

        Book::create([
            "title" => "Hello Beautiful (Oprah's Book Club): A Novel",
            "author" => "Ann Napolitano",
            "description" => "NEW YORK TIMES BESTSELLER • OPRAH’S BOOK CLUB PICK • From the author of Dear Edward comes a “powerfully affecting” (People) family story that asks: Can love make a broken person whole?",
            "category_id" => 2,
            "user_id" => 2,
            "status" => "new",
            "availability" => "sale",
            "price" => 265,
            "image" => "/images/helloBeautiful.jpeg",
        ]);

        Book::create([
            "title" => "Iron Flame",
            "author" => "Rebecca Yarros",
            "description" => "Discover the instant #1 New York Times bestseller! Now optioned for TV by Amazon Studios.",
            "category_id" => 4,
            "user_id" => 4,
            "status" => "new",
            "availability" => "sale",
            "price" => 150,
            "image" => "/images/ironFlame.jpeg",
        ]);

        Book::create([
            "title" => "Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones",
            "author" => "James Clear",
            "description" => "No matter your goals, Atomic Habits offers a proven framework for improving--every day.",
            "category_id" => 4,
            "user_id" => 5,
            "status" => "new",
            "availability" => "sale",
            "price" => 399,
            "image" => "/images/atomicHabit.jpeg",
        ]);

        Book::create([
            "title" => "A Court of Frost and Starlight",
            "author" => "Sarah J. Maas",
            "description" => "Feyre, Rhysand, and their friends are still busy rebuilding the Night Court and the vastly altered world beyond.",
            "category_id" => 4,
            "user_id" => 5,
            "status" => "used",
            "availability" => "sale",
            "price" => 189,
            "image" => "/images/aCroutOfFrost.jpeg",
        ]);

        Book::create([
            "title" => "The Silent Patient",
            "author" => "Alex Michaelides",
            "description" => "An unforgettable—and Hollywood-bound—new thriller... A mix of Hitchcockian suspense, Agatha Christie plotting, and Greek tragedy.",
            "category_id" => 4,
            "user_id" => 1,
            "status" => "used",
            "availability" => "sale",
            "price" => 319,
            "image" => "/images/theSilentPatient.jpeg",
        ]);
    }
}
