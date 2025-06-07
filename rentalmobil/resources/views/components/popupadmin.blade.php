<div class="hidden fixed top-[10%] right-0 w-[18.75rem] p-5 bg-[#112769] text-white rounded-l-lg shadow-lg z-[1000]" id="popup">
  <label class="font-bold">Selamat datang,</label>
  <div class="text-sm">
        @if(Auth::check())
          <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
          <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        @endif
        </div>
  <div class="flex justify-between mt-4">
    <a class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline" onclick="togglePopup()">Tutup</a>
    <a href="#" class="bg-white text-[#1e204a] py-2 px-4 rounded w-[45%] text-center cursor-pointer hover:underline" 
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Keluar
    </a>
  </div>
</div>

<!-- Form Logout -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
  @csrf
</form>

<div class="hidden fixed inset-0 bg-black bg-opacity-50 z-[999]" id="overlay" onclick="togglePopup()"></div>
