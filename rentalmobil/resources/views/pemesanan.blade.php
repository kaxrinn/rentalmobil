<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link ke DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Link ke Bootstrap Icons -->
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
                <!-- Logo -->
                <div class="logo">
                    <img src="uploads/Logo.png" alt="Logo">
                </div>
                <!-- Nama Brand -->
                <a class="navbar-brand text-white ms-2" href="#">CAR RENTAL</a>
            </div>

            <!-- Ikon User -->
            <button class="btn btn-link text-white" onclick="togglePopup()">
                <i class="fas fa-user-circle fa-2x"></i>
            </button>

            <!-- Ikon Hamburger untuk layar kecil -->
            <button class="btn btn-link text-white d-lg-none" id="hamburger-icon" onclick="toggleDropdown()">
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>
    </nav>

    <!-- Sidebar kiri untuk navigasi menu -->
    <div class="sidebar">
        <ul class="nav flex-column ms-3 mb-5">
            <!-- Menu Beranda -->
            <li class="nav-item">
                <a class="nav-link active text-white" href="beranda.php">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda
                </a>
                <hr class="bg-secondary">
            </li>
            <!-- Menu Pemesanan -->
            <li class="nav-item">
                <a class="nav-link text-white" href="pemesanan.php">
                    <i class="fas fa-car me-2"></i>Pemesanan
                </a>
                <hr class="bg-secondary">
            </li>
            <!-- Menu Mobil -->
            <li class="nav-item">
                <a class="nav-link text-white" href="mobil.php">
                    <i class="fas fa-car-alt me-2"></i>Mobil
                </a>
                <hr class="bg-secondary">
            </li>
            <!-- Menu Ulasan -->
            <li class="nav-item">
                <a class="nav-link text-white" href="ulasan.php">
                    <i class="bi bi-star-half me-2"></i>Ulasan
                </a>
                <hr class="bg-secondary">
            </li>
            <!-- Menu Hubungi Kami -->
            <li class="nav-item">
                <a class="nav-link text-white" href="hubungi_kami.php">
                    <i class="fas fa-envelope me-2"></i>Hubungi Kami
                </a>
                <hr class="bg-secondary">
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

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                    <!-- Tombol untuk menutup modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <!-- Form untuk mengubah data pemesanan -->
                    <form action="ubah_pemesanan.php" method="POST" enctype="multipart/form-data">
                        <!-- Input hidden untuk menyimpan kode pemesanan -->
                        <input type="hidden" id="edit_kode_pemesanan" name="kode_pemesanan">

                        <!-- Dropdown untuk memilih mobil -->
                        <div class="mb-3">
                            <label for="edit_kode_mobil" class="form-label">Mobil</label>
                            <select class="form-select" id="edit_kode_mobil" name="kode_mobil" required>
                                <option value="1">Toyota Avanza - MPV</option>
                                <option value="2">Honda Civic - Sedan</option>
                                <option value="3">Suzuki Ertiga - MPV</option>
                            </select>
                        </div>

                        <!-- Input untuk tanggal pengambilan -->
                        <div class="mb-3">
                            <label for="edit_tanggal_pengambilan" class="form-label">Tanggal Pengambilan</label>
                            <input type="date" class="form-control" id="edit_tanggal_pengambilan" name="tanggal_pengambilan" required>
                        </div>

                        <!-- Input untuk tanggal pengembalian -->
                        <div class="mb-3">
                            <label for="edit_tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="edit_tanggal_pengembalian" name="tanggal_pengembalian" required>
                        </div>

                        <!-- Input untuk nama lengkap -->
                        <div class="mb-3">
                            <label for="edit_nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="edit_nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <!-- Input untuk email -->
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>

                        <!-- Textarea untuk alamat -->
                        <div class="mb-3">
                            <label for="edit_alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="edit_alamat" name="alamat" rows="3" required></textarea>
                        </div>

                        <!-- Input untuk nomor HP -->
                        <div class="mb-3">
                            <label for="edit_no_hp" class="form-label">No HP</label>
                            <input type="tel" class="form-control" id="edit_no_hp" name="no_hp" required>
                        </div>

                        <!-- Input untuk foto baru dan pratinjau foto saat ini -->
                        <div class="mb-3">
                            <label class="form-label">Foto Saat Ini</label><br>
                            <img id="editFotoPreview" src="uploads/foto.jpg" alt="foto" width="150" class="mb-3 border rounded"><br>
                            <label for="edit_foto" class="form-label">Foto Baru</label>
                            <input type="file" class="form-control" id="edit_foto" name="foto">
                        </div>

                        <!-- Dropdown untuk status -->
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Status</label>
                            <select class="form-select" id="edit_status" name="status" required>
                                <option value="1">Pending</option>
                                <option value="2">Confirmed</option>
                                <option value="3">Canceled</option>
                            </select>
                        </div>

                        <!-- Tombol simpan perubahan -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <hr>
            <h3>List Pemesanan</h3>
            <!-- Tabel untuk daftar pemesanan -->
            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE PESANAN</th>
                        <th>NAMA LENGKAP</th>
                        <th>TANGGAL PENGAMBILAN</th>
                        <th>TANGGAL PENGEMBALIAN</th>
                        <th>INFO MOBIL</th>
                        <th>TEMPAT PENGAMBILAN</th>
                        <th>JENIS PEMBAYARAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>P001</td>
                        <td>John Doe</td>
                        <td>2023-10-01</td>
                        <td>2023-10-05</td>
                        <td>
                            <p>Merek: <b>Toyota</b></p>
                            <p>Jenis: <b>Avanza</b></p>
                            <p>Warna: <b>Hitam</b></p>
                            <p>Harga: <b>Rp 300.000/hari</b></p>
                        </td>
                        <td>Jakarta</td>
                        <td>Transfer Bank</td>
                        <td>
                            <span class="badge bg-warning">Pending</span>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm me-1 edit-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editDataModal"
                                    data-kode_pemesanan="P001"
                                    data-kode_mobil="1"
                                    data-tanggal_pengambilan="2023-10-01"
                                    data-tanggal_pengembalian="2023-10-05"
                                    data-nama_lengkap="John Doe"
                                    data-email="johndoe@example.com"
                                    data-alamat="Jl. Contoh No. 123"
                                    data-no_hp="081234567890"
                                    data-status="1"
                                    data-foto="foto.jpg">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="hapus_pemesanan.php?kode_pemesanan=P001"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                            <a href="export_excel.php?kode_pemesanan=P001"
                               class="btn btn-primary btn-sm">
                                Input
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                sidebar.style.left = isHidden ? '0px' : '-100%'; // Toggle posisi sidebar
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba mengatur sidebar:", error);
            }
        }

        // Fungsi untuk menampilkan dan menyembunyikan dropdown
        function toggleDropdown() {
            try {
                const dropdown = document.getElementById('dropdown-menu');
                // Periksa apakah dropdown dalam kondisi tersembunyi
                if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                    dropdown.style.display = 'block'; // Tampilkan
                } else {
                    dropdown.style.display = 'none'; // Sembunyikan
                }
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba mengatur dropdown:", error);
            }
        }

        // Pastikan dropdown disembunyikan setiap kali halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            try {
                const dropdown = document.getElementById('dropdown-menu');
                dropdown.style.display = 'none'; // Set display ke 'none' saat halaman selesai dimuat
            } catch (error) {
                console.error("Terjadi kesalahan saat mencoba menyembunyikan dropdown saat halaman dimuat:", error);
            }
        });

        // Fungsi untuk mengisi data ke dalam modal edit
        document.querySelectorAll('.edit-button').forEach((button) => {
            button.addEventListener('click', function () {
                try {
                    const kodePemesanan = this.getAttribute('data-kode_pemesanan');
                    const kodeMobil = this.getAttribute('data-kode_mobil');
                    const tanggalPengambilan = this.getAttribute('data-tanggal_pengambilan');
                    const tanggalPengembalian = this.getAttribute('data-tanggal_pengembalian');
                    const namaLengkap = this.getAttribute('data-nama_lengkap');
                    const email = this.getAttribute('data-email');
                    const alamat = this.getAttribute('data-alamat');
                    const noHp = this.getAttribute('data-no_hp');
                    const status = this.getAttribute('data-status');
                    const foto = this.getAttribute('data-foto');
                    const fotoPath = foto ? `uploads/${foto}` : '';
                    const fotoPreview = document.getElementById('editFotoPreview');

                    // Update foto preview
                    if (fotoPreview) {
                        fotoPreview.src = fotoPath;
                        fotoPreview.style.display = foto ? 'block' : 'none';
                    }

                    // Update input fields with values
                    document.getElementById('edit_kode_pemesanan').value = kodePemesanan;
                    document.getElementById('edit_kode_mobil').value = kodeMobil;
                    document.getElementById('edit_tanggal_pengambilan').value = tanggalPengambilan;
                    document.getElementById('edit_tanggal_pengembalian').value = tanggalPengembalian;
                    document.getElementById('edit_nama_lengkap').value = namaLengkap;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('edit_alamat').value = alamat;
                    document.getElementById('edit_no_hp').value = noHp;
                    document.getElementById('edit_status').value = status;

                } catch (error) {
                    console.error("Terjadi kesalahan saat memuat data ke dalam modal:", error);
                }
            });
        });
    </script>
</body>
</html>