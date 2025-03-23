<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Rental</title>
    <link rel="stylesheet" href="{{ asset('style1.css') }}">
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
                        <img src="{{ asset('uploads/logo.png') }}" alt="Gambar Mobil">
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
                                <a class="nav-link" href="{{ route('riwayat') }}">Riwayat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Ulasan">Ulasan</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <form class="d-flex" method="GET" action="{{ route('search') }}">
                                    <input class="form-control me-2" type="text" name="query" placeholder="Cari Mobil.." aria-label="Search" required>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </li>
                            <ul>
                                <!-- Ikon dengan latar belakang gradien -->
                                <button class="icon-btn" onclick="togglePopup()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Overlay untuk background gelap -->
    <div class="overlay" id="overlay" onclick="togglePopup()"></div>

    <!-- Popup Profil -->
    <div class="popup" id="popup" style="display: none; position: absolute; z-index: 9999;">
        <label><strong>Selamat datang,</strong></label>
        <p><strong>Nama:</strong> John Doe</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Nomor HP:</strong> 081234567890</p>
        <div class="button-group" style="margin-top: 10px;">
            <a class="close-btn" onclick="showEditProfileModal()">Ubah Profil</a>
            <a href="#" class="logout-btn" onclick="confirmLogout()">Keluar</a>
        </div>
    </div>

    <!-- Modal Ubah Profil -->
    <div class="modal-profile" id="edit-profile-modal" style="display: none;">
        <h3 style="text-align: center;">Ubah Profil</h3>
        <form action="{{ route('update_profile') }}" method="POST" onsubmit="handleSubmit(event);">
            <label for="nama_pengguna">Nama:</label>
            <input type="text" id="nama_pengguna" name="nama_pengguna" value="John Doe" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="johndoe@example.com" required>

            <label for="no_hp">Nomor HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="081234567890" required>

            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">

            <button type="submit">Simpan</button>
            <button type="button" class="cancel-btn" onclick="hideEditProfileModal()">Batal</button>
        </form>
    </div>

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
                <img src="{{ asset('uploads/MOBILBG.png') }}" alt="Gambar Mobil"> <!-- Gambar hero -->
            </div>
        </section>
    </main>

    <!-- Section dengan Gambar dan Teks -->
    <section id="home">
        <div class="container">
            <!-- Bagian Gambar -->
            <div class="image-section">
                <img src="{{ asset('uploads/TENTANG.png') }}" alt="Setir Mobil">
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
                <img src="{{ asset('uploads/Ferari.png') }}" alt="Ferrari" class="brand-logo">
            </div>

            <!-- Logo Hyundai -->
            <div class="col-2">
                <img src="{{ asset('uploads/Hyundai.png') }}" alt="Hyundai" class="brand-logo">
            </div>

            <!-- Logo Toyota -->
            <div class="col-2">
                <img src="{{ asset('uploads/Toyota.png') }}" alt="Toyota" class="brand-logo">
            </div>

            <!-- Logo BMW -->
            <div class="col-2">
                <img src="{{ asset('uploads/BMW.png') }}" alt="BMW" class="brand-logo">
            </div>

            <!-- Logo Mercedes -->
            <div class="col-2">
                <img src="{{ asset('uploads/Mercedes.png') }}" alt="Mercedes" class="brand-logo">
            </div>
        </div>
    </div>

    <!-- Section untuk menampilkan produk -->
    <div class="container">
        <div class="row">
            <!-- Products Section -->
            <div class="container-fluid" id="products-section">
                <div class="text-center mt-3">
                    <h2 id="brand-title">Products</h2> <!-- Judul untuk produk -->
                </div>
                
                <!-- Baris untuk menampilkan produk -->
                <div class="row justify-content-center align-items-center text-center mt-5" id="product-cards">
                    <!-- Produk akan dimasukkan di sini secara dinamis -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah data -->
    <div class="clearfix">
        <!-- Modal Form Pemesanan -->
        <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataLabel">Form Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="{{ route('tambah_pemesanan_landing') }}" method="POST" enctype="multipart/form-data">
                            <!-- Dropdown untuk memilih mobil -->
                            <div class="mb-3">
                                <label for="kode_mobil" class="form-label">Mobil</label>
                                <select class="form-select" id="kode_mobil" name="kode_mobil" required>
                                    <option value="1">Toyota Avanza</option>
                                    <option value="2">Honda Civic</option>
                                    <option value="3">BMW X5</option>
                                </select>
                            </div>

                            <!-- Input Tanggal Pengambilan -->
                            <div class="mb-3">
                                <label for="tanggal_pengambilan" class="form-label">Tanggal Pengambilan</label>
                                <input type="date" class="form-control" id="tanggal_pengambilan" name="tanggal_pengambilan" required>
                            </div>

                            <!-- Input Tanggal Pengembalian -->
                            <div class="mb-3">
                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                            </div>

                            <!-- Input Nama Lengkap -->
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" required>
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_1" name="email" placeholder="Sesuaikan Email Dengan Akun Yang Terdaftar" required>
                            </div>

                            <!-- Input Alamat -->
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>
                            </div>

                            <!-- Input No HP -->
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">NO HP</label>
                                <input type="tel" class="form-control" id="no_hp_1" name="no_hp" placeholder="Sesuaikan No HP Dengan Akun Yang Terdaftar" required>
                            </div>

                            <!-- Input Foto KTP -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>

                            <!-- Input Tempat Pengambilan (Readonly) -->
                            <div class="mb-3">
                                <label for="tempat_pengambilan" class="form-label">Tempat Pengambilan</label>
                                <input type="text" class="form-control" id="tempat_pengambilan" name="tempat_pengambilan" value="Jln.Tiban Indah Permai Rt 03 Rw 04(alamat lengkap kami untuk pengambilan mobil tersedia di bagian bawah halaman aplikasi ini)" readonly>
                            </div>

                            <!-- Input Jenis Pembayaran (Readonly) -->
                            <div class="mb-3">
                                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                                <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" value="Tunai/COD (saat pengambilan kendaraan mobil)" readonly>
                            </div>

                            <!-- Tombol Simpan -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian ulasan -->
    <div class="review-section" id="Ulasan">
        <!-- Judul Ulasan -->
        <h1><b>ULASAN</b></h1>
        
        <!-- Grid untuk menampilkan ulasan -->
        <div class="review-grid">
            <!-- Contoh Ulasan 1 -->
            <div class="review-item">
                <div class="review-header">
                    <div class="review-date">
                        <span class="review-day">10</span>
                        <span class="review-month">Desember 2024</span>
                    </div>
                    <div class="star-rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9734;</span>
                    </div>
                </div>
                <div class="custom-divider"></div>
                <p class="review-text">Pelayanan sangat memuaskan, mobil bersih dan nyaman.</p>
                <div class="custom-divider"></div>
                <img src="{{ asset('uploads/ulasan1.jpg') }}" style="width: 300px; height: auto;">
                <p class="review-text"><b>Toyota Avanza</b></p>
            </div>

            <!-- Contoh Ulasan 2 -->
            <div class="review-item">
                <div class="review-header">
                    <div class="review-date">
                        <span class="review-day">15</span>
                        <span class="review-month">Desember 2024</span>
                    </div>
                    <div class="star-rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                    </div>
                </div>
                <div class="custom-divider"></div>
                <p class="review-text">Mobilnya sangat nyaman, pelayanan cepat dan ramah.</p>
                <div class="custom-divider"></div>
                <img src="{{ asset('uploads/ulasan2.jpg') }}" style="width: 300px; height: auto;">
                <p class="review-text"><b>Honda Civic</b></p>
            </div>
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
            <form action="{{ route('process_contact') }}" method="POST" class="contact-form" id="contactForm">
                <input type="text" name="name" placeholder="Masukkan Nama Anda" required>
                <input type="email" name="email" placeholder="Masukkan Email Anda" required>
                <textarea name="message" rows="5" placeholder="Tuliskan Pesan Anda" required></textarea>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </center>

        <!-- Gambar kontak -->
        <img src="{{ asset('uploads/hubungi.png') }}" width="40%" height="40%">
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
                        <img src="{{ asset('uploads/instagram.png') }}" alt="Instagram">
                    </a>
                    <a href="https://www.tiktok.com/@polibatamofficial">
                        <img src="https://static.vecteezy.com/system/resources/previews/023/741/129/original/tiktok-logo-icon-social-media-icon-free-png.png" alt="TikTok">
                    </a>
                    <a href="https://twitter.com/polibatamofficial">
                        <img src="{{ asset('uploads/x.png') }}" alt="X (Twitter)">
                    </a>
                    <a href="https://chat.whatsapp.com/FEM3SNcya4qFfjOh6qEqEk">
                        <img src="{{ asset('uploads/wa.png') }}" alt="WhatsApp">
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

    <!-- Script JavaScript -->
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan pop-up
        function togglePopup() {
            const popup = document.getElementById('popup');
            const isVisible = popup.style.display === 'block';

            // Menampilkan atau menyembunyikan pop-up berdasarkan keadaan saat ini
            popup.style.display = isVisible ? 'none' : 'block';
        }

        // Fungsi untuk menampilkan modal edit profil
        function showEditProfileModal() {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');

            popup.style.display = 'none'; // Menyembunyikan popup utama
            editProfileModal.style.display = 'block'; // Menampilkan modal edit profil
        }

        // Fungsi untuk menyembunyikan modal edit profil
        function hideEditProfileModal() {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');

            editProfileModal.style.display = 'none'; // Menyembunyikan modal
            popup.style.display = 'block'; // Menampilkan kembali popup utama
        }

        // Fungsi untuk logout dengan konfirmasi
        function confirmLogout() {
            const confirmation = confirm("Apakah Anda yakin ingin keluar dari akun?");

            if (confirmation) {
                window.location.href = '{{ route('landingpage_before') }}'; // Arahkan ke halaman logout
            }
        }

        // Fungsi untuk menangani pengiriman form
        function handleSubmit(event) {
            event.preventDefault(); // Mencegah pengiriman default

            const formData = new FormData(event.target);

            try {
                fetch('{{ route('update_profile') }}', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        console.log('Response:', data); // Debugging response

                        if (data.trim() === 'success') {
                            alert("Pengubahan Data Profile berhasil");
                            window.location.href = '{{ route('landingpage') }}'; // Arahkan ke halaman setelah berhasil
                        } else {
                            alert("Terjadi kesalahan saat mengubah data: " + data);
                        }
                    });
            } catch (error) {
                console.error('Error:', error);
                alert("Terjadi kesalahan saat memproses data. Silakan coba lagi nanti.");
            }
        }

        // Event listener untuk menutup popup dan modal saat pengguna melakukan scroll
        window.addEventListener('scroll', function () {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');

            // Periksa apakah popup utama sedang terlihat
            if (popup.style.display === 'block') {
                popup.style.display = 'none'; // Sembunyikan popup
            }

            // Periksa apakah modal edit profil sedang terlihat
            if (editProfileModal.style.display === 'block') {
                editProfileModal.style.display = 'none'; // Sembunyikan modal edit profil
            }
        });

        // Ambil elemen tombol hamburger dan navbar
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarNav = document.querySelector('.navbar-nav');

        // Event listener untuk membuka dan menutup menu
        navbarToggler.addEventListener('click', function () {
            navbarNav.classList.toggle('active');
        });

        // Event listener untuk menutup menu jika klik di luar area menu
        document.addEventListener('click', function (event) {
            // Periksa apakah klik di luar menu dan tombol hamburger
            if (!navbarNav.contains(event.target) && !navbarToggler.contains(event.target)) {
                navbarNav.classList.remove('active'); // Menutup menu
            }
        });

        // Gabungkan search dan hash menjadi satu URL lengkap
        const fullURL = window.location.search + window.location.hash;

        try {
            // Parse parameter URL termasuk hash
            const urlParams = new URLSearchParams(fullURL);
            const status = urlParams.get('status');
            const message = urlParams.get('message');

            // Tampilkan pesan berdasarkan parameter jika ada
            if (status && message) {
                const notifElement = document.getElementById('formNotif');

                // Tentukan warna teks berdasarkan status
                notifElement.style.color = status === 'success' ? 'green' : 'red';

                // Tampilkan pesan di elemen notifikasi
                notifElement.innerHTML = message;

                // Reset form jika pengiriman berhasil
                if (status === 'success') {
                    document.getElementById('contactForm').reset();
                }

                // Bersihkan URL agar pesan tidak terus muncul saat refresh
                window.history.replaceState({}, document.title, window.location.pathname + '#hubungi');
            }
        } catch (error) {
            // Tangani error jika terjadi masalah saat parsing URL atau manipulasi DOM
            console.error('Error handling URL parameters:', error);
        }
    </script>

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
</body>
</html>
