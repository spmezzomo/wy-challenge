<a href="{{ get_permalink() }}">
  <div class="post-img overflow-hidden">
    {{-- Attached Post Image, the alternative text is set on media library --}}
    <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true) }}" class="h-[300px] w-full object-cover object-center hover:scale-110 transition-all duration-300">
  </div>
</a>
<div class="shadow-lg px-10 pb-10 pt-12 lg:h-[250px] -mt-8 background-blur backdrop-blur-md flex flex-col justify-between">
  <div class="post-item">
    <h4 class="uppercase mb-4 raleway-semibold leading-none"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h4>
    <div class="block-content lg:h-[100px] overflow-y-scroll">
      {{ the_excerpt() }}
    </div>
  </div>
  <div>
    <a href="{{ get_permalink() }}" class="text-sm raleway-semibold">{!! __('Read more', 'sage') !!}</a>
  </div>
</div>