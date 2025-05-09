<nav class="fixed top-0 w-full h-[70px] z-[1000] bg-white flex items-center justify-between px-4">
  <div class="flex items-center">
    <img src="{{ asset('images/Logo 6.png') }}" alt="Logo" class="h-[100px] w-auto">
  </div>
  <div class="flex items-center gap-4">
    <button class="text-black text-2xl" onclick="togglePopup()">
      <i class="fas fa-user-circle"></i>
    </button>
    <button class="text-[#3a57e8] text-2xl lg:hidden" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</nav>
