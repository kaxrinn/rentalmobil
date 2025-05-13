@extends('layouts.appadmin')

@section('title', 'MobilAdmin')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-4 overflow-auto mt-4">
  <div class="flex justify-between items-center mb-4">
    <h3 class="text-xl font-semibold">List Mobil</h3>
  </div>
    <div>
        <button onclick="openTambahMobilModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
      ➕ Tambah Data Mobil
    </button>
    </div>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 text-sm text-center">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 border">NO</th>
          <th class="px-4 py-2 border">KODE PRODUK</th>
          <th class="px-4 py-2 border">MEREK</th>
          <th class="px-4 py-2 border">JENIS</th>
          <th class="px-4 py-2 border">WARNA</th>
          <th class="px-4 py-2 border">FOTO</th>
          <th class="px-4 py-2 border">HARGA HARIAN</th>
          <th class="px-4 py-2 border">JUMLAH KURSI</th>
          <th class="px-4 py-2 border">MESIN</th>
          <th class="px-4 py-2 border">JUMLAH</th>
          <th class="px-4 py-2 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border px-4 py-2">1</td>
          <td class="border px-4 py-2">CR00123</td>
          <td class="border px-4 py-2">Toyota</td>
          <td class="border px-4 py-2">SUV Rush</td>
          <td class="border px-4 py-2">Hitam</td>
          <td class="border px-4 py-2">
            <img src="{{ asset('images/mobil 2.png') }}" alt="Mobil" class="w-24 mx-auto" />
          </td>
          <td class="border px-4 py-2">Rp. 300.000</td>
          <td class="border px-4 py-2">8</td>
          <td class="border px-4 py-2">1.500 Cc</td>
          <td class="border px-4 py-2">5</td>
          <td class="border px-4 py-2">
            <div class="flex flex-col items-center gap-1">
              <button data-modal-target="editMobilModal" data-modal-toggle="editMobilModal" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</button>
              <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Tambah Mobil Modal -->
<div id="tambahMobilModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <!-- Modal content -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-6">
          <h2 class="text-xl font-bold">Tambah Data Mobil</h2>
        </div>

        <form class="space-y-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
             <!-- Kode Produk -->
             <div>
              <label for="kode" class="block mb-1 text-sm font-medium text-gray-900">Kode Produk</label>
              <input type="text" id="kode" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Merek -->
            <div>
              <label for="merek" class="block mb-1 text-sm font-medium text-gray-900">Merek</label>
              <input type="text" id="merek" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Jenis -->
            <div>
              <label for="jenis" class="block mb-1 text-sm font-medium text-gray-900">Jenis</label>
              <input type="text" id="jenis" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Warna -->
            <div>
              <label for="warna" class="block mb-1 text-sm font-medium text-gray-900">Warna</label>
              <input type="text" id="warna" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Mesin -->
            <div>
              <label for="mesin" class="block mb-1 text-sm font-medium text-gray-900">Mesin</label>
              <input type="text" id="mesin" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Jumlah Kursi -->
            <div>
              <label for="kursi" class="block mb-1 text-sm font-medium text-gray-900">Jumlah Kursi</label>
              <input type="number" id="kursi" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Harga -->
            <div>
              <label for="harga" class="block mb-1 text-sm font-medium text-gray-900">Harga Harian</label>
              <input type="number" id="harga" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Jumlah -->
            <div>
              <label for="jumlah" class="block mb-1 text-sm font-medium text-gray-900">Jumlah</label>
              <input type="number" id="jumlah" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
            </div>

            <!-- Foto -->
            <div class="col-span-2">
              <label for="foto" class="block mb-1 text-sm font-medium text-gray-900">Foto Mobil</label>
              <input type="file" id="foto" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" accept="image/*" required />
              <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (Max 2MB)</p>
            </div>
          </div>

          <!-- Tombol Aksi -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="closeTambahMobilModal()" class="px-4 py-1.5 text-sm rounded-md bg-gray-300 text-gray-700 font-medium hover:bg-gray-400">Tutup</button>
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
      <!-- Header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-900">
          Edit Data Mobil
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="editMobilModal">
          &times;
        </button>
      </div>

      <!-- Form -->
      <form class="p-4 space-y-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label for="edit_kode" class="block mb-1 text-sm font-medium text-gray-900">Kode Produk</label>
            <input type="text" id="edit_kode" value="CR00123" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_merek" class="block mb-1 text-sm font-medium text-gray-900">Merek</label>
            <input type="text" id="edit_merek" value="Toyota" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_jenis" class="block mb-1 text-sm font-medium text-gray-900">Jenis</label>
            <input type="text" id="edit_jenis" value="SUV Rush" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_warna" class="block mb-1 text-sm font-medium text-gray-900">Warna</label>
            <input type="text" id="edit_warna" value="Hitam" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_mesin" class="block mb-1 text-sm font-medium text-gray-900">Mesin</label>
            <input type="text" id="edit_mesin" value="1500cc" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_kursi" class="block mb-1 text-sm font-medium text-gray-900">Jumlah Kursi</label>
            <input type="number" id="edit_kursi" value="8" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_harga" class="block mb-1 text-sm font-medium text-gray-900">Harga Harian</label>
            <input type="number" id="edit_harga" value="300000" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>

          <div>
            <label for="edit_jumlah" class="block mb-1 text-sm font-medium text-gray-900">Jumlah</label>
            <input type="number" id="edit_jumlah" value="5" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" required />
          </div>
           

          <!-- Bukti KTP dan Pembayaran -->
          <div class="col-span-2 grid grid-cols-2 gap-4">
              <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Foto Saat Ini</label>
                <img src="{{ asset('gambarproduk/mobil 2.jpg') }}" alt="mobil" class="w-full h-auto max-h-40 object-contain rounded-md shadow" />
              </div>
              <div>
              <label for="edit_foto" class="block mb-1 text-sm font-medium text-gray-900">Ganti Foto</label>
            <input type="file" id="edit_foto" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2" accept="image/*" />
            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (Max 2MB)</p> </div>
        </div>
            </div>
        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3 pt-3">
          <button type="button" data-modal-hide="editMobilModal" class="px-4 py-1.5 text-sm rounded-md bg-gray-300 text-gray-700 font-medium hover:bg-gray-400">
            Tutup
          </button>
          <button type="submit" class="px-4 py-1.5 text-sm rounded-md bg-yellow-500 text-white font-medium hover:bg-yellow-600">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function openTambahMobilModal() {
    document.getElementById('tambahMobilModal').classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }

  function closeTambahMobilModal() {
    document.getElementById('tambahMobilModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }

  // Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById('tambahMobilModal');
    if (event.target === modal) {
      closeTambahMobilModal();
    }
  }
</script>

<!-- Flowbite & Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
@endsection