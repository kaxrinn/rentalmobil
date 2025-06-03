@extends('layouts.appadmin')

@section('title', 'Admin Pemesanan')

@section('content')
<div class="pt-10">
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Pemesanan</h3>
    
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
    @endif

    <table class="w-full min-w-[800px] border border-gray-300 text-center">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 border">NO</th>
          <th class="p-3 border">ID PENYEWAAN</th>
          <th class="p-3 border">NAMA PENYEWA</th>
          <th class="p-3 border">EMAIL</th>
          <th class="p-3 border">TGL AMBIL</th>
          <th class="p-3 border">TGL KEMBALI</th>
          <th class="p-3 border">MOBIL</th>
          <th class="p-3 border">TOTAL</th>
          <th class="p-3 border">BUKTI</th>
          <th class="p-3 border">STATUS</th>
          <th class="p-3 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pemesanans as $index => $pemesanan)
        <tr>
          <td class="p-3 border">{{ $index + 1 }}</td>
          <td class="p-3 border">PSN-{{ $pemesanan->id_penyewaan }}</td>
          <td class="p-3 border">{{ $pemesanan->nama_penyewa }}</td>
          <td class="p-3 border">{{ $pemesanan->email }}</td>
          <td class="py-2 px-4 border">
    {{ date('d M Y', strtotime($pemesanan->tanggal_pengambilan)) }}
</td>
          <td class="py-2 px-4 border">
    {{ date('d M Y', strtotime($pemesanan->tanggal_pengembalian)) }}
</td>
          <td class="p-3 border">
            @if($pemesanan->mobil)
              {{ $pemesanan->mobil->merek }} {{ $pemesanan->mobil->jenis }}
            @else
              <span class="text-red-500">Mobil dihapus</span>
            @endif
          </td>
          <td class="p-3 border">Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</td>
          <td class="p-3 border">
    <a href="{{ $pemesanan->bukti_pembayaran_url }}" target="_blank" class="text-blue-500 hover:underline">
        <img src="{{ $pemesanan->bukti_pembayaran_url }}" 
             alt="Bukti Pembayaran" 
             class="max-w-[100px] h-auto mx-auto">
    </a>
</td>
          <td class="p-3 border">
            @php
              $statusColors = [
                'Menunggu' => 'bg-yellow-500',
                'Konfirmasi' => 'bg-green-500',
                'Batal' => 'bg-red-500',
                'Selesai' => 'bg-blue-500'
              ];
            @endphp
            <span class="{{ $statusColors[$pemesanan->status] }} text-white px-3 py-1 rounded-full text-xs">
              {{ $pemesanan->status }}
            </span>
          </td>
          <td class="p-3 border">
            <div class="flex gap-2 justify-center">
              <button onclick="openEditModal('{{ $pemesanan->id_penyewaan }}', '{{ $pemesanan->status }}')" 
                      class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                Edit
              </button>
              <form action="{{ route('admin.pemesanan.destroy', $pemesanan->id_penyewaan) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700"
                        onclick="return confirm('Hapus pemesanan ini?')">
                  Hapus
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="11" class="p-4 text-center">Tidak ada data pemesanan</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
      {{ $pemesanans->links() }}
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto" style="margin-top: 60px;">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        
        <!-- Konten Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Status Pemesanan</h3>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Konfirmasi">Konfirmasi</option>
                            <option value="Batal">Batal</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded-md text-gray-700 hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 rounded-md text-white hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openEditModal(id, currentStatus) {
  const form = document.getElementById('editForm');
  form.action = `/admin/pemesanan/${id}/status`;
  form.querySelector('select[name="status"]').value = currentStatus;
  document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
  document.getElementById('editModal').classList.add('hidden');
}
// Ganti form delete dengan AJAX
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        
        if (confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')) {
            const form = this.closest('form');
            const url = form.action;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.closest('tr').remove();
                } else {
                    alert('Gagal menghapus pemesanan');
                }
            });
        }
    });
});
</script>
@endsection