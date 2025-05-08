<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="box-border bg-cover bg-center min-h-screen pt-24 pb-10 px-4" style="background-image: url('gambarberanda/backgroundlogin.jpg')">

  <!-- Navbar -->
  <nav class="flex items-center justify-between px-4 md:px-6 bg-white shadow-md fixed top-0 left-0 w-full z-50 h-16">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
    <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-[100px] w-auto">
    </div>

    <!-- Menu + Search + Login -->
    <div class="flex items-center space-x-6">
      <!-- Menu Desktop -->
      <div class="hidden md:flex items-center space-x-4">
        <a href="{{ route('landingpage') }}"  class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
        <a href="{{ url('landingpage#Produk') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
        <a href="{{ route('riwayat') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
        <a href="{{ url('landingpage#Ulasan') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
        <a href="{{ url('landingpage#Kontak') }}"class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
      </div>

      <!-- Search Box -->
      <div class="hidden md:flex items-center border border-gray-400 rounded-md px-2 py-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-600">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
        </svg>
        <input type="text" placeholder="Pencarian" class="ml-2 outline-none bg-transparent text-sm" />
      </div>

      <!-- Tombol Icon Profil -->
      <button class="icon-btn" onclick="togglePopup()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
      </button>
    </div>

    <!-- Burger Mobile -->
    <div class="md:hidden flex items-center space-x-3">
      <button id="burger-btn" class="text-gray-800 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </nav>

  <!-- Overlay dan Popup Profil -->
  <div id="overlay" onclick="togglePopup()" class="fixed inset-0 bg-black bg-opacity-30 z-40 hidden"></div>
  <div id="popup" class="fixed top-16 right-4 w-72 p-5 bg-gradient-to-r from-[#115EAD] to-[#219FE3] text-white rounded-l-xl shadow-lg z-50 hidden transition-all duration-300">
    <label class="block text-lg font-bold mb-2">Selamat Datang,</label>
    <p class="text-sm mb-1"><strong>Nama:</strong> Kim Mingyu</p>
    <p class="text-sm mb-1"><strong>Email:</strong> mingyukarina@gmail.com</p>
    <p class="text-sm mb-4"><strong>Nomor Handphone:</strong> 0895xxxxxxxx</p>
    <div class="flex justify-between space-x-2">
      <a href="{{ route('edit_profile') }}" class="w-1/2 text-center bg-white text-[#1e1f4a] py-2 rounded-md font-semibold hover:underline">Edit Profil</a>
      <a href="#" class="w-1/2 text-center bg-white text-[#1e1f4a] py-2 rounded-md font-semibold hover:underline" onclick="confirmLogout()">Keluar</a>
    </div>
  </div>

  <div id="mobile-menu" class="md:hidden fixed top-0 right-0 w-3/4 h-full bg-white z-40 shadow-lg transform translate-x-full transition-all duration-500 ease-in-out">
  <div class="flex flex-col items-center justify-center h-full space-y-6">
    <a href="{{ route('landingpage') }}" class="text-blue-900 text-xl font-medium hover:bg-blue-100 px-4 py-2 rounded-md">Beranda</a>
    <a href="{{ url('landingpage#Produk') }}" class="text-blue-900 text-xl font-medium hover:bg-blue-100 px-4 py-2 rounded-md">Produk</a>
    <a href="{{ route('riwayat') }}" class="text-blue-900 text-xl font-medium hover:bg-blue-100 px-4 py-2 rounded-md">Riwayat</a>
    <a href="{{ url('landingpage#Ulasan') }}"class="text-blue-900 text-xl font-medium hover:bg-blue-100 px-4 py-2 rounded-md">Ulasan</a>
    <a href="{{ url('landingpage#Kontak') }}" class="text-blue-900 text-xl font-medium hover:bg-blue-100 px-4 py-2 rounded-md">Kontak</a>
  </div>
</div>


  <!-- Form Edit Profil -->
  <div class="max-w-md mx-auto bg-white/95 rounded-xl shadow-lg p-6 mt-6">
    <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">Edit Profil</h2>
    <form action="#" class="space-y-4">
      <div>
        <label for="nama_pengguna" class="block mb-1 text-sm font-medium text-gray-700">Nama:</label>
        <input type="text" id="nama_pengguna" name="nama_pengguna" required class="w-full px-4 py-2 border-2 border-[#002366] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
      </div>
      <div>
        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email:</label>
        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border-2 border-[#002366] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
      </div>
      <div>
        <label for="no_hp" class="block mb-1 text-sm font-medium text-gray-700">Nomor HP:</label>
        <input type="text" id="no_hp" name="no_hp" required class="w-full px-4 py-2 border-2 border-[#002366] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
      </div>
      <div>
        <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password Baru:</label>
        <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="w-full px-4 py-2 border-2 border-[#002366] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
      </div>
      <div class="flex flex-col gap-3 mt-4">
        <button type="submit" class="bg-[#002366] hover:bg-[#578FCA] text-white font-semibold py-2 rounded-md">Simpan</button>
        <a href="login.php" class="bg-[#578FCA] hover:bg-[#002366] text-white text-center font-semibold py-2 rounded-md">Batal</a>
      </div>
    </form>
  </div>

  <script>
  function togglePopup() {
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');
    const isVisible = popup.classList.contains('hidden');

    if (isVisible) {
      popup.classList.remove('hidden');
      overlay.classList.remove('hidden');
    } else {
      popup.classList.add('hidden');
      overlay.classList.add('hidden');
    }
  }

  // Fungsi Toggle Mobile Menu
  const burgerBtn = document.getElementById('burger-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  burgerBtn.addEventListener('click', () => {
    if (mobileMenu.classList.contains('translate-x-full')) {
      mobileMenu.classList.remove('translate-x-full');
      mobileMenu.classList.add('translate-x-0');
    } else {
      mobileMenu.classList.remove('translate-x-0');
      mobileMenu.classList.add('translate-x-full');
    }
  });

  // Klik di luar menu untuk menutupnya
  window.addEventListener('click', (e) => {
    if (!mobileMenu.contains(e.target) && !burgerBtn.contains(e.target)) {
      mobileMenu.classList.add('translate-x-full');
      mobileMenu.classList.remove('translate-x-0');
    }
  });
</script>


</body>
</html>
