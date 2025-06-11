<?php

return [

    // Default guard dan password broker
    'defaults' => [
        'guard' => 'penyewa',
        'passwords' => 'penyewas',
    ],

    // Guard login
    'guards' => [
        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewas',
        ],

        'perental' => [
            'driver' => 'session',
            'provider' => 'perentals',
        ],

        // Ini opsional, hanya jika kamu ingin tetap bisa pakai default `web`
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    // Provider pengguna
    'providers' => [
        'penyewas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Penyewa::class,
        ],

        'perentals' => [
            'driver' => 'eloquent',
            'model' => App\Models\Perental::class,
        ],

        // Opsional: default user bawaan Laravel
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    // Reset password
    'passwords' => [
        'penyewas' => [
            'provider' => 'penyewas',
            'table' => 'password_reset_tokens', // pastikan tabel ini ada
            'expire' => 60,
            'throttle' => 60,
        ],

        'perentals' => [
            'provider' => 'perentals',
            'table' => 'password_reset_tokens', // sama
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
