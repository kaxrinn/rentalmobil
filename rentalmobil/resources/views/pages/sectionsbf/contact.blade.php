<!--form kontak -->
<section id="Kontak" class="relative bg-[#f7f9ff] py-24 px-10 overflow-hidden">
  <div class="max-w-7xl mx-auto relative flex items-center justify-start">
    <!-- Form Kontak -->
    <form action="{{ route('contact.submit') }}" method="POST" class="relative z-0 bg-white p-10 rounded-xl shadow-xl w-[550px] space-y-5 ml-[140px]">
      @csrf
      <h2 class="text-3xl font-bold text-[#1e2b5c]">KONTAK KAMI</h2>
      <input type="text" name="nama" placeholder="Masukkan nama Anda" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">
      <input type="email" name="email" placeholder="Masukkan email Anda" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">
      <textarea name="pesan" placeholder="Tulis pesan di sini" required rows="4" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"></textarea>
      <button type="submit" class="w-full py-3 bg-[#1e2b5c] text-white rounded-md font-semibold hover:bg-[#151f47] transition">
        Kirim Pesan
      </button>
    </form>

    <!-- Gambar Mobil & Teks -->
    <div class="absolute right-0 top-[20%] z-10 w-[650px] -mt-10">
      <p class="text-[16px] w-[300px] mb-4 ml-[150px] text-gray-700">
        Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.
      </p>
      <img src="{{ asset('gambarberanda/image.png') }}" alt="Mobil" class="w-full">
    </div>
  </div>
</section>