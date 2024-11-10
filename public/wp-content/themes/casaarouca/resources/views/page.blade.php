@extends('layouts.app')

@php
  session_start();
@endphp
@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container mx-auto pl-24 lg:pb-40 pb-28">
      @include('partials.page-header')
      <div class="lg:max-w-[860px]">
      @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    </div>
  @endwhile

@endsection