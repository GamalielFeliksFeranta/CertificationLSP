<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Introduction to Laravel', 'author' => 'John Doe', 'year' => 2020],
            ['title' => 'Mastering PHP', 'author' => 'Jane Smith', 'year' => 2018],
            ['title' => 'Laravel for Beginners', 'author' => 'Michael Johnson', 'year' => 2021],
            ['title' => 'Advanced PHP Programming', 'author' => 'Alice Green', 'year' => 2019],
            ['title' => 'PHP Design Patterns', 'author' => 'Bob Black', 'year' => 2017],
            ['title' => 'The Art of Web Development', 'author' => 'David White', 'year' => 2016],
            ['title' => 'JavaScript for Web Developers', 'author' => 'Sarah Brown', 'year' => 2020],
            ['title' => 'PHP 8 New Features', 'author' => 'Ethan Blue', 'year' => 2021],
            ['title' => 'Web Design with HTML5 & CSS3', 'author' => 'Helen Violet', 'year' => 2020],
            ['title' => 'Building APIs with Laravel', 'author' => 'Frank Red', 'year' => 2018],
        ]);
    }
}
