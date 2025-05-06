<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Mobil</title>
  <script src="https://cdn.tailwindcss.com/3.4.1"></script>
</head>
<body class="overflow-x-hidden font-sans">

  <!-- Navbar -->
  <nav class="fixed top-0 w-full max-h-[55px] bg-white flex items-center justify-between px-4 py-2 shadow-md z-[1000]">
    
    <!-- Logo -->
    <div class="flex items-center">
      <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-[100px] w-auto">
    </div>

    <!-- Links -->
    <div class="flex-1 flex justify-end">
      <div class="hidden md:flex items-center">
        <a href="#Beranda" class="text-black text-sm px-6 py-4 bg-white hover:bg-gradient-to-r hover:from-[#115EAD] hover:to-[#219FE3] hover:text-white">Beranda</a>
        <a href="#Produk" class="text-black text-sm px-6 py-4 bg-white hover:bg-gradient-to-r hover:from-[#115EAD] hover:to-[#219FE3] hover:text-white">Produk</a>
        <a href="halriwayat.php" class="text-black text-sm px-6 py-4 bg-white hover:bg-gradient-to-r hover:from-[#115EAD] hover:to-[#219FE3] hover:text-white">Riwayat</a>
        <a href="#Ulasan" class="text-black text-sm px-6 py-4 bg-white hover:bg-gradient-to-r hover:from-[#115EAD] hover:to-[#219FE3] hover:text-white">Ulasan</a>
        <a href="#Kontak" class="text-black text-sm px-6 py-4 bg-white hover:bg-gradient-to-r hover:from-[#115EAD] hover:to-[#219FE3] hover:text-white">Kontak</a>
      </div>
    </div>

    <!-- Burger Menu -->
    <div class="md:hidden flex flex-col gap-1 w-[25px] h-[20px] justify-between cursor-pointer" onclick="toggleMenu()">
      <div class="w-full h-1 bg-black"></div>
      <div class="w-full h-1 bg-black"></div>
      <div class="w-full h-1 bg-black"></div>
    </div>

    <!-- Search + Profile -->
    <div class="hidden md:flex items-center gap-4 ml-4">
      <div class="flex items-center border border-black rounded-md px-3 py-1 bg-white">
        <svg class="w-5 h-5 text-black mr-1" xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 16 16">
          <path d="M11 6a5 5 0 1 0-1.293 3.707l3.182 3.182a1 1 0 0 0 1.414-1.414l-3.182-3.182A4.978 4.978 0 0 0 11 6zm-5 3a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>
        <input type="text" placeholder="Pencarian" class="bg-transparent outline-none border-none text-sm w-[120px]">
      </div>
      <button class="bg-transparent p-1" onclick="togglePopup()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Script for Burger Menu -->
  <script>
    function toggleMenu() {
      const navLinks = document.querySelector('.nav-links');
      navLinks.classList.toggle('hidden');
    }
  </script>

  <!-- Table Container -->
  <div class="container mx-auto mt-[100px] p-5 w-[95%] bg-white rounded-md overflow-x-auto">
    <table class="w-full border-collapse mt-6">
      <thead>
        <tr class="bg-[#f1f4ff] text-black">
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
