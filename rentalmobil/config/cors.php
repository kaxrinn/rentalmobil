<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'upload-payment'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000', 'http://127.0.0.1:8000'], // Sesuaikan origin
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Diubah ke true
];
