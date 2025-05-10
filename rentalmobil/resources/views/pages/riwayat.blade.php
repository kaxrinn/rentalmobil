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
        <th class="border border-gray-500 p-2">Aksi</th> </tr>
    </thead>
    <tbody>
      @for ($i = 1; $i <= 4; $i++)
      <tr>
        <td class="border p-2 text-center align-middle">{{ $i }}</td>
        <td class="border p-2 text-center">CR00123</td>
        <td class="border p-2 text-center">KIM MINGYU</td>
        <td class="border p-2 text-center">Pengambilan : 2025-04-20<br>Pengembalian : 2025-04-25</td>
        <td class="border p-2 text-center"><img src="images/mobil 2.png" class="w-[100px] mx-auto" alt="Mobil"></td>
        <td class="border p-2 text-sm leading-relaxed">
          Merek : Toyota<br>Tipe : SUV Rush<br>Warna : Black<br>Harga : 350.000<br>Jumlah Kursi: 8<br>Mesin : 1.500 Cc
        </td>
        <td class="border p-2 text-center">
          @php
            $statuses = ['Konfirmasi', 'Menunggu', 'Batal', 'Selesai'];
            $colors = ['bg-green-600', 'bg-yellow-500', 'bg-red-500', 'bg-blue-500'];
          @endphp
          <span class="px-2 py-1 rounded-full font-bold text-black {{ $colors[$i-1] }}">{{ $statuses[$i-1] }}</span>
        </td>
        <td class="border p-2 text-center">
          <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Resi</button>
          <button class="bg-[#c9d2ff] hover:bg-[#aab8f2] px-3 py-1 rounded-md m-1">Ulasan</button>
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
</div>
@endsection
