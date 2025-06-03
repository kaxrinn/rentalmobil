<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'phone' => '08123456789',
            'role' => 'admin',
            'password' => Hash::make('admin123'), // <- otomatis ter-hash
        ]);
    }
}
