@extends('layouts.appauth')
@section('title', 'Lupa Kata Sandi - VROOM')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md max-w-md w-[400px] h-[450px] flex flex-col items-center justify-center">
        <div class="text-center mb-4">
            <img src="gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="mx-auto w-24">
            <h2 class="text-xl font-reguler text-gray-800">
                Perbarui Kata Sandi!
            </h2>
        </div>

        @php
            $inputClass = 'w-full max-w-[300px] h-[40px] px-2 py-1 text-sm placeholder:text-sm border-2 border-blue-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700';
        @endphp

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4 flex flex-col items-center w-full">
            @csrf

            <input type="email" name="email" placeholder="Email" class="{{ $inputClass }}" required>
            <input type="password" name="password" placeholder="Kata Sandi Baru" class="{{ $inputClass }}" required>

            <button type="submit"
                class="w-full max-w-[250px] flex justify-center bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                MASUK
            </button>
            <a href="{{ route('loginpage') }}"
                class="w-full max-w-[250px] flex justify-center bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                KEMBALI
            </a>
        </form>
    </div>
</div>
@endsection
