@extends('layouts.appnofooter')

@section('title', 'Riwayat Pemesanan')

@section('content')
<div class="container mx-auto pt-24 w-[90%]">

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 shadow-sm border border-green-300" role="alert">
            <div class="flex justify-between items-center">
                <span><strong>Berhasil!</strong> {{ session('success') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="text-green-800 font-bold text-lg leading-none">&times;</button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4 shadow-sm border border-red-300" role="alert">
            <div class="flex justify-between items-center">
                <span><strong>Gagal!</strong> {{ session('error') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="text-red-800 font-bold text-lg leading-none">&times;</button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4 shadow-sm border border-red-300" role="alert">
            <strong class="block font-semibold mb-1">Ada error:</strong>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Lanjutan konten tabel & modal -->

    @if ($errors->any())
        <div class="bg-red-500 text-white px-4 py-3 rounded mb-4 shadow-lg" role="alert">
            <strong class="block font-bold mb-1">Ada error:</strong>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="overflow-x-auto">
  <table class="min-w-max w-full table-auto text-xs sm:text-sm">
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
        <td class="border p-2 text-left">PSN-{{ $pemesanan->id_pemesanan }}</td>
        <td class="border p-2 text-left">{{ $pemesanan->penyewa->nama_penyewa }}</td>
        <td class="border p-2 text-left">
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
<div id="ulasanModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <form method="POST" action="{{ route('ulasan.submit') }}" class="bg-white p-6 rounded shadow-md w-full max-w-md">
    @csrf

    <!-- Hidden input untuk id pemesanan -->
    <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="">

    <h2 class="text-xl font-bold mb-4">Beri Ulasan</h2>

    <!-- Nama Penyewa -->
    <label for="nama_penyewa" class="block mb-1 font-medium">Nama Penyewa</label>
    <input type="text" name="nama_penyewa" id="nama_penyewa" class="w-full p-2 border rounded mb-4" placeholder="Tulis nama Anda" required>

    <!-- Komentar -->
    <label for="ulasan" class="block mb-1 font-medium">Komentar</label>
    <textarea name="ulasan" id="ulasan" rows="3" required class="w-full p-2 border rounded mb-4" placeholder="Tulis ulasan Anda"></textarea>

    <!-- Rating -->
    <label for="rating" class="block mb-1 font-medium">Rating</label>
    <select name="rating" id="rating" required class="w-full p-2 border rounded mb-4">
      <option value="">Pilih bintang</option>
      @for($i = 5; $i >= 1; $i--)
        <option value="{{ $i }}">{{ $i }} Bintang</option>
      @endfor
    </select>

    <!-- Tombol Aksi -->
    <div class="flex justify-end gap-2">
      <button type="button" onclick="closeUlasanModal()" class="bg-gray-400 text-white px-3 py-1 rounded">Batal</button>
      <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Kirim</button>
    </div>
  </form>
</div>

<script>
  function openUlasanModal(id) {
    document.getElementById('pemesanan_id').value = id;
    document.getElementById('ulasanModal').classList.remove('hidden');
    document.getElementById('ulasanModal').classList.add('flex');
  }

  function closeUlasanModal() {
    document.getElementById('ulasanModal').classList.add('hidden');
    document.getElementById('ulasanModal').classList.remove('flex');
  }
</script>

@endsection