<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Rental</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header dan Navbar -->
    <header>
        <div class="hero-text" id="Beranda">
            <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
                <!-- Konten Navbar -->
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand logo">
                        <img src="uploads/logo.png" alt="Gambar Mobil">
                        <span>CAR RENTAL</span>
                    </a>
                    <!-- Menu -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#Beranda">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#brands-section">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Riwayat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Ulasan">Ulasan</a>
                            </li>
                            <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="login.php" class="btn">Masuk Akun</a>
                            </li>   
                            </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Overlay untuk background gelap -->
    <div class="overlay" id="overlay" onclick="togglePopup()"></div>


    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-text" id="Beranda">
                <h1>
                    Hanya Satu Klik,<br>
                    Untuk Perjalan <br>
                    Anda yang Tak<br>
                    Terlupakan!
                </h1>
                <a class="btn" href="#brands-section">Pesan Sekarang</a> <!-- Tombol untuk menuju halaman produk -->
            </div>
            <div class="hero-image">
                <img src="uploads/MOBILBG.png" alt="Gambar Mobil"> <!-- Gambar hero -->
            </div>
        </section>
    </main>

    <!-- Section dengan Gambar dan Teks -->
    <section id="home">
        <div class="container">
            <!-- Bagian Gambar -->
            <div class="image-section">
                <img src="uploads/TENTANG.png" alt="Setir Mobil">
                <div class="badge">
                    <p>Dari berbagai brand-brand ternama</p> <!-- Badge untuk informasi gambar -->
                </div>
            </div>

            <!-- Bagian Teks -->
            <div class="text-section">
                <center>
                    <h1>Percayakan perjalanan anda kepada kami</h1>
                </center>
                <h4>Temukan cara mudah dan cepat untuk menyewa mobil kapan saja dan di mana saja dengan aplikasi Car Rental kami!</h4>
                <br>
                <p>"Hanya dengan satu klik, dalam hitungan menit, Anda bisa memilih mobil sesuai kebutuhan dan langsung melakukan pemesanan. Nikmati kemudahan, kenyamanan, dan layanan terbaik yang siap menemani perjalanan Anda. Yuk, pesan sekarang dan rasakan pengalaman sewa mobil yang lebih praktis dan terpercaya!"</p>
                <center>
                    <a class="btn" href="#hubungi">Hubungi kami</a> <!-- Tombol untuk menuju halaman ulasan -->
                </center>
            </div>
        </div>
    </section>

<!-- Brands Section -->
<div class="container-fluid" id="brands-section">
    <!-- Judul untuk Brands -->
    <center><h1 class="text-section">BRANDS</h1></center>

    <!-- Baris untuk menampilkan logo-brand -->
    <div class="row justify-content-center align-items-center text-center mt-5">
        <!-- Logo Ferrari -->
        <div class="col-2">
            <img src="uploads/Ferari.png" alt="Ferrari" class="brand-logo">
        </div>

        <!-- Logo Hyundai -->
        <div class="col-2">
            <img src="uploads/Hyundai.png" alt="Hyundai" class="brand-logo">
        </div>

        <!-- Logo Toyota -->
        <div class="col-2">
            <img src="uploads/Toyota.png" alt="Toyota" class="brand-logo">
        </div>

        <!-- Logo BMW -->
        <div class="col-2">
            <img src="uploads/BMW.png" alt="BMW" class="brand-logo">
        </div>

        <!-- Logo Mercedes -->
        <div class="col-2">
            <img src="uploads/Mercedes.png" alt="Mercedes" class="brand-logo">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Products Section -->
<div class="container-fluid" id="products-section">
    <div class="text-center mt-3">
        <h2 id="brand-title">Products</h2>
    </div>
    <div class="row justify-content-center align-items-center text-center mt-5" id="product-cards">
        <!-- Products will be inserted here dynamically -->
    </div>
</div>        
</div>
</div>

<!-- Tambahkan clearfix di sini -->
<div class="clearfix"></div>


<!-- Bagian ulasan -->
<div class="review-section" id="Ulasan">
    <!-- Judul Ulasan -->
    <h1><b>ULASAN</b></h1>
    
    <!-- Grid untuk menampilkan ulasan -->
    <div class="review-grid">
        <!-- Ulasan akan dimasukkan di sini secara dinamis -->
    </div>
</div>

<!-- Bagian Hubungi kami -->
<div class="container" id="hubungi">
    <!-- Menampilkan pesan sukses atau error jika ada -->
    <div id="formNotif"></div>
    
    <center>
        <!-- Judul dan penjelasan singkat -->
        <h1><b>Hubungi Kami</b></h1>
        <p>Jika Anda memiliki kendala, saran, atau masukan tentang website kami,<br> Anda dapat mengirim pesan atau email.</p>

        <!-- Formulir untuk mengirim pesan -->
        <form action="process_contact.php" method="POST" class="contact-form" id="contactForm">
            <input type="text" name="name" placeholder="Masukkan Nama Anda" required>
            <input type="email" name="email" placeholder="Masukkan Email Anda" required>
            <textarea name="message" rows="5" placeholder="Tuliskan Pesan Anda" required></textarea>
            <button type="button" class="btn" onclick="window.location.href='login.php';">Kirim Pesan</button>
        </form>
    </center>

    <!-- Gambar kontak -->
    <img src="uploads/hubungi.png" width="40%" height="40%">
</div>

<!-- Bagian footer -->
<footer class="footer">
    <div class="container2">
        <!-- Bagian Google Maps -->
        <div class="maps-section">
            <h3>Alamat Kami</h3>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.064662479408!2d103.9796009740352!3d1.1136661622914406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98becb5643ef7%3A0x3b4a9a5464a1cf9c!2sJl.%20Tiban%20Indah%20Permai%2C%20Tiban%20Indah%2C%20Kec.%20Sekupang%2C%20Kota%20Batam%2C%20Kepulauan%20Riau!5e0!3m2!1sid!2sid!4v1734656940157!5m2!1sid!2sid" 
                width="100%" 
                height="300" 
                style="border:0; margin-top: 20px; margin-bottom: 20px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Bagian media sosial -->
        <div class="social-section">
            <div class="social-title"><b>Ikuti kami</b></div>
            <div class="social-icons">
                <!-- Tautan media sosial -->
                <a href="https://www.instagram.com/polibatamofficial">
                    <img src="uploads/instagram.png" alt="Instagram">
                </a>
                <a href="https://www.tiktok.com/@polibatamofficial">
                    <img src="https://static.vecteezy.com/system/resources/previews/023/741/129/original/tiktok-logo-icon-social-media-icon-free-png.png" alt="TikTok">
                </a>
                <a href="https://twitter.com/polibatamofficial">
                    <img src="uploads/x.png" alt="X (Twitter)">
                </a>
                <a href="https://chat.whatsapp.com/FEM3SNcya4qFfjOh6qEqEk">
                    <img src="uploads/wa.png" alt="WhatsApp">
                </a>
            </div>
        </div>

        <!-- Bagian Links -->
        <div class="links">
            <div class="sumber">
                <h3>Sponsor</h3>
                <p>Polibatam</p>
            </div>
            <div class="perusahaan">
                <h3>Perusahaan</h3>
                <p>Car Rental.id</p>
            </div>
            <div class="produk">
                <h3>Produk</h3>
                <p>Mobil</p>
            </div>
        </div>
    </div>

    <!-- Bagian Copyright -->
    <div class="container1">
        <div class="copyright">
            &copy; 2024 All rights reserved.
        </div>
    </div>
</footer>
</body>

<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>