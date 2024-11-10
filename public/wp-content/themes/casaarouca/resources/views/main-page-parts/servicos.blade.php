{{-- SERVIÇOS --}}
@if (have_rows('servicos'))
<section class="servicos text-center mb-32 lg:mb-0 lg:scroll-mt-36 scroll-mt-0 scroll-section" id="servicos">
  <div class="lg:max-w-[50%] mx-auto mb-10">
    <h2 class="text-4xl lg:text-5xl font-semibold literata mb-10">• <?php echo __('Serviços', 'casaarouca') ?> •</h2>
    <section class="splide slider-servicos mt-14" aria-label="Servicos">
      <div class="splide__track">
        <ul class="splide__list items-center">
          @while (have_rows('servicos')) @php the_row() @endphp
            <li class="splide__slide text-center relative">
              <img src="{{ get_sub_field('icon')['url'] }}" alt="" class="m-auto">
              <div class="servico-content lg:w-[300%] w-[150%] relative lg:-left-full lg:-right-full -left-1/4 -right-1/4 bottom-0 mt-10 ">
                <h4 class="text-3xl literata font-semibold pb-3">{!! get_sub_field('titulo') !!}</h4>
                {!! get_sub_field('descricao') !!}
              </div>
            </li>
          @endwhile
        </ul>
      </div>
      <div class="splide__arrows -bottom-[140px] lg:bottom-[280px] relative">
        <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!left-[-50px] splide__arrow--prev !bg-transparent">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
            <circle cx="22.5" cy="23" r="22" stroke="#1C1C13"/>
            <path d="M11.9293 22.4513L33.4648 22.4513" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!right-[-50px] splide__arrow--next !bg-transparent">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
            <circle cx="22.5" cy="23" r="22" stroke="#1C1C13"/>
            <path d="M11.9293 22.4513L33.4648 22.4513" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div id="pagination_servico" class="pagination block lg:hidden relative top-[130px] mulish text-sm"></div>
    </section>
  </div>
  <button data-modal-target="modal-servicos" class="btn btn-green"><?php echo __('Solicitar Serviços', 'casaarouca') ?></button>
</section>
<div id="modal-servicos" class="modal fixed inset-0 flex items-center justify-center hidden">
  <div class="form-servicos bg-bege lg:px-32 py-5 lg:py-12 rounded-[20px] modal-container max-w-[1100px] max-h-[95%] overflow-scroll relative">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl lg:text-5xl font-semibold literata mb-10 lg:pr-0 pr-20 text-left lg:text-center">• <?php echo __('Solicitar Serviços', 'casaarouca') ?> •</h2>
      {!! do_shortcode(get_field('shortcode_formulario_servicos')) !!}
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
@endif