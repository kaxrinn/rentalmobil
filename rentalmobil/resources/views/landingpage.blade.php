
<!-- Ini belum tersambung -->
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Aplikasi Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="font-sans overflow-x-hidden">
<nav class="fixed top-0 left-0 w-full bg-white shadow z-50 px-4 py-2 flex items-center justify-between">
  <!-- Logo -->
  <div class="flex items-center">
    <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-10 w-auto">
  </div>

  <!-- Menu links (left aligned) -->
  <div class="hidden md:flex items-center space-x-2 lg:space-x-4 ml-6">
    <a href="#Beranda"
       class="group relative px-4 py-2 text-black font-medium overflow-hidden transition duration-300">
      <span class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-400 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
      <span class="relative group-hover:text-white group-hover:-rotate-2 transition duration-300">Beranda</span>
    </a>
    <a href="#Produk"
       class="group relative px-4 py-2 text-black font-medium overflow-hidden transition duration-300">
      <span class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-400 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
      <span class="relative group-hover:text-white group-hover:-rotate-2 transition duration-300">Produk</span>
    </a>
    <a href="{{ route('riwayat') }}"
       class="group relative px-4 py-2 text-black font-medium overflow-hidden transition duration-300">
      <span class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-400 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
      <span class="relative group-hover:text-white group-hover:-rotate-2 transition duration-300">Riwayat</span>
    </a>
    <a href="#Ulasan"
       class="group relative px-4 py-2 text-black font-medium overflow-hidden transition duration-300">
      <span class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-400 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
      <span class="relative group-hover:text-white group-hover:-rotate-2 transition duration-300">Ulasan</span>
    </a>
    <a href="#Kontak"
       class="group relative px-4 py-2 text-black font-medium overflow-hidden transition duration-300">
      <span class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-400 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"></span>
      <span class="relative group-hover:text-white group-hover:-rotate-2 transition duration-300">Kontak</span>
    </a>
  </div>

  <!-- Search and Login -->
  <div class="flex items-center space-x-4">
    <div class="hidden md:flex items-center border border-black rounded-lg px-2 py-1">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-black mr-1" fill="currentColor" viewBox="0 0 16 16">
        <path d="M11 6a5 5 0 1 0-1.293 3.707l3.182 3.182a1 1 0 0 0 1.414-1.414l-3.182-3.182A4.978 4.978 0 0 0 11 6zm-5 3a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
      </svg>
      <input type="text" placeholder="Pencarian" class="bg-transparent focus:outline-none text-sm">
    </div>
    <a href="login.php" class="bg-blue-800 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 transition">Login</a>
    
    <!-- Burger (mobile only) -->
    <div class="md:hidden cursor-pointer" onclick="toggleMenu()">
      <div class="w-6 h-1 bg-black my-1"></div>
      <div class="w-6 h-1 bg-black my-1"></div>
      <div class="w-6 h-1 bg-black my-1"></div>
    </div>
  </div>
</nav>


<!-- Slide Beranda -->
<section id="Beranda" class="pt-[70px]">
  <div class="relative w-screen h-screen overflow-hidden">
    <div id="slides" class="flex transition-transform duration-1000 w-[300vw] h-full">
      <img src="gambarberanda/gambar 1.jpg" class="w-screen h-full object-cover" alt="Gambar 1">
      <img src="gambarberanda/gambar 2.jpg" class="w-screen h-full object-cover" alt="Gambar 2">
      <img src="gambarberanda/gambar 3.jpg" class="w-screen h-full object-cover" alt="Gambar 3">
    </div>
    <div id="dots" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
      <div class="w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="moveToSlide(0)"></div>
      <div class="w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="moveToSlide(1)"></div>
      <div class="w-3 h-3 bg-white rounded-full opacity-50 cursor-pointer" onclick="moveToSlide(2)"></div>
    </div>
  </div>

  <script>
    const slides = document.getElementById('slides');
    const dots = document.querySelectorAll('#dots div');
    let currentIndex = 0;
    const totalSlides = dots.length;
>>>>>>> Stashed changes

    function moveToSlide(index) {
      slides.style.transform = `translateX(-${index * 100}vw)`;
      dots.forEach(dot => dot.classList.remove('opacity-100'));
      dots[index].classList.add('opacity-100');
      currentIndex = index;
    }

<<<<<<< Updated upstream
<!-- Logo Profil -->
 <!-- Ini belum tersambung -->
    <button class="icon-btn" onclick="togglePopup()">
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
  </svg>
