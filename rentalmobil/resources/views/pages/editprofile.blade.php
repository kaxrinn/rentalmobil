@extends('layouts.appedit')
@section('title', 'Edit Profile - VROOM')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 mt-10">
    <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md max-w-md w-[400px] h-auto flex flex-col items-center justify-center">
        <div class="text-center mb-4">
            <img src="/gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="mx-auto w-24">
            <h2 class="text-xl font-medium text-gray-800">Profile</h2>
        </div>

        @php
            $inputClass = 'w-[300px] h-[38px] px-2 py-1 text-sm placeholder:text-sm border-2 border-blue-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700';
        @endphp

        <form action="{{ route('edit-profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4 flex flex-col items-center w-full">
            @csrf
            <div class="w-[300px]">
                <label class="block mb-1 text-sm font-medium text-gray-700" for="name">Nama Penyewa</label>
                <input type="text" name="nama_penyewa" value="{{ old('nama_penyewa', $user->nama_penyewa) }}" placeholder="Nama Penyewa" class="{{ $inputClass }}">
                @error('nama_penyewa') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="w-[300px]">
                <label class="block mb-1 text-sm font-medium text-gray-700" for="email">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" class="{{ $inputClass }}">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="w-[300px]">
                <label class="block mb-1 text-sm font-medium text-gray-700" for="name">Nomor Handphone</label>
                <input type="tel" name="nomor_telepon" value="{{ old('nomor_telepon', $user->nomor_telepon) }}" placeholder="Nomor Handphone" class="{{ $inputClass }}">
                 @error('nomor_telepon') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="w-[300px]">
                <label class="block mb-1 text-sm font-medium text-gray-700" for="name">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}" placeholder="Alamat" class="{{ $inputClass }}">
                 @error('alamat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="w-[300px]">
                <label class="block mb-1 text-sm font-medium text-gray-700" for="foto_ktp">Foto KTP (jpg/png)</label>
                <input type="file" name="foto_ktp" id="foto_ktp" accept=".jpg,.jpeg,.png" class="w-full border-2 border-blue-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700 py-1 px-2 text-sm">
                @error('foto_ktp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                @if($user->foto_ktp)
                    <img src="{{ asset($user->foto_ktp) }}" alt="Foto KTP" class="mt-2 max-h-32 rounded-md border">
                @endif
            </div>

            <input type="password" name="kata_sandi" placeholder="kata sandi baru (kosongkan jika tidak ingin diubah)" class="{{ $inputClass }}">
            @error('kata_sandi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <input type="password" name="kata_sandi_confirmation" placeholder="Konfirmasi kata sandi" class="{{ $inputClass }}">

            <button type="submit"
                class="w-[250px] bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                Simpan
            </button>
            <a href="{{ url()->previous() }}"
                class="w-[250px] block text-center bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                Batal
            </a>
        </form>
    </div>
</div>
@endsection
