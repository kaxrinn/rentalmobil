

<section id="Produk" class="py-12 px-6 text-center bg-[#F9FAFF]">
  <h2 class="text-[28px] text-[#1e2b5c] font-bold mb-8">PRODUK</h2>

  <div class="relative max-w-[1300px] mx-auto">
    <div id="products-carousel" class="relative w-full" data-carousel="static">
      <div class="relative h-[420px] overflow-hidden rounded-lg">
      @for($i = 0; $i < ceil(12 / 4); $i++) {{-- ubah dari 8 ke 12 karena nambah 4 mobil --}}
<div class="hidden duration-700 ease-in-out" data-carousel-item{{ $i === 0 ? '="active"' : '' }}>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4">
    @for($j = 0; $j < 4; $j++)
      @php
        $index = $i * 4 + $j;
      @endphp
      @if($index < 12) {{-- ubah dari 8 ke 12 --}}
      <div class="border border-gray-300 rounded-[10px] p-4 bg-white shadow-md">
        <img src="{{ asset('gambarproduk/mobil ' . ($index % 6 + 1) . '.jpg') }}" alt="Mobil {{ $index + 1 }}" class="w-full h-[150px] object-cover mb-3 rounded">
        <h3 class="text-[18px] font-semibold mb-2">
          @switch($index)
            @case(0) Toyota Raize @break
            @case(1) Honda Brio @break
            @case(2) Suzuki Ertiga @break
            @case(3) Daihatsu Xenia @break
            @case(4) Mitsubishi Xpander @break
            @case(5) Nissan Livina @break
            @case(6) Wuling Almaz @break
            @case(7) Toyota Avanza @break
            @case(8) Honda Mobilio @break
            @case(9) Kia Sonet @break
            @case(10) Hyundai Stargazer @break
            @case(11) Mazda CX-3 @break
          @endswitch
        </h3>
        <p class="text-[16px] text-gray-600 mb-3">
          @switch($index)
            @case(0) Rp. 250.000.000 @break
            @case(1) Rp. 180.000.000 @break
            @case(2) Rp. 230.000.000 @break
            @case(3) Rp. 220.000.000 @break
            @case(4) Rp. 275.000.000 @break
            @case(5) Rp. 265.000.000 @break
            @case(6) Rp. 300.000.000 @break
            @case(7) Rp. 240.000.000 @break
            @case(8) Rp. 225.000.000 @break
            @case(9) Rp. 260.000.000 @break
            @case(10) Rp. 285.000.000 @break
            @case(11) Rp. 310.000.000 @break
          @endswitch
        </p>
        <div class="flex justify-center space-x-2">
          <a href="#" class="px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Detail</a>
          <a href="#" class="px-4 py-2 bg-[#1e2b5c] text-white rounded text-sm">Sewa</a>
        </div>
      </div>
      @endif
    @endfor
  </div>
</div>
@endfor

      </div>

      <!-- Tombol next/prev -->
      <button type="button" class="absolute top-1/2 left-0 z-50 -translate-y-1/2 bg-[#1e2b5c] text-white p-3 rounded-full shadow-md hover:bg-[#152049]" data-carousel-prev>
        <span>&lt;</span>
      </button>
      <button type="button" class="absolute top-1/2 right-0 z-50 -translate-y-1/2 bg-[#1e2b5c] text-white p-3 rounded-full shadow-md hover:bg-[#152049]" data-carousel-next>
        <span>&gt;</span>
      </button>
    </div>
  </div>
</section>
