<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hubungi Kami</title>
    
    <!-- CSS Eksternal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- CSS Kustom -->
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            margin: 0;
            background-color: rgb(35, 14, 48);
        }

        /* Gaya untuk navbar */
        .navbar {
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: linear-gradient(to right, rgb(33, 23, 46), rgb(71, 28, 121));
        }

        /* Gaya untuk tautan di navbar saat di-hover */
        .nav-link:hover {
            background-color: #2c3e8c;
            color: white !important;
        }

        /* Gaya untuk logo di navbar */
        .logo img {
            margin-right: 10px;
            width: 2.5rem;
            height: 2.5rem;
        }

        /* Warna ikon hamburger menjadi putih */
        #hamburger-icon i {
            color: white;
            cursor: pointer;
        }

        /* Sidebar hanya muncul di layar besar */
        .sidebar {
            display: block;
            height: 100vh;
            width: 12.5rem;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 5rem;
            background-color: rgb(48, 26, 68);
            color: white;
        }

        /* Dropdown menu hanya muncul di layar kecil */
        #dropdown-menu {
            display: none;
            position: fixed;
            top: 4.375rem;
            right: 0.625rem;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 0.625rem;
            z-index: 1000;
            width: 12.5rem;
        }

        /* Gaya untuk link di dropdown */
        #dropdown-menu .nav-link {
            color: #333;
            padding: 0.625rem 0.9375rem;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #ddd;
        }

        /* Gaya saat hover di dropdown */
        #dropdown-menu .nav-link:hover {
            background-color: #f5f5f5;
        }

        /* Responsivitas: Sidebar hilang di layar kecil */
        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }
            #dropdown-menu {
                display: block;
            }
        }

        /* Gaya untuk main content */
        .main-content {
            margin-left: 12.5rem;
            padding-top: 5rem;
            padding: 1.875rem 1.25rem;
            color: white;
        }

        .main-content h3 {
            padding-top: 1.875rem;
        }

        /* Responsivitas untuk main-content */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 1.25rem;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 0.9375rem;
                font-size: 0.875rem;
            }
        }

        /* Gaya untuk popup */
        .popup {
            display: none;
            position: fixed;
            top: 10%;
            right: 0;
            width: 18.75rem;
            background-color: #1e204a;
            padding: 1.25rem;
            border-radius: 0.625rem 0 0 0.625rem;
            box-shadow: -0.25rem 0px 0.375rem rgba(0, 0, 0, 0.2);
            color: white;
            z-index: 1000;
        }

        /* Input di dalam popup */
        .popup input {
            width: 100%;
            padding: 0.625rem;
            margin: 0.625rem 0;
            border-radius: 0.3125rem;
            border: none;
        }

        /* Gaya untuk tombol dalam button group */
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 0.9375rem;
        }

        /* Gaya untuk tombol close dan logout */
        .close-btn,
        .logout-btn {
            background-color: white;
            color: #1e204a;
            border: none;
            border-radius: 0.3125rem;
            padding: 0.625rem 0.9375rem;
            cursor: pointer;
            width: 45%;
            text-align: center;
        }

        /* Gaya untuk link dalam button group */
        .button-group a {
            text-decoration: none;
            cursor: pointer;
        }

        /* Gaya saat hover di link */
        .button-group a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="logo">
                    <img src="{{ asset('uploads/Logo.png') }}" alt="Logo">
                </div>
                <a class="navbar-brand text-white ms-2" href="#">CAR RENTAL</a>
            </div>

            <!-- Ikon User -->
            <button class="btn btn-link text-white" onclick="togglePopup()">
                <i class="fas fa-user-circle fa-2x"></i>
            </button>

            <!-- Ikon Hamburger -->
            <button class="btn btn-link text-white d-lg-none" id="hamburger-icon" onclick="toggleDropdown()">
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>
    </nav>

    <!-- Sidebar kiri untuk navigasi menu -->
    <div class="sidebar">
        <ul class="nav flex-column ms-3 mb-5">
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{ route('beranda') }}"><i class="fas fa-tachometer-alt me-2"></i>Beranda</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pemesanan') }}"><i class="fas fa-car me-2"></i>Pemesanan</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('mobil') }}"><i class="fas fa-car-alt me-2"></i>Mobil</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ulasan') }}"><i class="bi bi-star-half me-2"></i>Ulasan</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('hubungi_kami') }}"><i class="fas fa-envelope me-2"></i>Hubungi Kami</a><hr class="bg-secondary">
            </li>
        </ul>
    </div>

    <!-- Dropdown Menu untuk layar kecil -->
    <div id="dropdown-menu" class="dropdown-menu-custom">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('beranda') }}"><i class="fas fa-tachometer-alt me-2"></i>Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('pemesanan') }}"><i class="fas fa-car me-2"></i>Pemesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('mobil') }}"><i class="fas fa-car-alt me-2"></i>Mobil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('ulasan') }}"><i class="bi bi-star-half me-2"></i>Ulasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('hubungi_kami') }}"><i class="fas fa-envelope me-2"></i>Hubungi Kami</a>
            </li>
        </ul>
    </div>

    <!-- Overlay untuk background gelap -->
    <div class="overlay" id="overlay" onclick="togglePopup()"></div>

    <!-- Popup -->
    <div class="popup" id="popup">
        <label><strong>Selamat datang,</strong></label>
        <p><strong>Nama:</strong> John Doe</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Nomor HP:</strong> 081234567890</p>
        <div class="button-group" style="margin-top: 10px;">
            <a class="close-btn" onclick="togglePopup()">Tutup</a>
            <a href="#" class="logout-btn" onclick="confirmLogout()">Keluar</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container"><hr>
            <h3>List Pesan</h3>
            <table id="movementsTable" class="table-responsive table mt-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>PESAN</th>
                        <th>WAKTU</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data statis untuk contoh -->
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>Ini adalah pesan contoh.</td>
                        <td>2024-10-10 10:10:10</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus ulasan ini?')">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Doe</td>
                        <td>janedoe@example.com</td>
                        <td>Ini adalah pesan contoh lainnya.</td>
                        <td>2024-10-11 11:11:11</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus ulasan ini?')">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        function confirmLogout() {
            const confirmation = confirm("Apakah Anda yakin ingin keluar dari akun?");
            if (confirmation) {
                window.location.href = "{{ route('landingpage_before') }}";
            }
        }

        function togglePopup() {
            const popup = document.getElementById('popup');
            const isVisible = popup.style.display === 'block';
            popup.style.display = isVisible ? 'none' : 'block';
        }

        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.style.display = 'none';
        });
    </script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>