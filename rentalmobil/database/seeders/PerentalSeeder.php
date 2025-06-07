<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PerentalSeeder extends Seeder
{
    public function run()
    {
        DB::table('perental')->insert([
            'name'     => 'Admin Rental',
            'email'    => 'admin@rental.com',
            'password' => Hash::make('admin123'), // wajib pakai hash
        ]);
    }
}
