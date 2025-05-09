@extends('layouts.appadmin')

@section('title', 'MobilAdmin')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-4 overflow-auto mt-4">
  <div class="flex justify-between items-center mb-4">
    <h3 class="text-xl font-semibold">List Mobil</h3>
  </div>
    <div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
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
          <td class="border px-4 py-2">
            <div class="flex flex-col items-center gap-1">
              <button class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</button>
              <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
