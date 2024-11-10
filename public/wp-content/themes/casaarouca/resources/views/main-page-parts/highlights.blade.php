{{-- DESTAQUE --}}
@if (have_rows('destaques'))
<div class="highlight relative z-1">
  <div id="custom-cursor"></div>
  <section class="page-highlight splide" aria-label="Destaque da página">
    <div class="splide__track">
      <ul class="splide__list">
        @while (have_rows('destaques')) @php the_row() @endphp
        <li class="splide__slide h-screen">
          <img src="{{ get_sub_field('imagem_destaque')['url'] }}" alt="{{ get_sub_field('imagem_destaque')['alt'] }}">
        </li>
        @endwhile
      </ul>
    </div>
  </section>
  <div class="content absolute text-white inset-0 flex items-center justify-between">
    <div class="container mx-auto p-7 lg:p-0">
      <h1 class="literata leading-tight text-[50px] lg:text-[140px] font-semibold">• {!! str_replace(' ', '<br>', get_the_title()) !!} •</h1>
      <div class="booking flex items-center mt-10 rounded-xl w-fit px-4 py-2">
        <span class="literata font-semibold text-4xl">{{ get_field('avaliacao_booking_nota') }}</span>
        <div class="leading-none mx-3">
          <span class="text-sm font-bold block">{{ get_field('avaliacao_booking') }}</span>
          <span class="text-xs">{{ get_field('quantidad_de_comentarios') }} <?php echo __('comentários', '') ?></span>
        </div>
        <a href="{{ get_field('url_booking') }}" class="cursor-pointer z-30 relative" target="_blank">
          <img src="@asset('images/logo-booking.png')" class="">
        </a>
      </div>
    </div>
  </div>
  <div id="pagination" class="pagination absolute text-white mulish right-28 bottom-32 text-sm"></div>
</div>
@endif