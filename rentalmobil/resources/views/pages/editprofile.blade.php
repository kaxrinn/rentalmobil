@extends('layouts.appedit')
@section('title', 'Edit Profile - VROOM')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md max-w-md w-[400px] h-[500px] flex flex-col items-center justify-center">
        <div class="text-center mb-4">
            <img src="/gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="mx-auto w-24">
            <h2 class="text-xl font-medium text-gray-800">Edit Profile</h2>
        </div>

        @php
            $inputClass = 'w-[300px] h-[38px] px-2 py-1 text-sm placeholder:text-sm border-2 border-blue-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700';
        @endphp

        <form action="{{ route('edit-profile.update') }}" method="POST" class="space-y-4 flex flex-col items-center w-full">
            @csrf

            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nama Pengguna" class="{{ $inputClass }}">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" class="{{ $inputClass }}">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nomor Handphone" class="{{ $inputClass }}">
            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            <input type="password" name="password" placeholder="Password baru (kosongkan jika tidak ingin diubah)" class="{{ $inputClass }}">
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

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
