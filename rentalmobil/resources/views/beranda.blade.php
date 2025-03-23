<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Mengimpor Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Mengimpor Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Gaya CSS Anda di sini */
        body {
            margin: 0;
            background-color: rgb(35, 14, 48);
        }
        .navbar {
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: linear-gradient(to right, rgb(33, 23, 46), rgb(71, 28, 121));
        }
        .nav-link:hover {
            background-color: #2c3e8c;
            color: white !important;
        }
        .logo img {
            margin-right: 10px;
            width: 2.5rem;
            height: 2.5rem;
        }
        #hamburger-icon i {
            color: white;
            cursor: pointer;
        }
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
        #dropdown-menu {
            display: none;
            position: absolute;
            top: 70px;
            right: 10px;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
            z-index: 1000;
            width: 200px;
        }
        #dropdown-menu .nav-link {
            color: #333;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #ddd;
        }
        #dropdown-menu .nav-link:hover {
            background-color: #f5f5f5;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }
            #dropdown-menu {
                display: block;
            }
        }
        .main-content {
            margin-left: 12.5rem;
            padding-top: 5rem;
        }
        .card {
            margin-top: 3.125rem;
        }
        hr {
            border: 0.0625rem solid #2c3e8c;
        }
        .card-body.box1 {
            background-color: #3498db;
        }
        .card-body.box2 {
            background-color: #1abc9c;
        }
        .card-body.box3 {
            background-color: #e74c3c;
        }
        .card-body.box4 {
            background-color: #9b59b6;
        }
        .popup {
            display: none;
            position: fixed;
            top: 10%;
            right: 0;
            width: 18.75rem;
            padding: 1.25rem;
            border-radius: 0.625rem 0 0 0.625rem;
            background-color: #1e204a;
            box-shadow: -0.25rem 0 0.375rem rgba(0, 0, 0, 0.2);
            color: white;
            z-index: 1000;
        }
        .popup input {
            width: 100%;
            padding: 0.625rem;
            margin: 0.625rem 0;
            border: none;
            border-radius: 0.3125rem;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 0.9375rem;
        }
        .close-btn,
        .logout-btn {
            padding: 0.625rem 0.9375rem;
            width: 45%;
            background-color: white;
            border: none;
            border-radius: 0.3125rem;
            color: #1e204a;
            text-align: center;
            cursor: pointer;
        }
        .button-group a {
            text-decoration: none;
            cursor: pointer;
        }
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
    <div class="main-content p-3">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('pemesanan') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body box1 text-white">
                                <span class="float-right summary_icon"><i class="fa fa-book"></i></span>
                                <p><b>List Data Pemesanan</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('mobil') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body box2 text-white">
                                <span class="float-right summary_icon"><i class="fa fa-car"></i></span>
                                <p><b>List Data Mobil</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('ulasan') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body box3 text-white">
                                <span class="float-right summary_icon"><i class="fa fa-comments"></i></span>
                                <p><b>List Data Ulasan</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('hubungi_kami') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body box4 text-white">
                                <span class="float-right summary_icon"><i class="fa fa-phone"></i></span>
                                <p><b>List Data Menghubungi Kami</b></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>