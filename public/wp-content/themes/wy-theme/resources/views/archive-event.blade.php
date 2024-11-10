@extends('layouts.app')
@section('content')
<header class="bg-sky-950 pt-28 pb-16 flex items-center">
	<div class="container mx-auto">
		<h1 class="raleway-semibold text-5xl text-white">{!! __('Events', 'sage') !!}</h1>
	</div>
</header>
<section>
	<div class="lg:w-2/3 mx-auto container">
		@if ($events->have_posts())
				@while ($events->have_posts()) @php $events->the_post() @endphp
					<article class="my-5 lg:flex w-full justify-between items-center border-b-2 border-sky-950 pb-5">
						@php
							$terms = get_the_terms( $events->ID, 'event-tag' );
						@endphp
						<div class="title lg:w-1/2">
							@foreach ($terms as $tag)
								<div class="tag text-xs uppercase text-white bg-sky-950 mulish-normal p-1 inline-block mb-3">{{ $tag->name }}</div>
							@endforeach
							<a href="{{ get_permalink() }}">
								<h2 class="text-3xl raleway-semibold">{{ the_title() }}</h2>
							</a>
							<div class="date mulish-normal">
								{{ get_field('begin_event_date') }}
							</div>
						</div>
						<div class="description lg:w-1/2 py-5 lg:py-0">{{ the_excerpt() }}</div>
					</article>
				@endwhile

				<div class="pagination raleway-normal">
						{!! paginate_links([
								'total'     => $events->max_num_pages,
								'current'   => max(1, get_query_var('paged')),
								'prev_text' => __('&laquo; Previous'),
								'next_text' => __('Next &raquo;'),
								'type'      => 'list',
						]) !!}
				</div>
				@php wp_reset_postdata() @endphp
		@else
				<p>{{ __('No events found.', 'sage') }}</p>
		@endif
	</div>
</section>
@endsection


