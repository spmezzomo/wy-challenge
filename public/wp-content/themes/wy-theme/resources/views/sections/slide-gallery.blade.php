{{-- Slideshow Gallery --}}
<section id="slideshow-hp" >
	<div class="lg:flex container mx-auto px-10">
		@if (have_rows('image_slideshow'))
		<div class="flex relative lg:flex-row flex-col flex-col-reverse">
			{{-- Thumbnail navigation --}}
			<section id="thumbnail-carousel" class="splide ml-1 hidden lg:block lg:border-4 border-white shadow-lg" aria-label="Thumbnails">
				<div class="splide__track lg:min-h-full">
					<ul class="splide__list !flex lg:flex-col .justify-between overflow-scroll">
						@if (have_rows('image_slideshow'))
							@while (have_rows('image_slideshow')) @php the_row() @endphp
								<li class="splide__slide border-8 border-white">
									{{-- Image from acf, the alternative text is set on media library --}}
									<img class="" src="{{ get_sub_field('image')['url'] }}" alt="{{ get_sub_field('image')['alt'] }}" >
								</li>
							@endwhile
						@endif
					</ul>
				</div>
			</section>
			{{-- Main image Slide --}}
			<section class="image-gallery splide relative" aria-label="Image Gallery">
				<div class="splide__track h-full">
					<ul class="splide__list">
						@if (have_rows('image_slideshow'))
							@while (have_rows('image_slideshow')) @php the_row() @endphp
								<li class="splide__slide min-h-full  lg:px-10">
									{{-- Image from acf, the alternative text is set on media library --}}
									<img class="object-cover object-bottom border-8 border-white h-full w-full" src="{{ get_sub_field('image')['url'] }}" alt="{{ get_sub_field('image')['alt'] }}">
								</li>
							@endwhile
						@endif
					</ul>
				</div>
			</section>
		</div>
		@endif
	</div>
</section>