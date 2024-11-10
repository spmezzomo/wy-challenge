{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')
@php
  session_start();
@endphp
@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container mx-auto">
      @include('partials.page-header')
      @include('partials.content-page')
    </div>
  @endwhile
@endsection
