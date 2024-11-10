{{-- HP Blog posts section --}}
<section id="posts-highlight" class="mt-20">
	<div class="block-header text-center w-3/5 mx-auto mb-16">
		<h2 class="lg:text-5xl text-3xl raleway-semibold mb-5">• {!! get_field('posts_highlights_block_title') !!} •</h2>
		<div class="content">
			{!! get_field('posts_highlights_block_description') !!}
		</div>
	</div>
	<div class="container mx-auto">
		@php
			$posts_highlight = get_field('posts_highlight');
		@endphp
		@if ($posts_highlight)
			@foreach ($posts_highlight as $post)
				<div class="blog-post">
					<a href="{{ get_permalink($post) }}">
						<div class="post-img overflow-hidden">
							{{-- Attached Post Image, the alternative text is set on media library --}}
							<img src="{{ get_the_post_thumbnail_url($post) }}" alt="{{ get_post_meta( get_post_thumbnail_id($post), '_wp_attachment_image_alt', true) }}" class="h-[300px] w-full object-cover object-center hover:scale-110 transition-all duration-300">
						</div>
					</a>
					<div class="shadow-lg px-10 pb-10 pt-12 lg:h-[250px] -mt-8 background-blur backdrop-blur-md flex flex-col justify-between">
						<div class="post-item">
							<h4 class="uppercase mb-4 raleway-semibold leading-none"><a href="{{ get_permalink($post) }}">{{ get_the_title($post) }}</a></h4>
							<div class="block-content lg:h-[100px] overflow-y-scroll add-read-more show-less-content">
								{{ the_excerpt($post) }}
							</div>
						</div>
						<div>
							<a href="{{ get_permalink($post) }}" class="text-sm raleway-semibold">{!! __('Read more', 'sage') !!}</a>
						</div>
					</div>
				</div>
			@endforeach
			@php
				wp_reset_postdata();
			@endphp
		@endif
	</div>
</section>