<!-- Ini belum tersambung -->
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil</title>
<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

  /* Style untuk navbr */
  nav {
      position: fixed; /* Navbar selalu nempel di atas */
      top: 0;
      width: 100%;
      max-height: 55px;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 10px 10px 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Bayangan navbar */
      z-index: 1000; /* Navbar selalu di atas konten */
    }

    /* Logo di navbar */
    .logo {
      display: flex;
      align-items: center;

    }
    .logo img {
      height: 100px;
      width: auto;
    }

    .nav-center {
      flex: 1;
      display: flex;
      justify-content: right; /* Menu di tengah */
    }

/* Link dan opsi di navbar */
    .nav-links {
      display: flex;
      align-items: center;
      gap: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: black;
      font-size: 16px;
      padding: 15px 30px;
      background: white;
      clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%); /* Membentuk jajar genjang */  
      z-index: 1;
    }

    .nav-links a:hover {
      background: linear-gradient(to right, #115EAD, #219FE3); /* Gradasi biru saat hover */
      color: white;
      border-color: #007BFF;
      z-index: 2;
    }
    /* Style untuk search */
    .search-login {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .search-box {
      display: flex;
      align-items: center;
      border: 1px solid black;
      border-radius: 8px;
      padding: 5px 10px;
      background: white;
    }

    .search-box input {
      border: none;
      outline: none;
      background: transparent;
      padding: 5px;
      font-size: 14px;
      width: 120px;
    }

    .search-icon {
      font-size: 16px;
      color: black;
      margin-right: 5px;
    }
    .icon-btn {
      background: transparent;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 5px;
    }
    body {
      background: url('gambarberanda/backgroundlogin.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 0;
      min-height: 100vh;
      padding-top: 100px;
      padding-bottom: 50px;
      box-sizing: border-box;
    }

    .form-box {
      width: 100%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      padding: 30px 25px;
      box-sizing: border-box;
    }

    .logo-wrapper img {
      width: 100px;
      margin: 0 auto;
      display: block;
    }

    .form-box h2 {
      font-size: 22px;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 0;
}

input {
  padding: 10px 15px;
  width: 100%;
  height: 40px;
  border: 2px solid #002366;
  border-radius: 8px;
  font-size: 14px;
  outline: none;
  box-sizing: border-box;
}

.button-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  margin-top: 20px;
}

.button-simpan,
.button-batal {
  padding: 12px;
  background-color: #002366;
  color: white;
  border: none;
  border-radius: 8px;
  width: 250px;
  height: 40px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s;
}

.button-batal {
  background-color: #578FCA;
}

.button-simpan:hover {
  background-color: #578FCA;
}

.button-batal:hover {
  background-color: #002366;
}

p {
  font-size: 13px;
  margin-top: 5px;
  text-align: center;
}

p a {
  color: #002366;
  text-decoration: none;
  font-weight: bold;
}

p a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>
  <!-- Navbar aplikasi -->
  <nav>
  <div class="logo">
  <img src="gambarberanda/Logo 6.png" alt="Logo">
  </div>
 <!-- Link di navbar -->
  <div class="nav-center">
    <div class="nav-links">
      <a href="#Beranda">Beranda</a>
      <a href="#Produk">Produk</a>
      <a href="#Riwayat">Riwayat</a> <!-- ini belum tersambung -->
      <a href="#Ulasan">Ulasan</a>
      <a href="#Kontak">Kontak</a>
    </div>
  </div>

   <!-- Burger Menu -->
   <div class="burger-menu" onclick="toggleMenu()">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>

<!-- Kontak pencarian -->
 <!-- Ini belum tersambung -->
  <div class="search-login">
    <div class="search-box">
    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" viewBox="0 0 16 16">
  <path d="M11 6a5 5 0 1 0-1.293 3.707l3.182 3.182a1 1 0 0 0 1.414-1.414l-3.182-3.182A4.978 4.978 0 0 0 11 6zm-5 3a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
      <input type="text" placeholder="Pencarian">
    </div>

<!-- Logo Profil -->
 <!-- Ini belum tersambung -->
 <button class="icon-btn" onclick="togglePopup()">
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d3c8a" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
  </svg>
</button>

  </div>
  </nav>

<!--Javascript untuk burger menu-->
<script>
  function toggleMenu() { 
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');// mengaktifkan burger menu saat layar lebih kecil
  }
</script>



<div class="form-box">
  <h2>Edit Profil</h2>
  <form action="#">
            <label for="nama_pengguna">Nama:</label>
            <input type="text" id="nama_pengguna" name="nama_pengguna" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="no_hp">Nomor HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>

            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">

    <div class="button-container">
        <button class="button-simpan" type="submit">Simpan</button>
        <button class="button-batal" a href="login.php">Batal</button>
    </div>
  </form>
</div>

</body>
</html>