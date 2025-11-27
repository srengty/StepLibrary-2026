<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'Test Librarian',
                'email' => 'librarian@example.com',
                'password' => 'Test@123',
                'role'=>'librarian'
            ],
            [
                'name' => 'Test Admin',
                'email' => 'admin@example.com',
                'password' => 'Test@123',
                'role'=>'admin'
            ]
        ]);
    }
}
