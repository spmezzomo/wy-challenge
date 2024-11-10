import domReady from '@roots/sage/client/dom-ready';
import 'jquery';
import Splide from '@splidejs/splide';

/**
 * Application entrypoint
 */
domReady(async () => {

  /**
   * Slideshow Gallery
  */
  const gallery = document.querySelectorAll('.image-gallery');

  if (gallery.length > 0) {

    gallery.forEach((el, index) => {
      const main = new Splide( el , {
        type      : 'fade',
        pagination: false,
        arrows    : false,
        fixedHeight: 800,
        gap         : 20,
        breakpoints : {
            1024: {
              fixedHeight: 235,
              arrows     : true,
              pagination : true,
            },
        },
      } );

      const thumbnails = new Splide( '#thumbnail-carousel', {
        fixedWidth  : 200,
        fixedHeight : 155,
        isNavigation: true,
        arrows      : false,
        gap         : 7,
        focus       : 'center',
        direction   : 'ttb', 
        height      : 379, 
        cover       : true,
        pagination  : false,
      } );

      main.sync( thumbnails );
      main.mount();
      thumbnails.mount();
    });
    
  }

  /**
   * SlideUp effect on scroll
  */

  if (document.body.classList.contains('home')) {
    window.onscroll = function() {slideUP()};
  }

  function slideUP() {
    const hero = document.getElementById('hero-content');
    const homeContent = document.getElementById('page-content');
    if (document.documentElement.scrollTop > 50) {
        hero.classList.add('slideup');
        homeContent.classList.add('slideup');
    } else {
      hero.className = "";
      homeContent.className = "";
    }
  }

  /**
   * Blog Posts Layout
  */
  const elems = document.querySelectorAll(".blog-post");
  let n = 1;

  for (let i = 0; i < elems.length; i += 2) {
      // Create wrapper div
      const wrapper = document.createElement("div");
      wrapper.className = `blog-post-row lg:mb-16 mb-5 grid gap-8 lg:grid-cols-3 grid-cols-1 ${n}`;
      n++;

      // Clone the elements before wrapping
      const firstElem = elems[i].cloneNode(true);
      wrapper.appendChild(firstElem);

      if (elems[i + 1]) {
          const secondElem = elems[i + 1].cloneNode(true);
          wrapper.appendChild(secondElem);
      }

      // Insert the wrapper into the DOM before the original element
      elems[i].parentNode.insertBefore(wrapper, elems[i]);

      // Remove the original elements after wrapping
      elems[i].remove();
      if (elems[i + 1]) elems[i + 1].remove();
  }

  document.querySelectorAll(".blog-post-row").forEach((el, index) => {
      const children = el.children;
      if (children.length > 1) {
          if (index % 2 === 1) {
              children[0].classList.add("lg:col-span-2");
          } else {
              children[children.length - 1].classList.add("lg:col-span-2");
          }
      }
  });

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);


