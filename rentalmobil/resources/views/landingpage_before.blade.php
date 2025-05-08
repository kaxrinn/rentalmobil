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
      <a href="#Beranda" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Beranda</a>
      <a href="#Produk" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Produk</a>
      <a href="#Riwayat" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Riwayat</a>
      <a href="#Ulasan" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Ulasan</a>
      <a href="#Kontak" class="text-gray-800 text-sm font-medium px-4 py-2 rounded-md hover:transform hover:skew-x-12 hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 hover:text-white transition duration-300">Kontak</a>
    </div>

    <!-- Search Box -->
    <div class="hidden md:flex items-center border border-gray-400 rounded-md px-2 py-1">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-600">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
      </svg>
      <input type="text" placeholder="Pencarian" class="ml-2 outline-none bg-transparent text-sm">
    </div>

    <!-- Login Button -->
    <a href="{{ route('login') }}" class="hidden md:inline-block bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-600 text-sm">Login</a>

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
    <a href="#Beranda" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Beranda</a>
    <a href="#Produk" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Produk</a>
    <a href="{{ route('login') }}" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Riwayat</a>
    <a href="#Ulasan" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Ulasan</a>
    <a href="#Kontak" class="text-white text-xl font-medium hover:bg-gradient-to-r hover:from-blue-800 hover:to-blue-400 px-4 py-2 rounded-md">Kontak</a>
    <a href="{{ route('login') }}" class="text-white text-xl font-medium hover:bg-blue-600 px-4 py-2 rounded-md">Login</a>
  </div>
</div>

<!-- Section Beranda Slider -->
<section id="Beranda" class="mt-[55px] w-screen relative overflow-hidden" style="height: calc(100vh - 55px);">
  <div class="flex transition-transform duration-1000 ease-in-out w-[300vw]" id="slides">
    <img src="gambarberanda/gambar 1.jpg" class="w-full h-full object-cover" />
    <img src="gambarberanda/gambar 2.jpg" class="w-full h-full object-cover" />
    <img src="gambarberanda/gambar 3.jpg" class="w-full h-full object-cover" />
  </div>

  <!-- Navigasi dot -->
  <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3" id="dots">
    <div class="w-3 h-3 rounded-full bg-white opacity-50 cursor-pointer" onclick="moveToSlide(0)"></div>
    <div class="w-3 h-3 rounded-full bg-white opacity-50 cursor-pointer" onclick="moveToSlide(1)"></div>
    <div class="w-3 h-3 rounded-full bg-white opacity-50 cursor-pointer" onclick="moveToSlide(2)"></div>
  </div>
</section>

<!-- Script Slider -->
<script>
  const slides = document.getElementById('slides');
  const dots = document.querySelectorAll('#dots div');
  let currentIndex = 0;
  const totalSlides = dots.length;

  function moveToSlide(index) {
    slides.style.transform = `translateX(-${index * 100}vw)`;
    dots.forEach(dot => dot.classList.remove('bg-blue-500', 'opacity-100'));
    dots[index].classList.add('bg-blue-500', 'opacity-100');
    currentIndex = index;
  }

  setInterval(() => {
    const nextIndex = (currentIndex + 1) % totalSlides;
    moveToSlide(nextIndex);
  }, 5000);

  // Burger Button Functionality
  document.getElementById('burger-btn').addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobile-menu');
    const isMenuVisible = !mobileMenu.classList.contains('translate-x-full');
    mobileMenu.classList.toggle('translate-x-full', isMenuVisible);
  });
</script>

<!-- Tentang Aplikasi -->
<section class="mt-[50px] py-[50px] px-[20px] bg-white shadow-lg rounded-[10px] mb-[15px]">
  <div class="flex items-center justify-center gap-[40px] max-w-[1200px] w-full mx-auto">
    <div class="w-full max-w-[300px]">
      <img src="gambarberanda/gambar 4.jpeg" alt="Mobil" class="w-full rounded-[10px]">
    </div>
    <div class="max-w-[600px]">
      <h2 class="text-[24px] text-[#1e2b5c] font-bold mb-[20px]">
        <span class="text-[#1e2b5c] font-bold mr-[10px]">|</span> TENTANG APLIKASI
      </h2>
      <p class="text-[16px] leading-[1.7] mb-[15px]">
        VROOM adalah solusi terbaik untuk Anda yang membutuhkan kemudahan dalam memesan mobil. Dengan beragam pilihan mobil favorit, proses pemesanan yang cepat, serta sistem yang aman dan terpercaya, kami berkomitmen untuk memberikan layanan terbaik bagi setiap perjalanan Anda
      </p>
      <p class="text-[16px] leading-[1.7] mb-[15px]">
        Temukan mobil yang Anda butuhkan dengan mudah, dan rasakan pengalaman reservasi yang nyaman bersama VROOM.
      </p>
    </div>
  </div>