</button>

  </div>
  </nav>

<!--Javascript untuk burger menu-->
<script>
  function toggleMenu() { 
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');// mengaktifkan burger menu saat layar lebih kecil
  }
</script>
 <!-- Overlay -->
  <div class="overlay" id="overlay" onclick="togglePopup()"></div>

  <!-- Popup -->
  <div class="popup" id="popup">
    <label><strong><b>Selamat Datang,</b></strong></label>
    <p><strong>Nama:</strong> Kim Mingyu </p>
    <p><strong>Email:</strong> mingyukarina@gmail.com</p>
    <p><strong>Nomor Handphone:</strong> 0895xxxxxxxx </p>
    <div class="button-group" style="margin-top: 10px;">
      <a href="{{ route('edit_profile') }}"class="close-btn" onclick="togglePopup()">Edit Profil</a>
      <a href="#" class="logout-btn" onclick="confirmLogout()">Keluar</a>
    </div>
  </div>

  <script>
function togglePopup() {
  var popup = document.getElementById('popup');
  var overlay = document.getElementById('overlay');
  // Toggle muncul/nggak
  if (popup.style.display === 'block') {
    popup.style.display = 'none';
    overlay.style.display = 'none';
  } else {
    popup.style.display = 'block';
    overlay.style.display = 'block';
  }
}
</script>

<!--section Slide Beranda-->
<section class="Beranda" id="Beranda">
<div class="slider">
  <div class="slides" id="slides">
    <!-- 3 gambar untuk slider -->
    <img src="gambarberanda/gambar 1.jpg" alt="Gambar 1">
    <img src="gambarberanda/gambar 2.jpg" alt="Gambar 2">
    <img src="gambarberanda/gambar 3.jpg" alt="Gambar 3">
  </div>

  <div class="dots" id="dots">
    <!-- Dot navigasi slider -->
    <div class="dot active" onclick="moveToSlide(0)"></div>
    <div class="dot" onclick="moveToSlide(1)"></div>
    <div class="dot" onclick="moveToSlide(2)"></div>
  </div>
</div>

<!-- Javascript Untuk Slide Beranda-->
<script>
// Ambil elemen slides dan dots
const slides = document.getElementById('slides');
const dots = document.querySelectorAll('.dot');
let currentIndex = 0; // posisi slide sekarang
const totalSlides = dots.length; // total slide yang ada

// Fungsi pindah ke slide tertentu
function moveToSlide(index) {
  slides.style.transform = `translateX(-${index * 100}vw)`; // geser slider
  dots.forEach(dot => dot.classList.remove('active')); // hapus semua aktif
  dots[index].classList.add('active'); // aktifkan dot yg dipilih
  currentIndex = index; // update index
}

// Auto-slide tiap 5 detik
setInterval(() => {
  let nextIndex = (currentIndex + 1) % totalSlides; // ke slide berikutnya
  moveToSlide(nextIndex); // panggil fungsi pindah slide
}, 5000); // 5000 ms = 5 detik
</script>

<!--Tentang Aplikasi-->
<section class="aplikasi">
  <div class="container">
    <div class="image">
      <img src="gambarberanda/gambar 4.jpeg" alt="Mobil">
    </div>
    <div class="content">
      <h2><span>|</span> TENTANG APLIKASI</h2>
      <p>VROOM adalah solusi terbaik untuk Anda yang membutuhkan kemudahan dalam memesan mobil. Dengan beragam pilihan mobil favorit, proses pemesanan yang cepat, serta sistem yang aman dan terpercaya, kami berkomitmen untuk memberikan layanan terbaik bagi setiap perjalanan Anda</p>

      <p>Temukan mobil yang Anda butuhkan dengan mudah, dan rasakan pengalaman reservasi yang nyaman bersama VROOM.</p>
    </div>
  </div>
</section>

