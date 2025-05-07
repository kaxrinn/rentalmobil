<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Mobil</title>
  <link rel="stylesheet" href="styleA-C/style.css">
</head>

<body>
  <!-- Navbar aplikasi -->
<nav>
  <div class="logo">
  <img src="gambarberanda/Logo 6.png" alt="Logo">
  </div>
 <!-- Link di navbar -->
  <div class="nav-center">
    <div class="nav-links">
      <a href="#Beranda">Beranda</a>
      <a href="#Produk">Produk</a>
      <a a href="{{ route('login') }}" class="login-btn">Riwayat</a> <!-- ini belum tersambung -->
      <a href="#Ulasan">Ulasan</a>
      <a href="#Kontak">Kontak</a>
    </div>
  </div>

   <!-- Burger Menu -->
   <div class="burger-menu" onclick="toggleMenu()">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

<!-- Kontak pencarian -->
 <!-- Ini belum tersambung -->
  <div class="search-login">
    <div class="search-box">
    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 16 16">
  <path d="M11 6a5 5 0 1 0-1.293 3.707l3.182 3.182a1 1 0 0 0 1.414-1.414l-3.182-3.182A4.978 4.978 0 0 0 11 6zm-5 3a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
      <input type="text" placeholder="Pencarian">
    </div>

<!-- Tombol Login-->
 <!-- Ini belum tersambung -->
    <a href="{{ route('login') }}" class="login-btn">Login</a>
  </div>
  </nav>

