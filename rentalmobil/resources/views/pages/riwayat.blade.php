@extends('layouts.appnofooter')

@section('title', 'Riwayat Pemesanan')

@section('content')
<div class="container mx-auto pt-24 w-[90%] bg-white rounded-md overflow-x-auto">
  <table class="min-w-max w-full table-auto text-sm">
    <thead>
      <tr class="bg-[#f1f4ff] text-black text-center">
        <th class="border border-gray-500 p-2">No</th>
        <th class="border border-gray-500 p-2">Id Pemesanan</th>
        <th class="border border-gray-500 p-2">Nama Lengkap</th>
        <th class="border border-gray-500 p-2">Tanggal</th>
        <th class="border border-gray-500 p-2">Mobil</th>
        <th class="border border-gray-500 p-2">Detail Mobil</th>
        <th class="border border-gray-500 p-2">Status</th>
        <th class="border border-gray-500 p-2">Total Harga</th>
        <th class="border border-gray-500 p-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pemesanans as $index => $pemesanan)
      <tr data-id="{{ $pemesanan->id_pemesanan }}">
        <td class="border p-2 text-center align-middle">{{ $index + 1 }}</td>
        <td class="border p-2 text-center">PSN-{{ $pemesanan->id_pemesanan }}</td>
        <td class="border p-2 text-center">{{ $pemesanan->penyewa->nama_penyewa }}</td>
        <td class="border p-2 text-center">
          Pengambilan: {{ $pemesanan->formatted_tanggal_pengambilan }}<br>
          Pengembalian: {{ $pemesanan->formatted_tanggal_pengembalian }}
        </td>
        <td class="border p-2 text-center">
          @if($pemesanan->mobil)
            <img src="{{ $pemesanan->mobil->foto_url }}" 
                 class="w-[100px] mx-auto" 
                 alt="{{ $pemesanan->mobil->merek }} {{ $pemesanan->mobil->jenis }}">
          @else
            <div class="w-[100px] h-[75px] bg-gray-200 mx-auto flex items-center justify-center">
              <span class="text-gray-500">No Image</span>
            </div>
          @endif
        </td>
        <td class="border p-2 text-sm leading-relaxed">
          @if($pemesanan->mobil)
            Merek: {{ $pemesanan->mobil->merek }}<br>
            Tipe: {{ $pemesanan->mobil->jenis }}<br>
            Warna: {{ $pemesanan->mobil->warna }}<br>
            Harga: Rp{{ number_format($pemesanan->mobil->harga_harian, 0, ',', '.') }}/hari<br>
            Jumlah Kursi: {{ $pemesanan->mobil->jumlah_kursi }}<br>
            Mesin: {{ $pemesanan->mobil->mesin }}
          @else
            Data mobil tidak tersedia
          @endif
        </td>
        <td class="border p-2 text-center">
          @php
            $statusColors = [
              'Menunggu' => 'bg-yellow-500',
              'Konfirmasi' => 'bg-green-600',
              'Batal' => 'bg-red-500',
              'Selesai' => 'bg-blue-500'
            ];
            $status = $pemesanan->pembayaran ? $pemesanan->pembayaran->status : 'Menunggu';
            $color = $statusColors[$status] ?? 'bg-gray-500';
          @endphp
          <span class="px-2 py-1 rounded-full font-bold text-white {{ $color }}">
            {{ $status }}
          </span>
        </td>
        <td class="border p-2 text-center">
          Rp{{ $pemesanan->pembayaran ? number_format($pemesanan->pembayaran->total_harga, 0, ',', '.') : '0' }}
        </td>
        <td class="border p-2 text-center">
          <div class="flex flex-col gap-2 items-center">
            <!-- Tombol Resi (hanya aktif jika status Konfirmasi) -->
            <a href="{{ $status === 'Konfirmasi' ? route('pemesanan.resi', $pemesanan->id_pemesanan) : '#' }}" 
               target="_blank"
               class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition-colors {{ $status !== 'Konfirmasi' ? 'opacity-50 cursor-not-allowed' : '' }}"
               @if($status !== 'Konfirmasi') onclick="return false;" @endif>
              Resi
            </a>
            
            <!-- Tombol Ulasan (hanya aktif jika status Selesai) -->
            <button onclick="{{ $status === 'Selesai' ? "openUlasanModal('{$pemesanan->id_pemesanan}', '".($pemesanan->mobil ? $pemesanan->mobil->kode_mobil : '')."')" : "return false;" }}"
                    class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition-colors {{ $status !== 'Selesai' ? 'opacity-50 cursor-not-allowed' : '' }}">
              Ulasan
            </button>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="9" class="border p-4 text-center">Belum ada riwayat pemesanan</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  
  <!-- Pagination -->
  <div class="mt-4 px-4 py-2">
    {{ $pemesanans->links() }}
  </div>
</div>

<!-- Modal Ulasan -->
<div id="ulasanModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Beri Ulasan</h3>
                <form id="ulasanForm" method="POST" action="{{ route('ulasan.store') }}">
                    @csrf
                    <input type="hidden" name="id_pemesanan" id="ulasan-id-pemesanan">
                    <input type="hidden" name="kode_mobil" id="ulasan-kode-mobil">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden">
                                <label for="star{{ $i }}" class="text-2xl cursor-pointer star">☆</label>
                            @endfor
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea name="pesan" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2" required></textarea>
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeUlasanModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Kirim Ulasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// Fungsi Modal Ulasan
function openUlasanModal(idPemesanan, kodeMobil) {
    const status = document.querySelector(`tr[data-id="${idPemesanan}"] td:nth-child(7) span`).textContent.trim();
    if (status !== 'Selesai') {
        Swal.fire({
            title: 'Tidak bisa memberikan ulasan',
            text: 'Anda hanya bisa memberikan ulasan untuk pemesanan yang sudah selesai',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        return;
    }

    const modal = document.getElementById('ulasanModal');
    document.getElementById('ulasan-id-pemesanan').value = idPemesanan;
    document.getElementById('ulasan-kode-mobil').value = kodeMobil;
    modal.classList.remove('hidden');
    
    // Close modal ketika klik di luar
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeUlasanModal();
        }
    });
    
    // Close modal dengan ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeUlasanModal();
        }
    });
    
    // Rating stars
    const stars = document.querySelectorAll('.star');
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            stars.forEach((s, i) => {
                if (i <= index) {
                    s.textContent = '★';
                    s.classList.add('text-yellow-400');
                } else {
                    s.textContent = '☆';
                    s.classList.remove('text-yellow-400');
                }
            });
            document.querySelector(`input[name="rating"][value="${index+1}"]`).checked = true;
        });
    });
}

function closeUlasanModal() {
    const modal = document.getElementById('ulasanModal');
    modal.classList.add('hidden');
    modal.removeEventListener('click', arguments.callee);
    document.removeEventListener('keydown', arguments.callee);
}

// Form Ulasan
document.getElementById('ulasanForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    
    fetch(form.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeUlasanModal();
            Swal.fire({
                title: 'Sukses!',
                text: 'Ulasan berhasil dikirim',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else {
            Swal.fire({
                title: 'Gagal!',
                text: data.message || 'Gagal mengirim ulasan',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat mengirim ulasan',
            icon: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    });
});
</script>

<style>
.star:hover, .star:hover ~ .star {
    color: #fbbf24;
}
</style>
@endsection