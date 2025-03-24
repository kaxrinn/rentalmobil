<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Login Page</title> 
        <!-- Mengimpor Bootstrap CSS untuk mempercantik tampilan -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
        <style> 
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

/* Styling untuk container login */
.login-container {
    max-width: 25rem; /* Batas lebar container login */
    width: 100%; /* Pastikan responsif di semua perangkat */
    padding: 1.25rem; /* Ruang dalam container */
    background-color: rgba(255, 255, 255, 0.1); /* Warna latar belakang container */
    border-radius: 0.5rem; /* Membuat sudut melengkung */
    box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
    text-align: left; /* Teks diatur ke kiri */
}

/* Heading dan teks di login */
.login-container h2 {
    margin-bottom: 1.25rem; /* Jarak bawah judul */
    font-family: 'Trebuchet MS', sans-serif; /* Gaya font judul */
    color: white; /* Warna teks judul */
}

.login-container label {
    margin-bottom: 0.3125rem; /* Jarak bawah label */
    display: block; /* Membuat label sebagai blok */
    color: white; /* Warna teks label */
    font-size: 1.1rem; /* Ukuran font label */
}

.login-container input {
    width: 100%; /* Lebar penuh untuk input */
    padding: 0.625rem; /* Ruang dalam input */
    margin-bottom: 0.9375rem; /* Jarak bawah input */
    border: none; /* Menghapus border */
    border-radius: 0.3125rem; /* Membuat sudut melengkung */
    box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
}

.login-container p {
    margin-top: 0.625rem; /* Jarak atas paragraf */
    color: white; /* Warna teks paragraf */
    text-align: center; /* Teks diatur ke tengah */
}

/* Styling tombol */
.custom-btn {
    display: block; /* Pastikan tombol menjadi elemen blok untuk memanfaatkan centering */
    width: 100%; /* Atur lebar elemen */
    max-width: 18.75rem; /* Batas maksimal lebar */
    margin: 0.625rem auto; /* Auto pada margin horizontal untuk centering */
    padding: 0.625rem; /* Ruang dalam elemen */
    font-size: 1rem; /* Ukuran font */
    border-radius: 0.3125rem; /* Membuat sudut melengkung */
    background-color: #6c63ff; /* Warna latar tombol */
    color: white; /* Warna teks tombol */
    text-align: center; /* Pastikan teks di tombol juga diratakan ke tengah */
    cursor: pointer; /* Menambahkan pointer saat hover */
    border: none; /* Menghapus border default */
}

.custom-btn:hover {
    background-color: #5753d8; /* Warna saat tombol di-hover */
}

</style>
    </head>
    <body> 
        <div class="logo">
            <!-- Menampilkan logo dan nama aplikasi -->
            <img src="uploads/logo.png" alt="Gambar Mobil"><span>CAR RENTAL</span>
        </div>
        <div class="login-container"> 
            <h2 class="text-center"> MASUK AKUN </h2>
            <!-- Pesan kesalahan akan ditampilkan di sini jika ada -->
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>
            <form method="POST" action="">
                <!-- Input email -->
                <div class="mb-3"> 
                    <label for="email" class="form-label">Email</label> 
                    <input type="email" class="form-control" id="email" name="email" required> 
                </div> 
                <!-- Input kata sandi -->
                <div class="mb-3"> 
                    <label for="password" class="form-label">Kata Sandi</label> 
                    <input type="password" class="form-control" id="kata_sandi" name="kata_sandi" required> 
                </div> 
                <!-- Tombol login -->
                <button type="submit" class="btn custom-btn w-100"> Masuk </button>
            </form>  
            <p class="text-center">Belum punya akun? <a href="register.php" class="link-primary"> Klik Disini </a></p> 
            <p class="text-center">Lupa kata sandi? <a href="lupa_sandi.php" class="link-primary">Klik Disini</a></p>
        </div> 
        <!-- Mengimpor Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    </body> 
</html>