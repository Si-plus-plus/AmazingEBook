<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('e_books')->insert([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'description' => 'It is a truth universally acknowledged that when most people think of Jane Austen they think of this charming and humorous story of love, difficult families and the tricky task of finding a handsome husband with a good fortune.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'description' => 'A novel before its time, Harper Lee’s Pulitzer-prize winner addresses issues of race, inequality and segregation with both levity and compassion.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'The Great Gatsby',
            'author' => 'F Scott Fitzgerald',
            'description' => 'Jay Gatsby, the enigmatic millionaire who throws decadent parties but doesn’t attend them, is one of the great characters of American literature. This is F. Scott Fitzgerald at his most sparkling and devastating.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'One Hundred Years of Solitude',
            'author' => ' Gabriel García Márquez',
            'description' => 'Gabriel García Márquez’s multi-generational spanning magnum opus was a landmark in Spanish literature.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'In Cold Blood',
            'author' => 'Truman Capote',
            'description' => 'The ‘true crime’ TV show / podcast you’re obsessed with probably owes a debt to this masterpiece of reportage by Truman Capote. Chilling and brilliant.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'Wide Sargasso Sea',
            'author' => 'Jean Rhys',
            'description' => 'Jean Rhys wrote this feminist and anti-colonial prequel to Charlotte Bronte’s novel Jane Eyre which chronicles the events of Mr Rochester’s disastrous marriage to Antoinette Conway or Bertha as we come to know her.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'Brave New World',
            'author' => 'Aldous Huxley',
            'description' => 'One of the greatest and most prescient dystopian novels ever written, this should be on everyone’s must-read list.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'I Capture The Castle',
            'author' => 'Dodie Smith',
            'description' => 'Cassandra Mortmain’s upbringing in a crumbling castle with her eccentric family may not be everyone’s experience, but we can guarantee her coming-of-age story with all its enchanting and disenchanting moments will resonate for many.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'Jane Eyre',
            'author' => 'Charlotte Bronte',
            'description' => 'One of literature’s steeliest heroines, in her short life Jane Eyre has overcome a traumatic childhood only to be challenged by secrets, strange noises and mysterious fires in her new home of Thornfield Hall.',
        ]);

        DB::table('e_books')->insert([
            'title' => 'Crime and Punishment',
            'author' => 'Fyodor Dostoevsky',
            'description' => 'This novel is a masterful and completely captivating depiction of a man experiencing a profound mental unravelling.',
        ]);
    }
}
