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
        User::create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'first_name' => 'admin',
            'last_name' => 'rifqi'
        ]);
    }
}