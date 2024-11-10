<footer class="content-info bg-yellow lg:py-5 pt-5 pb-20">
  <div class="container mx-auto">
    <div class="lg:flex justify-between items-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="{{ get_field('logo_footer', 'options')['url'] }}" alt="{{ get_field('logo_menu', 'options')['alt'] }}" class="max-w-[220px] lg:max-w-[250px] mx-auto">
      </a>

      <div class="info lg:flex items-center">
        <div class="mail flex lg:mr-10 py-5 lg:py-0 items-center gap-2 justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="none">
            <path d="M18.5167 0.601074H1.59467C1.02084 0.601074 0.555664 1.06625 0.555664 1.64008V13.3601C0.555664 13.9339 1.02084 14.3991 1.59467 14.3991H18.5167C19.0905 14.3991 19.5557 13.9339 19.5557 13.3601V1.64008C19.5557 1.06625 19.0905 0.601074 18.5167 0.601074Z" stroke="#1C1C13" stroke-linejoin="round"/>
            <path d="M5.44931 8.74658L1.1582 13.8862" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.666 8.74658L18.9571 13.8862" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M0.926758 0.974893L10.0839 8.04361L19.1683 0.916016" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <a href="info@casadearouca.pt">info@casadearouca.pt</a>
        </div>
        @if (have_rows('social_media', 'options'))
          <div class="sm relative flex justify-center gap-5">
            @while (have_rows('social_media', 'options')) @php the_row() @endphp
              <a href="{{ get_sub_field('sm_url') }}">
                <img src="{{ get_sub_field('sm_logo_footer')['url'] }}" alt="{{ get_sub_field('sm_logo')['alt'] }}">
              </a>
            @endwhile
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="container mx-auto lg:flex justify-between items-center mt-5">
    <div class="menu-footer text-xs">
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'footer_menu', 'menu_class' => 'nav lg:flex gap-x-10 text-center lg:text-start', 'echo' => false]) !!}
      </nav>
    </div>
    <div class="info lg:flex items-center text-center">
      <span class="text-[10px] lg:mr-10 ">© CASA DE AROUCA {{ date('Y') }}. TODOS OS DIREITOS RESERVADOS</span class="text-[10px]">
      <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank"><img src="@asset('images/livro-reclamacoes.png')" class="mx-auto my-5 lg:my-0"></a>
    </div>
  </div>
</footer>
<div class="fixed lg:hidden btn-reservar inset-x-0 bottom-0 z-50 p-5">
  {{-- <a href="#" class="btn btn-yellow w-full block text-center"><?php echo __('Reservar', 'casaarouca')?></a> --}}
  <div class="booking-set relative">
      <span class="btn btn-yellow w-full block text-center"><?php echo __('Reservar', 'casaarouca') ?></span>
      @if (have_rows('reservas'))
        <ul class="booking-set__submenu px-2 py-1 bg-yellow rounded-[10px] absolute bottom-0 hidden w-full">
          @while (have_rows('reservas')) @php the_row() @endphp
            <li class="py-1">
              <a class="btn btn-yellow block !px-2 text-center" target="_blank" href="{{ get_sub_field('link_botao') }}">
                <img src="{{ get_sub_field('logo_botao')['url'] }}" alt="{{ get_sub_field('logo_botao')['alt'] }}" class="inline-block">
              </a>
            </li>
          @endwhile
        </ul>
      @endif
    </div>
</div>