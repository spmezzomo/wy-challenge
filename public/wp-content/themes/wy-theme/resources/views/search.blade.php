@extends('layouts.app')

@section('content')
	<header class="bg-sky-950 pt-28 pb-16 flex items-center">
		<div class="container mx-auto">
			@if ($_GET['s'] == ''))
				<h1 class="raleway-semibold text-5xl text-white">{{ __('Search', 'sage'), }}</h1>
			@else
				@include('partials.page-header')
			@endif
		</div>
	</header>
	<div class="container mx-auto search-content">
		<div class="my-10">{!! get_search_form(false) !!}</div>
		@if (! have_posts())
			<span class="text-lg text-center">{!! __('Sorry, no results were found.', 'sage') !!}</span>
		@endif
		@while(have_posts()) @php(the_post())
			@include('partials.content-search')
		@endwhile

		{!! get_the_posts_navigation() !!}
	</div>
	
@endsection

