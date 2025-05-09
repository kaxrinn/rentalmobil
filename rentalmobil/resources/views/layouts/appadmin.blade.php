<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'admin')</title>
  <script src="https://cdn.tailwindcss.com/3.4.1"></script>
  <link href="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#cfd1da]">
  @include('components.navbaradmin')
  @include('components.sidebaradmin')
  @include('components.popupadmin')

  <div class="pt-[70px] px-4 lg:ml-[12.5rem]">
    @yield('content')
  </div>

  <script>
    function togglePopup() {
      document.getElementById('popup').classList.toggle('hidden');
      document.getElementById('overlay').classList.toggle('hidden');
    }

    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('-translate-x-full');
    }
  </script>
</body>
</html>
