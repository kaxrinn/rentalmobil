<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VROOM - Pemesanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .bg-primary {
            background-color: #1e2b5c;
        }
        .hover\:bg-primary-dark:hover {
            background-color: #17214a;
        }
        .text-primary {
            color: #1e2b5c;
        }
        .border-primary {
            border-color: #1e2b5c;
        }
        .bg-primary-50 {
            background-color: #f0f2f7;
        }
    </style>
</head>

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
            <button id="carousel-prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-primary-dark z-10">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="carousel-next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-primary-dark z-10">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Detail Modal -->
    <div id="detail-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-[60] w-full md:inset-0 h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto my-12">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 id="detail-merk" class="text-lg font-semibold text-gray-900"></h3>
                    <button type="button" class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 space-y-3">
                    <div class="w-full h-48 overflow-hidden rounded-lg mb-3 border-2 border-primary flex items-center justify-center bg-gray-100">
                        <img id="detail-image" src="" alt="Mobil" class="max-h-full max-w-full object-contain" />
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <i class="fas fa-exchange-alt text-primary text-sm mr-2"></i>
                            <p id="detail-transmisi" class="text-gray-700 text-sm"></p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-palette text-primary text-sm mr-2"></i>
                            <p id="detail-warna" class="text-gray-700 text-sm"></p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-chair text-primary text-sm mr-2"></i>
                            <p id="detail-kursi" class="text-gray-700 text-sm"></p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-gas-pump text-primary text-sm mr-2"></i>
                            <p id="detail-mesin" class="text-gray-700 text-sm"></p>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <p id="detail-harga" class="text-lg font-semibold text-primary text-center"></p>
                    </div>
                </div>
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b">
                    <button id="btn-sewa" type="button" class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center">
                        <i class="fas fa-shopping-cart mr-1"></i> Sewa Sekarang
                    </button>
                    <button type="button" class="close-modal ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-xs font-medium px-4 py-2 hover:text-gray-900 focus:z-10">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Modal Step 1: Booking Form -->
    <div id="pemesanan-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-[70] w-full md:inset-0 h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto my-12">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">Formulir Pemesanan</h3>
                    <button type="button" class="close-pemesanan-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="pemesanan-form" class="p-4">
                    <input type="hidden" name="kode_mobil" id="pemesanan-kode-mobil" />
                    <input type="hidden" name="harga_harian" id="harga-harian" />
                    
                    <div class="bg-primary-50 p-3 rounded-lg mb-3">
                        <h3 class="font-bold text-primary text-sm mb-1">Mobil</h3>
                        <p id="pemesanan-mobil-detail" class="text-gray-700 text-sm"></p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                        <div>
                            <label for="pickup_date" class="block mb-1 text-sm font-medium text-gray-900">Tanggal Pengambilan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-calendar-alt text-primary text-sm"></i>
                                </div>
                                <input type="date" id="pickup_date" name="pickup_date" required 
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full ps-10 p-2" 
                                       min="{{ date('Y-m-d') }}" />
                            </div>
                        </div>
                        <div>
                            <label for="return_date" class="block mb-1 text-sm font-medium text-gray-900">Tanggal Pengembalian</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fas fa-calendar-alt text-primary text-sm"></i>
                                </div>
                                <input type="date" id="return_date" name="return_date" required 
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full ps-10 p-2" 
                                       min="{{ date('Y-m-d') }}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-primary-50 p-3 rounded-lg mb-3">
                        <h3 class="font-bold text-primary text-sm mb-1">Alamat Pengambilan</h3>
                        <input
                            type="text"
                            name="alamat_pengambilan"
                            id="alamat_pengambilan"
                            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2"
                            value="Tiban Indah Permai Blok Z1"
                            readonly
                            required
                        />
                    </div>
                    
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" class="close-pemesanan-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-xs font-medium px-3 py-1.5 hover:text-gray-900 focus:z-10">
                            Batal
                        </button>
                        <button type="button" id="btn-proceed-payment" class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center">
                            Lanjut ke Pembayaran <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Payment Modal Step 2: Payment Form -->
    <div id="pembayaran-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[9999] justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto my-12">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">Pembayaran</h3>
                    <button type="button" class="close-pembayaran-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <i class="fas fa-times"></i>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="pembayaran-form" enctype="multipart/form-data" class="p-4">
                    <input type="hidden" name="kode_mobil" id="payment-kode-mobil" />
                    <input type="hidden" name="pickup_date" id="payment-pickup-date" />
                    <input type="hidden" name="return_date" id="payment-return-date" />
                    <input type="hidden" name="harga_harian" id="payment-harga-harian" />
                    <input type="hidden" name="alamat_pengambilan" id="payment-alamat-pengambilan" />
                    <input type="hidden" name="total_harga" id="total-harga-hidden" />
                    
                    <div class="bg-primary-50 p-3 rounded-lg mb-3">
                        <h3 class="font-bold text-primary text-sm mb-1">Detail Pemesanan</h3>
                        <p id="payment-mobil-detail" class="text-gray-700 text-sm mb-1"></p>
                        <p id="payment-period" class="text-gray-700 text-sm"></p>
                        <p id="payment-total" class="font-bold text-primary text-sm mt-1"></p>
                    </div>
                    
                    <div class="bg-primary-50 p-3 rounded-lg mb-3">
                        <h3 class="font-bold text-primary text-sm mb-1">Alamat Pengambilan</h3>
                        <p id="payment-alamat-display" class="text-gray-700 text-sm"></p>
                    </div>
                    
                    <div class="bg-primary-50 p-3 rounded-lg mb-3">
                        <h3 class="font-bold text-primary text-sm mb-1">Pembayaran</h3>
                        <div class="space-y-1">
                            <div class="flex justify-between text-sm">
                                <span>Total Pembayaran:</span>
                                <span id="total-pembayaran" class="font-bold">Rp. 0</span>
                            </div>
                            <div class="pt-1">
                                <p class="font-medium text-sm">Nomor Rekening:</p>
                                <p class="text-gray-700 text-sm">3244657545346 (BNI) a/n VROOM</p>
                                <input type="hidden" name="nomor_rekening" value="3244657545346">
                            </div>
                            <div class="mt-2">
                                <label for="payment_proof" class="block mb-1 text-sm font-medium text-gray-900">Upload Bukti Pembayaran</label>
                                <input type="file" id="payment_proof" name="payment_proof" accept=".jpeg,.jpg,.png,.pdf" required 
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" />
                                <p class="mt-1 text-xs text-gray-500">(JPEG, PNG, atau PDF max 2MB)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" class="close-pembayaran-modal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-xs font-medium px-3 py-1.5 hover:text-gray-900 focus:z-10">
                            Kembali
                        </button>
                        <button type="submit" class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center inline-flex items-center">
                            <i class="fas fa-paper-plane mr-1"></i> Sewa Sekarang
                        </button>
                    </div>
                </form>
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
        const pembayaranModal = document.getElementById('pembayaran-modal');
        
        // State variables
        let mobilsData = [];
        let currentSlide = 0;
        let slidesCount = 0;
        const itemsPerSlide = 3;

        // Initialize modals manually to prevent double click issue
        const detailModalInstance = new Modal(detailModal, { backdrop: 'static' });
        const pemesananModalInstance = new Modal(pemesananModal, { backdrop: 'static' });
        const pembayaranModalInstance = new Modal(pembayaranModal, { backdrop: 'static' });

        // Close modal handlers
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                detailModalInstance.hide();
            });
        });
        
        document.querySelectorAll('.close-pemesanan-modal').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                pemesananModalInstance.hide();
            });
        });
        
        document.querySelectorAll('.close-pembayaran-modal').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                pembayaranModalInstance.hide();
                pemesananModalInstance.show();
            });
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
                    productCard.className = 'bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300';
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
                                <button class="btn-sewa bg-primary hover:bg-primary-dark text-white px-3 py-1 rounded text-sm"
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
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const kodeMobil = this.getAttribute('data-id');
                    const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
                    showDetailModal(mobil);
                });
            });
            
            document.querySelectorAll('.btn-sewa').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Redirect to login page when rent button is clicked
                    window.location.href = '{{ route("loginpage") }}';
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
            
            // Set up rent button in detail modal to redirect to login
            document.getElementById('btn-sewa').onclick = (e) => {
                e.preventDefault();
                window.location.href = '{{ route("loginpage") }}';
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
            const form = document.getElementById('pemesanan-form');
            form.reset();
            
            // Set minimum dates
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('pickup_date').min = today;
            document.getElementById('return_date').min = today;
            
            pemesananModalInstance.show();
        }

        // Carousel navigation
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentSlide > 0) {
                currentSlide--;
                updateCarousel();
            }
        });
        
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
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

        // Proceed to payment button
        document.getElementById('btn-proceed-payment').addEventListener('click', function(e) {
            e.preventDefault();
            const pickupDate = document.getElementById('pickup_date').value;
            const returnDate = document.getElementById('return_date').value;
            const alamatPengambilan = document.getElementById('alamat_pengambilan').value;
            
            if (!pickupDate || !returnDate) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap isi tanggal pengambilan dan pengembalian!'
                });
                return;
            }
            
            if (new Date(returnDate) < new Date(pickupDate)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tanggal pengembalian tidak boleh sebelum tanggal pengambilan!'
                });
                return;
            }
            
            // Transfer data to payment modal
            document.getElementById('payment-kode-mobil').value = 
                document.getElementById('pemesanan-kode-mobil').value;
            document.getElementById('payment-harga-harian').value = 
                document.getElementById('harga-harian').value;
            document.getElementById('payment-pickup-date').value = pickupDate;
            document.getElementById('payment-return-date').value = returnDate;
            document.getElementById('payment-alamat-pengambilan').value = alamatPengambilan;
            document.getElementById('payment-alamat-display').textContent = alamatPengambilan;
            
            // Display details in payment modal
            document.getElementById('payment-mobil-detail').textContent = 
                document.getElementById('pemesanan-mobil-detail').textContent;
            
            const days = calculateDays(pickupDate, returnDate);
            document.getElementById('payment-period').textContent = 
                `Periode: ${formatDate(pickupDate)} - ${formatDate(returnDate)} (${days} hari)`;
            
            const totalPrice = days * parseFloat(document.getElementById('harga-harian').value);
            document.getElementById('payment-total').textContent = 
                `Total: Rp${totalPrice.toLocaleString('id-ID')}`;
            document.getElementById('total-pembayaran').textContent = 
                `Rp${totalPrice.toLocaleString('id-ID')}`;
            document.getElementById('total-harga-hidden').value = totalPrice;
            
            // Switch modals
            pemesananModalInstance.hide();
            pembayaranModalInstance.show();
        });

        // Helper function to calculate days
        function calculateDays(start, end) {
            const startDate = new Date(start);
            const endDate = new Date(end);
            const diffTime = Math.abs(endDate - startDate);
            return Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
        }

        // Helper function to format date
        function formatDate(dateString) {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }

        // Handle payment form submission
        const pembayaranForm = document.getElementById('pembayaran-form');
        pembayaranForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            try {
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
                
                const response = await fetch('/pembayaran/proses', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });
                
                const result = await response.json();
                
                if (!response.ok) {
                    throw new Error(result.message || 'Terjadi kesalahan saat memproses pemesanan');
                }
                
                if (result.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: result.message || 'Pemesanan berhasil diproses!'
                    }).then(() => {
                        if (result.redirect) {
                            window.location.href = result.redirect;
                        }
                    });
                } else {
                    throw new Error(result.message || 'Gagal memproses pemesanan');
                }
                
            } catch (error) {
                console.error('Error submitting pembayaran:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: error.message || 'Gagal mengirim pemesanan. Silakan coba lagi.'
                });
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    });
    </script>
</body>
</html>