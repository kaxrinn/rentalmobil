@extends('layouts.appnofooter')

@section('title', 'Riwayat Pemesanan')

@section('content')
<div class="container mx-auto pt-24 w-[90%] bg-white rounded-md overflow-x-auto">
  <table class="min-w-max w-full table-auto text-sm">
    <thead>
      <tr class="bg-[#f1f4ff] text-black text-center">
        <th class="border border-gray-500 p-2">No</th>
        <th class="border border-gray-500 p-2">Kode Pemesanan</th>
        <th class="border border-gray-500 p-2">Nama Lengkap</th>
        <th class="border border-gray-500 p-2">Tanggal</th>
        <th class="border border-gray-500 p-2">Mobil</th>
        <th class="border border-gray-500 p-2">Detail Mobil</th>
        <th class="border border-gray-500 p-2">Status</th>
        <th class="border border-gray-500 p-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pemesanans as $index => $pemesanan)
      <tr>
        <td class="border p-2 text-center align-middle">{{ $index + 1 }}</td>
        <td class="border p-2 text-center">PSN-{{ $pemesanan->id_penyewaan }}</td>
        <td class="border p-2 text-center">{{ $pemesanan->nama_penyewa }}</td>
        <td class="border p-2 text-center">
          Pengambilan : {{ $pemesanan->tanggal_pengambilan }}<br>
          Pengembalian : {{ $pemesanan->tanggal_pengembalian }}
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
            Merek : {{ $pemesanan->mobil->merek }}<br>
            Tipe : {{ $pemesanan->mobil->jenis }}<br>
            Warna : {{ $pemesanan->mobil->warna }}<br>
            Harga : {{ number_format($pemesanan->mobil->harga_harian, 0, ',', '.') }}<br>
            Jumlah Kursi: {{ $pemesanan->mobil->jumlah_kursi }}<br>
            Mesin : {{ $pemesanan->mobil->mesin }}
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
            $color = $statusColors[$pemesanan->status] ?? 'bg-gray-500';
          @endphp
          <span class="px-2 py-1 rounded-full font-bold text-black {{ $color }}">
            {{ $pemesanan->status }}
          </span>
        </td>
        <td class="border p-2 text-center">
          <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
          <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="border p-4 text-center">Belum ada riwayat pemesanan</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection