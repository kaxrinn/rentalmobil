<!-- Bagian Ulasan Aplikasi (carousel) -->
<section id="Ulasan" class="py-16 bg-white shadow-lg">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-[#1e2b5c] mb-12 text-center text-slate-700 tracking-wide">ULASAN APLIKASI</h2>

    <!-- Container tombol navigasi -->
    <div class="relative">
      <!-- Tombol kiri -->
      <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white hover:bg-slate-50 text-slate-600 p-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300 disabled:opacity-30">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>

      <!-- Tombol kanan -->
      <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white hover:bg-slate-50 text-slate-600 p-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300 disabled:opacity-30">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>

      <!-- Track ulasan -->
      <div class="overflow-hidden mx-12">
        <div id="ulasan-container" class="flex transition-transform duration-500 ease-in-out gap-6">
          <!-- Ulasan dimuat lewat JavaScript -->
        </div>
      </div>
    </div>

    <!-- Dot indikator -->
    <div id="dots-container" class="flex justify-center mt-8 gap-2">
      <!-- Dot dibuat dari JS -->
    </div>

    <!-- Pesan jika kosong -->
    <p id="ulasan-empty" class="text-center text-slate-500 mt-8 text-lg hidden">Belum ada ulasan.</p>
  </div>
</section>

<style>
  /* Ukuran dan layout kartu ulasan */
  #ulasan-container .review-card {
    min-width: 320px;
    max-width: 320px;
    flex-shrink: 0;
  }

  /* Gaya dot */
  .dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #cbd5e1;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .dot.active {
    background-color: #64748b;
    transform: scale(1.2);
  }
</style>

<script>
// Setelah halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
  let currentSlide = 0;
  let slidesToShow = 3;
  let totalReviews = 0;

  // Atur berapa slide ditampilkan berdasarkan lebar layar
  function updateSlidesToShow() {
    if (window.innerWidth < 768) {
      slidesToShow = 1;
    } else if (window.innerWidth < 1024) {
      slidesToShow = 2;
    } else {
      slidesToShow = 3;
    }
  }

  // Buat dot berdasarkan jumlah ulasan
  function createDots() {
    const dotsContainer = document.getElementById('dots-container');
    const totalSlides = Math.max(0, totalReviews - slidesToShow + 1);

    dotsContainer.innerHTML = '';

    for (let i = 0; i < totalSlides; i++) {
      const dot = document.createElement('div');
      dot.className = `dot ${i === currentSlide ? 'active' : ''}`;
      dot.addEventListener('click', () => goToSlide(i));
      dotsContainer.appendChild(dot);
    }
  }

  // Ubah posisi slider
  function updateSliderPosition() {
    const track = document.getElementById('ulasan-container');
    const translateX = -currentSlide * (320 + 24);
    track.style.transform = `translateX(${translateX}px)`;

    document.querySelectorAll('.dot').forEach((dot, index) => {
      dot.classList.toggle('active', index === currentSlide);
    });
  }

  // Aktifkan/nonaktifkan tombol prev/next
  function updateNavigation() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const maxSlide = Math.max(0, totalReviews - slidesToShow);

    prevBtn.disabled = currentSlide <= 0;
    nextBtn.disabled = currentSlide >= maxSlide;
  }

  // Pindah ke slide tertentu
  function goToSlide(slideIndex) {
    const maxSlide = Math.max(0, totalReviews - slidesToShow);
    currentSlide = Math.max(0, Math.min(slideIndex, maxSlide));
    updateSliderPosition();
    updateNavigation();
  }

  // Tombol next
  document.getElementById('nextBtn').addEventListener('click', () => {
    goToSlide(currentSlide + 1);
  });

  // Tombol prev
  document.getElementById('prevBtn').addEventListener('click', () => {
    goToSlide(currentSlide - 1);
  });

  // Responsif ketika ukuran layar berubah
  window.addEventListener('resize', () => {
    updateSlidesToShow();
    currentSlide = 0;
    updateSliderPosition();
    updateNavigation();
    createDots();
  });

  // Ambil data ulasan dari API
  fetch('/api/ulasan')
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById('ulasan-container');
      const empty = document.getElementById('ulasan-empty');
      container.innerHTML = '';
      totalReviews = data.length;

      if (data.length === 0) {
        empty.classList.remove('hidden');
        return;
      }

      updateSlidesToShow();

      // Tambahkan setiap ulasan ke dalam slider
      data.forEach(review => {
        const date = new Date(review.created_at);
        const card = document.createElement('div');
        card.className = 'review-card bg-[#f4f6ff] rounded-xl shadow-sm p-4';
        card.innerHTML = `
          <div class="flex items-center gap-4 mb-4">
            <div class="text-[40px] font-bold text-slate-700">${date.getDate()}</div>
            <div>
              <div class="text-lg font-semibold text-slate-600">${date.toLocaleString('id-ID', { month: 'long' })} ${date.getFullYear()}</div>
              <div class="text-[#84c2ff] text-lg">
                ${'★'.repeat(review.rating)}
              </div>
            </div>
          </div>
          <p class="text-slate-600 leading-relaxed mb-4">${review.komentar}</p>
          <p class="font-bold text-slate-700">-${review.nama_penyewa}-</p>
        `;
        container.appendChild(card);
      });

      createDots();
      updateNavigation();
    })
    .catch(error => {
      console.error('Gagal memuat ulasan:', error);
    });
});
</script>
