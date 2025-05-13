<!-- Form Kontak -->
<section id="Kontak" class="bg-[#f7f9ff] py-24 px-6 sm:px-10 overflow-hidden">
  <div class="max-w-7xl mx-auto flex flex-col-reverse lg:flex-row items-center lg:items-start justify-between gap-10">
    
    <!-- Form Kontak -->
    <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-8 sm:p-10 rounded-xl shadow-xl w-full max-w-xl space-y-5">
      @csrf
      <h2 class="text-3xl font-bold text-[#1e2b5c]">KONTAK KAMI</h2>
      <input 
        type="text" 
        name="nama" 
        placeholder="Masukkan nama Anda" 
        required 
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"
      >
      <input 
        type="email" 
        name="email" 
        placeholder="Masukkan email Anda" 
        required 
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"
      >
      <textarea 
        name="pesan" 
        placeholder="Tulis pesan di sini" 
        required 
        rows="4" 
        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1e2b5c]"
      ></textarea>
      <button 
        type="submit" 
        class="w-full py-3 bg-[#1e2b5c] text-white rounded-md font-semibold hover:bg-[#151f47] transition"
      >
        Kirim Pesan
      </button>
    </form>

    <!-- Gambar dan Deskripsi -->
    <div class="w-full max-w-xl text-center lg:text-left">
      <p class="text-[16px] text-gray-700 mb-4">
        Ada saran atau pertanyaan tentang website kami? Kirimkan pesan Anda di bawah ini.
      </p>
      <img 
        src="{{ asset('gambarberanda/image.png') }}" 
        alt="Mobil" 
        class="w-full h-auto rounded-lg shadow-md"
      >
    </div>
  </div>
</section>
