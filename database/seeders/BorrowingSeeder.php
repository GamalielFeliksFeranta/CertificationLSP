<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('borrowing')->insert([
            ['member_id' => 1, 'book_id' => 1, 'borrow_date' => Carbon::now()->format('Y-m-d'), 'return_date' => Carbon::now()->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 2, 'book_id' => 2, 'borrow_date' => Carbon::now()->subDays(3)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(3)->addDays(7)->format('Y-m-d'), 'actual_return_date' => Carbon::now()->subDays(3)->addDays(5)->format('Y-m-d')],
            ['member_id' => 3, 'book_id' => 3, 'borrow_date' => Carbon::now()->subDays(5)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(5)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 4, 'book_id' => 4, 'borrow_date' => Carbon::now()->subDays(7)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(7)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 5, 'book_id' => 5, 'borrow_date' => Carbon::now()->subDays(10)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(10)->addDays(7)->format('Y-m-d'), 'actual_return_date' => Carbon::now()->subDays(10)->addDays(6)->format('Y-m-d')],
            ['member_id' => 6, 'book_id' => 6, 'borrow_date' => Carbon::now()->subDays(12)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(12)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 7, 'book_id' => 7, 'borrow_date' => Carbon::now()->subDays(14)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(14)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 8, 'book_id' => 8, 'borrow_date' => Carbon::now()->subDays(16)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(16)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 9, 'book_id' => 9, 'borrow_date' => Carbon::now()->subDays(18)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(18)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
            ['member_id' => 10, 'book_id' => 10, 'borrow_date' => Carbon::now()->subDays(20)->format('Y-m-d'), 'return_date' => Carbon::now()->subDays(20)->addDays(7)->format('Y-m-d'), 'actual_return_date' => null],
        ]);
    }
}
