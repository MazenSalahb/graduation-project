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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FtheAlchemist.jpg?alt=media&token=4d6db690-11a9-45c4-9f2b-20331a46eb6c",
        ]);

        Book::create([
            "title" => "Dune: Volume 1",
            "author" => "Frank Herbert",
            "description" => "Directed by Denis Villeneuve, based on the novel Dune by Frank Herbert",
            "category_id" => 3,
            "user_id" => 3,
            "status" => "used",
            "availability" => "swap",
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2Fdune.jpeg?alt=media&token=b9914a57-284a-4a0c-a00f-9e2fe4a71836",
        ]);

        Book::create([
            "title" => "A Court of Wings and Ruin",
            "author" => "Sarah J. Maas",
            "description" => "Feyre has returned to the Spring Court, determined to gather information on Tamlin's actions and learn what she can about the invading king threatening to bring her land to its knees.",
            "category_id" => 5,
            "user_id" => 5,
            "status" => "new",
            "availability" => "swap",
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FaCroutOfWings.jpeg?alt=media&token=98eb9a12-ee4f-431a-891a-044a68e5f298",
        ]);

        Book::create([
            "title" => "Dune Messiah",
            "author" => "Frank Herbert",
            "description" => "Dune Messiah continues the story of Paul Atreides, better known—and feared—as the man christened Muad’Dib.",
            "category_id" => 6,
            "user_id" => 6,
            "status" => "used",
            "availability" => "swap",
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FduneMessiah.jpeg?alt=media&token=c9c3f4fe-4de7-4923-9d9a-79f933adb6ce",
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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FhelloBeautiful.jpeg?alt=media&token=b6e9135c-772d-4f00-88de-7ddea9b752b3",
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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FironFlame.jpeg?alt=media&token=2b17072a-b17a-4301-9f79-e8dd4b328c64",
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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FatomicHabit.jpeg?alt=media&token=768a4d15-52b9-434d-907e-a6c7114e8b1c",
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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FaCroutOfFrost.jpeg?alt=media&token=b5d31f54-cdd8-4087-a6e6-61e160199c63",
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
            "image" => "https://firebasestorage.googleapis.com/v0/b/graduation-project-dd7d1.appspot.com/o/books%2FtheSilentPatient.jpeg?alt=media&token=1fa174e4-8216-4397-8b9e-b0ef4d5276ff",
        ]);
    }
}
