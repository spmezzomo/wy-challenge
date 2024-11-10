{{--
  Template Name: Posts Archive Template
--}}
@extends('layouts.app')
@section('content')
<header class="bg-sky-950 pt-28 pb-16 flex items-center">
  <div class="container mx-auto">
    <h1 class="raleway-semibold text-5xl text-white">{!! the_title() !!}</h1>
  </div>
</header>
<section>
  <div class="container mx-auto my-10">
    @if ($posts->have_posts())
        @while ($posts->have_posts()) @php $posts->the_post() @endphp
          <div class="blog-post">
            @include('partials.post-element')
          </div>
          @endwhile

          <div class="pagination raleway-normal">
              {!! paginate_links([
                  'total'     => $posts->max_num_pages,
                  'current'   => max(1, get_query_var('paged')),
                  'prev_text' => __('&laquo; Previous'),
                  'next_text' => __('Next &raquo;'),
                  'type'      => 'list',
              ]) !!}
          </div>
        @php wp_reset_postdata() @endphp
    @else
        <p>{{ __('No posts found.', 'sage') }}</p>
    @endif
  </div>
</section>
@endsection