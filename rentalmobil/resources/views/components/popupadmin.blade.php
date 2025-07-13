<!-- Popup Informasi -->
<div class="hidden fixed top-[10%] right-0 w-[18.75rem] p-5 bg-[#112769] text-white rounded-l-lg shadow-lg z-[1000]" id="popup">
  <label class="font-bold">Selamat datang,</label>
  <div class="text-sm mt-1">
    @if(Auth::guard('perental')->check())
      <p><strong>Nama:</strong> {{ Auth::guard('perental')->user()->nama_perental }}</p>
      <p><strong>Email:</strong> {{ Auth::guard('perental')->user()->email }}</p>
    @endif
  </div>
  <div class="flex justify-between mt-4">
    <a class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline"
       onclick="togglePopup()">Tutup </a>
    <a class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline"
       onclick="showConfirmLogout()">Keluar</a>
  </div>
</div>

<!-- Konfirmasi Logout -->
<div id="confirm-logout" class="hidden fixed inset-0 z-[1100] flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white p-6 rounded-lg shadow-lg w-[300px] text-center">
    <p class="text-lg text-gray-800 font-semibold mb-4">Yakin ingin keluar?</p>
    <div class="flex justify-center gap-4">
      <button onclick="hideConfirmLogout()"
              class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded text-sm font-semibold">
        Batal
      </button>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-sm font-semibold">
          Keluar
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Overlay gelap untuk popup utama -->
<div class="hidden fixed inset-0 bg-black bg-opacity-50 z-[999]" id="overlay" onclick="togglePopup()"></div>

<!-- Script -->
<script>
  function togglePopup() {
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');
    popup.classList.toggle('hidden');
    overlay.classList.toggle('hidden');
  }

  function showConfirmLogout() {
    document.getElementById('confirm-logout').classList.remove('hidden');
  }

  function hideConfirmLogout() {
    document.getElementById('confirm-logout').classList.add('hidden');
  }
</script>
