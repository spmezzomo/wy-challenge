 {{-- FAQ --}}
@php
  global $post;

  $faqs = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'faq',
        'tax_query' => array(
            array(
                'taxonomy' => 'tipo-de-alojamento',
                'field' => 'slug',
                'terms' => $post->post_name,
            )
        )
    )
  );

  foreach ($faqs as $faq) {
    $taxID = get_the_terms( $faq->ID, 'tipo-de-alojamento' )[0]->term_id;
  }

@endphp
<section class="faq">
  <div class="container mx-auto px-10">
    <h2 class="literata font-semibold text-3xl mb-7"><?php echo __('Perguntas Frequentes', 'casaarouca') ?></h2>
    @foreach ($faqs as $faq)
      <div class="accordion-item">
        <button class="accordion-header py-3 px-8">
          {!! get_the_title($faq->ID) !!}
          <svg class="accordion-icon ml-2" xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
            <path d="M15.8659 0.658625V0.658625C12.764 2.61464 10.1389 5.2397 8.18293 8.34155V8.34155V8.34155C6.22692 5.2397 3.60185 2.61464 0.5 0.658626V0.658626" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div class="px-8 text-sm accordion-content text-green text-sm">
          {!! $faq->post_content !!}
        </div>
      </div>
    @endforeach
    @php
      wp_reset_query();
    @endphp

  </div>
</section>