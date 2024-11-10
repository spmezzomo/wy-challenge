{{-- NOSSA HISTÓRIA --}}
<section class="nossa-historia relative z-10 my-16 lg:mt-0 lg:mb-28 lg:scroll-mt-36 scroll-mt-0 scroll-section" id="historia">
  <div class="container mx-auto lg:flex gap-32">
    <div class="content lg:order-last flex flex-col justify-end mb-10 lg:mb-0">
      <h2 class="text-4xl lg:text-7xl literata font-semibold mb-7">• <?php echo __('A nossa <br>História', 'casaarouca') ?> •</h2>
      {!! get_field('conteudo_historia') !!}
    </div>
    <div class="image min-w-fit p-7 pb-14 bg-white border rounded-2xl lg:mt-[-100px]">
      <div class="text-right literata text-xs tracking-widest italic">
        <img src="{{ get_field('imagem_historia')['url'] }}" alt="{{ get_field('imagem_historia')['alt'] }}">
        <caption>• {{ get_field('imagem_historia')['caption'] }} •</caption>
      </div>
    </div>
  </div>
</section>