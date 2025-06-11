@extends('layouts.appadmin')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Daftar Penyewa</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">No</th>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2 text-left">Nomor Handphone</th>
                    <th class="border px-4 py-2 text-left">Foto KTP</th>
                    <th class="border px-4 py-2 text-left">Alamat</th>
                    <th class="border px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengguna as $index => $penyewa)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $penyewa->nama_penyewa }}</td>
                        <td class="border px-4 py-2">{{ $penyewa->email }}</td>
                        <td class="border px-4 py-2">{{ $penyewa->nomor_telepon }}</td>
                        <td class="border px-4 py-2">
                            @if($penyewa->ktp)
                                <img src="{{ asset($penyewa->ktp) }}" alt="KTP {{ $penyewa->name }}" class="w-24 h-auto rounded shadow">
                            @else
                                <span class="text-gray-400 italic">Belum ada</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if($penyewa->alamat)
                                <span>{{ $penyewa->alamat }}</span>
                            @else
                                <span class="text-gray-400 italic">Belum diisi</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('pengguna.hapus', $penyewa->id_penyewa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-3 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada penyewa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