<section class="bg-[#f7f7fc] py-10 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-center text-2xl font-bold text-[#1d1c2b] mb-10">PRODUK</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
      <!-- Kartu Produk -->
      <div class="bg-white shadow-md rounded-lg p-5 w-full max-w-xs text-center">
        <img src="gambarproduk/mobil 2.png" alt="Toyota Raize" class="h-36 mx-auto mb-4 object-contain">
        <h3 class="font-bold mb-1">Toyota Raize</h3>
        <p class="text-gray-600 text-sm mb-3">Rp. 250.000.000</p>
        <a href="#" class="bg-blue-800 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition">Detail</a>
      </div>

      <!-- Duplikat Produk (bisa pakai loop PHP) -->
      <div class="bg-white shadow-md rounded-lg p-5 w-full max-w-xs text-center">
        <img src="gambarproduk/mobil 2.png"alt="Toyota Rush" class="h-36 mx-auto mb-4 object-contain">
        <h3 class="font-bold mb-1">Toyota Rush</h3>
        <p class="text-gray-600 text-sm mb-3">Rp. 280.000.000</p>
        <a href="#" class="bg-blue-800 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition">Detail</a>
      </div>

      <!-- Tambahan produk lainnya -->
      <div class="bg-white shadow-md rounded-lg p-5 w-full max-w-xs text-center">
        <img src="gambarproduk/mobil 2.png" alt="Toyota Raize" class="h-36 mx-auto mb-4 object-contain">
        <h3 class="font-bold mb-1">Toyota Raize</h3>
        <p class="text-gray-600 text-sm mb-3">Rp. 250.000.000</p>
        <a href="#" class="bg-blue-800 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition">Detail</a>
      </div>

      <div class="bg-white shadow-md rounded-lg p-5 w-full max-w-xs text-center">
        <img src="gambarproduk/mobil 2.png" alt="Toyota Raize" class="h-36 mx-auto mb-4 object-contain">
        <h3 class="font-bold mb-1">Toyota Raize</h3>
        <p class="text-gray-600 text-sm mb-3">Rp. 250.000.000</p>
        <a href="#" class="bg-blue-800 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition">Detail</a>
      </div>
    </div>
>>>>>>> Stashed changes
  </div>
</section>
<!-- ULASAN PELANGGAN -->
<!-- ULASAN APLIKASI -->
<div class="w-full px-4 py-16 bg-white">
  <h2 class="text-center text-2xl md:text-3xl font-bold text-blue-900 uppercase mb-12">ULASAN APLIKASI</h2>
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Card 1 -->
    <div class="bg-gray-100 rounded-xl p-6 shadow text-center">
      <p class="text-4xl font-bold text-black leading-tight">15</p>
      <p class="text-gray-600 text-sm -mt-1">Juni</p>
      <p class="text-gray-600 text-sm mb-2">2025</p>
      <p class="text-blue-600 text-sm mb-3">★★★★★</p>
      <p class="text-gray-800 mb-3">Mobil bagus dan nyaman.</p>
      <p class="font-semibold text-black">-Kim Mingyu-</p>
    </div>

    <!-- Card 2 -->
    <div class="bg-gray-100 rounded-xl p-6 shadow text-center">
      <p class="text-4xl font-bold text-black leading-tight">15</p>
      <p class="text-gray-600 text-sm -mt-1">Juni</p>
      <p class="text-gray-600 text-sm mb-2">2025</p>
      <p class="text-blue-600 text-sm mb-3">★★★★★</p>
      <p class="text-gray-800 mb-3">Ada harga ada kualitas.</p>
      <p class="font-semibold text-black">-Jeon Wonwoo-</p>
    </div>

    <!-- Card 3 -->
    <div class="bg-gray-100 rounded-xl p-6 shadow text-center">
      <p class="text-4xl font-bold text-black leading-tight">15</p>
      <p class="text-gray-600 text-sm -mt-1">Juni</p>
      <p class="text-gray-600 text-sm mb-2">2025</p>
      <p class="text-blue-600 text-sm mb-3">★★★★★</p>
      <p class="text-gray-800 mb-3">Banyak pilihan mobil yang bisa disewa dengan kualitas yang baik.</p>
      <p class="font-semibold text-black">-Hong Jisoo-</p>
    </div>

  </div>
</div>


<!-- KONTAK -->
<div class="bg-[#f6f7fb] py-16 px-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    
    <!-- Form Kontak -->
    <div class="bg-white rounded-xl shadow-md p-8">
      <h2 class="text-2xl font-bold text-blue-900 mb-6">KONTAK KAMI</h2>
      <form action="process_contact.php" method="POST">
        <div class="mb-4">
          <input type="text" name="nama" placeholder="Masukkan nama Anda" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-4">
          <input type="email" name="email" placeholder="Masukkan email Anda" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="mb-6">
          <textarea name="pesan" rows="4" placeholder="Tulis pesan di sini" required
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit"
          class="w-full bg-blue-900 text-white py-2 rounded-md hover:bg-blue-800 transition-colors font-semibold">
          Kirim Pesan
        </button>
      </form>
    </div>

    <!-- Gambar & Deskripsi -->
    <div class="text-center md:text-left">
      <p class="text-gray-700 text-lg mb-6">
        Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.
      </p>
      <img src="gambarberanda/image.png" alt="Mobil" class="mx-auto md:mx-0 max-w-full h-auto">
    </div>
  </div>
