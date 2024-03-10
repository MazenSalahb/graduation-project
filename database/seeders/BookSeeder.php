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
            "image" => "https://images-na.ssl-images-amazon.com/images/I/71aFt4+OTOL.jpg"
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
            "image" => "https://books.google.com/books/publisher/content/images/frontcover/KbZ9EAAAQBAJ?fife=w240-h345"
        ]);

        Book::create([
            "title" => "Dune: Volume 1",
            "author" => "Frank Herbert",
            "description" => "Directed by Denis Villeneuve, based on the novel Dune by Frank Herbert",
            "category_id" => 3,
            "user_id" => 3,
            "status" => "used",
            "availability" => "swap",
            "image" => "https://books.google.com/books/content/images/frontcover/p1MULH7JsTQC?fife=w240-h345"
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
            "image" => "https://books.google.com/books/publisher/content/images/frontcover/xIS9EAAAQBAJ?fife=w240-h345"
        ]);

        Book::create([
            "title" => "A Court of Wings and Ruin",
            "author" => "Sarah J. Maas",
            "description" => "Feyre has returned to the Spring Court, determined to gather information on Tamlin's actions and learn what she can about the invading king threatening to bring her land to its knees.",
            "category_id" => 5,
            "user_id" => 5,
            "status" => "new",
            "availability" => "swap",
            "image" => "https://books.google.com/books/publisher/content/images/frontcover/pLL-DAAAQBAJ?fife=w240-h345"
        ]);

        Book::create([
            "title" => "Dune Messiah",
            "author" => "Frank Herbert",
            "description" => "Dune Messiah continues the story of Paul Atreides, better known—and feared—as the man christened Muad’Dib.",
            "category_id" => 6,
            "user_id" => 6,
            "status" => "used",
            "availability" => "swap",
            "image" => "https://books.google.com/books/content/images/frontcover/AXVUqdzi3rsC?fife=w240-h345"
        ]);
    }
}
