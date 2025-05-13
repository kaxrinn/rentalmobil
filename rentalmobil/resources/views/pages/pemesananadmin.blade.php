@extends('layouts.appadmin')

@section('title', 'pemesananadmin')

@section('content')
<div class="pt-10">
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Pemesanan</h3>
    <table class="w-full min-w-[800px] border border-gray-300 text-center">
      <!-- Table content remains the same as before -->
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 border">NO</th>
          <th class="p-3 border">ID PENYEWAAN</th>
          <th class="p-3 border">NAMA PENYEWA</th>
          <th class="p-3 border">EMAIL</th>
          <th class="p-3 border">ALAMAT</th>
          <th class="p-3 border">TGL AMBIL</th>
          <th class="p-3 border">TGL KEMBALI</th>
          <th class="p-3 border">MOBIL</th>
          <th class="p-3 border">TEMPAT</th>
          <th class="p-3 border">NOREK</th>
          <th class="p-3 border">TOTAL</th>
          <th class="p-3 border">BUKTI</th>
          <th class="p-3 border">STATUS</th>
          <th class="p-3 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-3 border">1</td>
          <td class="p-3 border">CR00123</td>
          <td class="p-3 border">Kim Mingyu</td>
          <td class="p-3 border">KarinaMingyu@gmail.com</td>
          <td class="p-3 border">Jl. tiban 1</td>
          <td class="p-3 border">2025-04-20</td>
          <td class="p-3 border">2025-04-25</td>
          <td class="p-3 border">
            <img src="{{ asset('images/mobil 2.png') }}" alt="Toyota Rush" class="max-w-[150px] h-auto mx-auto">
          </td>
          <td class="p-3 border">Jl. tiban indah permai</td>
          <td class="p-3 border">3312401067123 a/n kharina</td>
          <td class="p-3 border">Rp.300.000</td>
          <td class="p-3 border">
            <img src="{{ asset('images/buktibyr.jpg') }}" alt="bukti" class="max-w-[150px] h-auto mx-auto">
          </td>
          <td class="p-3 border">
            <span class="bg-teal-500 text-white px-4 py-2 rounded-lg font-bold text-sm inline-flex items-center justify-center">Konfirmasi</span>
          </td>
          <td class="p-3 border">
            <div class="flex gap-2 justify-center">
              <button onclick="openEditModal()" class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Edit</button>
              <button class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Hapus</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <!-- Modal content -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-6">
          <h2 class="text-xl font-bold">Edit Data Pemesanan</h2>
        </div>

        <form class="space-y-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Mobil -->
            <div class="col-span-2">
              <label class="block mb-1 text-sm font-medium text-gray-900">Mobil</label>
              <input type="text" value="Toyota Rush" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Tanggal Pengambilan -->
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Tanggal Pengambilan</label>
              <input type="text" value="20/04/2025" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Tanggal Pengembalian -->
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Tanggal Pengembalian</label>
              <input type="text" value="25/04/2025" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Nama Lengkap -->
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Nama Lengkap</label>
              <input type="text" value="Kim Mingyu" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Email -->
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Email</label>
              <input type="email" value="mingyukarina@gmail.com" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- No Hp -->
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">No Hp</label>
              <input type="text" value="09849574856" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Alamat -->
            <div class="col-span-2">
              <label class="block mb-1 text-sm font-medium text-gray-900">Alamat</label>
              <textarea rows="2" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md">Nongsa</textarea>
            </div>

            <!-- No Rekening Penjual -->
            <div class="col-span-2">
              <label class="block mb-1 text-sm font-medium text-gray-900">No Rekening Penjual</label>
              <input type="text" value="3312401067 a/n Kharina" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Jumlah Total Pembayaran -->
            <div class="col-span-2">
              <label class="block mb-1 text-sm font-medium text-gray-900">Jumlah Total Pembayaran</label>
              <input type="text" value="Rp. 500.000" readonly class="w-full p-2 text-sm bg-gray-100 border border-gray-300 rounded-md" />
            </div>

            <!-- Bukti KTP dan Pembayaran -->
            <div class="col-span-2 grid grid-cols-2 gap-4">
              <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Bukti KTP</label>
                <img src="{{ asset('gambarberanda/bukti ktp.jpg') }}" alt="KTP" class="w-full h-auto max-h-40 object-contain rounded-md shadow" />
              </div>
              <div>
                <label class="block mb-1 text-sm font-medium text-gray-900">Bukti Pembayaran</label>
                <img src="{{ asset('gambarberanda/bukti tf.jpg') }}" alt="Bukti Transfer" class="w-full h-auto max-h-40 object-contain rounded-md shadow" />
              </div>
            </div>

            <!-- Status (Editable) -->
            <div class="col-span-2">
              <label class="block mb-1 text-sm font-medium text-gray-900">Status</label>
              <select class="w-full p-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option>Konfirmasi</option>
                <option>Tertahan</option>
                <option>Batal</option>
                <option>Selesai</option>
              </select>
            </div>
          </div>

          <!-- Tombol -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="closeEditModal()" class="px-4 py-1.5 text-sm rounded-md bg-gray-300 text-gray-700 font-medium hover:bg-gray-400">Batal</button>
            <button type="submit" class="px-4 py-1.5 text-sm rounded-md bg-[#0c1c56] text-white font-medium hover:bg-[#08123b]">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function openEditModal() {
    document.getElementById('editModal').classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }

  function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }

  // Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
      closeEditModal();
    }
  }
</script>
@endsection