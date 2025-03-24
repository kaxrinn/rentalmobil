<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
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

#dropdown-menu .nav-link {
    color: #333;
    padding: 0.625rem 0.9375rem;
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
    padding: 1.875rem 1.25rem;
    color: white;
}

.main-content h3 {
    padding-top: 1.875rem;
}

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

.popup input {
    width: 100%;
    padding: 0.625rem;
    margin: 0.625rem 0;
    border-radius: 0.3125rem;
    border: none;
}

.button-group {
    display: flex;
    justify-content: space-between;
    margin-top: 0.9375rem;
}

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
                    <img src="uploads/Logo.png" alt="Logo" />
                </div>
                <a class="navbar-brand text-white ms-2" href="#">CAR RENTAL</a>
            </div>

            <!-- Ikon User -->
            <button class="btn btn-link text-white" onclick="togglePopup()">
                <i class="fas fa-user-circle fa-2x"></i>
            </button>

            <!-- Ikon Hamburger untuk menu navigasi pada layar kecil -->
            <button class="btn btn-link text-white d-lg-none" id="hamburger-icon" onclick="toggleDropdown()">
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>
    </nav>

    <!-- Sidebar kiri untuk navigasi menu -->
    <div class="sidebar">
        <ul class="nav flex-column ms-3 mb-5">
            <li class="nav-item">
                <a class="nav-link active text-white" href="beranda.php">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="pemesanan.php">
                    <i class="fas fa-car me-2"></i>Pemesanan
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="mobil.php">
                    <i class="fas fa-car-alt me-2"></i>Mobil
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="ulasan.php">
                    <i class="bi bi-star-half me-2"></i>Ulasan
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="hubungi_kami.php">
                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                </a>
                <hr class="bg-secondary" />
            </li>
        </ul>
    </div>

    <!-- Dropdown Menu untuk layar kecil -->
    <div id="dropdown-menu" class="dropdown-menu-custom">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark" href="beranda.php">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="pemesanan.php">
                    <i class="fas fa-car me-2"></i>Pemesanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="mobil.php">
                    <i class="fas fa-car-alt me-2"></i>Mobil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="ulasan.php">
                    <i class="bi bi-star-half me-2"></i>Ulasan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="hubungi_kami.php">
                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                </a>
            </li>
        </ul>
    </div>

    <!-- Overlay untuk background gelap -->
    <div class="overlay" id="overlay" onclick="togglePopup()"></div>

    <!-- Popup untuk menampilkan informasi pengguna -->
    <div class="popup" id="popup">
        <label><strong>Selamat datang,</strong></label>
        <p><strong>Nama:</strong> [Nama Pengguna]</p>
        <p><strong>Email:</strong> [Email Pengguna]</p>
        <p><strong>Nomor HP:</strong> [Nomor HP Pengguna]</p>
        <div class="button-group" style="margin-top: 10px;">
            <a class="close-btn" onclick="togglePopup()">Tutup</a>
            <a href="#" class="logout-btn" onclick="confirmLogout()">Keluar</a>
        </div>
    </div>
</body>

<!-- Main Content -->
<div class="main-content">
    <div class="container"><hr>
        <h3>List Ulasan</h3>
        <table class="table table-condensed table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Produk</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data ulasan akan dimasukkan di sini secara dinamis -->
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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

  function togglePopup() {
    try {
      const popup = document.getElementById('popup');
      const isVisible = popup.style.display === 'block';
      popup.style.display = isVisible ? 'none' : 'block';
    } catch (error) {
      console.error("Terjadi kesalahan saat mencoba mengatur popup:", error);
    }
  }

  function toggleSidebar() {
    try {
      const sidebar = document.getElementById('sidebar');
      const isHidden = sidebar.style.left === '-100%';
      sidebar.style.left = isHidden ? '0px' : '-100%';
    } catch (error) {
      console.error("Terjadi kesalahan saat mencoba mengatur sidebar:", error);
    }
  }

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

  document.addEventListener('DOMContentLoaded', () => {
    try {
      const dropdown = document.getElementById('dropdown-menu');
      dropdown.style.display = 'none';
    } catch (error) {
      console.error("Terjadi kesalahan saat mencoba menyembunyikan dropdown saat halaman dimuat:", error);
    }
  });
</script>
</body>
</html>
<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
