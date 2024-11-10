{{-- COMENTÁRIOS --}}
@php
	global $post;

	$comments = get_posts(
		array(
			'posts_per_page' => -1,
			'post_type' => 'comentario-de-client',
			'tax_query' => array(
				array(
					'taxonomy' => 'tipo-de-alojamento',
					'field' => 'slug',
					'terms' => $post->post_name,
				)
			)
		)
	);

@endphp
@if ($comments)
<section class="comentarios-de-clientes text-center mb-32 lg:mb-0 lg:py-24">
	<div class="container mx-auto mb-10">
		<h2 class="text-4xl lg:text-5xl font-semibold literata mb-10">• <?php echo __('Comentários dos nossos clientes', 'casaarouca') ?> •</h2>
		<p><?php echo __('Conheça o que os nossos clientes têm a dizer sobre os momentos passados connosco', 'casaarouca') ?></p>
		<section class="splide slider-comments mt-14 lg:px-32" aria-label="Comentarios">
      <div class="splide__track">
        <ul class="splide__list items-center" id="comments-splide">
				@foreach ($comments as $i => $comment)
					<div class="card-comment border rounded-2xl border-green p-5 lg:h-[200px]">
						<div class="card-top flex justify-between">
							{{-- <p>Quantidade de linhas: <span id="linhas{{ $i }}"></span></p> --}}
							<span class="text-3xl font-semibold literata flex">
								{{ get_field('nota', $comment->ID) }}
								<svg xmlns="http://www.w3.org/2000/svg" width="10" height="9" viewBox="0 0 10 9" fill="none">
									<path d="M5 0L6.01031 3.10942H9.27975L6.63472 5.03115L7.64503 8.14058L5 6.21885L2.35497 8.14058L3.36528 5.03115L0.720246 3.10942H3.98969L5 0Z" fill="#1C1C13"/>
								</svg>
							</span>
							<div class="flex flex-wrap items-center text-xs">
								<b class="font-bold">{!! $comment->post_title !!},&nbsp;</b> {!! get_field('pais', $comment->ID) !!} <img class="aspect-square rounded-full ml-2" src="{{ get_field('bandeira', $comment->ID)['url'] }}" alt="">
							</div>
						</div>
						<div class="card-content text-left text-xs italic mt-5">
							<div class="text-container h-[80px] overflow-hidden">
								<div  class="texto" id="texto{{ $i }}">
									{!! $comment->post_content !!}
								</div>
							</div>
							<div class="text-right">
								<a data-modal-target="c_modal{{ $i }}" id="ver-mais-{{ $i }}" class="font-bold italic underline text-end text-right cursor-pointer px-5 pt-2">
									<?php echo __('Ler mais', 'casaarouca') ?>
								</a>
							</div>
							
						</div>
					</div>
				@endforeach
				</ul>
			</div>
			<div class="splide__arrows -bottom-[50px] relative">
        <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!left-[42%] splide__arrow--prev !bg-transparent">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
            <circle cx="22.5" cy="23" r="22" stroke="#1C1C13"/>
            <path d="M11.9293 22.4513L33.4648 22.4513" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="splide__arrow !opacity-100 !h-auto !w-auto lg:!right-[42%] splide__arrow--next !bg-transparent">
          <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="!fill-none !w-full !h-full">
            <circle cx="22.5" cy="23" r="22" stroke="#1C1C13"/>
            <path d="M11.9293 22.4513L33.4648 22.4513" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.7819 14.7683V14.7683C27.7379 17.8702 30.363 20.4952 33.4648 22.4512V22.4512V22.4512C30.363 24.4072 27.7379 27.0323 25.7819 30.1342V30.1342" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <div id="pagination_comment" class="pagination relative top-[40px] mulish text-sm"></div>
		</section>
		
		{{-- Modal --}}
		@foreach ($comments as $i => $comment)
			<div id="c_modal{{ $i }}" class="modal modal-alojamentos fixed inset-0 flex items-center justify-center hidden">
				<div class="bg-white p-6 rounded-[20px] modal-container max-w-[600px] max-h-[95%] flex relative">
          <div class=" p-5 rounded-[20px] overflow-scroll mt-10 lg:mt-0">
						<div class="card-comment-modal border rounded-2xl border-green p-5">
							<div class="card-top flex justify-between">
								<span class="text-3xl font-semibold literata flex">
									{{ get_field('nota', $comment->ID) }}
									<svg xmlns="http://www.w3.org/2000/svg" width="10" height="9" viewBox="0 0 10 9" fill="none">
										<path d="M5 0L6.01031 3.10942H9.27975L6.63472 5.03115L7.64503 8.14058L5 6.21885L2.35497 8.14058L3.36528 5.03115L0.720246 3.10942H3.98969L5 0Z" fill="#1C1C13"/>
									</svg>
								</span>
								<div class="flex flex-wrap items-center text-xs">
									<b class="font-bold">{!! $comment->post_title !!},&nbsp;</b> {!! get_field('pais', $comment->ID) !!} <img class="aspect-square rounded-full ml-2" src="{{ get_field('bandeira', $comment->ID)['url'] }}" alt="">
								</div>
							</div>
							<div class="card-content text-left text-xs italic mt-5">
								{!! $comment->post_content !!}
							</div>
						</div>
					</div>
					<button class="close-modal px-4 py-2 absolute top-0 right-0 flex items-center p-3">
            <span class="text-sm mr-2"><?php echo __('Fechar', 'casaarouca') ?></span>
            <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="14.5" cy="14.5" r="14" stroke="#1C1C13"/>
              <path d="M18.6893 10.311L10.3115 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.3115 10.311L18.6893 18.6888" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
				</div>
			</div>
		@endforeach



	</div>
</section>
@endif
@php
  wp_reset_query();
@endphp