</div>


<!-- ALAMAT -->
<div class="bg-[#f6f7fb] py-16 px-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    
    <!-- Google Maps Embed -->
    <div class="w-full h-full">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.013726968598!2d104.02542406643984!3d1.1235985279674244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da3b3e9d994bbb%3A0x2d3b5b751f059edf!2sBatam%20Centre!5e0!3m2!1sen!2sid!4v1649876543210!5m2!1sen!2sid" 
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="rounded-md shadow-md">
      </iframe>
    </div>

    <!-- Deskripsi -->
    <div class="text-center md:text-left">
      <h3 class="text-2xl font-bold text-blue-900 mb-4">Kunjungi Alamat Kami</h3>
      <p class="text-gray-700 text-base">
        Lokasi kami berada di pusat Kota Batam, Kepulauan Riau. Mudah dijangkau dari berbagai arah dan dekat dengan pusat transportasi utama.
      </p>
    </div>

  </div>
</div>


<!-- PANDUAN PENYEWAAN -->
<div class="bg-[#f6f7fb] py-16 px-4">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-2xl md:text-3xl font-bold text-blue-900 mb-10">Panduan Penyewaan Mobil</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- Langkah 1 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">1. Lengkapi Dokumen</h3>
        <p class="text-gray-700 text-sm">Siapkan SIM, KTP, dan bukti pemesanan untuk mempercepat proses sewa.</p>
      </div>
      
      <!-- Langkah 2 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">2. Cek Kondisi Mobil</h3>
        <p class="text-gray-700 text-sm">Periksa mobil secara menyeluruh, termasuk ban, lampu, dan mesin.</p>
      </div>
      
      <!-- Langkah 3 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">3. Periksa Bahan Bakar</h3>
        <p class="text-gray-700 text-sm">Pastikan bahan bakar sesuai dengan ketentuan awal sewa kendaraan.</p>
      </div>
      
      <!-- Langkah 4 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">4. Cek Fitur Utama</h3>
        <p class="text-gray-700 text-sm">Pastikan AC, rem, wiper, dan sistem audio berfungsi dengan baik.</p>
      </div>
      
      <!-- Langkah 5 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">5. Minta Kontak Darurat</h3>
        <p class="text-gray-700 text-sm">Selalu minta nomor kontak untuk keadaan darurat selama masa sewa.</p>
      </div>
      
      <!-- Langkah 6 -->
      <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="font-bold text-blue-800 mb-2">6. Pahami Aturan Sewa</h3>
        <p class="text-gray-700 text-sm">Baca dan pahami aturan denda, keterlambatan, dan area penggunaan kendaraan.</p>
      </div>

    </div>
  </div>
</div>


<!-- FOOTER -->
<footer class="text-white">
  <!-- Kotak biru gradasi -->
  <div class="bg-gradient-to-r from-blue-800 to-blue-400 py-10">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex flex-col md:flex-row justify-between items-start">
        <!-- Kiri: Teks dan ikon -->
        <div class="mb-6 md:mb-0">
          <h2 class="text-2xl font-bold leading-tight">VEHICLE RENTAL</h2>
          <h3 class="text-2xl font-bold mb-4">ON ONE MOVE</h3>
          <div class="flex space-x-4">
            <a href="#" class="transform hover:scale-110 transition duration-300">
              <i class="fab fa-instagram text-2xl"></i>
            </a>
            <a href="#" class="transform hover:scale-110 transition duration-300">
              <i class="fab fa-tiktok text-2xl"></i>
            </a>
            <a href="#" class="transform hover:scale-110 transition duration-300">
              <i class="fab fa-linkedin-in text-2xl"></i>
            </a>
            <a href="#" class="transform hover:scale-110 transition duration-300">
              <i class="fab fa-whatsapp text-2xl"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Copyright di luar kotak biru -->
  <div class="text-center text-sm text-gray-700 py-4 bg-white">
    &copy; 2024 All rights reserved.
  </div>
</footer>


<!-- Tambahkan Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
