@extends('layouts.appnofooter')

@section('title', 'Hasil Pencarian - VROOM')

@section('content')
    <div class="px-4 py-8">
    </div>
    <div>
        {{-- Include section product --}}
        @include('pages.sections.products', ['mobils' => $mobils ?? null])
    </div>
@endsection

