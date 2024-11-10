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
      
        @php
          // setup dates from acf datepicker
          $begin = strtotime(get_field('begin_event_date'));
          $finish = strtotime(get_field('finish_event_date'));
          // get tags from events
          $terms = get_the_terms( $post, 'event-tag' );
        @endphp
        <div class="lg:w-1/4 text-center mb-10 lg:mb-0 flex flex-col items-center">
          @foreach ($terms as $tag)
            <div class="tag text-xs uppercase text-white bg-sky-950 mulish-normal p-1 inline-block mb-3">{{ $tag->name }}</div>
          @endforeach
          <div class="calendar border-4 border-sky-950 bg-white p-5 inline-block">
            <p class="!m-0">{{ date('F Y', $begin) }} {{ $finish && date('F Y', $finish) !== date('F Y', $begin) ? ' - '.date('F Y', $finish) : '' }}</p>
            <big class="text-8xl raleway-bold">{{ date('d', $begin) }} {{ $finish && date('d', $finish) !== date('d', $begin) ? ' - '.date('d', $finish) : '' }}</big>
            <p class="!m-0">{{ date('H:i', $begin) }} - {{ $finish ? date('H:i', $finish) : ''}} </p>
          </div>
        </div>
      
    </div>
  </div>

  @if ($pagination)
    <footer>
      <nav class="page-nav" aria-label="Page">
        {!! $pagination !!}
      </nav>
    </footer>
  @endif
</article>