<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Styling halaman Register */
        body {
            background-color: rgb(45, 15, 100); /* Warna latar belakang utama */
            background-repeat: no-repeat; /* Tidak mengulang gambar latar */
            background-size: cover; /* Memastikan gambar latar sesuai layar */
            height: 100vh; /* Tinggi penuh layar */
            margin: 0; /* Menghapus margin default */
            padding: 0; /* Menghapus padding default */
        }

        /* Styling untuk logo */
        .logo {
            display: flex; /* Menyusun elemen di dalamnya secara fleksibel */
            align-items: center; /* Menyelaraskan logo dan teks secara vertikal */
            justify-content: flex-start; /* Menyelaraskan logo ke kiri */
            gap: 0.625rem; /* Jarak horizontal antara logo dan teks */
            margin: 1.25rem; /* Jarak dari tepi */
        }

        .logo img {
            width: 3.125rem; /* Ukuran logo */
            height: auto; /* Menjaga proporsi logo */
        }

        .logo span {
            font-size: 1.5rem; /* Ukuran teks logo */
            color: white; /* Warna teks logo */
            font-weight: bold; /* Ketebalan teks logo */
        }

        /* Container untuk login */
        .login-container {
            max-width: 25rem; /* Batas lebar maksimal */
            margin: auto; /* Mengatur posisi tengah */
            padding: 1.25rem; /* Padding di dalam container */
            background: rgba(255, 255, 255, 0.1); /* Warna latar belakang dengan transparansi */
            border-radius: 0.5rem; /* Sudut melengkung */
            box-shadow: 0 0.625rem 1.25rem rgba(0, 0, 0, 0.1); /* Bayangan container */
            text-align: left; /* Teks diatur ke kiri */
        }

        /* Heading di dalam form */
        .login-container h2 {
            margin-bottom: 1.25rem; /* Jarak bawah heading */
            font-family: 'Trebuchet MS', sans-serif; /* Gaya font judul */
            color: white; /* Warna teks judul */
        }

        /* Label input */
        .login-container label {
            margin-bottom: 0.3125rem; /* Jarak bawah label */
            color: white; /* Warna teks label */
            font-size: 1.1rem; /* Ukuran font label */
        }

        /* Paragraf dalam form */
        .login-container p {
            margin-top: 0.625rem; /* Jarak atas untuk paragraf */
            color: white; /* Warna teks paragraf */
        }

        /* Tombol custom */
        .custom-btn {
            width: 100%; /* Lebar penuh tombol */
            margin-top: 0.625rem; /* Jarak atas untuk tombol */
            padding: 0.625rem; /* Padding dalam tombol */
            background-color: #6c63ff; /* Warna latar tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghapus border default */
            border-radius: 0.3125rem; /* Sudut melengkung pada tombol */
            text-align: center; /* Teks di tengah tombol */
            cursor: pointer; /* Mengubah kursor saat hover */
        }

        .custom-btn:hover {
            background-color: #5753d8; /* Warna latar tombol saat dihover */
        }
    </style>
</head>
<body>
    <!-- Bagian Logo -->
    <div class="logo">
        <img src="uploads/logo.png" alt="Gambar Mobil">
        <span>CAR RENTAL</span>
    </div>  

    <!-- Kontainer Registrasi -->
    <div class="login-container">
        <h2 class="text-center">REGISTRASI</h2>
        
        <!-- Menampilkan Pesan Error Jika Ada -->
        @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        <!-- Form Registrasi -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Input Nama Pengguna -->
            <div class="mb-3">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" autocomplete="username" required>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
            </div>

            <!-- Input Kata Sandi -->
            <div class="mb-3">
                <label for="kata_sandi" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="kata_sandi" name="kata_sandi" autocomplete="new-password" required>
            </div>

            <!-- Input Nomor HP -->
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" autocomplete="tel" required>
            </div>

            <!-- Tombol Daftar -->
            <button type="submit" class="btn custom-btn">Daftar</button>
        </form>

        <!-- Link ke Halaman Login -->
        <p class="text-center">Sudah punya akun? 
            <a href="{{ route('login') }}" class="link-primary">Klik Disini</a>
        </p>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>