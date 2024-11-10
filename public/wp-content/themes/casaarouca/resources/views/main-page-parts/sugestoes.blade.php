@if (have_rows('sugestoes'))
{{-- DESCUBRA (sugestões) --}}
<section class="sugestoes lg:scroll-mt-36 scroll-mt-0 scroll-section" id="descubra">
  <div class="container mx-auto px-32 lg:py-16 pt-10 pb-24 my-20 bg-green rounded-[20px] text-white text-center">
    <h2 class="text-4xl lg:text-5xl font-semibold literata mb-10">• <?php echo __('Descubra', 'casaarouca') ?> •</h2>
    <p><?php echo __('Explore as sugestões que temos para si e torne a sua estadia memorável', 'casaarouca') ?></p>
    <div class="hidden lg:grid flex flex-col grid-cols-3 gap-10 py-16">
      @php $i = 0; @endphp
      @while (have_rows('sugestoes')) @php the_row() @endphp
        <div class="card-alojamento p-5 border rounded-[10px]" data-modal-target="modal-sugestoes-{{ $i }}">
          <img src="{{ get_sub_field('imagem')['url'] }}" alt="{{ get_sub_field('imagem')['alt'] }}" class="rounded-[10px] border mb-6 m-auto w-full">
          <h3 class="text-2xl font-semibold literata">{!! get_sub_field('titulo') !!}</h3>
        </div>
        @php $i++; @endphp
      @endwhile
    </div>
    <section class="splide slider-sugestoes mt-14 block lg:hidden" aria-label="Basic Structure Example">
      <div class="splide__track">
        <ul class="splide__list items-center">
          @php $j = 0; @endphp
          @while (have_rows('sugestoes')) @php the_row() @endphp
            <li class="splide__slide card-alojamento p-5 border rounded-[10px]" data-modal-target="modal-sugestoes-{{ $j }}">
              <img src="{{ get_sub_field('imagem')['url'] }}" alt="{{ get_sub_field('imagem')['alt'] }}" class="rounded-[10px] border mb-6 m-auto w-full">
              <h3 class="text-2xl font-semibold literata">{!! get_sub_field('titulo') !!}</h3>
            </li>
            @php $j++; @endphp
          @endwhile
        </ul>
      </div>
      <div class="splide__arrows -bottom-[40px] lg:bottom-[280px] relative">
          <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!left-[-50px] splide__arrow--prev !bg-transparent">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
              <circle cx="22.5" cy="23" r="22" stroke="white"/>
              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!right-[-50px] splide__arrow--next !bg-transparent">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
              <circle cx="22.5" cy="23" r="22" stroke="white"/>
              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
        <div id="pagination_sugestao" class="pagination relative top-[30px] text-white mulish text-sm"></div>
    </section>
  </div>
</section>

{{-- MODAL --}}
@php $n = 0; @endphp
@while (have_rows('sugestoes')) @php the_row() @endphp
<div id="modal-sugestoes-{{ $n }}" class="modal fixed inset-0 flex items-center justify-center hidden">
  <div class="bg-bege p-6 rounded-[20px] modal-container max-w-[1100px] max-h-[95%] overflow-scroll-- relative">
    <div class="border lg:px-32 py-16 rounded-[20px] border-green overflow-scroll ">
      <div class="container mx-auto text-center p-16">
        <h2 class="text-2xl lg:text-5xl font-semibold literata mb-10 text-center">{!! get_sub_field('titulo_modal') !!}</h2>
        {!! get_sub_field('conteudo_modal') !!}
        
        <div class="booking-set relative inline-block">
          <span class="btn btn-green w-full block text-center"><?php echo __('Reservar', 'casaarouca') ?></span>
          @if (have_rows('reservas'))
            <ul class="booking-set__submenu px-2 py-1 bg-green rounded-[10px] absolute top-0">
              @while (have_rows('reservas')) @php the_row() @endphp
                <li class="py-1">
                  <a class="btn btn-green block !px-2 text-center" target="_blank" href="{{ get_sub_field('link_botao') }}">
                    <img src="{{ get_sub_field('logo_botao')['url'] }}" alt="{{ get_sub_field('logo_botao')['alt'] }}" class="inline-block">
                  </a>
                </li>
              @endwhile
            </ul>
          @endif
        </div>
      </div>
    </div>
    <button class="close-modal px-6 py-6 absolute top-0 right-0 flex items-center bg-bege p-3">
      <span class="text-sm mr-2"><?php echo __('Fechar', 'casaarouca') ?></span>
      <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="14.5" cy="14.5" r="14" stroke="#1C1C13"/>
        <path d="M18.6893 10.311L10.3115 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M10.3115 10.311L18.6893 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>
</div>
@php
  $n++;
@endphp
@endwhile
@endif