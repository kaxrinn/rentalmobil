<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Aplikasi Mobil - @yield('title')</title>
  <!-- Flowbite CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="overflow-x-hidden font-sans">
  @include('components.navbar')
  

  <main>
    @yield('content')
  </main>
  
  @include('components.footer')
  
  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  @include('pages.partials.scripts')
</body>
</html>