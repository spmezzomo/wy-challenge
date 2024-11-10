@extends('layouts.app')

@section('content')
<div class="homepage min-h-max ---h-dvh flex flex-col items-center justify-center lg:py-16 py-5 relative" style="--bg: url({{ get_the_post_thumbnail_url() }})">
	@php $n = 0; @endphp
	@while (have_rows('opcoes')) @php the_row() @endphp
		<div id="card-{{ $n }}" class="bg-active min-h-max h-full w-full absolute inset-0" style="--bg: url({{ get_sub_field('image')['url'] }})"></div>
		@php $n++; @endphp
	@endwhile
	<header class="w-full flex front-page-header">
		<div class="container mx-auto flex justify-end">
			<nav class="switcher z-10 relative" aria-label="{{ wp_get_nav_menu_name('language_switcher') }}">
				{!! wp_nav_menu(['theme_location' => 'language_switcher', 'menu_class' => 'nav ', 'echo' => false]) !!}
			</nav>
		</div>
	</header>
	<div class="logo z-10 relative">
		<img src="{{ get_field('logo_vertical', 'options')['url'] }}" alt="{{ get_field('logo_vertical', 'options')['alt'] }}">
	</div>
	@if (have_rows('opcoes'))
		<div class="cards p-5 lg:p-20 md:flex grid gap-10">
			@php $i = 0; @endphp
			@while (have_rows('opcoes')) @php the_row() @endphp
				
				<div class="card px-5 py-6 p-10 z-10 max-w-lg rounded-[15px]" data-card="card-{{ $i }}" >
					<div class="card-content h-full px-5 py-7 flex flex-col items-center justify-center text-white  border-2 rounded-[12px]">
						<img src="@asset('images/flor-logo.svg')">
						<h1 class="literata font-semibold text-lg lg:text-3xl py-7">• {!! get_sub_field('titulo') !!} •</h1>
						<div class="plus block lg:hidden">
							<svg xmlns="http://www.w3.org/2000/svg" width="41" height="42" viewBox="0 0 41 42" fill="none">
								<circle cx="20.5" cy="20.9961" r="14" transform="rotate(-45 20.5 20.9961)" stroke="white"/>
								<path d="M20.5 15.0721V26.9201" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M14.576 20.9961H26.424" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>	
						<div class="body flex flex-col items-center opacity-0 lg:opacity-100 h-0 lg:h-auto">
							{!! get_sub_field('copy') !!}
							<a href="{{ get_sub_field('url') }}" class="btn btn-white mt-11"><?php echo __('Visitar', 'casaarouca') ?></a>
						</div>
					</div>
				</div>
				@php $i++; @endphp
			@endwhile
		</div>
	@endif
	@if (have_rows('social_media', 'options'))
		<div class="sm z-10 relative flex gap-5">
			@while (have_rows('social_media', 'options')) @php the_row() @endphp
				<a href="{{ get_sub_field('sm_url') }}">
					<img src="{{ get_sub_field('sm_logo')['url'] }}" alt="{{ get_sub_field('sm_logo')['alt'] }}">
				</a>
			@endwhile
		</div>
	@endif
</div>

@endsection