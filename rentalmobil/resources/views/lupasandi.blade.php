<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling halaman lupa_sandi */
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styling halaman login */
        body {
            display: flex; /* Menggunakan Flexbox pada body */
            flex-direction: column; /* Elemen diatur secara kolom */
            align-items: center; /* Menyelaraskan konten horizontal */
            justify-content: center; /* Menyelaraskan konten vertikal */
            background-color: rgb(45, 15, 100); /* Warna latar belakang utama */
            background-repeat: no-repeat; /* Tidak mengulang gambar latar */
            background-size: cover; /* Memastikan gambar latar sesuai layar */
            min-height: 100vh; /* Tinggi penuh layar */
            margin: 0; /* Menghapus margin default */
            padding: 0; /* Menghapus padding default */
            position: relative; /* Untuk menempatkan logo di posisi tetap */
        }

        /* Form container styling */
        .container {
            background-color: rgba(255, 255, 255, 0.1); /* Warna latar belakang container */
            padding: 1.875rem; /* Padding dalam container */
            border-radius: 0.625rem; /* Sudut melengkung */
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1); /* Bayangan pada container */
            max-width: 25rem; /* Batas maksimal lebar container */
            width: 90%; /* Lebar 90% dari container */
            color: #f4f4f4; /* Warna teks */
        }

        /* Heading */
        h2 {
            margin-bottom: 1.25rem; /* Jarak bawah heading */
            font-size: 1.5rem; /* Ukuran font judul */
            font-family: 'Trebuchet MS', sans-serif; /* Gaya font judul */
        }

        /* Label input */
        label {
            color: #ddd; /* Warna teks label */
            font-size: 1.1rem; /* Ukuran font label */
        }

        /* Tombol utama */
        .btn-primary {
            background-color: #6c63ff; /* Warna latar tombol utama */
            border: none; /* Menghapus border default */
            padding: 0.75rem; /* Padding dalam tombol */
            font-size: 1rem; /* Ukuran font tombol */
            border-radius: 0.3125rem; /* Sudut melengkung */
            color: white; /* Warna teks tombol */
            width: 100%; /* Lebar penuh tombol */
            cursor: pointer; /* Mengubah kursor saat hover */
        }

        .btn-primary:hover {
            background-color: #5753d8; /* Warna tombol saat dihover */
        }

        /* Tombol sekunder */
        .btn-secondary {
            background-color: #ddd; /* Warna latar tombol sekunder */
            color: #333; /* Warna teks tombol sekunder */
            padding: 0.75rem; /* Padding dalam tombol */
            font-size: 1rem; /* Ukuran font tombol */
            border-radius: 0.3125rem; /* Sudut melengkung */
            width: 100%; /* Lebar penuh tombol */
            margin-top: 0.625rem; /* Jarak atas untuk tombol sekunder */
            cursor: pointer; /* Mengubah kursor saat hover */
        }

        .btn-secondary:hover {
            background-color: #bbb; /* Warna tombol sekunder saat dihover */
            color: #111; /* Warna teks tombol sekunder saat dihover */
        }

        /* Styling untuk logo */
        .logo {
            position: absolute; /* Posisi absolut agar tetap di pojok kiri atas */
            top: 1.25rem; /* Jarak dari atas layar */
            left: 1.25rem; /* Jarak dari kiri layar */
            display: flex; /* Membuat elemen di dalamnya fleksibel */
            align-items: center; /* Menyelarangkan logo dan teks secara vertikal */
            gap: 0.625rem; /* Atur jarak horizontal antara logo dan teks */
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
    </style>
</head>
<body>
    <div class="logo">
        <!-- Menampilkan logo dan nama aplikasi -->
        <img src="uploads/logo.png" alt="Gambar Mobil" /> <!-- Gambar logo aplikasi -->
        <span>CAR RENTAL</span> <!-- Nama aplikasi -->
    </div>

    <div class="container">
        <!-- Judul halaman Reset Password -->
        <h2 class="text-center">Reset Password</h2>

        <!-- Formulir untuk mereset password -->
        <form action="{{ route('reset.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <!-- Input untuk email pengguna -->
                <label for="email" class="form-label">Masukkan Email Anda:</label>
                <input type="email" class="form-control" id="email" name="email" required /> <!-- Input email -->
            </div>

            <div class="mb-3">
                <!-- Input untuk password baru -->
                <label for="new_password" class="form-label">Password Baru:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required /> <!-- Input password baru -->
            </div>

            <!-- Tombol untuk mengirimkan formulir -->
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>

            <!-- Tombol untuk kembali ke halaman login -->
            <a href="{{ route('login') }}" class="btn btn-secondary w-100">Kembali</a>
        </form>
    </div>
</body>
</html>