<!--Javascript untuk burger menu-->
<script>
  function toggleMenu() { 
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');// mengaktifkan burger menu saat layar lebih kecil
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

<!-- Section Bagian Produk mobil-->
<section class="produk" id="Produk">
  <h2>PRODUK</h2>
  <div class="produk-grid">
    <!-- Produk mobil -->
    <!--ini belum tersambung masih front-end atau tampilan -->
    <div class="produk-item">
      <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize">
      <h3>Toyota Raize</h3>
      <p>Rp. 250.000.000</p>
      <a href="#">Detail</a>
    </div>

    <div class="produk-item">
      <img src="gambarproduk/mobil 2.png" alt="Toyota Rush">
      <h3>Toyota Rush</h3>
      <p>Rp. 280.000.000</p>
      <a href="#">Detail</a>
    </div>

    <div class="produk-item">
      <img src="gambarproduk/mobil 4.jpg" alt="Toyota Raize">
      <h3>Toyota Raize</h3>
      <p>Rp. 250.000.000</p>
      <a href="#">Detail</a>
    </div>

    <div class="produk-item">
      <img src="gambarproduk/mobil 5.png" alt="Toyota Raize">
      <h3>Toyota Raize</h3>
      <p>Rp. 250.000.000</p>
      <a href="#">Detail</a>  
    </div>
<!-- Mobil lainnya... -->
  </div>
</section>

<!--Bagian Ulasan Aplikasi-->
<section class="ulasan" id="Ulasan">
  <h2>ULASAN APLIKASI</h2>
  <div class="ulasan-grid">
    <!-- Setiap item ulasan -->
     <!--ini belum tersambung masih front-end atau tampilan -->
    <div class="ulasan-item">
      <div class="tanggal">
        <span class="tgl">15</span>
        <div class="bulan-tahun">
          <span>Juni</span>
          <span>2025</span>
        </div>
      </div>
      <div class="bintang">★★★★★</div>
      <p>Mobil bagus dan nyaman.</p>
      <span class="nama">-Kim Mingyu-</span>
    </div>
    <div class="ulasan-item">
      <div class="tanggal">
        <span class="tgl">15</span>
        <div class="bulan-tahun">
          <span>Juni</span>
          <span>2025</span>
        </div>
      </div>
      <div class="bintang">★★★★★</div>
      <p>Ada harga ada kualitas.</p>
      <span class="nama">-Jeon Wonwo-</span>
    </div>
    <div class="ulasan-item">
      <div class="tanggal">
        <span class="tgl">15</span>
        <div class="bulan-tahun">
          <span>Juni</span>
          <span>2025</span>
        </div>
      </div>
      <div class="bintang">★★★★★</div>
      <p>Banyak pilihan mobil yang bisa disewa dengan kualitas yang baik.</p>
      <span class="nama">-Hong Jisoo-</span>
    </div>
    <!-- Ulasan lainnya... -->
  </div>
</section>

<!-- Section Bagian Kontak Kami -->
<section class="kontak" id="Kontak">
  <div class="kontak-container">
    <!-- Form kontak -->
     <!-- ini belum tersambung -->
    <form class="form-box" action="process_contact.php" method="POST">
      <h2>KONTAK KAMI</h2>
      <input type="text" name="nama" placeholder="Masukkan nama Anda" required>
      <input type="email" name="email" placeholder="Masukkan email Anda" required>
      <textarea name="pesan" placeholder="Tulis pesan di sini" required></textarea>
      <button type="submit" class="btn">Kirim Pesan</button>
    </form>

    <!-- Gambar mobil di kontak kami-->
    <div class="mobil-box">
      <p>Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.</p>
      <img src="gambarberanda/image.png" alt="Mobil" />
    </div>
  </div>
</section>


<!-- Section alamat penjemputan mobil-->
<section class="alamat-section">
  <!-- Peta google maps-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31912.464679468314!2d104.04287462104998!3d1.1185155169965935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbatam%20Center!5e0!3m2!1sid!2sid!4v1745720739558!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe> 

  <!-- Teks Alamat penjemputan-->
  <div class="alamat-text">
    <h2>Kunjungi Alamat Kami</h2>
    <p>Lokasi kami berada di pusat Kota Batam, Kepulauan Riau. Mudah dijangkau dari berbagai arah dan dekat dengan pusat transportasi utama.</p>
  </div>
</section>

<!-- Section Panduan Penyewaan mobil-->
<section class="panduan-section">
  <h2>Panduan Penyewaan Mobil</h2>

  <!-- Grid Panduan-->
  <div class="panduan-grid">
    <div class="panduan-item">
      <h4>1. Lengkapi Dokumen</h4>
      <p>Siapkan SIM, KTP, dan bukti pemesanan untuk mempercepat proses sewa.</p>
    </div>
    <div class="panduan-item">
      <h4>2. Cek Kondisi Mobil</h4>
      <p>Periksa mobil secara menyeluruh, termasuk ban, lampu, dan mesin.</p>
    </div>
    <div class="panduan-item">
      <h4>3. Periksa Bahan Bakar</h4>
      <p>Pastikan bahan bakar sesuai dengan ketentuan awal sewa kendaraan.</p>
    </div>
    <div class="panduan-item">
      <h4>4. Cek Fitur Utama</h4>
      <p>Pastikan AC, rem, wiper, dan sistem audio berfungsi dengan baik.</p>
    </div>
    <div class="panduan-item">
      <h4>5. Minta Kontak Darurat</h4>
      <p>Selalu minta nomor kontak untuk keadaan darurat selama masa sewa.</p>
    </div>
    <div class="panduan-item">
      <h4>6. Pahami Aturan Sewa</h4>
      <p>Baca dan pahami aturan denda, keterlambatan, dan area penggunaan kendaraan.</p>
    </div>
  </div>
</section>

<!-- Bagian Footer -->
<footer class="footer-custom">
  <div class="footer-container">
    <h2>VEHICLE RENTAL<br>ON ONE MOVE</h2>

    <!-- Link dan ikon media sosial -->
    <div class="social-icons">
      <a href="https://www.instagram.com/polibatamofficial">
        <img src="https://img.icons8.com/?size=100&id=32292&format=png&color=000000" alt="Instagram">
      </a>
      <a href="https://www.tiktok.com/@polibatamofficial">
        <img src="https://img.icons8.com/?size=100&id=84521&format=png&color=000000" alt="TikTok">
      </a>
      <a href="https://www.linkedin.com/feed/">
        <img src="https://img.icons8.com/?size=100&id=447&format=png&color=000000" alt="Linkedln">
      </a>
      <a href="https://chat.whatsapp.com/FEM3SNcya4qFfjOh6qEqEk">
        <img src="https://img.icons8.com/?size=100&id=16712&format=png&color=000000" alt="WhatsApp">
      </a>    
    </div>
  </div>
</footer>

<!-- Copyright-->
<center>
  <div class="copyright">
    &copy; 2024 All rights reserved.
  </div>
</center>

</body>
</html>
