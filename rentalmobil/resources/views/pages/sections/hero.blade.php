<!-- SECTION CAROUSEL -->
<section id="Beranda" class="mt-[55px] w-full relative overflow-hidden">
  <div id="default-carousel" class="relative w-full aspect-[41/20]" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative w-full h-full overflow-hidden rounded-none">
      <!-- Slide 1 (aktif) -->
      <div class="absolute inset-0 transition-all duration-700 ease-in-out z-20" data-carousel-item="active">
        <img src="{{ asset('gambarberanda/gambar 1.jpg') }}" class="w-full h-full object-cover object-center" alt="Slide 1">
      </div>
      <!-- Slide 2 -->
      <div class="hidden absolute inset-0 transition-all duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('gambarberanda/gambar 2.jpg') }}" class="w-full h-full object-cover object-center" alt="Slide 2">
      </div>
      <!-- Slide 3 -->
      <div class="hidden absolute inset-0 transition-all duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('gambarberanda/gambar 3.jpg') }}" class="w-full h-full object-cover object-center" alt="Slide 3">
      </div>
    </div>

    <!-- Indicators -->
    <div class="absolute z-30 flex space-x-2 -translate-x-1/2 bottom-4 left-1/2">
      <button type="button" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-gray-300 hover:bg-gray-500 transition" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-gray-300 hover:bg-gray-500 transition" aria-label="Slide 2" data-carousel-slide-to="1"></button>
      <button type="button" class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-gray-300 hover:bg-gray-500 transition" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
  </div>
</section>

<!-- SCRIPT UNTUK CAROUSEL (FLOWBITE) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  </div>
</section>
