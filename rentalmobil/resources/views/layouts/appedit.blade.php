<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Halaman Edit Profile')</title>

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    
  @include('components.navbar')
<body class="min-h-screen bg-cover bg-center mt-[30px]" style="background-image: url('{{ asset('gambarberanda/backgroundlogin.jpg') }}')">
    
    <main class="flex items-center justify-center min-h-screen backdrop-sm">
        @yield('content')
    </main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
