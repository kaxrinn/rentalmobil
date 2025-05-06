<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com/3.4.1"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#cfd1da] m-0">

  <!-- Navbar -->
  <nav class="fixed top-0 w-full h-[70px] z-[1000] bg-white flex items-center justify-between px-4">
    <div class="flex items-center">
      <div class="logo">
        <img src="gambarberanda/Logo 6.png" alt="Logo" class="h-[100px] w-auto">
      </div>
    </div>
    <div class="flex items-center gap-4">
      <button class="text-black text-2xl" onclick="togglePopup()">
        <i class="fas fa-user-circle"></i>
      </button>
      <button class="text-[#3a57e8] text-2xl lg:hidden" id="hamburger-icon" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>

  <!-- Sidebar (samping) -->
  <div id="sidebar" class="fixed top-[70px] left-0 h-[calc(100vh-70px)] w-52 bg-[#112769] text-white p-4 transition-transform transform -translate-x-full lg:translate-x-0 lg:block sm:hidden">
    <ul class="space-y-3">
      <li>
        <a href="{{ route('beranda') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-home mr-3"></i> Beranda
        </a>
      </li>
      <li>
        <a href="{{ route('pemesanan') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-tachometer-alt mr-3"></i> Pemesanan
        </a>
      </li>
      <li>
        <a href="{{ route('mobil') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-car mr-3"></i> Mobil
        </a>
      </li>
      <li>
        <a href="{{ route('ulasan') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-star-half-alt mr-3"></i> Ulasan
        </a>
      </li>
      <li>
        <a href="{{ route('hubungi_kami') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-envelope mr-3"></i> Pesan
        </a>
      </li>
    </ul>
  </div>

<!-- Popup -->
<div class="hidden fixed top-[10%] right-0 w-[18.75rem] p-5 bg-[#236d94] text-white rounded-l-lg shadow-lg z-[1000]" id="popup">
  <label class="font-bold">Selamat datang,</label>
  <p><strong>Nama:</strong> Admin Contoh</p>
  <p><strong>Email:</strong> admin@example.com</p>
  <p><strong>Nomor HP:</strong> 08123456789</p>
  <div class="flex justify-between mt-4">
    <a class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline" onclick="togglePopup()">Tutup</a>
    <a href="#" class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline" onclick="confirmLogout()">Keluar</a>
  </div>
</div>
  <!-- Overlay -->
  <div class="hidden fixed inset-0 bg-black bg-opacity-50 z-[999]" id="overlay" onclick="togglePopup()"></div>


  <!-- Main Content -->
  <div class="pt-20 px-4 lg:ml-[12.5rem]">
    <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
      <h3 class="text-xl font-semibold mb-4">List Pemesanan</h3>
      <table class="w-full min-w-[800px] border border-gray-300 text-center">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 border">NO</th>
            <th class="p-3 border">ID PENYEWAAN</th>
            <th class="p-3 border">NAMA PENYEWA</th>
            <th class="p-3 border">EMAIL</th>
            <th class="p-3 border">ALAMAT</th>
            <th class="p-3 border">TANGGAL PENGAMBILAN</th>
            <th class="p-3 border">TANGGAL PENGEMBALIAN</th>
            <th class="p-3 border">MOBIL YANG DIPESAN</th>
            <th class="p-3 border">TEMPAT PENGAMBILAN</th>
            <th class="p-3 border">NOREK PENJUAL</th>
            <th class="p-3 border">TOTAL PEMBAYARAN</th>
            <th class="p-3 border">BUKTI PEMBAYARAN</th>
            <th class="p-3 border">STATUS</th>
            <th class="p-3 border">AKSI</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-3 border">1</td>
            <td class="p-3 border">CR00123</td>
            <td class="p-3 border">Kim Mingyu</td>
            <td class="p-3 border">KarinaMingyu@gmail.com</td>
            <td class="p-3 border">Jl. tiban 1</td>
            <td class="p-3 border">2025-04-20</td>
            <td class="p-3 border">2025-04-25</td>
            <td class="p-3 border">
              <img src="gambarproduk/mobil 2.png" alt="Toyota Rush" class="max-w-[150px] h-auto mx-auto">
            </td>
            <td class="p-3 border">Jl. tiban indah permai</td>
            <td class="p-3 border">3312401067123 a/n kharina</td>
            <td class="p-3 border">Rp.300.000</td>
            <td class="p-3 border">
              <img src="gambarberanda/buktibyr.jpg" alt="bukti" class="max-w-[150px] h-auto mx-auto">
            </td>
            <td class="p-3 border">
              <span class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold text-sm inline-flex items-center justify-center">Konfirmasi</span>
            </td>
            <td class="p-3 border">
              <div class="flex gap-2 justify-center">
                <button class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Edit</button>
                <button class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Hapus</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function togglePopup() {
      const popup = document.getElementById('popup');
      const overlay = document.getElementById('overlay');
      popup.classList.toggle('hidden');
      overlay.classList.toggle('hidden');
    }

    function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('-translate-x-full');
}
  </script>
</body>
</html>
