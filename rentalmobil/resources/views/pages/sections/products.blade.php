  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .modal-overlay {
      z-index: 1000;
    }
    .modal-content {
      z-index: 1001;
      max-height: 90vh;
      overflow-y: auto;
    }
    .carousel-item {
      transition: transform 0.5s ease;
    }
    .product-card {
      transition: all 0.3s ease;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .bg-primary {
      background-color: #1e2b5c;
    }
    .text-primary {
      color: #1e2b5c;
    }
    .border-primary {
      border-color: #1e2b5c;
    }
    .form-section {
      padding: 1rem;
      margin-bottom: 1rem;
      border-radius: 0.5rem;
    }
  </style>

<body class="bg-gray-100">



<!-- Spacer for fixed navbar -->
<div class="h-16"></div>

<section class="max-w-7xl mx-auto p-6">
  <h1 class="text-3xl font-bold mb-8 text-primary text-center">PRODUK</h1>

  <div id="products-carousel" class="relative">
    <div class="relative overflow-hidden rounded-lg bg-white shadow-lg p-4">
      <div id="carousel-items" class="relative flex transition-transform duration-300">
        <!-- Loading indicator -->
        <div class="flex justify-center items-center w-full py-12">
          <svg class="animate-spin h-10 w-10 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <button id="carousel-prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-blue-950 z-10">
      <i class="fas fa-chevron-left"></i>
    </button>
    <button id="carousel-next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-blue-950 z-10">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>
</section>

<!-- Detail Modal -->
<div id="detail-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 overflow-y-auto modal-overlay">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full modal-content">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-2xl leading-6 font-bold text-primary" id="detail-merk"></h3>
              <button type="button" class="close-modal text-gray-400 hover:text-gray-500">
                <span class="sr-only">Close</span>
                <i class="fas fa-times"></i>
              </button>
            </div>
            
            <div class="mt-2">
              <img id="detail-image" src="" alt="Mobil" class="w-full h-48 object-cover rounded-lg mb-4 border-2 border-primary" />
              
              <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center">
                  <i class="fas fa-exchange-alt text-primary mr-2"></i>
                  <p id="detail-transmisi" class="text-gray-700"></p>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-palette text-primary mr-2"></i>
                  <p id="detail-warna" class="text-gray-700"></p>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-chair text-primary mr-2"></i>
                  <p id="detail-kursi" class="text-gray-700"></p>
                </div>
                <div class="flex items-center">
                  <i class="fas fa-gas-pump text-primary mr-2"></i>
                  <p id="detail-mesin" class="text-gray-700"></p>
                </div>
              </div>
              
              <div class="mt-4">
                <p id="detail-harga" class="text-xl font-semibold text-primary"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button id="btn-sewa" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-blue-950 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
          <i class="fas fa-shopping-cart mr-2"></i> Sewa Sekarang
        </button>
        <button type="button" class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Order Modal -->
<div id="pemesanan-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 overflow-y-auto modal-overlay">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full modal-content">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
            <div class="flex justify-between items-center mb-4">
              <h3 class="text-2xl leading-6 font-bold text-primary">Formulir Pemesanan</h3>
              <button type="button" class="close-pemesanan-modal text-gray-400 hover:text-gray-500">
                <span class="sr-only">Close</span>
                <i class="fas fa-times"></i>
              </button>
            </div>
            
            <form id="pemesanan-form" enctype="multipart/form-data" class="space-y-4">
              <input type="hidden" name="kode_mobil" id="pemesanan-kode-mobil" />
              <input type="hidden" name="harga_harian" id="harga-harian" />
              
              <div class="form-section bg-blue-50">
                <h3 class="font-bold text-primary mb-2">Mobil</h3>
                <p id="pemesanan-mobil-detail" class="text-gray-700"></p>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label for="pickup_date" class="block mb-1 font-medium">Tanggal Pengambilan</label>
                  <div class="relative">
                    <input type="date" id="pickup_date" name="pickup_date" required 
                           class="w-full border border-gray-300 rounded px-3 py-2 pl-10" />
                    <i class="fas fa-calendar-alt absolute left-3 top-3 text-primary"></i>
                  </div>
                </div>
                <div>
                  <label for="return_date" class="block mb-1 font-medium">Tanggal Pengembalian</label>
                  <div class="relative">
                    <input type="date" id="return_date" name="return_date" required 
                           class="w-full border border-gray-300 rounded px-3 py-2 pl-10" />
                    <i class="fas fa-calendar-alt absolute left-3 top-3 text-primary"></i>
                  </div>
                </div>
              </div>
              
              <div class="form-section bg-blue-50">
                <h3 class="font-bold text-primary mb-2">Data Pribadi</h3>
                <div class="space-y-4">
                  <div>
                    <label for="nama" class="block mb-1 font-medium">Nama Lengkap</label>
                    <div class="relative">
                      <input type="text" id="nama" name="nama" required 
                             class="w-full border border-gray-300 rounded px-3 py-2 pl-10" 
                             placeholder="Masukkan nama lengkap Anda" />
                      <i class="fas fa-user absolute left-3 top-3 text-primary"></i>
                    </div>
                  </div>
                  <div>
                    <label for="email" class="block mb-1 font-medium">Email</label>
                    <div class="relative">
                      <input type="email" id="email" name="email" required 
                             class="w-full border border-gray-300 rounded px-3 py-2 pl-10" 
                             placeholder="Masukkan alamat email akun Anda" />
                      <i class="fas fa-envelope absolute left-3 top-3 text-primary"></i>
                    </div>
                  </div>
                  <div>
                    <label for="phone" class="block mb-1 font-medium">Nomor Handphone</label>
                    <div class="relative">
                      <input type="text" id="phone" name="phone" required 
                             class="w-full border border-gray-300 rounded px-3 py-2 pl-10" 
                             placeholder="Masukkan nomor telepon Anda" />
                      <i class="fas fa-phone absolute left-3 top-3 text-primary"></i>
                    </div>
                  </div>
                  <div>
                    <label for="address" class="block mb-1 font-medium">Alamat</label>
                    <div class="relative">
                      <textarea id="address" name="address" required 
                                class="w-full border border-gray-300 rounded px-3 py-2 pl-10" 
                                placeholder="Masukkan alamat Anda"></textarea>
                      <i class="fas fa-map-marker-alt absolute left-3 top-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-section bg-blue-50">
                <h3 class="font-bold text-primary mb-2">Upload Dokumen</h3>
                <div class="space-y-4">
                  <div>
                    <label for="ktp" class="block mb-1 font-medium">Foto KTP</label>
                    <div class="relative">
                      <input type="file" id="ktp" name="ktp" accept=".jpeg,.jpg,.png,.pdf" required 
                             class="w-full border border-gray-300 rounded px-3 py-2" />
                      <p class="text-sm text-gray-500 mt-1">Unggah foto KTP Anda (JPEG, PNG, atau PDF)</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="form-section bg-blue-50">
                <h3 class="font-bold text-primary mb-2">Alamat Pengambilan</h3>
                <p class="text-gray-700">Tiban Indah Permai Blok Z1</p>
                <input type="hidden" name="alamat_pengambilan" value="Tiban Indah Permai Blok Z1">
              </div>
              
              <div class="form-section bg-blue-50">
                <h3 class="font-bold text-primary mb-2">Pembayaran</h3>
                <div class="space-y-2">
                  <div class="flex justify-between">
                    <span>Total Pembayaran:</span>
                    <span id="total-pembayaran" class="font-bold">Rp. 0</span>
                  </div>
                  <div class="pt-2">
                    <p class="font-medium">Nomor Rekening:</p>
                    <p class="text-gray-700">3244657545346 (BNI) a/n VROOM</p>
                    <input type="hidden" name="nomor_rekening" value="3244657545346">
                    <input type="hidden" name="nama_rekening" value="VROOM">
                  </div>
                  <div>
                    <label for="payment_proof" class="block mb-1 font-medium mt-2">Upload Bukti Pembayaran</label>
                    <input type="file" id="payment_proof" name="payment_proof" accept=".jpeg,.jpg,.png,.pdf" required 
                           class="w-full border border-gray-300 rounded px-3 py-2" />
                    <p class="text-sm text-gray-500 mt-1">(JPEG, PNG, atau PDF max 2MB)</p>
                  </div>
                </div>
              </div>
              
              <div class="flex justify-end space-x-3">
                <button type="button" class="close-pemesanan-modal bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                  Batal
                </button>
                <button type="submit" class="bg-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
                  <i class="fas fa-paper-plane mr-2"></i> Pesan Sekarang
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Flowbite JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // DOM Elements
  const carouselContainer = document.getElementById('products-carousel');
  const carouselItems = document.getElementById('carousel-items');
  const prevBtn = document.getElementById('carousel-prev');
  const nextBtn = document.getElementById('carousel-next');
  const detailModal = document.getElementById('detail-modal');
  const pemesananModal = document.getElementById('pemesanan-modal');
  const pemesananForm = document.getElementById('pemesanan-form');
  
  // State variables
  let mobilsData = [];
  let currentSlide = 0;
  let slidesCount = 0;
  const itemsPerSlide = 3; // Show 3 products per slide

  // Initialize modals
  const detailModalInstance = new Modal(detailModal);
  const pemesananModalInstance = new Modal(pemesananModal);

  // Close modal handlers
  document.querySelectorAll('.close-modal').forEach(btn => {
    btn.addEventListener('click', () => detailModalInstance.hide());
  });
  
  document.querySelectorAll('.close-pemesanan-modal').forEach(btn => {
    btn.addEventListener('click', () => pemesananModalInstance.hide());
  });

  // Fetch car data from API
  fetch('/api/mobils')
    .then(response => response.json())
    .then(data => {
      mobilsData = data.data || [];
      
      if (!mobilsData.length) {
        carouselItems.innerHTML = '<p class="text-center text-gray-600 py-12 w-full">Tidak ada mobil tersedia saat ini.</p>';
        return;
      }
      
      renderCarousel();
    })
    .catch(error => {
      console.error('Error fetching car data:', error);
      carouselItems.innerHTML = '<p class="text-center text-red-600 py-12 w-full">Gagal memuat data mobil.</p>';
    });

  // Render carousel with 3 products per slide
  function renderCarousel() {
    carouselItems.innerHTML = '';
    slidesCount = Math.ceil(mobilsData.length / itemsPerSlide);
    
    for (let i = 0; i < slidesCount; i++) {
      const slide = document.createElement('div');
      slide.className = `carousel-item w-full flex-none grid grid-cols-1 md:grid-cols-3 gap-6 px-2 ${i === 0 ? 'block' : 'hidden'}`;
      
      const startIdx = i * itemsPerSlide;
      const endIdx = startIdx + itemsPerSlide;
      const slideProducts = mobilsData.slice(startIdx, endIdx);
      
      slideProducts.forEach(mobil => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card bg-white rounded-lg shadow-md overflow-hidden border border-gray-200';
        productCard.innerHTML = `
          <img src="${mobil.foto_url}" alt="${mobil.merek} ${mobil.jenis}" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="text-xl font-bold text-primary">${mobil.merek} ${mobil.jenis}</h3>
            <p class="text-lg font-semibold text-primary mt-2">Rp${Number(mobil.harga_harian).toLocaleString('id-ID')}/hari</p>
            <div class="mt-4 flex justify-between">
              <button class="btn-detail bg-blue-100 hover:bg-blue-200 text-primary px-3 py-1 rounded text-sm"
                      data-id="${mobil.kode_mobil}">
                <i class="fas fa-info-circle mr-1"></i> Detail
              </button>
              <button class="btn-sewa bg-primary hover:bg-blue-700 text-white px-3 py-1 rounded text-sm"
                      data-id="${mobil.kode_mobil}">
                <i class="fas fa-shopping-cart mr-1"></i> Sewa
              </button>
            </div>
          </div>
        `;
        slide.appendChild(productCard);
      });
      
      // Add empty cards if less than 3 products in last slide
      while (slide.children.length < itemsPerSlide) {
        const emptyCard = document.createElement('div');
        emptyCard.className = 'invisible';
        slide.appendChild(emptyCard);
      }
      
      carouselItems.appendChild(slide);
    }
    
    // Set up event listeners for detail and rent buttons
    setupProductButtons();
  }

  // Set up event listeners for product buttons
  function setupProductButtons() {
    document.querySelectorAll('.btn-detail').forEach(btn => {
      btn.addEventListener('click', function() {
        const kodeMobil = this.getAttribute('data-id');
        const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
        showDetailModal(mobil);
      });
    });
    
    document.querySelectorAll('.btn-sewa').forEach(btn => {
      btn.addEventListener('click', function() {
        const kodeMobil = this.getAttribute('data-id');
        const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
        showPemesananModal(mobil);
      });
    });
  }

  // Show detail modal
  function showDetailModal(mobil) {
    document.getElementById('detail-merk').textContent = `${mobil.merek} ${mobil.jenis}`;
    document.getElementById('detail-image').src = mobil.foto_url;
    document.getElementById('detail-transmisi').textContent = mobil.transmisi;
    document.getElementById('detail-warna').textContent = mobil.warna;
    document.getElementById('detail-kursi').textContent = mobil.jumlah_kursi + ' Kursi';
    document.getElementById('detail-mesin').textContent = mobil.mesin;
    document.getElementById('detail-harga').textContent = `Rp${Number(mobil.harga_harian).toLocaleString('id-ID')}/hari`;
    
    // Set up rent button in detail modal
    document.getElementById('btn-sewa').onclick = () => {
      detailModalInstance.hide();
      showPemesananModal(mobil);
    };
    
    detailModalInstance.show();
  }

  // Show order modal
  function showPemesananModal(mobil) {
    document.getElementById('pemesanan-kode-mobil').value = mobil.kode_mobil;
    document.getElementById('harga-harian').value = mobil.harga_harian;
    document.getElementById('pemesanan-mobil-detail').textContent = 
      `${mobil.merek} ${mobil.jenis} - Rp${Number(mobil.harga_harian).toLocaleString('id-ID')}/hari`;
    
    // Reset form
    pemesananForm.reset();
    document.getElementById('total-pembayaran').textContent = 'Rp. 0';
    
    pemesananModalInstance.show();
  }

  // Carousel navigation
  prevBtn.addEventListener('click', () => {
    if (currentSlide > 0) {
      currentSlide--;
      updateCarousel();
    }
  });
  
  nextBtn.addEventListener('click', () => {
    if (currentSlide < slidesCount - 1) {
      currentSlide++;
      updateCarousel();
    }
  });

  // Update carousel position
  function updateCarousel() {
    const items = document.querySelectorAll('.carousel-item');
    items.forEach((item, index) => {
      item.classList.toggle('hidden', index !== currentSlide);
      item.classList.toggle('block', index === currentSlide);
    });
  }

  // Calculate total payment when dates change
  document.getElementById('pickup_date').addEventListener('change', calculateTotal);
  document.getElementById('return_date').addEventListener('change', calculateTotal);
  
  function calculateTotal() {
    const pickupDate = new Date(document.getElementById('pickup_date').value);
    const returnDate = new Date(document.getElementById('return_date').value);
    const dailyPrice = parseFloat(document.getElementById('harga-harian').value) || 0;
    
    if (!isNaN(pickupDate.getTime()) && !isNaN(returnDate.getTime())) {
      const diffTime = Math.abs(returnDate - pickupDate);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
      const total = diffDays * dailyPrice;
      document.getElementById('total-pembayaran').textContent = 'Rp' + total.toLocaleString('id-ID');
    }
  }

  // Handle form submission
pemesananForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    
    try {
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
        
        const response = await fetch('/pemesanan', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json' // Tambahkan header Accept untuk response JSON
            }
        });
        
        const result = await response.json();
        
        if (!response.ok) {
            throw new Error(result.message || 'Terjadi kesalahan saat memproses pesanan');
        }
        
        // Jika response memiliki redirect, arahkan ke halaman riwayat
        if (result.redirect) {
            window.location.href = result.redirect;
        } else {
            // Fallback jika tidak ada redirect
            alert('Pemesanan berhasil dikirim!');
            pemesananModalInstance.hide();
        }
        
    } catch (error) {
        console.error('Error submitting pemesanan:', error);
        alert(error.message || 'Gagal mengirim pemesanan. Silakan coba lagi.');
    } finally {
        // Reset button state
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
});
});
</script>
