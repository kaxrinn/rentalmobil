@extends('layouts.appadmin')

@section('title', 'pemesananadmin')

@section('content')
<div class="pt-10">
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Pemesanan</h3>
    <table class="w-full min-w-[800px] border border-gray-300 text-center">
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
              <button class="bg-blue-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Edit</button>
              <button class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Hapus</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

