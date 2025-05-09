<nav class="flex items-center justify-between px-6 bg-white shadow-md fixed top-0 w-full z-50 h-16 overflow-hidden">
  <!-- Logo kiri -->
  <div class="flex items-center space-x-2">
    <img src="{{ asset('gambarberanda/Logo 6.png') }}" alt="Logo" class="h-[100px] w-auto">
  </div>

  <!-- Menu + Search + Login kanan -->
  <div class="flex items-center space-x-6">
    <!-- Menu (hidden by default, shows in larger screens) -->
    <div class="hidden md:flex items-center space-x-4">
      <a href="#Beranda" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
      <a href="#Produk" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
      <a href="{{ route('riwayat') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
      <a href="#Ulasan" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
      <a href="#Kontak" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
    </div>

    <div class="hidden md:flex items-center w-64 rounded-md border border-gray-400 px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500">
  <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
       viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round"
          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
  </svg>
  <input type="text" id="search-navbar"
         class="ml-2 block w-full border-none bg-transparent p-0 text-sm text-gray-700 focus:outline-none"
         placeholder="Pencarian">
</div>


    <!-- Flowbite Dropdown untuk Profil -->
    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm rounded-full" type="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
      </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
      <div class="px-4 py-3 text-sm text-gray-900">
        <div class="font-medium">Kim Mingyu</div>
        <div class="truncate">mingyukarina@gmail.com</div>
      </div>
      <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
        <li>
          <a href="{{ route('edit_profile') }}" class="block px-4 py-2 hover:bg-gray-100">Edit Profil</a>
        </li>
      </ul>
      <div class="py-2">
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
          @csrf
        </form>
      </div>
    </div>

    <!-- Burger Icon for Mobile -->
    <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden text-gray-800 focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden fixed top-0 right-0 w-3/4 h-full bg-gray-900 bg-opacity-75 z-40">
  <div class="flex flex-col items-center justify-center h-full space-y-6">
    <a href="#Beranda" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Beranda</a>
    <a href="#Produk" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Produk</a>
    <a href="{{ route('riwayat') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Riwayat</a>
    <a href="#Ulasan" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Ulasan</a>
    <a href="#Kontak" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Kontak</a>
  </div>
</div>