@extends('layouts.appadmin')

@section('title', 'MobilAdmin')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-4 overflow-auto mt-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold">List Mobil</h3>
    </div>
    <div>
        <button id="tambahMobilBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
              ➕  Tambah Data Mobil
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">NO</th>
                    <th class="px-4 py-2 border">KODE MOBIL</th>
                    <th class="px-4 py-2 border">MEREK</th>
                    <th class="px-4 py-2 border">JENIS</th>
                    <th class="px-4 py-2 border">WARNA</th>
                    <th class="px-4 py-2 border">TRANSMISI</th>
                    <th class="px-4 py-2 border">FOTO</th>
                    <th class="px-4 py-2 border">HARGA HARIAN</th>
                    <th class="px-4 py-2 border">JUMLAH KURSI</th>
                    <th class="px-4 py-2 border">MESIN</th>
                    <th class="px-4 py-2 border">JUMLAH</th>
                    <th class="px-4 py-2 border">TANGGAL DITAMBAHKAN</th>
                    <th class="px-4 py-2 border">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mobils as $index => $mobil)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $mobil->kode_mobil }}</td>
                    <td class="border px-4 py-2">{{ $mobil->merek }}</td>
                    <td class="border px-4 py-2">{{ $mobil->jenis }}</td>
                    <td class="border px-4 py-2">{{ $mobil->warna }}</td>
                    <td class="border px-4 py-2">{{ $mobil->transmisi }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ $mobil->foto_url }}" alt="Mobil" class="w-24 h-16 object-cover mx-auto rounded" 
                             onerror="this.src='https://via.placeholder.com/300x200/cccccc/666666?text=No+Image'" />
                    </td>
                    <td class="border px-4 py-2">Rp. {{ number_format($mobil->harga_harian, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $mobil->jumlah_kursi }}</td>
                    <td class="border px-4 py-2">{{ $mobil->mesin }}</td>
                    <td class="border px-4 py-2 {{ $mobil->jumlah <= 0 ? 'bg-red-100' : '' }}">{{ $mobil->jumlah }}</td>
                    <td class="border px-4 py-2">{{ $mobil->created_at->format('d/m/Y') }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex flex-col items-center gap-1">
                            <button class="edit-mobil-btn bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition-colors w-full" data-kode-mobil="{{ $mobil->kode_mobil }}">
                                Edit
                            </button>
                            <form action="{{ route('mobil.destroy', $mobil->kode_mobil) }}" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors w-full" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Mobil Modal -->
<div id="tambahMobilModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mb-6">
                    <h2 class="text-xl font-bold">Tambah Data Mobil</h2>
                </div>

                <form id="tambahMobilForm" action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="merek" class="block mb-1 text-sm font-medium text-gray-900">Merek</label>
                            <input type="text" id="merek" name="merek" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="jenis" class="block mb-1 text-sm font-medium text-gray-900">Jenis</label>
                            <input type="text" id="jenis" name="jenis" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="warna" class="block mb-1 text-sm font-medium text-gray-900">Warna</label>
                            <input type="text" id="warna" name="warna" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="transmisi" class="block mb-1 text-sm font-medium text-gray-900">Transmisi</label>
                            <select id="transmisi" name="transmisi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required>
                                <option value="">Pilih Transmisi</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>

                        <div>
                            <label for="mesin" class="block mb-1 text-sm font-medium text-gray-900">Mesin</label>
                            <input type="text" id="mesin" name="mesin" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="jumlah_kursi" class="block mb-1 text-sm font-medium text-gray-900">Jumlah Kursi</label>
                            <input type="number" id="jumlah_kursi" name="jumlah_kursi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="harga_harian" class="block mb-1 text-sm font-medium text-gray-900">Harga Harian</label>
                            <input type="number" id="harga_harian" name="harga_harian" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div>
                            <label for="jumlah" class="block mb-1 text-sm font-medium text-gray-900">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                        </div>

                        <div class="col-span-2">
                            <label for="foto" class="block mb-1 text-sm font-medium text-gray-900">Foto Mobil</label>
                            <input type="file" id="foto" name="foto" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" accept="image/*" required />
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (Max 2MB)</p>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" id="closeTambahModalBtn" class="px-4 py-1.5 text-sm rounded-md bg-gray-300 text-gray-700 font-medium hover:bg-gray-400">Tutup</button>
                        <button type="submit" class="px-4 py-1.5 text-sm rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Mobil Modal -->
<div id="editMobilModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-[9998] hidden w-full p-4 overflow-x-hidden overflow-y-auto h-screen bg-black/50">
    <div class="relative w-full max-w-md mx-auto mt-20">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Mobil
                </h3>
                <button type="button" id="closeEditModalBtn" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    &times;
                </button>
            </div>

            <div id="editModalContent" class="p-4">
                <div class="text-center py-8">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
                    <p class="mt-2 text-gray-600">Loading...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Modal Manager Class
class ModalManager {
    constructor(modalId) {
        this.modalElement = document.getElementById(modalId);
        this.isOpen = false;
        this.setupEventListeners();
    }

    show() {
        this.modalElement.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        this.isOpen = true;
    }

    hide() {
        this.modalElement.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        this.isOpen = false;
    }

    setupEventListeners() {
        // Close when clicking outside modal
        window.addEventListener('click', (event) => {
            if (event.target === this.modalElement) {
                this.hide();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && this.isOpen) {
                this.hide();
            }
        });
    }
}

// Mobil Admin Controller Class
class MobilAdminController {
    constructor() {
        this.tambahModal = new ModalManager('tambahMobilModal');
        this.editModal = new ModalManager('editMobilModal');
        this.initEventListeners();
    }

    initEventListeners() {
        // Tambah mobil button
        document.getElementById('tambahMobilBtn').addEventListener('click', () => {
            this.tambahModal.show();
        });

        // Close tambah modal button
        document.getElementById('closeTambahModalBtn').addEventListener('click', () => {
            this.tambahModal.hide();
        });

        // Close edit modal button
        document.getElementById('closeEditModalBtn').addEventListener('click', () => {
            this.editModal.hide();
        });

        // Edit mobil buttons
        document.querySelectorAll('.edit-mobil-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const kodeMobil = btn.getAttribute('data-kode-mobil');
                this.handleEditMobil(kodeMobil);
            });
        });

        // Image preview for tambah form
        document.getElementById('foto')?.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                console.log('Selected file:', file.name, 'Size:', file.size, 'Type:', file.type);
            }
        });
    }

    async handleEditMobil(kodeMobil) {
        try {
            this.editModal.show();
            this.showLoadingState();
            
            const mobilData = await this.fetchMobilData(kodeMobil);
            this.renderEditForm(mobilData);
        } catch (error) {
            console.error('Error handling edit mobil:', error);
            this.showErrorState(error.message);
        }
    }

    async fetchMobilData(kodeMobil) {
        const response = await fetch(`/mobiladmin/${kodeMobil}/edit`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            }
        });

        if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`Server error: ${response.status} - ${response.statusText}`);
        }

        const result = await response.json();
        
        if (!result.success) {
            throw new Error(result.message || 'Failed to load data');
        }

        return result;
    }

    showLoadingState() {
        document.getElementById('editModalContent').innerHTML = `
            <div class="text-center py-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
                <p class="mt-2 text-gray-600">Loading data...</p>
            </div>
        `;
    }

    renderEditForm(result) {
        const mobil = result.data;
        const fotoUrl = result.foto_url || 'https://via.placeholder.com/300x200/cccccc/666666?text=No+Image';

        document.getElementById('editModalContent').innerHTML = `
            <form id="editForm" action="/mobiladmin/${mobil.kode_mobil}" method="POST" enctype="multipart/form-data" class="space-y-3">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="edit_kode_mobil" class="block mb-1 text-sm font-medium text-gray-900">Kode Mobil</label>
                        <input type="text" id="edit_kode_mobil" name="kode_mobil" value="${mobil.kode_mobil || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" readonly />
                    </div>

                    <div>
                        <label for="edit_merek" class="block mb-1 text-sm font-medium text-gray-900">Merek</label>
                        <input type="text" id="edit_merek" name="merek" value="${mobil.merek || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_jenis" class="block mb-1 text-sm font-medium text-gray-900">Jenis</label>
                        <input type="text" id="edit_jenis" name="jenis" value="${mobil.jenis || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_warna" class="block mb-1 text-sm font-medium text-gray-900">Warna</label>
                        <input type="text" id="edit_warna" name="warna" value="${mobil.warna || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_transmisi" class="block mb-1 text-sm font-medium text-gray-900">Transmisi</label>
                        <select id="edit_transmisi" name="transmisi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required>
                            <option value="Manual" ${mobil.transmisi === 'Manual' ? 'selected' : ''}>Manual</option>
                            <option value="Automatic" ${mobil.transmisi === 'Automatic' ? 'selected' : ''}>Automatic</option>
                        </select>
                    </div>

                    <div>
                        <label for="edit_mesin" class="block mb-1 text-sm font-medium text-gray-900">Mesin</label>
                        <input type="text" id="edit_mesin" name="mesin" value="${mobil.mesin || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_jumlah_kursi" class="block mb-1 text-sm font-medium text-gray-900">Jumlah Kursi</label>
                        <input type="number" id="edit_jumlah_kursi" name="jumlah_kursi" value="${mobil.jumlah_kursi || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_harga_harian" class="block mb-1 text-sm font-medium text-gray-900">Harga Harian</label>
                        <input type="number" id="edit_harga_harian" name="harga_harian" value="${mobil.harga_harian || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>

                    <div>
                        <label for="edit_jumlah" class="block mb-1 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="edit_jumlah" name="jumlah" value="${mobil.jumlah || ''}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
                    </div>
                    
                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium text-gray-900">Foto Saat Ini</label>
                            <img id="current_foto" src="${fotoUrl}" alt="mobil" class="w-full h-32 object-contain rounded-md shadow border" 
                                 onerror="this.src='https://via.placeholder.com/300x200/cccccc/666666?text=Image+Error'" />
                        </div>
                        <div>
                            <label for="edit_foto" class="block mb-1 text-sm font-medium text-gray-900">Ganti Foto</label>
                            <input type="file" id="edit_foto" name="foto" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" accept="image/*" />
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (Max 2MB)</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 pt-3 border-t">
                    <button type="button" id="cancelEditBtn" class="px-4 py-1.5 text-sm rounded-md bg-gray-300 text-gray-700 font-medium hover:bg-gray-400">
                        Tutup
                    </button>
                    <button type="submit" class="px-4 py-1.5 text-sm rounded-md bg-yellow-500 text-white font-medium hover:bg-yellow-600">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        `;

        // Add event listener for cancel button
        document.getElementById('cancelEditBtn')?.addEventListener('click', () => {
            this.editModal.hide();
        });
    }

    showErrorState(message) {
        document.getElementById('editModalContent').innerHTML = `
            <div class="text-center py-8">
                <div class="text-red-500 text-4xl mb-4">⚠️</div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Gagal Memuat Data</h3>
                <p class="text-sm text-gray-600 mb-4">${message}</p>
                <button id="closeErrorBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                    Tutup
                </button>
            </div>
        `;

        // Add event listener for close error button
        document.getElementById('closeErrorBtn')?.addEventListener('click', () => {
            this.editModal.hide();
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new MobilAdminController();
});
</script>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
@endsection