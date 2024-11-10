<article {{ post_class('h-entry') }} style="--bg: url({{ get_the_post_thumbnail_url() }})">
  <header class="bg-sky-950 pt-28 pb-16 flex items-center" style="--bgk: url({{ get_the_post_thumbnail_url() }})">
    <div class="container mx-auto">
      <h1 class="raleway-semibold text-5xl text-white text-center lg:text-left lg:w-2/3">
        {!! $title !!}
      </h1>
    </div>
  </header>

  <div class="">
    <div class="container mx-auto py-20 flex lg:flex-row flex-col flex-col-reverse items-center">
      <div class="lg:w-2/3 shadow-lg">
        <div class="content lg:p-10 p-5 bg-[#ffffff98] mulish-normal ">{!! the_content() !!}</div>
      </div>
      {{-- block to show only on event page --}}
    </div>
  </div>
  
</article>

<div class="container mx-auto mt-16">
  {{-- Posts Relacionados --}}
    <div class="block-header text-center lg:w-3/5 mx-auto mb-16">
      <h2 class="lg:text-5xl text-3xl raleway-semibold mb-5">• {{ __('Related Posts', 'sage') }} •</h2>
    </div>
    @if ($related_posts->have_posts())
    <div class="lg:mb-16 mb-5 grid gap-8 lg:grid-cols-3 grid-cols-1">
      @while ($related_posts->have_posts()) @php $related_posts->the_post() @endphp
        <div>
          @include('partials.post-element')
        </div>
      @endwhile
      </div>
      @php wp_reset_postdata() @endphp
    @else
        <p>Nenhum post relacionado encontrado.</p>
    @endif
</div>