</section>
<section id="Produk" class="py-[50px] px-[20px] text-center bg-[#F9FAFF]">
  <h2 class="text-[28px] text-[#1e2b5c] font-bold mb-[30px]">PRODUK</h2>

  <div class="relative max-w-[1200px] mx-auto">
    <!-- Tombol Panah Kiri -->
    <button id="prev" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-[#1e2b5c] text-white p-2 rounded-full shadow">
      &lt;
    </button>

    <!-- Wrapper dengan overflow-hidden -->
    <div class="overflow-hidden">
      <!-- Produk Container -->
      <div id="produk-container" class="flex transition-transform duration-300 ease-in-out gap-6">
        <!-- Ulangi blok ini sesuai jumlah produk -->
        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
</div>



        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 4.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
</div>


        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 4.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
</div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 4.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 4.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>

        <div class="min-w-[250px] flex-shrink-0 border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
          <img src="gambarproduk/mobil 1.jpg" alt="Toyota Raize" class="w-full h-[150px] object-cover mb-3 rounded">
          <h3 class="text-[18px] font-semibold mb-2">Toyota Raize</h3>
          <p class="text-[16px] text-gray-600 mb-3">Rp. 250.000.000</p>
          <div class="flex justify-center space-x-2">
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
  <a href="#" class="inline-block px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
</div>
        </div>
        <!-- Tambahkan lebih banyak produk di sini -->
        <!-- Copy-paste div di atas untuk produk tambahan -->
      </div>
    </div>

    <!-- Tombol Panah Kanan -->
    <button id="next" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-[#1e2b5c] text-white p-2 rounded-full shadow">
      &gt;
    </button>
  </div>
</section>

<script>
  const container = document.getElementById('produk-container');
  const prev = document.getElementById('prev');
  const next = document.getElementById('next');

  let scrollAmount = 0;
  const scrollStep = 270; // Sesuaikan dengan lebar item + gap

  next.addEventListener('click', () => {
    scrollAmount += scrollStep;
    container.style.transform = `translateX(-${scrollAmount}px)`;
  });

  prev.addEventListener('click', () => {
    scrollAmount -= scrollStep;
    if (scrollAmount < 0) scrollAmount = 0;
    container.style.transform = `translateX(-${scrollAmount}px)`;
  });
</script>


<!-- section ulasan -->
<section class="py-[50px] px-[20px] bg-white text-center shadow-md mb-6" id="Ulasan">
  <h2 class="text-[28px] text-[#1e2b5c] mb-[40px] font-bold">ULASAN APLIKASI</h2>

  <div class="relative max-w-[1200px] mx-auto overflow-hidden" id="slider">
    <!-- Wrapper Scroll -->
    <div id="ulasanWrapper" class="flex overflow-x-auto scroll-smooth space-x-6 no-scrollbar">
      <!-- 1 -->
      <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">15</span>
          <div><div>Juni</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Mobilnya bersih dan nyaman. Sangat cocok untuk perjalanan jauh.</p>
        <span class="block mt-3 font-semibold">-Kim Mingyu-</span>
      </div>

      <!-- 2 -->
      <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">10</span>
          <div><div>Mei</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
        <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
      </div>

      <!-- 2 -->
      <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">10</span>
          <div><div>Mei</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
        <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
      </div>

      <!-- 2 -->
      <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">10</span>
          <div><div>Mei</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
        <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
      </div>

      <!-- 2 -->
      <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">10</span>
          <div><div>Mei</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
        <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
      </div> 

<!-- 2 -->
<div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
  <div class="flex justify-center mb-2">
    <span class="text-[32px] font-bold mr-2">10</span>
    <div><div>Mei</div><div>2025</div></div>
  </div>
  <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
  <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
  <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
</div> 

<!-- 2 -->
<div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
  <div class="flex justify-center mb-2">
    <span class="text-[32px] font-bold mr-2">10</span>
    <div><div>Mei</div><div>2025</div></div>
  </div>
  <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
  <p class="text-sm text-gray-700">Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.</p>
  <span class="block mt-3 font-semibold">-Jeon Wonwoo-</span>
</div>  
    
     <!-- 1 -->
     <div class="bg-[#f9faff] rounded-lg p-4 min-w-[250px] text-center flex-shrink-0">
        <div class="flex justify-center mb-2">
          <span class="text-[32px] font-bold mr-2">15</span>
          <div><div>Juni</div><div>2025</div></div>
        </div>
        <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
        <p class="text-sm text-gray-700">Mobilnya bersih dan nyaman. Sangat cocok untuk perjalanan jauh.</p>
        <span class="block mt-3 font-semibold">-Kim Mingyu-</span>
      </div>

      <!-- Tambahkan item ulasan lainnya di sini... -->
    </div>

    <!-- Dots -->
    <div class="flex justify-center mt-6 space-x-2" id="dotsContainer"></div>
  </div>
</section>

<script>
  const ulasanWrapper = document.getElementById("ulasanWrapper");
  const dotsContainer = document.getElementById("dotsContainer");
  const cards = ulasanWrapper.children;
  const cardWidth = 270; // harus cocok dengan min-width + gap
  const totalCards = cards.length;
  const maxVisible = Math.floor(ulasanWrapper.offsetWidth / cardWidth);
  const totalPages = Math.ceil(totalCards / maxVisible);

  let currentPage = 0;
  let intervalId;

  // Buat dots
  for (let i = 0; i < totalPages; i++) {
    const dot = document.createElement("div");
    dot.className = "w-3 h-3 rounded-full bg-gray-300 cursor-pointer";
    dot.addEventListener("click", () => {
      currentPage = i;
      scrollToPage(i);
      resetInterval();
    });
    dotsContainer.appendChild(dot);
  }

  function updateDots() {
    [...dotsContainer.children].forEach((dot, idx) => {
      dot.classList.toggle("bg-[#1e2b5c]", idx === currentPage);
      dot.classList.toggle("bg-gray-300", idx !== currentPage);
    });
  }

  function scrollToPage(page) {
    ulasanWrapper.scrollLeft = page * cardWidth * maxVisible;
    updateDots();
  }

  function autoScroll() {
    currentPage = (currentPage + 1) % totalPages;
    scrollToPage(currentPage);
  }

  function resetInterval() {
    clearInterval(intervalId);
    intervalId = setInterval(autoScroll, 3000);
  }

  // Jalankan
  scrollToPage(0);
  intervalId = setInterval(autoScroll, 3000);

  // Pause saat hover
  ulasanWrapper.addEventListener("mouseenter", () => clearInterval(intervalId));
  ulasanWrapper.addEventListener("mouseleave", resetInterval);
</script>

<!--form kontak -->
<section id="Kontak" class="relative bg-[#f7f9ff] py-24 px-10 overflow-hidden">
  <div class="max-w-7xl mx-auto relative flex items-center justify-start">

    <!-- Form Kontak -->
    <form action="process_contact.php" method="POST"
      class="relative z-0 bg-white p-10 rounded-xl shadow-xl w-[550px] space-y-5 ml-[140px]">
      <h2 class="text-3xl font-bold text-[#1e2b5c]">KONTAK KAMI</h2>
      <input type="text" name="nama" placeholder="Masukkan nama Anda" required
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">
      <input type="email" name="email" placeholder="Masukkan email Anda" required
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">
      <textarea name="pesan" placeholder="Tulis pesan di sini" required rows="4"
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"></textarea>
      <button type="submit"
        class="w-full py-3 bg-[#1e2b5c] text-white rounded-md font-semibold hover:bg-[#151f47] transition">
        Kirim Pesan
      </button>
    </form>

    <!-- Gambar Mobil & Teks -->
    <div class="absolute right-0 top-[20%] z-10 w-[650px] -mt-10">
      <p class="text-[16px] w-[300px] mb-4 ml-[150px] text-gray-700">
        Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.
      </p>
      <img src="gambarberanda/image.png" alt="Mobil" class="w-full">
    </div>

  </div>
</section>

<!-- Section alamat penjemputan mobil-->
<section class="bg-gradient-to-r from-[#eef3fb] to-[#ffffff] py-16 px-5 flex flex-wrap justify-center items-center gap-10">
  <!-- Peta google maps-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31912.464679468314!2d104.04287462104998!3d1.1185155169965935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbatam%20Center!5e0!3m2!1sid!2sid!4v1745720739558!5m2!1sid!2sid" 
    class="w-[400px] h-[250px] border-none rounded-lg">
  </iframe> 

  <!-- Teks Alamat penjemputan-->
  <div class="max-w-[400px]">
    <h2 class="text-[#1e2b5c] text-[26px] font-bold mb-4">Kunjungi Alamat Kami</h2>
    <p class="text-[#555] text-[14px] leading-6">Lokasi kami berada di pusat Kota Batam, Kepulauan Riau. Mudah dijangkau dari berbagai arah dan dekat dengan pusat transportasi utama.</p>
  </div>
</section>


<!-- Section Panduan Penyewaan mobil-->
<section class="bg-white text-center font-bold py-16 px-5">
  <h2 class="text-[#0d3c8a] text-[28px] mb-10">Panduan Penyewaan Mobil</h2>
  <!-- Grid Panduan-->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 max-w-[900px] mx-auto">
    <div class="panduan-item p-6 rounded-xl bg-[#f9faff] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">1. Lengkapi Dokumen</h4>
      <p class="text-[#666] text-[14px] leading-6">Siapkan SIM, KTP, dan bukti pemesanan untuk mempercepat proses sewa.</p>
    </div>
    <div class="panduan-item p-6 rounded-xl bg-[#eef3fb] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">2. Cek Kondisi Mobil</h4>
      <p class="text-[#666] text-[14px] leading-6">Periksa mobil secara menyeluruh, termasuk ban, lampu, dan mesin.</p>
    </div>
    <div class="panduan-item p-6 rounded-xl bg-[#f9faff] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">3. Periksa Bahan Bakar</h4>
      <p class="text-[#666] text-[14px] leading-6">Pastikan bahan bakar sesuai dengan ketentuan awal sewa kendaraan.</p>
    </div>
    <div class="panduan-item p-6 rounded-xl bg-[#eef3fb] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">4. Cek Fitur Utama</h4>
      <p class="text-[#666] text-[14px] leading-6">Pastikan AC, rem, wiper, dan sistem audio berfungsi dengan baik.</p>
    </div>
    <div class="panduan-item p-6 rounded-xl bg-[#f9faff] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">5. Minta Kontak Darurat</h4>
      <p class="text-[#666] text-[14px] leading-6">Selalu minta nomor kontak untuk keadaan darurat selama masa sewa.</p>
    </div>
    <div class="panduan-item p-6 rounded-xl bg-[#eef3fb] shadow-md transition-transform duration-300 hover:translate-y-[-5px]">
      <h4 class="text-[#0d3c8a] text-[18px] font-bold mb-3">6. Pahami Aturan Sewa</h4>
      <p class="text-[#666] text-[14px] leading-6">Baca dan pahami aturan denda, keterlambatan, dan area penggunaan kendaraan.</p>
    </div>
  </div>
</section>

<!-- Bagian Footer -->
<footer class="bg-gradient-to-r from-[#115EAD] to-[#219FE3] text-white py-5 px-5">
  <div class="max-w-[1200px] mx-auto flex flex-col items-start gap-2">
    <h2 class="text-[28px] font-bold m-0">VEHICLE RENTAL<br>ON ONE MOVE</h2>

    <!-- Link dan ikon media sosial -->
    <div class="flex gap-5">
      <a href="https://www.instagram.com/polibatamofficial">
        <img src="https://img.icons8.com/?size=100&id=32292&format=png&color=000000" alt="Instagram" class="w-[30px] h-[30px] filter invert">
      </a>
      <a href="https://www.tiktok.com/@polibatamofficial">
        <img src="https://img.icons8.com/?size=100&id=84521&format=png&color=000000" alt="TikTok" class="w-[30px] h-[30px] filter invert">
      </a>
      <a href="https://www.linkedin.com/feed/">
        <img src="https://img.icons8.com/?size=100&id=447&format=png&color=000000" alt="Linkedln" class="w-[30px] h-[30px] filter invert">
      </a>
      <a href="https://chat.whatsapp.com/FEM3SNcya4qFfjOh6qEqEk">
        <img src="https://img.icons8.com/?size=100&id=16712&format=png&color=000000" alt="WhatsApp" class="w-[30px] h-[30px] filter invert">
      </a>    
    </div>
  </div>
</footer>

<!-- Copyright-->
<center>
  <div class="copyright text-sm text-gray-400 py-2">
    &copy; 2024 All rights reserved.
  </div>
</center>

</body>
</html>