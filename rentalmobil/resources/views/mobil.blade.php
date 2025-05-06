<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


  <style>
    /* Tailwind sudah mencakup sebagian besar kebutuhan responsif dan styling */
    .popup {
      display: none;
    }
    .popup.active {
      display: block;
    }
  </style>
</head>
<body class="bg-gray-200 m-0">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 right-0 bg-white h-16 flex items-center justify-between px-6 shadow z-50">
    <div class="flex items-center">
      <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-16" />
    </div>
    <div class="flex items-center gap-4">
      <button onclick="togglePopup()">
        <svg class="text-blue-600 w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
        </svg>
      </button>
      <button class="block lg:hidden" onclick="toggleDropdown()">
        <svg class="text-blue-600 w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M3 6h14M3 10h14M3 14h14" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </nav>

<!-- Sidebar Tailwind -->
<div class="fixed top-[70px] left-0 h-[calc(100vh-70px)] w-52 bg-[#112769] text-white p-4">
  <ul class="space-y-3">
    <li>
      <a href="landingadmin.php" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-home mr-3"></i> Beranda
      </a>
    </li>
    <li>
      <a href="pemesanan.php" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-tachometer-alt mr-3"></i> Pemesanan
      </a>
    </li>
    <li>
      <a href="mobil.php" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-car mr-3"></i> Mobil
      </a>
    </li>
    <li>
      <a href="ulasan.php" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-star-half-alt mr-3"></i> Ulasan
      </a>
    </li>
    <li>
      <a href="pesan.php" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-envelope mr-3"></i> Pesan
      </a>
    </li>
  </ul>
</div>



  <!-- Popup -->
  <div id="popup" class="popup fixed top-20 right-5 bg-blue-900 text-white w-72 p-5 rounded-lg shadow-lg z-50">
    <strong class="block text-lg mb-2">Selamat datang,</strong>
    <p><strong>Nama:</strong> Admin Contoh</p>
    <p><strong>Email:</strong> admin@example.com</p>
    <p><strong>Nomor HP:</strong> 08123456789</p>
    <div class="flex justify-between mt-4">
      <button onclick="togglePopup()" class="bg-white text-blue-900 px-4 py-2 rounded w-[48%]">Tutup</button>
      <a href="#" class="bg-white text-blue-900 px-4 py-2 rounded w-[48%] text-center">Keluar</a>
    </div>
  </div>

  <!-- Main Content -->
  <main class="lg:ml-52 mt-24 px-6">
    <h3 class="text-xl font-semibold mb-4">List Mobil</h3>
    <button class="bg-blue-600 text-white px-4 py-2 rounded mb-4 hover:bg-blue-700">
      ➕ Tambah Data Mobil
    </button>
    <div class="overflow-x-auto">
    <table class="table-auto w-full border border-gray-300">
  <thead>
    <tr class="bg-gray-100">
      <th class="border border-gray-300 px-4 py-2">NO</th>
      <th class="border border-gray-300 px-4 py-2">KODE PRODUK</th>
      <th class="border border-gray-300 px-4 py-2">MEREK</th>
      <th class="border border-gray-300 px-4 py-2">JENIS</th>
      <th class="border border-gray-300 px-4 py-2">WARNA</th>
      <th class="border border-gray-300 px-4 py-2">FOTO</th>
      <th class="border border-gray-300 px-4 py-2">HARGA HARIAN</th>
      <th class="border border-gray-300 px-4 py-2">JUMLAH KURSI</th>
      <th class="border border-gray-300 px-4 py-2">MESIN</th>
      <th class="border border-gray-300 px-4 py-2">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="border border-gray-300 px-4 py-2">1</td>
      <td class="border border-gray-300 px-4 py-2">CR00123</td>
      <td class="border border-gray-300 px-4 py-2">Toyota</td>
      <td class="border border-gray-300 px-4 py-2">SUV Rush</td>
      <td class="border border-gray-300 px-4 py-2">Hitam</td>
      <td class="border border-gray-300 px-4 py-2">
        <img src="gambarproduk/mobil 2.png" alt="Mobil" class="w-24" />
      </td>
      <td class="border border-gray-300 px-4 py-2">Rp. 300.000</td>
      <td class="border border-gray-300 px-4 py-2">8</td>
      <td class="border border-gray-300 px-4 py-2">1.500 Cc</td>
      <td class="border border-gray-300 px-4 py-2">
        <button class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</button>
        <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
      </td>
    </tr>
  </tbody>
</table>

    </div>
  </main>

  <script>
    function togglePopup() {
      const popup = document.getElementById("popup");
      popup.classList.toggle("active");
    }
    function toggleDropdown() {
      alert("Dropdown sidebar hanya tampil di layar kecil. Implementasi responsif bisa ditambahkan.");
    }
  </script>
</body>
</html>
