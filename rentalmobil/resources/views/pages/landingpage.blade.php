@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  @include('pages.sections.hero')
  @include('pages.sections.about')
  @include('pages.sections.products')
  @include('pages.sections.reviews')
  @include('pages.sections.contact')
  @include('pages.sections.location')
  @include('pages.sections.guide')
@endsection