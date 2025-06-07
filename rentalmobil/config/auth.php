<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'penyewa'), // default bisa disesuaikan
        'passwords' => env('AUTH_PASSWORD_BROKER', 'penyewas'),
    ],

    'guards' => [
        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewas',
        ],

        'perental' => [
            'driver' => 'session',
            'provider' => 'perentals',
        ],
    ],

    'providers' => [
        'penyewas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Penyewa::class,
        ],

        'perentals' => [
            'driver' => 'eloquent',
            'model' => App\Models\Perental::class,
        ],
    ],

    'passwords' => [
        'penyewas' => [
            'provider' => 'penyewas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'perentals' => [
            'provider' => 'perentals',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
