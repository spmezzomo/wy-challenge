<form role="search" method="get" class="search-form text-center w-full" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input type="search" placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s" class="border-2 border-sky-950 p-2 lg:w-1/2 w-3/4">
  </label>

  <button class="bg-sky-950 p-2 border border-sky-950 text-white raleway-semibold">{{ _x('Search', 'submit button', 'sage') }}</button>
</form>
