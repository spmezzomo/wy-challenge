{{-- SOBRE --}}
<section class="sobre text-white py-10 px-5 lg:px-0 bg-green">
  <div class="lg:container mx-auto lg:flex items-center pb-24 pt-10 lg:px-0 border border-white rounded-xl">
    <div class="content lg:w-1/2 px-10 text-left">
      <h2 class="text-4xl lg:text-7xl literata font-semibold mb-7">• {!! str_replace(' ', '<br>', get_the_title()) !!} •</h2>
      {!! get_the_content() !!}
    </div>
    <div class="sobre-slideshow lg:w-1/2 lg:mr-0 mr-[-20px]">
    @if (have_rows('multiple_featured_images'))
      {{-- Carroussel Mobile --}}
      <section id="custom-slider" class="splide lg:hidden pl-10 mt-10" aria-label="Custom Slider">
        <div class="splide__track">
          <ul class="splide__list">
            @while (have_rows('multiple_featured_images')) @php the_row() @endphp
              <li class="splide__slide">
                <img src="{{ get_sub_field('featured_image')['url'] }}" alt="{{ get_sub_field('featured_image')['alt'] }}" class=" border border-white rounded-xl">
              </li>
            @endwhile
          </ul>
        </div>
        <div class="splide__arrows absolute bottom-[-30px]">
          <button class="splide__arrow splide__arrow--prev !left-0 !bg-transparent">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
              <circle cx="22.5" cy="23" r="22" stroke="white"/>
              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <button class="splide__arrow splide__arrow--next left-[50px] !right-auto !bg-transparent">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
              <circle cx="22.5" cy="23" r="22" stroke="white"/>
              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
      </section>
      {{-- Carroussel Desktop --}}
      <div id="carousel" class="hidden lg:flex">
        <div class="carousel-image-wrapper">
          @php $image_index = 0; @endphp
          @while (have_rows('multiple_featured_images')) @php the_row() @endphp
            <div class="carousel-image border border-white rounded-xl" data-index="{{ $image_index }}" style="background-image: url('{{ get_sub_field('featured_image')['url'] }}');" alt="{{ get_sub_field('featured_image')['alt'] }}"></div>
            @php $image_index++; @endphp
          @endwhile
        </div>
        <button id="prev" class="carousel-arrow left-arrow">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="22.5" cy="22.5" r="22" transform="matrix(-1 0 0 1 45 0.5)" stroke="white"/>
            <path d="M33.0707 22.4513L11.5352 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M19.2181 14.7683V14.7683C17.2621 17.8702 14.637 20.4952 11.5352 22.4512V22.4512V22.4512C14.637 24.4072 17.2621 27.0323 19.2181 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button id="next" class="carousel-arrow right-arrow">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="22.5" cy="23" r="22" stroke="white"/>
            <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    @endif
    </div>
  </div>
</section>