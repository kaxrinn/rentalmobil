@extends('layouts.appadmin')

@section('title', 'hubungiadmin')

@section('content')
<div class="pt-10">
  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

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
        @forelse ($pesan as $index => $item)
        <tr>
          <td class="p-3 border">{{ $index + 1 }}</td>
          <td class="p-3 border">{{ $item->nama }}</td>
          <td class="p-3 border">{{ $item->email }}</td>
          <td class="p-3 border text-left">{{ $item->pesan }}</td>
          <td class="p-3 border">{{ $item->created_at->format('d-m-Y H:i') }}</td>
          <td class="p-3 border">
            <form action="{{ route('admin.hapuspesan', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-lg font-bold text-sm hover:opacity-90">
                Hapus
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="p-4 border text-gray-500">Belum ada pesan masuk.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
