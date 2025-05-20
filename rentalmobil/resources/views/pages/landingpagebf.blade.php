@extends('layouts.appbf')

@sectionbf('title', 'Beranda')

@section('content')
  @include('pages.sectionsbf.hero')
  @include('pages.sectionsbf.about')
  @include('pages.sectionsbf.products')
  @include('pages.sectionsbf.reviews')
  @include('pages.sectionsbf.contact')
  @include('pages.sectionsbf.location')
  @include('pages.sectionsbf.guide')
@endsection