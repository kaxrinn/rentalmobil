<div class="hidden fixed top-[10%] right-0 w-[18.75rem] p-5 bg-[#112769] text-white rounded-l-lg shadow-lg z-[1000]" id="popup">
  <label class="font-bold">Selamat datang,</label>
  <p><strong>Nama:</strong> Admin Contoh</p>
  <p><strong>Email:</strong> admin@example.com</p>
  <p><strong>Nomor HP:</strong> 08123456789</p>
  <div class="flex justify-between mt-4">
    <a class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline" onclick="togglePopup()">Tutup</a>
    <a href="#" class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline">Keluar</a>
  </div>
</div>
<div class="hidden fixed inset-0 bg-black bg-opacity-50 z-[999]" id="overlay" onclick="togglePopup()"></div>
