@if (have_rows('accordion'))
	@while (have_rows('accordion')) @php the_row() @endphp
		<div class="accordion-item container">
			<button class="accordion-header py-3 px-8">
				{!! get_sub_field('titulo_do_accordion') !!}
				<svg class="accordion-icon ml-2" xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
					<path d="M15.8659 0.658625V0.658625C12.764 2.61464 10.1389 5.2397 8.18293 8.34155V8.34155V8.34155C6.22692 5.2397 3.60185 2.61464 0.5 0.658626V0.658626" stroke="#1C1C13" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
			<div class="px-8 text-sm accordion-content text-green text-sm">
				{!! get_sub_field('conteudo_do_accordion') !!}
			</div>
	  </div>
	@endwhile
@endif
