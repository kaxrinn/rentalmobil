@extends('layouts.appadmin')

@section('title', 'admin')

@section('content')
  <div class="pt-[10px] px-4 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
      <!-- Card 1 -->
      <a href="{{ route('pemesananadmin') }}" class="no-underline">
        <div class="rounded-lg bg-[#3498db] text-white p-5 shadow">
          <i class="fa fa-book text-1xl"></i>
          <div class="flex justify-between items-center">
            <p class="text-lg font-bold">List Data Pemesanan</p>
          </div>
        </div>
      </a>

      <!-- Card 2 -->
      <a href="{{ route('mobiladmin') }}" class="no-underline">
        <div class="rounded-lg bg-[#1abc9c] text-white p-5 shadow">
          <i class="fa fa-car text-1xl"></i>
          <div class="flex justify-between items-center">
            <p class="text-lg font-bold">List Data Mobil</p>
          </div>
        </div>
      </a>

      <!-- Card 3 -->
      <a href="{{ route('ulasanadmin') }}" class="no-underline">
        <div class="rounded-lg bg-[#e74c3c] text-white p-5 shadow">
          <i class="fa fa-comments text-1xl"></i>
          <div class="flex justify-between items-center">
            <p class="text-lg font-bold">List Data Ulasan</p>
          </div>
        </div>
      </a>

      <!-- Card 4 -->
      <a href="{{ route('hubungiadmin') }}" class="no-underline">
        <div class="rounded-lg bg-[#9b59b6] text-white p-5 shadow">
          <i class="fa fa-phone text-1xl"></i>
          <div class="flex justify-between items-center">
            <p class="text-lg font-bold">List Data hubungi Kami</p>
          </div>
        </div>
      </a>
    </div>
  </div>
@endsection
