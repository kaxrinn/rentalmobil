<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Autentikasi')</title>

    <!-- Preload background agar cepat ditampilkan -->
    <link rel="preload" as="image" href="{{ asset('gambarberanda/backgroundlogin.webp') }}">

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Transisi background (opsional, untuk efek halus) -->
    <style>
        body {
            transition: background-image 0.3s ease-in-out;
        }
    </style>
</head>
<body class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('gambarberanda/backgroundlogin.webp') }}')">
    
    <main class="flex items-center justify-center min-h-screen backdrop-sm">
        @yield('content')
    </main>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
