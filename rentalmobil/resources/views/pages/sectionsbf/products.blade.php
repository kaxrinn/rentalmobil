<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VROOM - Pemesanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="h-16"></div>

    <section class="max-w-7xl mx-auto p-6" id="Produk">
        <h1 class="text-3xl font-bold mb-8 text-primary text-center">PRODUK</h1>

        <div id="products-carousel" class="relative">
            <div class="relative overflow-hidden rounded-lg bg-white p-10">
                <div id="carousel-items" class="relative flex transition-transform duration-300">
                    <div id="loading-indicator" class="flex justify-center items-center w-full py-12">
                        <svg class="animate-spin h-10 w-10 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <button id="carousel-prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-primary-dark z-10 hidden">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="carousel-next" class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-primary text-white rounded-full p-3 hover:bg-primary-dark z-10 hidden">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div id="no-results" class="hidden text-center text-gray-600 py-12 w-full">
            Tidak ada mobil yang cocok dengan pencarian Anda.
        </div>
    </section>

    <div id="detail-modal" class="hidden fixed top-0 right-0 left-0 z-[60] w-full md:inset-0 h-full bg-gray-900 bg-opacity-50 items-center justify-center">
        <div class="relative p-4 w-full max-w-md h-auto mx-auto">
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
                    <button id="btn-sewa-detail-modal" type="button" class="text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 text-center inline-flex items-center">
                        <i class="fas fa-shopping-cart mr-1"></i> Sewa Sekarang
                    </button>
                    <button type="button" class="close-modal ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-xs font-medium px-4 py-2 hover:text-gray-900 focus:z-10">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="pemesanan-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-[70] w-full md:inset-0 h-full bg-gray-900 bg-opacity-50 items-center justify-center">
        <div class="relative p-4 w-full max-w-md h-auto mx-auto">
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

    <div id="pembayaran-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[9999] justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md h-auto mx-auto">
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
        const noResultsMessage = document.getElementById('no-results');
        const loadingIndicator = document.getElementById('loading-indicator');
        const btnSewaDetailModal = document.getElementById('btn-sewa-detail-modal');

        // State variables
        let mobilsData = [];
        let filteredMobilsData = [];
        let currentSlide = 0;
        let slidesCount = 0;
        const itemsPerSlide = 3;

        // Initialize modals manually to prevent double click issue
        const detailModalInstance = new Modal(detailModal, { backdrop: 'static' });
        const pemesananModalInstance = new Modal(pemesananModal, { backdrop: 'static' });
        const pembayaranModalInstance = new Modal(pembayaranModal, { backdrop: 'static' });

        // --- Helper function to simulate login check ---
        // IMPORTANT: In a real Laravel application, you would replace `return false;` with actual authentication logic.
        // Example for Laravel Blade: `return {{ auth()->check() ? 'true' : 'false' }};`
        function checkLoginStatus() {
            // For demonstration, set to false (not logged in). Change to true to test logged-in flow.
            return false; 
        }

        // --- Close modal handlers ---
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
                pemesananModalInstance.show(); // Go back to the booking form
            });
        });

        // --- Fetch car data from API ---
        fetch('/api/mobils')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mobilsData = data.data || [];
                loadingIndicator.classList.add('hidden'); // Hide loading indicator

                // Get search query from URL
                const urlParams = new URLSearchParams(window.location.search);
                const searchQuery = urlParams.get('bfsearch');

                if (searchQuery) {
                    filterAndRenderCars(searchQuery);
                } else {
                    filteredMobilsData = [...mobilsData]; // If no search, show all cars
                    renderCarousel();
                }
                setupProductButtons(); // Call after rendering the carousel
            })
            .catch(error => {
                console.error('Error fetching car data:', error);
                loadingIndicator.classList.add('hidden'); // Hide loading indicator even on error
                carouselItems.innerHTML = '<p class="text-center text-red-600 py-12 w-full">Gagal memuat data mobil. Silakan coba lagi nanti.</p>';
                noResultsMessage.classList.add('hidden'); // Ensure no-results is hidden on fetch error
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
            });

        // --- Function to filter cars based on search query and render the carousel ---
        function filterAndRenderCars(query) {
            const lowerCaseQuery = query.toLowerCase();
            filteredMobilsData = mobilsData.filter(mobil => 
                mobil.merek.toLowerCase().includes(lowerCaseQuery) ||
                mobil.jenis.toLowerCase().includes(lowerCaseQuery) ||
                mobil.transmisi.toLowerCase().includes(lowerCaseQuery) ||
                mobil.warna.toLowerCase().includes(lowerCaseQuery) ||
                mobil.mesin.toLowerCase().includes(lowerCaseQuery)
            );

            if (!filteredMobilsData.length) {
                carouselItems.innerHTML = ''; // Clear existing items
                carouselContainer.classList.add('hidden'); // Hide carousel
                noResultsMessage.classList.remove('hidden'); // Show no results message
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
            } else {
                noResultsMessage.classList.add('hidden'); // Hide no results message
                carouselContainer.classList.remove('hidden'); // Show carousel
                currentSlide = 0; // Reset to first slide after filtering
                renderCarousel(); // Render with filtered data
            }
            setupProductButtons(); // Re-attach event listeners after re-rendering
        }

        // --- Render carousel with 3 products per slide ---
        function renderCarousel() {
            carouselItems.innerHTML = '';
            slidesCount = Math.ceil(filteredMobilsData.length / itemsPerSlide);
            
            if (filteredMobilsData.length === 0) {
                carouselContainer.classList.add('hidden');
                noResultsMessage.classList.remove('hidden');
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
                return;
            } else {
                carouselContainer.classList.remove('hidden');
                noResultsMessage.classList.add('hidden');
            }

            for (let i = 0; i < slidesCount; i++) {
                const slide = document.createElement('div');
                slide.className = `carousel-item w-full flex-none grid grid-cols-1 md:grid-cols-3 gap-6 px-2 ${i === 0 ? 'block' : 'hidden'}`;
                
                const startIdx = i * itemsPerSlide;
                const endIdx = startIdx + itemsPerSlide;
                const slideProducts = filteredMobilsData.slice(startIdx, endIdx);
                
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
                
                // Add empty cards if less than 3 products in last slide for consistent layout
                while (slide.children.length < itemsPerSlide) {
                    const emptyCard = document.createElement('div');
                    emptyCard.className = 'invisible'; // Use invisible to maintain layout
                    slide.appendChild(emptyCard);
                }
                
                carouselItems.appendChild(slide);
            }
            updateCarouselControls();
        }

        // --- Set up event listeners for product buttons ---
        function setupProductButtons() {
            document.querySelectorAll('.btn-detail').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Detail button now directly shows the modal, no login required
                    const kodeMobil = this.getAttribute('data-id');
                    const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
                    if (mobil) {
                        showDetailModal(mobil);
                    }
                });
            });
            
            document.querySelectorAll('.btn-sewa').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!checkLoginStatus()) {
                        window.location.href = '{{ route("loginpage") }}';
                        return;
                    }
                    // If logged in, proceed with the original "Sewa" flow
                    const kodeMobil = this.getAttribute('data-id');
                    const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
                    if (mobil) {
                        showPemesananModal(mobil); // Call the function to show pemesanan modal
                    }
                });
            });

            // Set up the rent button within the detail modal
            btnSewaDetailModal.addEventListener('click', function(e) {
                e.preventDefault();
                if (!checkLoginStatus()) {
                    window.location.href = '{{ route("loginpage") }}';
                    return;
                }
                // If logged in, proceed to pemesanan modal from detail modal
                const kodeMobil = this.getAttribute('data-mobil-id'); // Get the car ID that was set when detail modal was opened
                const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);
                if (mobil) {
                    detailModalInstance.hide(); // Hide detail modal
                    showPemesananModal(mobil); // Show pemesanan modal
                }
            });
        }

        // --- Show detail modal ---
        function showDetailModal(mobil) {
            document.getElementById('detail-merk').textContent = `${mobil.merek} ${mobil.jenis}`;
            document.getElementById('detail-image').src = mobil.foto_url;
            document.getElementById('detail-transmisi').textContent = mobil.transmisi;
            document.getElementById('detail-warna').textContent = mobil.warna;
            document.getElementById('detail-kursi').textContent = mobil.jumlah_kursi + ' Kursi';
            document.getElementById('detail-mesin').textContent = mobil.mesin;
            document.getElementById('detail-harga').textContent = `Rp${Number(mobil.harga_harian).toLocaleString('id-ID')}/hari`;
            
            // Set the data-mobil-id on the "Sewa Sekarang" button in the detail modal
            // so we know which car to rent when it's clicked.
            btnSewaDetailModal.setAttribute('data-mobil-id', mobil.kode_mobil); 
            
            detailModalInstance.show();
        }

        // --- Show Pemesanan modal (only after successful login) ---
        function showPemesananModal(mobil) {
            document.getElementById('pemesanan-kode-mobil').value = mobil.kode_mobil;
            document.getElementById('harga-harian').value = mobil.harga_harian;
            document.getElementById('pemesanan-mobil-detail').textContent = `${mobil.merek} ${mobil.jenis} - Rp${Number(mobil.harga_harian).toLocaleString('id-ID')}/hari`;
            
            // Set default dates if needed, or ensure they are clear/valid
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('pickup_date').value = today;
            document.getElementById('return_date').value = today; // Default return date to pickup date

            pemesananModalInstance.show();
        }

        // --- Handle Proceed to Payment button in Pemesanan Modal ---
        document.getElementById('btn-proceed-payment').addEventListener('click', function(e) {
            e.preventDefault();
            const pickupDate = document.getElementById('pickup_date').value;
            const returnDate = document.getElementById('return_date').value;
            const kodeMobil = document.getElementById('pemesanan-kode-mobil').value;
            const hargaHarian = parseFloat(document.getElementById('harga-harian').value);
            const alamatPengambilan = document.getElementById('alamat_pengambilan').value;

            if (!pickupDate || !returnDate) {
                Swal.fire('Error', 'Tanggal pengambilan dan pengembalian harus diisi.', 'error');
                return;
            }

            const days = calculateDays(pickupDate, returnDate);
            if (days <= 0 || isNaN(days)) {
                Swal.fire('Error', 'Tanggal pengembalian harus setelah atau sama dengan tanggal pengambilan.', 'error');
                return;
            }

            const totalHarga = days * hargaHarian;
            const mobil = mobilsData.find(m => m.kode_mobil === kodeMobil);

            if (mobil) {
                document.getElementById('payment-kode-mobil').value = kodeMobil;
                document.getElementById('payment-pickup-date').value = pickupDate;
                document.getElementById('payment-return-date').value = returnDate;
                document.getElementById('payment-harga-harian').value = hargaHarian;
                document.getElementById('payment-alamat-pengambilan').value = alamatPengambilan;
                document.getElementById('total-harga-hidden').value = totalHarga;

                document.getElementById('payment-mobil-detail').textContent = `${mobil.merek} ${mobil.jenis}`;
                document.getElementById('payment-period').textContent = `Periode: ${formatDate(pickupDate)} - ${formatDate(returnDate)} (${days} hari)`;
                document.getElementById('payment-total').textContent = `Total: Rp${totalHarga.toLocaleString('id-ID')}`;
                document.getElementById('total-pembayaran').textContent = `Rp${totalHarga.toLocaleString('id-ID')}`;
                document.getElementById('payment-alamat-display').textContent = alamatPengambilan;

                pemesananModalInstance.hide();
                pembayaranModalInstance.show();
            } else {
                Swal.fire('Error', 'Data mobil tidak ditemukan.', 'error');
            }
        });

        // --- Handle Pembayaran Form Submission ---
        document.getElementById('pembayaran-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulate form submission (replace with actual API call)
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            // You would typically send this data to your backend API
            console.log('Payment form submitted:', data);

            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                text: 'Apakah Anda yakin ingin melanjutkan pembayaran ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1e2b5c',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Berhasil!',
                        'Pemesanan Anda telah diterima. Menunggu konfirmasi pembayaran.',
                        'success'
                    ).then(() => {
                        pembayaranModalInstance.hide();
                        // Optionally, redirect to a confirmation page or dashboard
                        // window.location.href = '/some-confirmation-page';
                    });
                }
            });
        });

        // --- Carousel navigation ---
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

        // --- Update carousel position and control visibility ---
        function updateCarousel() {
            const items = document.querySelectorAll('.carousel-item');
            items.forEach((item, index) => {
                item.classList.toggle('hidden', index !== currentSlide);
                item.classList.toggle('block', index === currentSlide);
            });
            updateCarouselControls();
        }

        // --- Function to update carousel controls visibility ---
        function updateCarouselControls() {
            if (slidesCount <= 1) { // If only one slide or less, hide controls
                prevBtn.classList.add('hidden');
                nextBtn.classList.add('hidden');
            } else {
                prevBtn.classList.toggle('hidden', currentSlide === 0);
                nextBtn.classList.toggle('hidden', currentSlide === slidesCount - 1);
            }
        }

        // --- Helper function to calculate days ---
        function calculateDays(start, end) {
            const startDate = new Date(start);
            const endDate = new Date(end);
            const diffTime = Math.abs(endDate - startDate);
            return Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both start and end day
        }

        // --- Helper function to format date ---
        function formatDate(dateString) {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }
    });
    </script>
</body>
</html>