@extends('layouts.appedit')
@section('title', 'Registrasi - VROOM')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white bg-opacity-90 p-6 rounded-xl shadow-md max-w-md w-[400px] h-[450px] flex flex-col items-center justify-center">
        <div class="text-center mb-1">
            <img src="/gambarberanda/Logo 6 - Copy.png" alt="Logo VROOM" class="mx-auto w-24">
            <h2 class="text-xl font-reguler text-gray-800">
                Edit Profile
            </h2>
        </div>

        @php
            $inputClass = 'w-[300px] h-[38px] px-2 py-1 text-sm placeholder:text-sm border-2 border-blue-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-700';
        @endphp


        <form action="{{ route('edit-profile.update') }}" method="POST" class="space-y-4 flex flex-col items-center">
            @csrf
       
            <input type="text" name="name" placeholder="Nama Pengguna" class="{{ $inputClass }}" required>
         
            <input type="email" name="email" placeholder="Email" class="{{ $inputClass }}" required>
        
            <input type="tel" name="phone" placeholder="Nomor Handphone" class="{{ $inputClass }}" required>
            
            <input type="password" name="password" placeholder="Password baru atau dikosongkan" class="{{ $inputClass }}" required>

            <button type="submit"
                class="w-[250px] mx-auto flex justify-center bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                Simpan
            </button>
            <button type="batal"
                class="w-[250px] mx-auto flex justify-center bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 rounded-lg transition duration-300 text-sm">
                Batal
            </button>

        </form>

       
    </div>
</div>
@endsection