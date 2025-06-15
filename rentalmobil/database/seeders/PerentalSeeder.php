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
            [
                'nama_perental' => 'Admin keempat',
                'email'         => 'admin4@rental.com',
                'kata_sandi'    => Hash::make('admin123'),
            ],
            [
                'nama_perental' => 'Admin Kelima',
                'email'         => 'admin5@rental.com',
                'kata_sandi'    => Hash::make('admin123'),
            ],
        ]);
    }


}