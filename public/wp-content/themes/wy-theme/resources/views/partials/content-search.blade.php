<article @php(post_class('border-b-2 border-sky-950 py-5'))>
  <header>
    <h2 class="text-3xl raleway-semibold">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>
    @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
