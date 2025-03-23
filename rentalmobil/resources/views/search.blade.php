<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
        /* CSS styles from the original code */
        body {
            background: linear-gradient(to right, #38215e, #1b2f60);
            color: #fff;
        }
        .container {
            margin: 5rem auto;
            max-width: 75rem;
            text-align: center;
            color: white;
        }
        .card-title {
            font-size: 1.125rem;
            color: #333;
        }
        .card-text {
            font-size: 0.875rem;
            color: #555;
            white-space: normal;
            text-align: left;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }
        .btn-pesan {
            margin-top: 0.625rem;
            background: linear-gradient(to right, #6a08fd, #07bee2);
            color: #fff;
        }
        .btn-pesan:hover {
            background-color: #1a2d6b;
        }
        .product-card {
            background-color: #000;
            padding: 0.625rem;
            border-radius: 1rem;
            margin: 0.625rem;
            margin-bottom: 0.625rem !important;
            margin-top: 0;
            color: #ffffff;
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 6.25rem;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 0.625rem;
            margin-bottom: 0.625rem;
        }
        .form-control {
            border-radius: 0.5rem;
            border: 1px solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
        }
        .btn-outline-success {
            color: white;
            background: linear-gradient(to right, #6a08fd, #07bee2);
            border: none;
            border-radius: 0.625rem;
        }
        .btn-outline-success:hover {
            background-color: #1a2d6b;
            color: #fff;
        }
        .logo {
            display: flex;
            align-items: center;
            position: sticky;
            padding-left: 0;
        }
        .logo img {
            width: 3.75rem;
            height: 3.75rem;
            padding-left: 0;
        }
        .logo span {
            font-size: 1.25rem;
            color: white;
            font-weight: bold;
            margin-left: 0.0625rem;
        }
        .navbar {
            margin-bottom: 1.25rem;
            background-color: #0d1b48;
        }
        nav ul {
            display: flex;
            list-style: none;
            text-align: center;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1.125rem;
            padding: 0.5rem 1rem;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            margin-left: 1rem;
        }
        nav ul li a:hover {
            border-radius: 1.25rem;
            background: linear-gradient(to right, #6a08fd, #07bee2);
            color: #ffffff;
        }
        .icon-btn {
            background: linear-gradient(to right, #6a08fd, #07bee2);
            border: none;
            padding: 0.625rem;
            border-radius: 50%;
            cursor: pointer;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .icon-btn:hover {
            opacity: 0.9;
        }
        .popup {
            display: none;
            position: absolute;
            top: 3.75rem;
            right: 0.625rem;
            background-color: #fff;
            color: #000;
            border-radius: 0.625rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.2);
            padding: 0.625rem;
            z-index: 1000;
            min-width: 9.375rem;
            background: #4b0082;
        }
        .popup .button-group {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .popup .close-btn,
        .popup .logout-btn {
            margin: 0.3125rem 0;
            padding: 0.5rem 0.625rem;
            text-decoration: none;
            background-color: #ffffff;
            color: #4b0082;
            border-radius: 0.3125rem;
            text-align: center;
            width: 100%;
        }
        .popup .close-btn:hover,
        .popup .logout-btn:hover {
            background: linear-gradient(to right, #6a08fd, #07bee2);
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        #form-section {
            display: none;
            padding: 1.25rem;
            background-color: #2d2d5a;
            border-radius: 0.625rem;
            color: #e0e0ff;
            width: 80%;
            margin: 1.25rem auto;
        }
        .card-img-top {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Header dan Navbar -->
    <header>
        <div class="hero-text" id="Beranda">
            <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
                <div class="container-fluid">
                    <a class="logo" href="#">
                        <img src="uploads/logo.png" alt="Gambar Mobil">
                        <span>CAR RENTAL</span>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="landingpage.php">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="landingpage.php#brands-section">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="riwayat.php">Riwayat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="landingpage.php#Ulasan">Ulasan</a>
                            </li>
                        </ul>
                        <form class="d-flex" method="GET" action="search.php">
                            <input class="form-control me-2" type="text" name="query" placeholder="Cari Mobil..." aria-label="Search" required>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>

                    <button class="icon-btn" onclick="togglePopup()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </button>
                    <div class="popup" id="popup">
                        <div class="button-group">
                            <a class="close-btn" onclick="togglePopup()">Tutup</a>
                            <a href="logout.php" class="logout-btn" onclick="logout()">Keluar</a>
                        </div>
                    </div>
                    <div class="overlay" id="overlay" onclick="togglePopup()"></div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Bagian Hasil Pencarian -->
    <div class="container">
        <h3>Hasil Pencarian untuk: "Toyota"</h3>
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="uploads/toyota_avanza.jpg" class="card-img-top" alt="Toyota Avanza">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Avanza</h5>
                        <p>Jenis: MPV<br>
                           Warna: Hitam<br>
                           <em>Harga: Rp 300.000/hari</em>
                        </p>
                        <form action="#tambahDataModal" method="POST">
                            <input type="hidden" name="kode" value="1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <img src="uploads/toyota_innova.jpg" class="card-img-top" alt="Toyota Innova">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Innova</h5>
                        <p>Jenis: MPV<br>
                           Warna: Putih<br>
                           <em>Harga: Rp 400.000/hari</em>
                        </p>
                        <form action="#tambahDataModal" method="POST">
                            <input type="hidden" name="kode" value="2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah data -->
    <div class="clearfix">
        <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataLabel">Form Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_pemesanan_landing.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="kode_mobil" class="form-label">Mobil</label>
                                <select class="form-select" id="kode_mobil" name="kode_mobil" required>
                                    <option value="1">Toyota Avanza - MPV</option>
                                    <option value="2">Toyota Innova - MPV</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pengambilan" class="form-label">Tanggal Pengambilan</label>
                                <input type="date" class="form-control" id="tanggal_pengambilan" name="tanggal_pengambilan" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Sesuaikan Email Dengan Akun Yang Terdaftar" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">NO HP</label>
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Sesuaikan No HP Dengan Akun Yang Terdaftar" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_pengambilan" class="form-label">Tempat Pengambilan</label>
                                <input type="text" class="form-control" id="tempat_pengambilan" name="tempat_pengambilan" value="Jln.Tiban Indah Permai Rt 03 Rw 04(alamat lengkap kami untuk pengambilan mobil tersedia di bagian bawah halaman aplikasi ini)" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                                <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" value="Tunai/COD(saat pengambilan kendaraan mobil)" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk logout dengan konfirmasi
        function confirmLogout() {
            try {
                const confirmation = confirm("Apakah Anda yakin ingin keluar dari akun?");
                if (confirmation) {
                    window.location.href = "landingpage_before.php";
                }
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba logout:", error);
            }
        }

        // Fungsi untuk menampilkan/menghilangkan popup
        function togglePopup() {
            try {
                const popup = document.getElementById('popup');
                const isVisible = popup.style.display === 'block';
                popup.style.display = isVisible ? 'none' : 'block';
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba mengatur popup:", error);
            }
        }

        // Fungsi untuk menampilkan dan menyembunyikan sidebar
        function toggleSidebar() {
            try {
                const sidebar = document.getElementById('sidebar');
                const isHidden = sidebar.style.left === '-100%';
                sidebar.style.left = isHidden ? '0px' : '-100%';
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba mengatur sidebar:", error);
            }
        }

        // Fungsi untuk menampilkan dan menyembunyikan dropdown
        function toggleDropdown() {
            try {
                const dropdown = document.getElementById('dropdown-menu');
                if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                    dropdown.style.display = 'block';
                } else {
                    dropdown.style.display = 'none';
                }
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba mengatur dropdown:", error);
            }
        }

        // Pastikan dropdown disembunyikan setiap kali halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            try {
                const dropdown = document.getElementById('dropdown-menu');
                dropdown.style.display = 'none';
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba menyembunyikan dropdown saat halaman dimuat:", error);
            }
        });
    </script>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>