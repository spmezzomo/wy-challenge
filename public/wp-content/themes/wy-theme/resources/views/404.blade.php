@extends('layouts.app')
@section('content')
<header class="bg-sky-950 pt-28 pb-16 flex items-center">
  <div class="container mx-auto">
    <h1 class="raleway-semibold text-5xl text-white">404</h1>
  </div>
</header>
<section class="page-404 h-full flex flex-col justify-center">
  <div class="container mx-auto flex flex-col items-center h-full">
  @if (! have_posts())
      <span class="text-lg text-center">{!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}</span>
      <div class="my-10 w-full">{!! get_search_form(false) !!}</div>
  @endif
  </div>
</section>
@endsection

