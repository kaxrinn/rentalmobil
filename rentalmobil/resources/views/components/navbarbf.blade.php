<nav class="flex items-center justify-between px-6 bg-white shadow-md fixed top-0 w-full z-[1000] h-16 mb-[0px]">
  <!-- Logo kiri -->
  <div class="flex items-center space-x-2">
    <img src="{{ asset('gambarberanda/Logo 6.png') }}" alt="Logo" class="h-[100px] w-auto">
  </div>

  <!-- Menu + Search + Login kanan -->
  <div class="flex items-center space-x-6">
    <!-- Menu (hidden by default, shows in larger screens) -->
    <div class="hidden md:flex items-center space-x-4">
      <a href="{{ route('landingpagebf') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
      <a href="#Produk" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
      <a href="{{ route('loginpage') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
      <a href="#Ulasan" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
      <a href="#Kontak" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
    </div>

    <!-- Search Bar dan Login Button Container -->
    <div class="hidden md:flex items-center space-x-4">
      <!-- Search Bar -->
      <div class="flex items-center w-64 rounded-md border border-gray-400 px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500">
        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
        </svg>
        <input type="text" id="search-navbar" class="ml-2 block w-full border-none bg-transparent p-0 text-sm text-gray-700 focus:outline-none" placeholder="Pencarian">
      </div>

      <!-- Login Button -->
      <a href="{{ route('loginpage') }}" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-600 text-sm transition duration-300">Login</a>
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
    <a href="{{ route('loginpage') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Riwayat</a>
    <a href="#Ulasan" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Ulasan</a>
    <a href="#Kontak" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Kontak</a>
    <!-- Tambahkan tombol login di mobile menu jika perlu -->
    <a href="{{ route('loginpage') }}" class="text-white text-xl font-medium bg-blue-900 px-6 py-2 rounded-md hover:bg-blue-600">Login</a>
  </div>
</div>