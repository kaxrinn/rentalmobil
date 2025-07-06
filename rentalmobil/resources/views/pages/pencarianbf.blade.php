@extends('layouts.appbfnofooter')

@section('title', 'Hasil Pencarian - VROOM')

@section('content')
    <div class="px-4 py-8">
    </div>
    <div>
        {{-- Include section product --}}
        @include('pages.sectionsbf.products', ['mobils' => $mobils ?? null])
    </div>
@endsection

