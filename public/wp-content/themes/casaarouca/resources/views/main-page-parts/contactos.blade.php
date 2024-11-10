{{-- CONTACTS --}}
<section class="contacts lg:px-0 px-5 mb-16 lg:scroll-mt-36 scroll-mt-0 scroll-section" id="contactos">
  @if (get_field('shortcode_formulario'))
  <div class="container mx-auto px-10 pt-16 pb-10 my-20 bg-bege rounded-[20px]">
    <div class="section-header lg:text-center">
      <h2 class="text-4xl lg:text-5xl font-semibold literata mb-10">• <?php echo __('Entre em contacto connosco', 'casaarouca' )?> •</h2>
      <div class="max-w-[700px] mx-auto"><?php echo __('Estamos aqui para tornar a sua estadia inesquecível. Entre em contato conosco para quaisquer perguntas,  informações sobre os apartamentos, ofertas especiais e serviços oferecidos', 'casaarouca' )?></div>
      <div class="form-contacts lg:px-12 pt-10">
        {!! do_shortcode(get_field('shortcode_formulario')) !!}
      </div>       
    </div>
  </div>
  @endif
  <div class="container mx-auto lg:flex gap-28 items-stretch justify-center">
    <div class="contatos mb-10 lg:mb-0 flex flex-col justify-evenly gap-5">
      @if (get_field('contact_morada'))
      <div class="flex items-center gap-5">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" fill="none">
            <circle cx="45" cy="45" r="45" fill="#7B7B57"/>
            <path d="M44.9896 27.73L24.8496 45.76V68.77H39.7796V55.68H50.1896V68.77H65.1196V45.76L44.9896 27.73Z" stroke="white" stroke-linejoin="round"/>
            <path d="M73.97 44.26L44.98 19L31.35 30.85V23.27H25.06V36.33L16 44.26" stroke="white" stroke-miterlimit="10"/>
          </svg>
        </div>
        <div class="content">
          <b class="text-xl font-semibold literata block pb-2.5">Morada</b>
          {!! get_field('contact_morada') !!}
        </div>
      </div>
      @endif
      @if (get_field('contact_telefone'))
      <div class="flex items-center gap-5">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" fill="none">
          <circle cx="45" cy="45" r="45" fill="#7B7B57"/>
            <path d="M67.5887 70.7423L56.6387 63.4023" stroke="white" stroke-miterlimit="10"/>
            <path d="M29.2182 36.1825L21.9482 25.2625C21.4682 25.6925 21.1782 25.9725 21.1782 25.9725C18.4482 28.4025 19.0582 30.5325 19.0582 30.5325C20.9082 43.5425 34.5982 56.0625 35.6382 57.1525C37.0482 58.4625 49.2782 71.8725 62.2882 73.7025C62.2882 73.7025 64.4182 74.3125 66.8482 71.5725L67.6082 70.7425C68.5482 69.5025 71.7582 65.3525 71.7882 64.6625C71.7882 64.6625 72.0882 63.3025 70.4982 62.1625L60.9282 55.7825C60.9282 55.7825 59.2582 54.2625 56.8982 55.5525L51.1282 58.7425C51.1282 58.7425 45.3382 54.1525 42.1282 50.6625C38.6482 47.4525 34.0382 41.6725 34.0382 41.6725L37.2282 35.9025C38.5182 33.5425 36.9982 31.8725 36.9982 31.8725L30.5882 22.3125C29.4482 20.7225 28.0782 21.0225 28.0782 21.0225C27.3682 21.0525 26.1082 21.8625 24.8582 22.8225" stroke="white" stroke-miterlimit="10"/>
          </svg>
        </div>
        <div class="content">
          <b class="text-xl font-semibold literata block pb-2.5">Telefone</b>
          {!! get_field('contact_telefone') !!}
        </div>
      </div>
      @endif
      @if (get_field('contact_email'))
      <div class="flex items-center gap-5">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90" fill="none">
            <circle cx="45" cy="45" r="45" fill="#7B7B57"/>
            <path d="M68.2566 26H21.8494C20.2757 26 19 27.2757 19 28.8494V60.9906C19 62.5643 20.2757 63.84 21.8494 63.84H68.2566C69.8303 63.84 71.106 62.5643 71.106 60.9906V28.8494C71.106 27.2757 69.8303 26 68.2566 26Z" stroke="white" stroke-linejoin="round"/>
            <path d="M32.4204 48.3394L20.6523 62.4344" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M57.6943 48.3394L69.4623 62.4344" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M20.0166 27.026L45.1293 46.4114L70.0425 26.8645" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="content">
          <b class="text-xl font-semibold literata block pb-2.5">Email</b>
          <a href="mailto:{!! get_field('contact_email') !!}">{!! get_field('contact_email') !!}</a>
        </div>
      </div>
      @endif
    </div>
    <div class="map border rounded-[20px] overflow-hidden border-green">
      {!! get_field('mapa') !!}
    </div>
  </div>
</section>