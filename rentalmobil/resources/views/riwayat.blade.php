<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Aplikasi Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="overflow-x-hidden font-sans">

<!-- Navbar -->
<nav class="flex items-center justify-between px-6 bg-white shadow-md fixed top-0 w-full z-50 h-16 overflow-hidden">
  <!-- Logo kiri -->
  <div class="flex items-center space-x-2">
  <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-[100px] w-auto">
  </div>

  <!-- Menu + Search + Login kanan -->
  <div class="flex items-center space-x-6">
    <!-- Menu (hidden by default, shows in larger screens) -->
    <div class="hidden md:flex items-center space-x-4">
      <a href="{{ route('landingpage') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
      <a href="{{ url('landingpage#Produk') }}"class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
      <a href="{{ route('riwayat') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
      <a href="{{ url('landingpage#Ulasan') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
      <a href="{{ url('landingpage#Kontak') }}" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
    </div>

    <!-- Search Box -->
    <div class="hidden md:flex items-center border border-gray-400 rounded-md px-2 py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-600">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
      </svg>
      <input type="text" placeholder="Pencarian" class="ml-2 outline-none bg-transparent text-sm">
    </div>

   <!-- Tombol Icon Profil -->
<button class="icon-btn" onclick="togglePopup()">
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
  </svg>
</button>

<!-- Overlay -->
<div id="overlay" onclick="togglePopup()" class="fixed inset-0 bg-black bg-opacity-30 z-40 hidden"></div>

<!-- Popup -->
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

<!-- Script -->
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
</script>

    <!-- Burger Icon for Mobile -->
    <div class="md:hidden flex items-center space-x-3">
      <button id="burger-btn" class="text-gray-800 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="md:hidden fixed top-0 right-0 w-3/4 h-full bg-gray-900 bg-opacity-75 z-40 transform translate-x-full transition-all duration-500 ease-in-out">
  <div class="flex flex-col items-center justify-center h-full space-y-6">
    <a href="{{ route('landingpage') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Beranda</a>
    <a href="{{ url('landingpage#Produk') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Produk</a>
    <a href="{{ route('riwayat') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Riwayat</a>
    <a href="{{ url('landingpage#Ulasan') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Ulasan</a>
    <a href="{{ url('landingpage#Kontak') }}"  class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Kontak</a>
  </div>
</div>

  <!-- Table Container -->
  <div class="container mx-auto mt-[80px] p-5 w-[95%] bg-white rounded-md overflow-x-auto">
  <table class="min-w-max w-full table-auto text-sm">
    <thead>
      <tr class="bg-[#f1f4ff] text-black text-center">
        <th class="border border-gray-500 p-2">No</th>
        <th class="border border-gray-500 p-2">Kode Pemesanan</th>
        <th class="border border-gray-500 p-2">Nama Lengkap</th>
        <th class="border border-gray-500 p-2">Tanggal</th>
        <th class="border border-gray-500 p-2">Mobil</th>
        <th class="border border-gray-500 p-2">Detail Mobil</th>
        <th class="border border-gray-500 p-2">Status</th>
        <th class="border border-gray-500 p-2">Aksi</th>
      </tr>
    </thead>
      <tbody>
        <!-- Row 1 -->
        <tr>
          <td class="border p-2 text-center align-middle">1</td>
          <td class="border p-2 text-center">CR00123</td>
          <td class="border p-2 text-center">KIM MINGYU</td>
          <td class="border p-2 text-center">
            Pengambilan : 2025-04-20<br>
            Pengembalian : 2025-04-25
          </td>
          <td class="border p-2 text-center"><img src="gambarproduk/mobil 2.png" alt="Toyota Rush" class="w-[100px] mx-auto"></td>
          <td class="border p-2 text-sm leading-relaxed">
            Merek : Toyota<br>
            Tipe : SUV Rush<br>
            Warna : Black<br>
            Harga : 350.000 <br>
            Jumlah Kursi: 8 <br>
            Mesin : 1.500 Cc<br>
          </td>
          <td class="border p-2 text-center">
            <span class="px-2 py-1 rounded-full font-bold bg-green-600 text-black">Konfirmasi</span>
          </td>
          <td class="border p-2 text-center">
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
          </td>
        </tr>

        <!-- Row 2 (Pending) -->
        <tr>
          <td class="border p-2 text-center align-middle">2</td>
          <td class="border p-2 text-center">CR00123</td>
          <td class="border p-2 text-center">KIM MINGYU</td>
          <td class="border p-2 text-center">
            Pengambilan : 2025-04-20<br>
            Pengembalian : 2025-04-25
          </td>
          <td class="border p-2 text-center"><img src="gambarproduk/mobil 2.png" alt="Toyota Rush" class="w-[100px] mx-auto"></td>
          <td class="border p-2 text-sm leading-relaxed">
            Merek : Toyota<br>
            Tipe : SUV Rush<br>
            Warna : Black<br>
            Harga : 350.000 <br>
            Jumlah Kursi: 8 <br>
            Mesin : 1.500 Cc<br>
          </td>
          <td class="border p-2 text-center">
            <span class="px-2 py-1 rounded-full font-bold bg-yellow-500 text-black">Menunggu</span>
          </td>
          <td class="border p-2 text-center">
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
          </td>
        </tr>
        <!-- Row 3 (Batal) -->
        <tr>
          <td class="border p-2 text-center align-middle">2</td>
          <td class="border p-2 text-center">CR00123</td>
          <td class="border p-2 text-center">KIM MINGYU</td>
          <td class="border p-2 text-center">
            Pengambilan : 2025-04-20<br>
            Pengembalian : 2025-04-25
          </td>
          <td class="border p-2 text-center"><img src="gambarproduk/mobil 2.png" alt="Toyota Rush" class="w-[100px] mx-auto"></td>
          <td class="border p-2 text-sm leading-relaxed">
            Merek : Toyota<br>
            Tipe : SUV Rush<br>
            Warna : Black<br>
            Harga : 350.000 <br>
            Jumlah Kursi: 8 <br>
            Mesin : 1.500 Cc<br>
          </td>
          <td class="border p-2 text-center">
            <span class="px-2 py-1 rounded-full font-bold bg-red-500 text-black">Batal</span>
          </td>
          <td class="border p-2 text-center">
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
          </td>
        </tr>
        <!-- Row 4 (selesai) -->
        <tr>
          <td class="border p-2 text-center align-middle">2</td>
          <td class="border p-2 text-center">CR00123</td>
          <td class="border p-2 text-center">KIM MINGYU</td>
          <td class="border p-2 text-center">
            Pengambilan : 2025-04-20<br>
            Pengembalian : 2025-04-25
          </td>
          <td class="border p-2 text-center"><img src="gambarproduk/mobil 2.png" alt="Toyota Rush" class="w-[100px] mx-auto"></td>
          <td class="border p-2 text-sm leading-relaxed">
            Merek : Toyota<br>
            Tipe : SUV Rush<br>
            Warna : Black<br>
            Harga : 350.000 <br>
            Jumlah Kursi: 8 <br>
            Mesin : 1.500 Cc<br>
          </td>
          <td class="border p-2 text-center">
            <span class="px-2 py-1 rounded-full font-bold bg-blue-500 text-black">Selesai</span>
          </td>
          <td class="border p-2 text-center">
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
            <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
