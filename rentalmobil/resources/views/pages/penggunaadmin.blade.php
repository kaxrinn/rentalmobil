@extends('layouts.appadmin')

@section('content')
<div class="pt-4">
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-xl font-semibold mb-4">Daftar Penyewa</h1>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[100px] border border-gray-300 text-left text-xs">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Nomor Handphone</th>
                        <th class="border px-4 py-2">Foto KTP</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengguna as $index => $penyewa)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $penyewa->nama_penyewa }}</td>
                            <td class="border px-4 py-2">{{ $penyewa->email }}</td>
                            <td class="border px-4 py-2">{{ $penyewa->nomor_telepon }}</td>
                            <td class="border px-4 py-2">
                                @if($penyewa->foto_ktp)
                                <a href="{{ asset($penyewa->foto_ktp) }}" target="_blank" class="inline-block">
                                    <img src="{{ asset($penyewa->foto_ktp) }}" alt="KTP {{ $penyewa->nama_penyewa }}" class="w-24 h-auto rounded "> </a>
                                @else
                                    <span class="text-gray-400 italic">Belum ada</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if($penyewa->alamat)
                                    {{ $penyewa->alamat }}
                                @else
                                    <span class="text-gray-400 italic">Belum diisi</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('pengguna.hapus', $penyewa->id_penyewa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-3 rounded text-xs">
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
    <!-- Pagination -->
    <div class="mt-4">
      {{ $pengguna->links() }}
    </div>
  </div>
</div>

        </div>
    </div>
</div>
@endsection
