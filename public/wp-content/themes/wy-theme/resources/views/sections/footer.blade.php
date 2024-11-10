<footer class="bg-sky-950 lg:py-5 pt-5 pb-5">
  <div class="container mx-auto">
    <div class="lg:flex justify-between items-center">
      <a class="brand" href="{{ home_url('/') }}">
        <img src="{{ get_field('logo', 'options')['url'] }}" alt="{{ get_field('logo', 'options')['alt'] }}" class="max-w-[220px] lg:max-w-[250px] mx-auto">
      </a>
      <div class="menu-footer text-white text-center lg:text-right mt-3 lg:mt-0">
        <p>{{ __('©LOREM IPSUN '.date('Y').' - All rights reserved', 'sage') }}</p>
      </div>
  </div>
</footer>