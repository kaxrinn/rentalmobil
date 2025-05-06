<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Mobil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">
  <!-- Navbar -->
  <nav class="flex items-center justify-between px-6 py-4 bg-white shadow-md">
    <div><img src="gambarberanda/Logo 6.png" alt="Logo" class="h-10 w-auto"></div>
    <div class="hidden md:flex space-x-6 text-sm font-medium">
      <a href="#Beranda" class="hover:text-blue-600">Beranda</a>
      <a href="#Produk" class="hover:text-blue-600">Produk</a>
      <a href="login.php" class="hover:text-blue-600">Riwayat</a>
      <a href="#Ulasan" class="hover:text-blue-600">Ulasan</a>
      <a href="#Kontak" class="hover:text-blue-600">Kontak</a>
    </div>
    <div class="flex items-center space-x-4">
      <div class="relative">
        <input type="text" placeholder="Pencarian" class="border rounded-full pl-10 pr-4 py-2 text-sm">
        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M11 6a5 5 0 1 0-1.293 3.707l3.182 3.182a1 1 0 0 0 1.414-1.414l-3.182-3.182A4.978 4.978 0 0 0 11 6zm-5 3a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>
      </div>
      <a href="login.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a>
    </div>
  </nav>

  <!-- Slide Beranda -->
  <section id="Beranda" class="overflow-hidden relative">
    <div id="slides" class="flex transition-transform duration-700">
      <img src="gambarberanda/gambar 1.jpg" class="w-full" alt="Gambar 1" />
      <img src="gambarberanda/gambar 2.jpg" class="w-full" alt="Gambar 2" />
      <img src="gambarberanda/gambar 3.jpg" class="w-full" alt="Gambar 3" />
    </div>
    <div class="flex justify-center mt-4 space-x-2">
      <div class="dot w-3 h-3 rounded-full bg-gray-400 cursor-pointer" onclick="moveToSlide(0)"></div>
      <div class="dot w-3 h-3 rounded-full bg-gray-300 cursor-pointer" onclick="moveToSlide(1)"></div>
      <div class="dot w-3 h-3 rounded-full bg-gray-300 cursor-pointer" onclick="moveToSlide(2)"></div>
    </div>
  </section>

  <!-- Tentang Aplikasi -->
  <section class="py-12 px-6 md:px-20 bg-white">
    <div class="flex flex-col md:flex-row items-center gap-10">
      <img src="gambarberanda/gambar 4.jpeg" alt="Mobil" class="w-full md:w-1/2 rounded-lg" />
      <div>
        <h2 class="text-2xl font-bold mb-4"><span class="text-blue-600">|</span> TENTANG APLIKASI</h2>
        <p class="mb-4">VROOM adalah solusi terbaik untuk Anda yang membutuhkan kemudahan dalam memesan mobil...</p>
        <p>Temukan mobil yang Anda butuhkan dengan mudah, dan rasakan pengalaman reservasi yang nyaman bersama VROOM.</p>
      </div>
    </div>
  </section>

  <!-- Produk -->
  <section id="Produk" class="py-12 bg-gray-100">
    <h2 class="text-2xl font-bold text-center mb-8">PRODUK</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6">
      <div class="bg-white rounded-lg shadow p-4 text-center">
        <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="mb-4 rounded">
        <h3 class="text-lg font-semibold">Toyota Raize</h3>
        <p class="text-gray-600">Rp. 250.000.000</p>
        <a href="#" class="text-blue-600 hover:underline">Detail</a>
      </div>
      <!-- Tambahkan item lain sesuai kebutuhan -->
    </div>
  </section>

  <!-- Ulasan -->
  <section id="Ulasan" class="py-12 px-6">
    <h2 class="text-2xl font-bold text-center mb-8">ULASAN APLIKASI</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow text-center">
        <div class="text-lg font-bold">15 Juni 2025</div>
        <div class="text-yellow-500">★★★★★</div>
        <p class="mt-2">Mobil bagus dan nyaman.</p>
        <span class="block mt-2 text-gray-500">-Kim Mingyu-</span>
      </div>
    </div>
  </section>

  <!-- Kontak Kami -->
  <section id="Kontak" class="py-12 px-6 bg-gray-100">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">
      <form class="bg-white p-6 rounded-lg shadow space-y-4" action="process_contact.php" method="POST">
        <h2 class="text-xl font-bold">KONTAK KAMI</h2>
        <input type="text" name="nama" placeholder="Masukkan nama Anda" required class="w-full border px-4 py-2 rounded">
        <input type="email" name="email" placeholder="Masukkan email Anda" required class="w-full border px-4 py-2 rounded">
        <textarea name="pesan" placeholder="Tulis pesan di sini" required class="w-full border px-4 py-2 rounded"></textarea>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim Pesan</button>
      </form>
      <div class="flex flex-col justify-center items-center text-center">
        <p class="mb-4">Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.</p>
        <img src="gambarberanda/image.png" alt="Mobil" class="rounded">
      </div>
    </div>
  </section>

  <!-- Alamat Penjemputan -->
  <section class="py-12 px-6">
    <div class="max-w-5xl mx-auto">
      <iframe class="w-full h-96 rounded" src="https://www.google.com/maps/embed?..." allowfullscreen="" loading="lazy"></iframe>
      <div class="mt-6 text-center">
        <h2 class="text-xl font-bold">Kunjungi Alamat Kami</h2>
        <p class="mt-2">Lokasi kami berada di pusat Kota Batam...</p>
      </div>
    </div>
  </section>

  <!-- Panduan Penyewaan -->
  <section class="py-12 px-6 bg-gray-100">
    <h2 class="text-2xl font-bold text-center mb-8">Panduan Penyewaan Mobil</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-4 rounded shadow">
        <h4 class="font-semibold">1. Lengkapi Dokumen</h4>
        <p>Siapkan SIM, KTP, dan bukti pemesanan...</p>
      </div>
      <!-- Tambahkan panduan lainnya -->
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-10">
    <div class="max-w-screen-xl mx-auto px-6 text-center">
      <h2 class="text-xl font-bold mb-6">VEHICLE RENTAL<br>ON ONE MOVE</h2>
      <div class="flex justify-center space-x-6 mb-4">
        <a href="#"><img src="https://img.icons8.com/?size=100&id=32292&format=png&color=ffffff" alt="Instagram" class="h-6"></a>
        <a href="#"><img src="https://img.icons8.com/?size=100&id=84521&format=png&color=ffffff" alt="TikTok" class="h-6"></a>
        <a href="#"><img src="https://img.icons8.com/?size=100&id=447&format=png&color=ffffff" alt="LinkedIn" class="h-6"></a>
        <a href="#"><img src="https://img.icons8.com/?size=100&id=16712&format=png&color=ffffff" alt="WhatsApp" class="h-6"></a>
      </div>
      <p class="text-sm text-gray-400">&copy; 2024 All rights reserved.</p>
    </div>
  </footer>

  <script>
    const slides = document.getElementById('slides');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    const totalSlides = dots.length;

    function moveToSlide(index) {
      slides.style.transform = `translateX(-${index * 100}vw)`;
      dots.forEach(dot => dot.classList.remove('bg-gray-400'));
      dots[index].classList.add('bg-gray-400');
      currentIndex = index;
    }

    setInterval(() => {
      let nextIndex = (currentIndex + 1) % totalSlides;
      moveToSlide(nextIndex);
    }, 5000);
  </script>
</body>
</html>
