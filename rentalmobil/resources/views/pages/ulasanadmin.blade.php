@extends('layouts.appadmin')

@section('title','ulasanadmin')

@section('content')
<div class="pt-4">
  <!-- Container untuk tabel ulasan -->
  <div class="bg-white shadow-lg rounded-lg p-4 overflow-auto">
    <h3 class="text-xl font-semibold mb-4">List Ulasan</h3>

    <!-- Tabel Ulasan -->
    <table class="w-full min-w-[100px] border border-gray-300 text-left text-xs">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-2 border">NO</th> <!-- Nomor urutan -->
          <th class="p-2 border">NAMA PENYEWA</th> <!-- Nama penyewa -->
          <th class="p-2 border">ULASAN</th> <!-- Isi ulasan -->
          <th class="p-2 border">RATING</th> <!-- Nilai rating -->
          <th class="p-2 border">AKSI</th> <!-- Tombol aksi (hapus) -->
        </tr>
      </thead>
      <tbody>
        @forelse ($ulasan as $index => $item)
        <tr>
          <td class="p-3 border">{{ $index + 1 }}</td> <!-- Nomor baris -->
          <td class="p-3 border">{{ $item->nama_penyewa }}</td> <!-- Nama penyewa -->
          <td class="p-3 border">{{ $item->komentar }}</td> <!-- Komentar ulasan -->
          <td class="p-3 border">{{ $item->rating }}</td> <!-- Rating ulasan -->
          <td class="p-3 border">
            <!-- Form hapus ulasan -->
            <form action="{{ route('ulasan.destroy', $item->id_ulasan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">
                Hapus
              </button>
            </form>
          </td>
        </tr>
        @empty
        <!-- Jika belum ada ulasan -->
        <tr>
          <td colspan="5" class="p-4 text-gray-500">Belum ada ulasan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <!-- Pagination -->
    <div class="mt-4">
      {{ $ulasan->links() }}
    </div>
  </div>
</div>
  </div>
</div>

@endsection
