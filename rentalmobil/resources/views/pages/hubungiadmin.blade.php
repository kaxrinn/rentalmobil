@extends('layouts.appadmin')

@section('title', 'hubungiadmin')

@section('content')
<div class="pt-10">
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Pesan</h3>
    <table class="w-full min-w-[800px] border border-gray-300 text-center">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 border">NO</th>
          <th class="p-3 border">NAMA PENYEWA</th>
          <th class="p-3 border">EMAIL</th>
          <th class="p-3 border">PESAN</th>
          <th class="p-3 border">WAKTU</th>
          <th class="p-3 border">AKSI</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-3 border">1</td>
          <td class="p-3 border">Kim Mingyu</td>
          <td class="p-3 border">Mingyu@gmail.com</td>
          <td class="p-3 border">Kak apa mobilnya ini tersedia semua?</td>
          <td class="p-3 border">2025-03-27 16:43:48</td>
          <td class="p-3 border">
            <div class="flex gap-2 justify-center">
              <button class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">Hapus</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
