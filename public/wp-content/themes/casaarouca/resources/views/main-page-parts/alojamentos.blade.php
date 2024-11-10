{{-- ALOJAMENTOS --}}
@php
  global $post;

  $alojamentos = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'alojamento',
        'tax_query' => array(
            array(
                'taxonomy' => 'tipo-de-alojamento',
                'field' => 'slug',
                'terms' => $post->post_name,
            )
        )
    )
  );

  foreach ($alojamentos as $alojamento) {
    $taxID = get_the_terms( $alojamento->ID, 'tipo-de-alojamento' )[0]->term_id;
  }
@endphp
@if ($alojamentos)
<section class="alojamentos lg:px-0 px-5 lg:scroll-mt-36 scroll-mt-0 scroll-section" id="apartamentos">
  <div class="container mx-auto px-10 py-16 my-20 bg-bege rounded-[20px]">
    <div class="section-header text-center">
      <h2 class="text-4xl lg:text-5xl font-semibold literata mb-10">• {!! get_field('titulo_do_bloco', 'term_'.$taxID) !!} •</h2>
      <div class="max-w-[400px] mx-auto">{!! term_description($taxID) !!}</div>
    </div>
    <div class="lg:grid flex flex-col grid-cols-3 gap-10 py-16">
      @foreach ($alojamentos as $i => $alojamento)
        <div class="card-alojamento p-5 border rounded-[10px]">
          <img src="{{ get_the_post_thumbnail_url($alojamento->ID) }}" alt="" class="rounded-[10px] mb-6"> 
          <span class="text-sm">
            @if (get_the_category($alojamento->ID))
              {{ get_the_category($alojamento->ID)[0]->name }}
            @endif
          </span>
          <h3 class="text-2xl font-semibold literata">{!! $alojamento->post_title !!}</h3>
          @if (have_rows('servicos', $alojamento->ID))
            <div class="servicos grid grid-rows-2 grid-flow-col gap-x-4 gap-y-2 mt-4">
              @php $n = 0; @endphp
              @while (have_rows('servicos', $alojamento->ID)) @php the_row() @endphp
                  <div class="flex items-center text-green text-xs">
                    <img src="{{ get_sub_field('icon')['url'] }}" alt="{{ get_sub_field('icon')['alt'] }}" class="mr-2">
                    {!! get_sub_field('servico') !!}
                  </div>
                  @php
                    $n++; // Increase the number by one after each run
                    if($n==4) break; // Stop after four runs
                  @endphp
              @endwhile
              @php
                reset_rows();
              @endphp
            </div>
          @endif
          <button data-modal-target="modal{{ $i }}" class="btn btn-hollow btn-hollow-green mt-7"><?php echo __('Ver Mais', 'casaarouca') ?></button>

          <div id="modal{{ $i }}" class="modal modal-alojamentos fixed inset-0 flex items-center justify-center hidden">
            <div class="bg-bege p-6 rounded-[20px] modal-container max-w-[1100px] max-h-[95%] flex relative">
                <div class="border p-5 rounded-[20px] border-green overflow-scroll mt-10 lg:mt-0">
                  <div class="lg:flex mb-5">
                    @if (have_rows('slider_de_imagens', $alojamento->ID))
                    <div class="lg:flex relative" id="modal-slider{{ $i }}">
                      <section class="alojamento-slider splide relative" aria-label="Destaque da página">
                        <div class="splide__arrows absolute bottom-[40px] right-[80px]">
                          <button class="splide__arrow splide__arrow--prev !left-[-40px] !bg-transparent !w-auto !h-auto">
                            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-auto !h-auto">
                              <circle cx="22.5" cy="23" r="22" stroke="white"/>
                              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                          <button class="splide__arrow splide__arrow--next left-[20px] !right-auto !bg-transparent !w-auto !h-auto">
                            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-auto !h-auto">
                              <circle cx="22.5" cy="23" r="22" stroke="white"/>
                              <path d="M11.9293 22.4513L33.4648 22.4513" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </button>
                        </div>
                        <div class="splide__track h-full">
                          <ul class="splide__list">
                            @if (have_rows('slider_de_imagens', $alojamento->ID))
                              @while (have_rows('slider_de_imagens', $alojamento->ID)) @php the_row() @endphp
                                <li class="splide__slide rounded-xl min-h-full">
                                  <img src="{{ get_sub_field('imagem')['url'] }}" alt="{{ get_sub_field('imagem')['alt'] }}">
                                </li>
                              @endwhile
                            @endif
                          </ul>
                        </div>
                      </section>

                      <section id="thumbnail-carousel-{{ $i }}" class="splide ml-1 hidden lg:block" aria-label="Thumbnails">
                        <div class="splide__track min-h-full">
                          <ul class="splide__list !flex flex-col .justify-between overflow-scroll">
                            @if (have_rows('slider_de_imagens', $alojamento->ID))
                              @while (have_rows('slider_de_imagens', $alojamento->ID)) @php the_row() @endphp
                                <li class="splide__slide rounded-lg !border-0">
                                  <img src="{{ get_sub_field('imagem')['url'] }}" alt="{{ get_sub_field('imagem')['alt'] }}" >
                                </li>
                              @endwhile
                            @endif
                          </ul>
                        </div>
                      </section>
                      <div id="paginationSlide" class="pagination absolute text-white mulish left-5 bottom-5 text-sm"></div>
                    </div>
                    @endif
                    <div class="lg:px-5">
                      <span class="text-sm">
                        @if (get_the_category($alojamento->ID))
                          {{ get_the_category($alojamento->ID)[0]->name }}
                        @endif
                      </span>
                      <h3 class="text-2xl lg:text-4xl font-semibold literata">{!! $alojamento->post_title !!}</h3>
                      @if (have_rows('servicos', $alojamento->ID))
                        <div class="servicos mt-4 lg:block flex flex-wrap gap-x-2">
                          @while (have_rows('servicos', $alojamento->ID)) @php the_row() @endphp
                            <div class="flex items-center text-green text-xs pb-2.5">
                              <img src="{{ get_sub_field('icon')['url'] }}" alt="{{ get_sub_field('icon')['alt'] }}" class="mr-2">
                              {!! get_sub_field('servico') !!}
                            </div>
                          @endwhile

                        </div>
                      @endif
                    </div>
                  </div>

                  <h3 class="font-semibold text-lg literata mb-4"><?php echo __('Comodidades', 'casaarouca') ?></h3>
                  <div class="hidden lg:grid grid-cols-4 gap-5">
                    <div class="col-span-2">
                      @if (have_rows('servicos_bem-estar', $alojamento->ID))
                        <h4 class="text-green font-semibold">Bem-estar</h4>
                        <ul class="grid grid-cols-2 list-disc pl-5 text-sm">
                          @while (have_rows('servicos_bem-estar', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                    <div>
                      @if (have_rows('servicos_cozinha', $alojamento->ID))
                        <h4 class="text-green font-semibold"><?php echo __('Cozinha', 'casaarouca') ?></h4>
                        <ul class="list-disc pl-5 text-sm">
                          @while (have_rows('servicos_cozinha', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                    <div>
                      @if (have_rows('servicos_bwc', $alojamento->ID))
                        <h4 class="text-green font-semibold"><?php echo __('Casa de banho', 'casaarouca') ?></h4>
                        <ul class="list-disc pl-5 text-sm">
                          @while (have_rows('servicos_bwc', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                  </div>

                  <div class="lg:hidden block">
                    <div class="accordion-item">
                      @if (have_rows('servicos_bem-estar', $alojamento->ID))
                        <button class="accordion-header p-1">
                          <?php echo __('Bem-estar', 'casaarouca') ?>
                          <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                            <path d="M15.8659 0.658625V0.658625C12.764 2.61464 10.1389 5.2397 8.18293 8.34155V8.34155V8.34155C6.22692 5.2397 3.60185 2.61464 0.5 0.658626V0.658626" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </button>
                        <ul class="list-disc pl-5 text-sm accordion-content ">
                          @while (have_rows('servicos_bem-estar', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                    <div class="accordion-item">
                      @if (have_rows('servicos_cozinha', $alojamento->ID))
                        <button class="accordion-header p-1">
                          <?php echo __('Cozinha', 'casaarouca') ?>
                          <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                            <path d="M15.8659 0.658625V0.658625C12.764 2.61464 10.1389 5.2397 8.18293 8.34155V8.34155V8.34155C6.22692 5.2397 3.60185 2.61464 0.5 0.658626V0.658626" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </button>
                        <ul class="list-disc pl-5 text-sm accordion-content ">
                          @while (have_rows('servicos_cozinha', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                    <div class="accordion-item">
                      @if (have_rows('servicos_bwc', $alojamento->ID))
                        <button class="accordion-header p-1">
                          <?php echo __('Casa de banho', 'casaarouca') ?>
                          <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
                            <path d="M15.8659 0.658625V0.658625C12.764 2.61464 10.1389 5.2397 8.18293 8.34155V8.34155V8.34155C6.22692 5.2397 3.60185 2.61464 0.5 0.658626V0.658626" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </button>
                        <ul class="list-disc pl-5 text-sm accordion-content ">
                          @while (have_rows('servicos_bwc', $alojamento->ID)) @php the_row() @endphp
                            <li>{!! get_sub_field('item') !!}</li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                  </div>

                  <div class="modal-bottom lg:flex justify-between items-center  mt-10">
                    <div class="text-[10px] text-green  mb-3 lg:mb-0">{!! get_field('footer_note', $alojamento->ID) !!}</div>

                    {{-- <button class="btn btn-green"><?php echo __('Reservar', 'casaarouca') ?></button> --}}
                    <div class="booking-set relative inline-block">
                      <span class="btn btn-green w-full block text-center"><?php echo __('Reservar', 'casaarouca') ?></span>
                      @if (have_rows('reservas', $alojamento->ID))
                        <ul class="booking-set__submenu px-2 py-1 bg-green rounded-[10px] absolute bottom-0">
                          @while (have_rows('reservas', $alojamento->ID)) @php the_row() @endphp
                            <li class="py-1">
                              <a class="btn btn-green block !px-2 text-center" target="_blank" href="{{ get_sub_field('link_botao') }}">
                                @if (get_sub_field('logo_botao'))
                                  <img src="{{ get_sub_field('logo_botao')['url'] }}" alt="{{ get_sub_field('logo_botao')['alt'] }}" class="inline-block">
                                @endif
                              </a>
                            </li>
                          @endwhile
                        </ul>
                      @endif
                    </div>
                  </div>


                  
                </div>
                <button class="close-modal px-4 py-2 absolute top-0 right-0 flex items-center bg-bege p-3">
                  <span class="text-sm mr-2"><?php echo __('Fechar', 'casaarouca') ?></span>
                  <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="14.5" cy="14.5" r="14" stroke="#1C1C13"/>
                    <path d="M18.6893 10.311L10.3115 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.3115 10.311L18.6893 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center">
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
  
</section>
@endif
@php
  wp_reset_query();
@endphp