<header class="banner absolute w-full shadow-lg backdrop-blur-sm">
  <div class="container mx-auto flex justify-between items-center">
    {{-- logotipo --}}
    <a class="brand my-3" href="{{ home_url('/') }}">
      <img src="{{ get_field('logo', 'options')['url'] }}" alt="{{ get_field('logo', 'options')['alt'] }}" class="max-w-[110px] lg:max-w-[250px] mx-auto">
    </a>
    {{-- menu --}}
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary mix-blend-exclusion text-white raleway-semibold" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex', 'echo' => false]) !!}
      </nav>
    @endif
  </div>
</header>
