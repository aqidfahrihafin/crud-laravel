<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'image' => 'Pengguna 1',
                'title' => 'user1@example.com',
                'content' => Hash::make('content1'),
            ],
            [
                'image' => 'Pengguna 2',
                'title' => 'user2@example.com',
                'content' => Hash::make('content2'),
            ],
            // ... tambahkan data lainnya
        ]);
    }
}
