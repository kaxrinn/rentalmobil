<nav class="flex items-center justify-between px-6 bg-white shadow-md fixed top-0 w-full z-[1000] h-16">
  <!-- Logo kiri -->
  <div class="flex items-center space-x-2">
    <img src="{{ asset('gambarberanda/Logo 6.png') }}" alt="Logo" class="h-[100px] w-auto">
  </div>

  <!-- Menu + Search + Login kanan -->
  <div class="flex items-center space-x-6">
    <!-- Menu (hidden by default, shows in larger screens) -->
    <div class="hidden md:flex items-center space-x-4">
      <a href="{{ route('landingpage') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
      <a href="{{ route('landingpage') }}#Produk" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
      <a href="{{ route('landingpage') }}#Ulasan" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
      <a href="{{ route('landingpage') }}#Kontak" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
      <a href="{{ route('riwayat') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
    </div>

    <!-- Search Bar -->
    <form action="{{ url('/search') }}" method="GET" class="hidden md:flex items-center w-64 rounded-md border border-gray-400 px-3 py-1.5 focus-within:ring-2 focus-within:ring-blue-500">
      <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
      </svg>
      <input
        type="text"
        id="search-navbar"
        name="search"
        class="ml-2 block w-full border-none bg-transparent p-0 text-sm text-gray-700 focus:outline-none"
        placeholder="Pencarian">
    </form>
<!-- Flowbite Dropdown untuk Profil -->
<div class="relative z-[1001] flex items-center space-x-2">
  <!-- Tombol Burger di Mobile -->
  <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden text-gray-800 focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>
  
<!-- Flowbite Dropdown untuk Profil -->
<div class="relative z-[1001]">
  <button id="dropdownUserButton" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-end" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
    </svg>
  </button>
  
  <!-- Dropdown menu dengan gradient background -->
  <div id="userDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg z-10 border border-gray-200">
    <!-- Profile Info dengan gradient -->
    <div class="px-5 py-4 bg-gradient-to-r from-[#115EAD] to-[#219FE3] text-white rounded-t-lg">
      <div class="font-bold text-lg">Selamat Datang,</div>
        <div class="text-sm">
        @if(Auth::guard('penyewa')->check())
          <p><strong>Nama:</strong> {{ Auth::guard('penyewa')->user()->nama_penyewa }}</p>
          <p><strong>Email:</strong> {{ Auth::guard('penyewa')->user()->email }}</p>
          <p><strong>Nomor HP:</strong> {{ Auth::guard('penyewa')->user()->nomor_telepon }}</p>
        @endif
        </div>
    </div>
    
    <!-- Menu Items dengan tombol sesuai gambar -->
<div class="py-2 px-2 bg-white rounded-b-lg">
  <a href="{{ route('edit-profile.edit') }}" class="block w-full text-sm font-medium text-white bg-blue-950 px-4 py-2 rounded mb-2 text-center">Edit Profil</a>
  <a href="#" 
    class="block w-full text-sm font-medium text-white bg-red-800 px-4 py-2 rounded text-center" 
    onclick="confirmLogout(event)">
    Keluar
  </a>
</div>

  </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden fixed top-0 right-0 w-3/4 h-full bg-gray-900 bg-opacity-75 z-40">
  <div class="flex flex-col items-center justify-center h-full space-y-6">
    <a href="{{ route('landingpage') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Beranda</a>
    <a href="{{ route('landingpage') }}#Produk" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Produk</a>
    <a href="{{ route('landingpage') }}#Ulasan" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Ulasan</a>
    <a href="{{ route('landingpage') }}#Kontak" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Kontak</a>
    <a href="{{ route('riwayat') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Riwayat</a>
  </div>
</div>

<!-- Form Logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
  @csrf
</form>

<!-- Script untuk memastikan dropdown selalu di depan -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const dropdownButton = document.getElementById('dropdownUserButton');
  const dropdownMenu = document.getElementById('userDropdown');
  
  if(dropdownButton && dropdownMenu) {
    dropdownButton.addEventListener('click', function() {
      // Force highest z-index and fixed position
      dropdownMenu.style.zIndex = '99999';
      dropdownMenu.style.position = 'fixed';
      dropdownMenu.style.right = '1rem';
      dropdownMenu.style.top = '4rem';
    });
  }
});

// Fungsi untuk konfirmasi logout
function confirmLogout(event) {
  event.preventDefault();
  
  Swal.fire({
    title: 'Apakah Anda yakin ingin keluar?',
    text: "Anda akan keluar dari akun Anda",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, Keluar',
    cancelButtonText: 'Batal',
    buttonsStyling: false,
    customClass: {
      confirmButton: 'bg-red-800 text-white px-4 py-2 rounded mx-1',
      cancelButton: 'bg-gray-500 text-white px-4 py-2 rounded mx-1'
    }
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('logout-form').submit();
    }
  });
}
</script>