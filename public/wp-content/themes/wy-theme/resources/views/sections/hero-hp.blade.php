{{-- HP Hero Section --}}
<section id="hero-hp" class="hero lg:h-dvh flex" style="--bg: url({{ get_the_post_thumbnail_url() }})">
	<div class="container mx-auto flex flex-col justify-center text-white py-10 lg:py-0 mt-20 lg:mt-0">
		<div id="hero-content">
			<div class="lg:w-1/2">
				<h1 class="raleway-semibold page-title ">{{ the_title()}}</h1>
				<div class="text-lg py-8 ">{{ the_content() }}</div>
			</div>
		</div>
	</div>
</section>