<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Rental</title>
    <link rel="stylesheet" href="style_riwayat.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header dan Navbar -->
    <header>
        <div class="hero-text" id="Beranda">
            <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand logo">
                        <img src="uploads/logo.png" alt="Gambar Mobil">
                        <span>CAR RENTAL</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="landingpage.php">Beranda</a>
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
                            <li class="nav-item d-flex align-items-center">
                                <form class="d-flex" method="GET" action="search.php">
                                    <input class="form-control me-2" type="text" name="query" placeholder="Cari Mobil.." aria-label="Search" required>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </li>
                            <ul>
                                <button class="icon-btn" onclick="togglePopup()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                </button>
                            </ul>
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
        <form action="update_profile.php" method="POST" onsubmit="handleSubmit(event);">
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

    <!-- Modal Tambah Ulasan -->
    <div class="modal fade" id="tambahUlasanModal" tabindex="-1" aria-labelledby="tambahUlasanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUlasanLabel">Tambah Ulasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="tambah_ulasan_landingpage.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="kode_mobil" class="form-label">Pilih Mobil</label>
                            <select class="form-select" id="kode_mobil" name="kode_mobil" required>
                                <option value="" disabled selected>Pilih Mobil</option>
                                <option value="1">Toyota Avanza - MPV</option>
                                <option value="2">Honda Civic - Sedan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan</label>
                            <textarea class="form-control" id="ulasan" name="ulasan" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="1">1 - Sangat Buruk</option>
                                <option value="2">2 - Buruk</option>
                                <option value="3">3 - Cukup</option>
                                <option value="4">4 - Baik</option>
                                <option value="5">5 - Sangat Baik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="foto_ulasan" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto_ulasan" name="foto_ulasan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container"><hr>
            <h3>List Pemesanan</h3>
            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE PESANAN</th>
                        <th>NAMA LENGKAP</th>
                        <th>TANGGAL</th>
                        <th>MOBIL</th>
                        <th>INFO MOBIL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12345</td>
                        <td>John Doe</td>
                        <td>
                            <p>Pengambilan: <b>2023-10-01</b></p>
                            <p>Pengembalian: <b>2023-10-05</b></p>
                        </td>
                        <td><img src="uploads/toyota_avanza.jpg" alt="foto_mobil" width="100"></td>
                        <td>
                            <p>Merek: <b>Toyota</b></p>
                            <p>Jenis: <b>Avanza</b></p>
                            <p>Warna: <b>Hitam</b></p>
                            <p>Harga: <b>Rp 300.000/hari</b></p>
                        </td>
                        <td>
                            <span class="badge bg-success">Confirmed</span>
                        </td>
                        <td>
                            <a href="export_pdf.php?kode_pemesanan=12345" class="btn btn-primary btn-sm">Resi</a>
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahUlasanModal">Ulasan</a>
                            <a href="hapus_riwayat.php?kode_pemesanan=12345" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function togglePopup() {
            const popup = document.getElementById('popup');
            const isVisible = popup.style.display === 'block';
            popup.style.display = isVisible ? 'none' : 'block';
        }

        function showEditProfileModal() {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');
            popup.style.display = 'none';
            editProfileModal.style.display = 'block';
        }

        function hideEditProfileModal() {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');
            editProfileModal.style.display = 'none';
            popup.style.display = 'block';
        }

        function confirmLogout() {
            const confirmation = confirm("Apakah Anda yakin ingin keluar dari akun?");
            if (confirmation) {
                window.location.href = 'landingpage_before.php';
            }
        }

        function handleSubmit(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('update_profile.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === 'success') {
                    alert("Pengubahan Data Profile berhasil");
                    window.location.href = 'landingpage.php';
                } else {
                    alert("Terjadi kesalahan saat mengubah data: " + data);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Terjadi kesalahan saat memproses data. Silakan coba lagi nanti.");
            });
        }

        window.addEventListener('scroll', function () {
            const popup = document.getElementById('popup');
            const editProfileModal = document.getElementById('edit-profile-modal');
            if (popup.style.display === 'block') {
                popup.style.display = 'none';
            }
            if (editProfileModal.style.display === 'block') {
                editProfileModal.style.display = 'none';
            }
        });

        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarNav = document.querySelector('.navbar-nav');
        navbarToggler.addEventListener('click', function () {
            navbarNav.classList.toggle('active');
        });

        document.addEventListener('click', function (event) {
            if (!navbarNav.contains(event.target) && !navbarToggler.contains(event.target)) {
                navbarNav.classList.remove('active');
            }
        });
    </script>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>