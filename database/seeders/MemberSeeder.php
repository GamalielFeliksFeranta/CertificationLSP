<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone_number' => '1234567890'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com', 'phone_number' => '0987654321'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'phone_number' => '1122334455'],
            ['name' => 'Diana White', 'email' => 'diana@example.com', 'phone_number' => '2233445566'],
            ['name' => 'Eve Black', 'email' => 'eve@example.com', 'phone_number' => '3344556677'],
            ['name' => 'Frank Green', 'email' => 'frank@example.com', 'phone_number' => '4455667788'],
            ['name' => 'Grace Blue', 'email' => 'grace@example.com', 'phone_number' => '5566778899'],
            ['name' => 'Hank Yellow', 'email' => 'hank@example.com', 'phone_number' => '6677889900'],
            ['name' => 'Ivy Red', 'email' => 'ivy@example.com', 'phone_number' => '7788990011'],
            ['name' => 'Jack Pink', 'email' => 'jack@example.com', 'phone_number' => '8899001122'],
        ]);
    }
}
