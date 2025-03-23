<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    
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
                <a class="nav-link active text-white" href="{{ route('beranda') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pemesanan') }}">
                    <i class="fas fa-car me-2"></i>Pemesanan
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('mobil') }}">
                    <i class="fas fa-car-alt me-2"></i>Mobil
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ulasan') }}">
                    <i class="bi bi-star-half me-2"></i>Ulasan
                </a>
                <hr class="bg-secondary" />
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('hubungi_kami') }}">
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
                <a class="nav-link text-dark" href="{{ route('beranda') }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('pemesanan') }}">
                    <i class="fas fa-car me-2"></i>Pemesanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('mobil') }}">
                    <i class="fas fa-car-alt me-2"></i>Mobil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('ulasan') }}">
                    <i class="bi bi-star-half me-2"></i>Ulasan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('hubungi_kami') }}">
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
        <p><strong>Nama:</strong> {{ Auth::user()->nama_pengguna }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Nomor HP:</strong> {{ Auth::user()->no_hp }}</p>
        <div class="button-group" style="margin-top: 10px;">
            <a class="close-btn" onclick="togglePopup()">Tutup</a>
            <a href="#" class="logout-btn" onclick="confirmLogout()">Keluar</a>
        </div>
    </div>

    <!-- Modal tambah data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('tambah.mobil') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataLabel">Tambah Data Mobil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Produk</label>
                            <input type="text" inputmode="numeric" class="form-control" id="kode" name="kode" required />
                        </div>
                        <div class="mb-3">
                            <label for="merek" class="form-label">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek" required />
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" required />
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna" required />
                        </div>
                        <div class="mb-3">
                            <label for="foto_mobil" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto_mobil" name="foto_mobil" required />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required />
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" inputmode="numeric" class="form-control" id="jumlah" name="jumlah" required />
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('ubah.mobil') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDataLabel">Edit Data Mobil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit-kode" name="kode" />
                        <div class="mb-3">
                            <label for="edit-merek" class="form-label">Merek</label>
                            <input type="text" class="form-control" id="edit-merek" name="merek" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-jenis" class="form-label">Jenis</label>
                            <input type="text" class="form-control" id="edit-jenis" name="jenis" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="edit-warna" name="warna" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto Saat Ini</label><br>
                            <img id="editFotoPreview" src="#" alt="Foto" width="150" class="mb-3 border rounded" /><br>
                            <label for="editFoto" class="form-label">Ganti Foto</label>
                            <input type="file" class="form-control" id="editFoto" name="foto_mobil" />
                        </div>
                        <div class="mb-3">
                            <label for="edit-harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="edit-harga" name="harga" required />
                        </div>
                        <div class="mb-3">
                            <label for="edit-jumlah" class="form-label">Jumlah</label>
                            <input type="text" inputmode="numeric" class="form-control" id="edit-jumlah" name="jumlah" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <hr />
            <h3>List Mobil</h3>

            <!-- Tombol untuk membuka modal tambah data mobil -->
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                <i class="fas fa-plus-circle me-2"></i> TAMBAH DATA MOBIL
            </button>

            <!-- Tabel untuk menampilkan list mobil -->
            <table id="movementsTable" class="table-responsive table mt-2">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>KODE PRODUK</th>
                        <th>MEREK</th>
                        <th>JENIS</th>
                        <th>WARNA</th>
                        <th>FOTO</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->merek }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>{{ $data->warna }}</td>
                        <td>
                            <img src="{{ asset('uploads/' . $data->foto_mobil) }}" alt="Foto" width="100">
                        </td>
                        <td>{{ $data->harga }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>
                            <button class="btn btn-success btn-sm me-1 edit-button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editDataModal"
                                    data-kode="{{ $data->kode }}"
                                    data-merek="{{ $data->merek }}"
                                    data-jenis="{{ $data->jenis }}"
                                    data-warna="{{ $data->warna }}"
                                    data-foto_mobil="{{ $data->foto_mobil }}"
                                    data-harga="{{ $data->harga }}"
                                    data-jumlah="{{ $data->jumlah }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="{{ route('hapus.mobil', $data->kode) }}" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    try {
      const editButtons = document.querySelectorAll('.edit-button');

      editButtons.forEach((button) => {
        button.addEventListener('click', function () {
          try {
            const kode = this.getAttribute('data-kode');
            const merek = this.getAttribute('data-merek');
            const jenis = this.getAttribute('data-jenis');
            const warna = this.getAttribute('data-warna');
            const fotoMobil = this.getAttribute('data-foto_mobil');
            const harga = this.getAttribute('data-harga');
            const jumlah = this.getAttribute('data-jumlah');

            // Pastikan ID elemen benar
            const kodeInput = document.getElementById('edit-kode');
            const merekInput = document.getElementById('edit-merek');
            const jenisInput = document.getElementById('edit-jenis');
            const warnaInput = document.getElementById('edit-warna');
            const fotoPreview = document.getElementById('editFotoPreview');
            const hargaInput = document.getElementById('edit-harga');
            const jumlahInput = document.getElementById('edit-jumlah');

            if (kodeInput) kodeInput.value = kode;
            if (merekInput) merekInput.value = merek;
            if (jenisInput) jenisInput.value = jenis;
            if (warnaInput) warnaInput.value = warna;

            // Tampilkan foto di modal jika elemen fotoPreview ditemukan
            if (fotoPreview) fotoPreview.src = "uploads/" + fotoMobil;

            if (hargaInput) hargaInput.value = harga;
            if (jumlahInput) jumlahInput.value = jumlah;
          } catch (error) {
            console.error("Terjadi kesalahan saat memuat data ke dalam modal:", error);
          }
        });
      });
    } catch (error) {
      console.error("Terjadi kesalahan saat menambahkan event listener:", error);
    }
  });
</script> 
    </tbody>
</table>
</body>
</html>