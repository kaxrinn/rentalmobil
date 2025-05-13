<section id="Beranda" class="mt-[55px] w-screen relative overflow-hidden" style="height: calc(100vh - 55px);">
  <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative w-full h-full overflow-hidden rounded-none">
      <!-- Slide 1 -->
      <div class="absolute inset-0 transition-all duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('gambarberanda/gambar 1.jpg') }}" class="w-full h-full object-cover" alt="Slide 1">
      </div>
      <!-- Slide 2 -->
      <div class="hidden absolute inset-0 transition-all duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('gambarberanda/gambar 2.jpg') }}" class="w-full h-full object-cover" alt="Slide 2">
      </div>
      <!-- Slide 3 -->
      <div class="hidden absolute inset-0 transition-all duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('gambarberanda/gambar 3.jpg') }}" class="w-full h-full object-cover" alt="Slide 3">
      </div>
    </div>

    <!-- Indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-6 left-1/2">
      <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-label="Slide 2" data-carousel-slide-to="1"></button>
      <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
  </div>
</section>
