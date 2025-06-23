@extends('layouts.appadmin')

@section('title', 'Admin Pemesanan')

@section('content')
@php
    if(!isset($pemesanans)) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 p-4 mb-4'>";
        echo "Error: Variabel \$pemesanans tidak terdefinisi!";
        echo "<br>Route: " . request()->route()->getName();
        echo "<br>Controller: " . request()->route()->getActionName();
        echo "</div>";
    }
@endphp

{{-- CSRF Token for AJAX --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

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
          <th class="p-3 border">BUKTI</th>
          <th class="p-3 border">TANGGAL PENGAMBILAN</th>
          <th class="p-3 border">TANGGAL PENGEMBALIAN</th>
          <th class="p-3 border">MOBIL</th>
          <th class="p-3 border">TOTAL</th>
          <th class="p-3 border">BUKTI</th>
          <th class="p-3 border">STATUS</th>
          <th class="p-3 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pemesanans as $index => $pemesanan)
        <tr data-id="{{ $pemesanan->id_pemesanan }}" class="hover:bg-gray-50">
            <td class="p-3 border">{{ $index + 1 }}</td>
            <td class="p-3 border">PSN-{{ $pemesanan->id_pemesanan }}</td>
            <td class="p-3 border">{{ $pemesanan->penyewa->nama_penyewa }}</td>
            <td class="p-3 border">{{ $pemesanan->penyewa->email }}</td>
            <td class="p-3 border">
            <a href="{{ $pemesanan->penyewa->foto_ktp }}" target="_blank" class="inline-block">
            <img src="{{ $pemesanan->penyewa->foto_ktp}}" alt="Foto KTP" class="w-100 " 
            /></a>
            </td>
            <td class="py-2 px-4 border">{{ date('d M Y', strtotime($pemesanan->tanggal_pengambilan)) }}</td>
            <td class="py-2 px-4 border">{{ date('d M Y', strtotime($pemesanan->tanggal_pengembalian)) }}</td>
            <td class="p-3 border">
                @if($pemesanan->mobil)
                    {{ $pemesanan->mobil->merek }} {{ $pemesanan->mobil->jenis }}
                @else
                    <span class="text-red-500">Mobil dihapus</span>
                @endif
            </td>
            <td class="p-3 border">Rp {{ number_format($pemesanan->pembayaran->total_harga ?? 0, 0, ',', '.') }}</td>
            <td class="p-3 border">
                @if($pemesanan->pembayaran->bukti_pembayaran_path)
                <a href="{{ $pemesanan->pembayaran->bukti_pembayaran_path }}" target="_blank" class="inline-block">
                    <img src="{{ $pemesanan->pembayaran->bukti_pembayaran_path }}" class="max-w-[100px] h-auto mx-auto">
                </a>
                @else
                <span class="text-red-500">Tidak ada bukti</span>
                @endif
            </td>
            <td class="p-3 border">
                @php
                    $statusColors = [
                        'Menunggu' => 'bg-yellow-500',
                        'Konfirmasi' => 'bg-green-500',
                        'Batal' => 'bg-red-500',
                        'Selesai' => 'bg-blue-500'
                    ];
                    $status = $pemesanan->pembayaran->status ?? 'Menunggu';
                @endphp
                <span class="{{ $statusColors[$status] }} text-white px-3 py-1 rounded-full text-xs">
                    {{ $status }}
                </span>
            </td>
            <td class="p-3 border">
                <div class="flex gap-2 justify-center">
                    <button onclick="openEditModal('{{ $pemesanan->id_pemesanan }}', '{{ $status }}')" 
                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition-colors">
                        Edit
                    </button>
                    <form action="{{ route('admin.pemesanan.destroy', $pemesanan->id_pemesanan) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete-btn bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition-colors">
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
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Status Pemesanan</h3>
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="edit-status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Konfirmasi">Konfirmasi</option>
                            <option value="Batal">Batal</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Fungsi Modal
function openEditModal(id, currentStatus) {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-status').value = currentStatus;
    
    // Close modal ketika klik di luar
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeEditModal();
        }
    });
    
    // Close modal dengan ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
        }
    });
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.removeEventListener('click', arguments.callee);
    document.removeEventListener('keydown', arguments.callee);
}

// Delete Confirmation
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
        const form = this.closest('form');
        const row = form.closest('tr');
        const url = form.action;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            buttonsStyling: true,
            customClass: {
                confirmButton: 'px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 mx-2',
                cancelButton: 'px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mx-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        row.remove();
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data pemesanan telah dihapus.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal menghapus data.',
                            icon: 'error',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(() => {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan jaringan.',
                        icon: 'error',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                });
            }
        });
    });
});

// Update Status
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('edit-id').value;
    const status = document.getElementById('edit-status').value;
    const url = `/admin/pemesanan/${id}/status`;
    const row = document.querySelector(`tr[data-id="${id}"]`);
    const statusBadge = row.querySelector('td:nth-child(10) span');

    fetch(url, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Update tampilan tanpa reload
            const statusColors = {
                'Menunggu': 'bg-yellow-500',
                'Konfirmasi': 'bg-green-500',
                'Batal': 'bg-red-500',
                'Selesai': 'bg-blue-500'
            };
            
            statusBadge.className = `${statusColors[status]} text-white px-3 py-1 rounded-full text-xs`;
            statusBadge.textContent = status;
            
            closeEditModal();
            
            Swal.fire({
                title: 'Sukses!',
                text: 'Status berhasil diperbarui',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(() => {
        Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat memperbarui',
            icon: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    });
});
</script>

@endsection