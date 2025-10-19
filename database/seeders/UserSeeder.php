<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name' => 'Admin Lockin',
            'email' => 'admin@lockin.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // User biasa
        User::create([
            'name' => 'User Lockin',
            'email' => 'user@lockin.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
