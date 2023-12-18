<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh memasukkan beberapa baris data sekaligus
        DB::table('users')->insert([
            [
                'name' => 'Pengguna 1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password1'),
            ],
            [
                'name' => 'Pengguna 2',
                'email' => 'user2@example.com',
                'password' => Hash::make('password2'),
            ],
            // ... tambahkan data lainnya
        ]);
    }
}
