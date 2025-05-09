<section class="py-[50px] px-[20px] bg-white text-center shadow-md mb-6" id="Ulasan">
  <h2 class="text-[28px] text-[#1e2b5c] mb-[40px] font-bold">ULASAN APLIKASI</h2>

  <div class="relative max-w-[1200px] mx-auto overflow-hidden">
    <div id="reviews-carousel" class="relative" data-carousel="static">
      <div class="relative h-[250px] overflow-hidden rounded-lg">
        @php
          $reviews = [
            ['tgl' => '15', 'bulan' => 'Juni', 'tahun' => '2025', 'nama' => 'Kim Mingyu', 'review' => 'Mobilnya bersih dan nyaman. Sangat cocok untuk perjalanan jauh.'],
            ['tgl' => '10', 'bulan' => 'Mei', 'tahun' => '2025', 'nama' => 'Jeon Wonwoo', 'review' => 'Proses pemesanan sangat mudah, dan customer service-nya cepat tanggap.'],
            ['tgl' => '05', 'bulan' => 'Mei', 'tahun' => '2025', 'nama' => 'Choi Seungcheol', 'review' => 'Pengalaman sewa sangat memuaskan. Mobil tepat waktu diantar.'],
            ['tgl' => '28', 'bulan' => 'April', 'tahun' => '2025', 'nama' => 'Lee Jihoon', 'review' => 'Harga terjangkau dan kondisi mobil prima.'],
            ['tgl' => '20', 'bulan' => 'April', 'tahun' => '2025', 'nama' => 'Xu Minghao', 'review' => 'Aplikasi user-friendly, sangat mudah digunakan oleh pemula.'],
            ['tgl' => '12', 'bulan' => 'April', 'tahun' => '2025', 'nama' => 'Yoon Jeonghan', 'review' => 'Admin responsif dan ramah. Akan sewa lagi bulan depan.'],
          ];
        @endphp

        @for($i = 0; $i < ceil(count($reviews) / 3); $i++)
        <div class="hidden duration-700 ease-in-out" data-carousel-item{{ $i === 0 ? '="active"' : '' }}>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4">
            @for($j = 0; $j < 3; $j++)
              @php $index = $i * 3 + $j; @endphp
              @if($index < count($reviews))
              <div class="bg-[#f9faff] rounded-lg p-4 text-center shadow">
                <div class="flex justify-center mb-2">
                  <span class="text-[32px] font-bold mr-2">{{ $reviews[$index]['tgl'] }}</span>
                  <div><div>{{ $reviews[$index]['bulan'] }}</div><div>{{ $reviews[$index]['tahun'] }}</div></div>
                </div>
                <div class="text-[#007BFF] mb-2 text-xl">★★★★★</div>
                <p class="text-sm text-gray-700">{{ $reviews[$index]['review'] }}</p>
                <span class="block mt-3 font-semibold">-{{ $reviews[$index]['nama'] }}-</span>
              </div>
              @endif
            @endfor
          </div>
        </div>
        @endfor
      </div>

      <!-- Tombol navigasi -->
      <button type="button" class="absolute top-1/2 left-0 z-30 -translate-y-1/2 bg-[#1e2b5c] text-white p-3 rounded-full shadow-md hover:bg-[#152049]" data-carousel-prev>
        <span>&lt;</span>
      </button>
      <button type="button" class="absolute top-1/2 right-0 z-30 -translate-y-1/2 bg-[#1e2b5c] text-white p-3 rounded-full shadow-md hover:bg-[#152049]" data-carousel-next>
        <span>&gt;</span>
      </button>

      <!-- Slider indicator -->
      <div class="flex justify-center mt-6 space-x-2">
        @for($i = 0; $i < ceil(count($reviews)/3); $i++)
        <button type="button" class="w-3 h-3 rounded-full {{ $i === 0 ? 'bg-[#1e2b5c]' : 'bg-gray-300' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1 }}" data-carousel-slide-to="{{ $i }}"></button>
        @endfor
      </div>
    </div>
  </div>
</section>
