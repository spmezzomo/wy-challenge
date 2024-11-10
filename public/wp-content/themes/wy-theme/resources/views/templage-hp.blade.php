{{--
  Template Name: Homepage
--}}
@extends('layouts.app')
@section('content')
  @include('sections.hero-hp')
  <div id="page-content">
    @include('sections.slide-gallery')
    @include('sections.posts-highlights')
    @include('sections.block-event-link')

    <div class="container mx-auto text-center">
      <div class="border-y-2 border-sky-950 lg:py-16 py-8 lg:absolute inset-x-px mb-5 lg:mb-0 ">
        <a href="/?s" class="lg:text-xl text-lg raleway-semibold mb-5">{{ __('Looking for somethin else? Click here', 'sage') }}</a>
      </div>
    </div>

  </div>
@endsection
