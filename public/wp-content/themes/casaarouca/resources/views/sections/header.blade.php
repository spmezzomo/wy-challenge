@php
  if (basename(get_page_template()) == 'template-home-local.blade.php') {
    $origin = '';
  } else {
    if (isset($_SESSION['pagina_origem'])) {
      $origin = $_SESSION['pagina_origem'];
    } else {
      $origin = 'porto-apartment';
    }
  }

  if ($origin) {
    $pageID = get_page_by_path($origin)->ID;
  } else {
    $pageID = get_the_ID();
  }

  
  
@endphp
<header class="banner absolute lg:fixed z-20 lg:container max-w-[90%] mx-auto flex items-center justify-between inset-x-0 bg-white rounded-[20px] px-5 lg:px-10 py-5 mt-6">
    <a class="brand" href="{{ home_url('/') }}">
      @if (get_field('individual_logo', $pageID))
      <img src="{{ get_field('individual_logo', $pageID)['url'] }}" alt="{{ get_field('logo_menu', 'options')['alt'] }}" class="max-w-[220px] lg:max-w-[250px]">
      @endif
      <span class="back absolute -bottom-7 font-bold text-sm">< <?php echo __('Voltar', 'casaarouca') ?></span>
    </a>
    <div id="menu" class="lg:flex items-center gap-x-10 hidden">
      @if (has_nav_menu('primary_navigation'))
        {{-- <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav lg:flex gap-x-10', 'echo' => false]) !!}
        </nav> --}}
        
      @endif
      <nav class="nav-primary" aria-label="Main Menu">
        <div class="menu-main-menu-container">
          <ul id="menu-main-menu" class="nav lg:flex gap-x-10">
            <li class="menu-item menu-item-type-custom menu-item-object-custom">
              <a href="{{ $origin }}#historia"><?php echo __('História', 'casaarouca') ?></a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom">
              <a href="{{ $origin }}#apartamentos"><?php echo __('Apartamentos', 'casaarouca') ?></a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom">
              <a href="{{ $origin }}#servicos"><?php echo __('Serviços', 'casaarouca') ?></a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom">
              <a href="{{ $origin }}#descubra"><?php echo __('Descubra', 'casaarouca') ?></a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom">
              <a href="{{ $origin }}#contactos"><?php echo __('Contactos', 'casaarouca') ?></a>
            </li>
          </ul>
        </div>
      </nav>




      <nav class="switcher z-10 relative" aria-label="{{ wp_get_nav_menu_name('language_switcher') }}">
          {!! wp_nav_menu(['theme_location' => 'language_switcher', 'menu_class' => 'nav ', 'echo' => false]) !!}
      </nav>
      <div class="booking-set relative">
        <span class="btn btn-yellow w-full block text-center"><?php echo __('Reservar', 'casaarouca') ?></span>
        @if (have_rows('reservas'))
          <ul class="booking-set__submenu px-2 py-1 bg-yellow rounded-[10px] absolute top-0 hidden">
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
    <div class="hamburger block lg:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" width="36" height="16" viewBox="0 0 36 16" fill="none">
        <path d="M1 8.125H28" stroke="#1C1C13" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8 15.125H35" stroke="#1C1C13" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M8 1.125H35" stroke="#1C1C13" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
    </div>
</header>

<div id="menu-mobile" class="hidden lg:hidden flex-col items-start px-14 py-28 z-30 absolute inset-0">
  <a id="close" class="flex absolute top-4 right-4">
    Fechar 
    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-3" >
      <circle cx="14.5" cy="14.5" r="14" stroke="#1C1C13"/>
      <path d="M18.6889 10.311L10.3112 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M10.3112 10.311L18.6889 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </a>
  @if (has_nav_menu('primary_navigation'))
    {{-- <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav lg:flex gap-x-10', 'echo' => false]) !!}
    </nav> --}}
  @endif
  <nav class="nav-primary" aria-label="Main Menu">
    <div class="menu-main-menu-container">
      <ul id="menu-main-menu-1" class="nav lg:flex gap-x-10">
        <li class="menu-item menu-item-type-custom menu-item-object-custom">
          <a href="{{ $origin }}#historia"><?php echo __('História', 'casaarouca') ?></a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom">
          <a href="{{ $origin }}#apartamentos"><?php echo __('Apartamentos', 'casaarouca') ?></a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom">
          <a href="{{ $origin }}#servicos"><?php echo __('Serviços', 'casaarouca') ?></a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom">
          <a href="{{ $origin }}#descubra"><?php echo __('Descubra', 'casaarouca') ?></a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom">
          <a href="{{ $origin }}#contactos"><?php echo __('Contactos', 'casaarouca') ?></a>
        </li>
      </ul>
    </div>
  </nav>
  
  @php
    global $post;
  @endphp
  @if ($post->post_name == 'porto-apartments')
    <a class="btn btn-hollow mb-16" href="/arouca-suites">Arouca Suites</a>
  @endif

  @if ($post->post_name == 'arouca-suites')
    <a class="btn btn-hollow mb-16" href="/porto-apartments">Porto Apartments</a>
  @endif
  
  <div class="flex gap-x-10">
    <a href="#" class="btn btn-white">Reservar</a>
    <nav class="switcher z-10 relative" aria-label="{{ wp_get_nav_menu_name('language_switcher') }}">
        {!! wp_nav_menu(['theme_location' => 'language_switcher', 'menu_class' => 'nav ', 'echo' => false]) !!}
    </nav>
  </div>
  
</div>