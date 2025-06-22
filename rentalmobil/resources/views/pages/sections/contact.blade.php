<!-- Form Kontak -->
<section id="Kontak" class="bg-[#f7f9ff] py-20 px-4 sm:px-6" class="scroll-mt-24 py-10"> 
  <div class="max-w-5xl mx-auto flex flex-col lg:flex-row items-center justify-center gap-10">

    <!-- Form Kontak -->
    <form action="{{ route('contact.submit') }}" method="POST" 
          class="bg-white p-4 rounded-xl shadow-xl w-full max-w-md space-y-3">
      @csrf

      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
          {{ session('success') }}
        </div>
      @endif

      <h2 class="text-3xl font-bold text-[#1e2b5c] text-center">KONTAK KAMI</h2>

      <input type="text" name="nama" placeholder="Masukkan nama Anda" required 
             class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">

      <input type="email" name="email" placeholder="Masukkan email Anda" required 
             class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]">

      <textarea name="pesan" placeholder="Tulis pesan di sini" required rows="4" 
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"></textarea>

      <button type="submit" 
              class="w-full py-3 text-white rounded-md font-semibold 
                     bg-gradient-to-r from-[#115EAD] to-[#219FE3] transition duration-300">
        Kirim Pesan
      </button>
    </form>

    <!-- Gambar & Teks -->
    <div class="w-full max-w-md text-center lg:text-left">
      <p class="text-[16px] mb-4 text-gray-700">
        Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.
      </p>
      <img src="{{ asset('gambarberanda/image.png') }}" alt="Mobil" class="w-full rounded-md ">
    </div>

  </div>
</section>
