<div id="sidebar" class="fixed top-[70px] left-0 h-[calc(100vh-70px)] w-52 bg-[#112769] text-white p-4 transition-transform transform -translate-x-full lg:translate-x-0 lg:block sm:hidden">
  <ul class="space-y-3">
    <li>
      <a href="{{ route('admin') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-home mr-3"></i> Beranda
      </a>
    </li>
    <li>
      <a href="{{ route('pemesananadmin') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-file-alt mr-3"></i> Pemesanan
      </a>
    </li>
    <li>
      <a href="{{ route('mobiladmin') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-car-alt mr-3"></i> Mobil
      </a>
    </li>
    <li>
      <a href="{{ route('ulasanadmin') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
        <i class="fas fa-star-half-alt mr-3"></i> Ulasan
      </a>
    </li>
    <li>
        <a href="{{ route('hubungiadmin') }}" class="flex items-center px-4 py-3 bg-white text-black rounded-md font-medium hover:bg-gray-200">
          <i class="fas fa-envelope mr-3"></i> Pesan
        </a>
      </li>
  </ul>
</div>