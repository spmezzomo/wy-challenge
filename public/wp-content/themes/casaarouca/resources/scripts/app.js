import domReady from '@roots/sage/client/dom-ready';
import Splide from '@splidejs/splide';
import Choices from 'choices.js';
/**
 * Application entrypoint
 */
domReady(async () => {

  /********* HOVER CARDS HP *********/ 

  const card = document.querySelectorAll('.card');

  if (card.length > 0) {
    card.forEach( (el) => {
      el.addEventListener('mouseover', () =>{
        const active = document.getElementById(el.dataset.card);
        active.classList.add('active');
        card.forEach( (c) => {
          c.classList.add('disabled');
        });
        el.classList.add('active');
        el.classList.remove('disabled');
      });

      el.addEventListener('mouseout', () =>{
        card.forEach( (c) => {
          c.classList.remove('active');
          c.classList.remove('disabled');
        });

        const active = document.getElementById(el.dataset.card);
        active.classList.remove('active');

      });
    })
  }

  /********* MENU *********/ 

  // document.addEventListener('DOMContentLoaded', function () {
  //   const menuLinks = document.querySelectorAll('nav a[href^="#"]');
    

  //   console.log(dist);

  //   menuLinks.forEach(link => {
  //     link.addEventListener('click', function (e) {
  //       e.preventDefault();

  //       const targetId = this.getAttribute('href');
  //       const targetElement = document.querySelector(targetId);

  //       if (targetElement) {
  //         window.scrollTo({
  //           top: targetElement.offsetTop - dist,
  //           behavior: 'smooth'
  //         });
  //       }
  //     });
  //   });
  // });

  document.addEventListener('DOMContentLoaded', function () {
    const menuLinks = document.querySelectorAll('nav a[href^="#"]');
    let windowWidth = window.innerWidth;
    let path = window.location.pathname;

    if (windowWidth > 1024) { var dist = 150 } else { dist = 0 };

    function removeActiveClasses() {
      menuLinks.forEach(link => link.classList.remove('active'));
    }

    function addActiveClass(link) {
      removeActiveClasses();
      link.classList.add('active');
    }

    menuLinks.forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - dist,
            behavior: 'smooth'
          });

          addActiveClass(this);
        }
      });
    });

    const sections = document.querySelectorAll('.scroll-section');
    const observerOptions = {
      root: null,
      threshold: 0.3
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        // console.log('Observando:', entry.target.id, 'Intersecção:', entry.isIntersecting);
        if (entry.isIntersecting) {
          const activeLink = document.querySelector(`nav a[href="#${entry.target.id}"]`);
          addActiveClass(activeLink);
        } else {
          removeActiveClasses();
        }
      });
    }, observerOptions);

    sections.forEach(section => {
      observer.observe(section);
    });
  });

  /********* MENU MOBILE *********/

  const hamburger = document.querySelector('.hamburger');
  if (hamburger != null) {
    const closeMenu = document.getElementById('close');
    const menuMobile = document.getElementById('menu-main-menu-1');
    const menuItem = menuMobile.querySelectorAll('.menu-item');
    hamburger.addEventListener('click', () => {
      document.getElementById('menu-mobile').classList.remove('hidden');
      document.getElementById('menu-mobile').classList.add('flex');
    });

    closeMenu.addEventListener('click', () => {
      document.getElementById('menu-mobile').classList.add('hidden');
    });

    menuItem.forEach(item => {
      item.addEventListener('click', () => {
        document.getElementById('menu-mobile').classList.add('hidden');
      });
    })
  }

  /********* LANGUAGE SWITCHER *********/ 

  // const languageSwitcher = document.querySelector('.menu-language-switcher-container > ul');
  const languageSwitcher = document.getElementById('menu-language-switcher');
  const dropdownParent = languageSwitcher.querySelector('.menu-item-has-children');
  const current = languageSwitcher.querySelector('.wpml-ls-current-language')
  const currentLink = current.querySelector('a');

  currentLink.addEventListener('click', (e) => {
    e.preventDefault();
  });
  // console.log(languageSwitcher);
  // console.log(current);

  if (dropdownParent != null) {
    const submenu = dropdownParent.querySelector('.sub-menu');

    submenu.classList.add('hidden');

    languageSwitcher.addEventListener('mouseover', showDropdown);
    submenu.addEventListener('mouseover', showDropdown);
    languageSwitcher.addEventListener('mouseleave', hideDropdown);
    submenu.addEventListener('mouseleave', hideDropdown);

    function showDropdown() {
      submenu.classList.remove('hidden');
      languageSwitcher.classList.add('active');
      dropdownParent.classList.add('active');
    }

    function hideDropdown() {
      submenu.classList.add('hidden');
      languageSwitcher.classList.remove('active');
    }
  }

  /********* LANGUAGE SWITCHER MOBILE *********/ 

  // const languageSwitcher = document.querySelector('.menu-language-switcher-container > ul');
  const languageSwitcherM = document.getElementById('menu-language-switcher-1');
  
  if (languageSwitcherM != null) {
    const dropdownParentM = languageSwitcher.querySelector('.menu-item-has-children');
    const currentM = languageSwitcherM.querySelector('.wpml-ls-current-language')
    const currentLinkM = currentM.querySelector('a');

    currentLinkM.addEventListener('click', (e) => {
      e.preventDefault();
    });
    // console.log(dropdownParentM);


    if (dropdownParentM != null) {
      const submenuM = dropdownParentM.querySelector('.sub-menu');
      submenuM.classList.add('hidden');

      // console.log(submenuM);

      languageSwitcherM.addEventListener('mouseover', showDropdown);
      submenuM.addEventListener('mouseover', showDropdown);
      languageSwitcherM.addEventListener('mouseleave', hideDropdown);
      submenuM.addEventListener('mouseleave', hideDropdown);
    }

    

    function showDropdown() {
      submenuM.classList.remove('hidden');
      languageSwitcherM.classList.add('active');
      dropdownParentM.classList.add('active');
    }

    function hideDropdown() {
      submenuM.classList.add('hidden');
      languageSwitcherM.classList.remove('active');
    }
  }

  /********* SLIDESHOW MAIN PAGES *********/ 

  const destaque = document.querySelector('.page-highlight');
  const pagination = document.getElementById('pagination');

  if (destaque != null) {
    let highlight = new Splide( '.page-highlight', {
      type: 'loop',
      arrows: false,
      pagination: false,
      autoplay: true,
      interval: 3000,
      cover: true,
      speed: 0,
      drag: false,
      pauseOnFocus: false
    });

    highlight.on('mounted move', () => {
      var slides = highlight.Components.Elements.slides;
      var currentIndex = highlight.index;

      slides.forEach( (slide, index) => {
        // fade
        slide.style.transition = 'opacity 2s ease';

        if (index === currentIndex) {
          slide.style.opacity = '1';
        } else {
          slide.style.opacity = '.5';
        }
      });

      if (highlight.length == 1) {
        pagination.classList.add('hidden');
      }
    });

    highlight.on('mounted move', () => {
      updatePagination(highlight, pagination);
    });

    highlight.mount();
  }

  /********* CUSTOM HIGHLIGHT CURSOR *********/

  const cursorElement = document.getElementById('custom-cursor');
  if (cursorElement != null) {
    document.body.appendChild(cursorElement);
    document.querySelector('.highlight').addEventListener('mousemove', (e) => {
      cursorElement.style.left = `${e.pageX-75}px`;
      cursorElement.style.top = `${e.pageY-75}px`;
    });

    document.querySelector('.highlight').addEventListener('mouseleave', () => {
      cursorElement.style.display = 'none';
    });

    document.querySelector('.highlight').addEventListener('mouseenter', () => {
      cursorElement.style.display = 'block';
    });
  }


  /********* CUSTOM SLIDESHOW - section about *********/

  const slideshow = document.querySelector('.sobre-slideshow');

  if (slideshow != null) {
    const images = document.querySelectorAll('.carousel-image');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentIndex = 0;

    function updateImageClasses() {
      const totalImages = images.length;
      images.forEach((img, index) => {
        img.classList.remove('prev', 'active', 'next');
        img.style.opacity = 0;  // Inicializa todas as imagens com opacidade 0
        
        if (index === currentIndex) {
          img.classList.add('prev');
        } else if (index === (currentIndex + 1) % totalImages) {
          img.classList.add('active');
        } else if (index === (currentIndex + 2) % totalImages) {
          img.classList.add('next');
        }
        
        setTimeout(() => {
          if (img.classList.contains('prev') || img.classList.contains('active')) {
            img.style.opacity = 1;
          } else if(img.classList.contains('next')) {
            img.style.opacity = .5;
          }
        }, 100);  // Pequeno atraso para suavizar a transição
      });
    }

    function showNextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      updateImageClasses();
    }

    function showPrevImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateImageClasses();
    }

    prevButton.addEventListener('click', showPrevImage);
    nextButton.addEventListener('click', showNextImage);

    updateImageClasses();

    /********* SLIDESHOW MOBILE - section about *********/ 

    var splide = new Splide('#custom-slider', {
      type       : 'loop',
      perPage    : 1,
      pagination : false,
      gap        : '15px',
      arrows     : true,
      padding    : { right: '80px' },
    }).mount();
  }

  /********* MODAL *********/

  document.querySelectorAll('[data-modal-target]').forEach(button => {
    button.addEventListener('click', () => {
      const modalId = button.getAttribute('data-modal-target');
      openModal(modalId);
    });
  });

  document.querySelectorAll('.modal .close-modal').forEach(button => {
    button.addEventListener('click', (event) => {
      const modal = event.target.closest('.modal');
      closeModal(modal);
    });
  });

  window.addEventListener('click', (event) => {
    const modal = event.target.closest('.modal');
    if (modal && event.target === modal) {
      closeModal(modal);
    }
  });


  /********* SLIDESHOW MODAL ALOJAMENTOS *********/

  const alojamento = document.querySelectorAll('.alojamento-slider');

  if (alojamento.length > 0) {

    alojamento.forEach((el, index) => {
      const main = new Splide( el , {
        type      : 'fade',
        pagination: false,
        arrows    : true,
        width     : 600,
        fixedHeight: 379,
        cover     : true,
        breakpoints : {
            1024: {
              fixedHeight: 235,
            },
        },
      } );

      const thumbnails = new Splide( '#thumbnail-carousel-'+index, {
        fixedWidth  : 74,
        fixedHeight : 50,
        isNavigation: true,
        arrows      : false,
        gap         : 5,
        focus       : 'center',
        direction   : 'ttb', 
        height      : 379, 
        cover       : true,
        pagination  : false,
      } );

      main.sync( thumbnails );
      main.on('mounted move', () => {
        updatePagination(main, paginationSlide);
      });
      main.mount();
      thumbnails.mount();
    });


    
  }

  /********* ACCORDION *********/ 

  const accordionItems = document.querySelectorAll('.accordion-item');

  if (accordionItems.length > 0) {
    accordionItems.forEach(item => {
      const header = item.querySelector('.accordion-header');
      const content = item.querySelector('.accordion-content');
      const icon = item.querySelector('.accordion-icon');

      if (header != null) {
        header.addEventListener('click', function () {
          const isOpen = content.classList.contains('open');

          document.querySelectorAll('.accordion-content').forEach(content => {
            content.classList.remove('open');
            content.style.maxHeight = null;
          });
          document.querySelectorAll('.accordion-item').forEach(item => {
              item.classList.remove('active'); // Remove a classe 'active' de todos os itens
          });
          document.querySelectorAll('.accordion-icon').forEach(icon => {
            icon.style.transform = null;
          });

          if (!isOpen) {
            content.classList.add('open');
            content.style.maxHeight = content.scrollHeight + "px";
            icon.style.transform = "rotate(180deg)";
            item.classList.add('active');
          }
        });
      }
    });
  }

  /********* SLIDESHOW SERVIÇOS *********/

  const servicos = document.querySelector('.slider-servicos');
  const pagination_servico = document.getElementById('pagination_servico');

  if(servicos != null) {
    var servico = new Splide( '.slider-servicos', {
    type       : 'loop',
    perPage    : 3,
    focus      : 'center',
    pagination : false,
    breakpoints : {
        1024: {
          perPage    : 1,
          padding    : { right:'80px', left: '80px' },
          pagination : true,
        },
      },
    } );

    servico.on('mounted move', () => {
      var slides = servico.Components.Elements.slides;
      var currentIndex = servico.index;

      slides.forEach( (slide, index) => {
        // fade
        slide.style.transition = 'opacity 2s ease';

        if (index === currentIndex) {
          slide.style.opacity = '1';
        } else {
          slide.style.opacity = '.5';
        }
      });

      if (servico.length == 1) {
        pagination_servico.classList.add('hidden');
      }
    });

    servico.on('mounted move', () => {
      updatePagination(servico, pagination_servico);
    });

    servico.mount();
  }

  /********* SELECT *********/

  const select_element = document.querySelectorAll('.select');

  select_element.forEach( (el) => {
    const select_container = el.querySelector('.wpcf7-form-control-wrap');
    select_container.hidden = true;
    const selectBTN = el.querySelector('.toggle-select');

    selectBTN.addEventListener('click', () => {
      select_container.hidden = !select_container.hidden;
      selectBTN.classList.toggle('active');
    });
  });

  /********* PHONE PREFIXES *********/ 
  
  const requestOptions = {
    method: "GET",
    redirect: "follow"
  };

  const countrySelect = document.querySelectorAll('.country-code');
  fetch("https://restcountries.com/v3.1/all", requestOptions)
    .then(response => response.json())  // Parse o resultado como JSON
    .then(result => {
      let defaultCountryCode = '';
      countrySelect.forEach(select => {
        select.innerHTML = '<option value="">PT</option>';
        result.forEach(country => {
          if (country.idd && country.idd.root) {
            const code = country.idd.root + (country.idd.suffixes[0] || '');
            const option = document.createElement('option');
            option.value = code;
            option.textContent = country.cca2;
            select.appendChild(option);

            if (country.name.common === 'Portugal') {
              defaultCountryCode = code;
            }
          }
        });

        // Inicializar o Choices.js no select
        new Choices(select, {
            itemSelectText: '',
        });

        if (defaultCountryCode) {
          select.value = defaultCountryCode;
          const phoneInput = select.closest('form').querySelector('.wpcf7-tel');
          phoneInput.value = defaultCountryCode;
        }

        select.addEventListener('change', function () {
          const phoneInput = select.closest('form').querySelector('.wpcf7-tel');
          phoneInput.value = select.value;
        });
      });
    })
    .catch(error => console.error('Erro ao carregar os países:', error));

  /********* SLIDESHOW DESCUBRA MOBILE *********/

  const sugestoes = document.querySelector('.slider-sugestoes');
  const pagination_sugestao = document.getElementById('pagination_sugestao');

  if(sugestoes != null) {
    var sugestion = new Splide( '.slider-sugestoes', {
      type       : 'loop',
      perPage    : 1,
      focus      : 'center',
      pagination : true,
    } );

    sugestion.on('mounted move', () => {
      var slides = sugestion.Components.Elements.slides;
      var currentIndex = sugestion.index;

      slides.forEach( (slide, index) => {
        // fade
        slide.style.transition = 'opacity 2s ease';

        if (index === currentIndex) {
          slide.style.opacity = '1';
        } else {
          slide.style.opacity = '.5';
        }
      });

      if (sugestion.length == 1) {
        pagination_sugestao.classList.add('hidden');
      }
    });

    sugestion.on('mounted move', () => {
      updatePagination(sugestion, pagination_sugestao);
    });

   
    sugestion.mount();
  }

  /********* SLIDESHOW COMENTÁRIOS  *********/

  const comments = document.querySelector('.slider-comments');
  const pagination_comment = document.getElementById('pagination_comment');

  if(comments != null) {
    let width = window.innerWidth;
    if (width > 1024) { agruparBlocos(4) } else { agruparBlocos(1) };

    var commentSlide = new Splide( '.slider-comments', {
      type       : 'slide',
      perPage    : 1,
      pagination : false,
    } );

    
    commentSlide.on('mounted', () => {
      contarLinhas();
    });

    commentSlide.on('mounted move', () => {
      var slides = commentSlide.Components.Elements.slides;
      var currentIndex = commentSlide.index;

      if (commentSlide.length == 1) {
        pagination_sugestao.classList.add('hidden');
      }

      updatePagination(commentSlide, pagination_comment);
    });

    commentSlide.mount();
  }

  /********* BTN RESERVA *********/

  const containers = document.querySelectorAll('.booking-set');
  containers.forEach(container => {
    const hoverContent = container.querySelector('.booking-set__submenu');
    container.addEventListener('click', function (e) {
      hoverContent.style.display = 'block';
    });

    document.addEventListener('click', function (e) {
      if (!container.contains(e.target)) {
        hoverContent.style.display = 'none';
      }
    });
  });
});

/********* SPLIDE CUSTOM PAGINATION *********/ 

function updatePagination(slider, pag) {
  var currentSlide = slider.index + 1;
  var totalSlides = slider.length;
  pag.innerHTML = '<b class="font-bold">' + currentSlide + '</b>/' + totalSlides;
}

/********* MODAL *********/

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.classList.remove('hidden');
  }
}

function closeModal(modal) {
  if (modal) {
    modal.classList.add('hidden');
  }
}

/********* BLOCOS COMENTÁRIOS *********/

function contarLinhas() {
  const blocosDeTexto = document.querySelectorAll('.texto');
  
  blocosDeTexto.forEach((elemento, index) => {
    const alturaTotal = elemento.scrollHeight;
    const alturaLinha = parseFloat(getComputedStyle(elemento).lineHeight);
    const linhas = Math.round(alturaTotal / alturaLinha);
    const btnVerMais = document.getElementById(`ver-mais-${index}`);

    // document.getElementById(`linhas${index}`).innerText = linhas;


    if (btnVerMais != null ) {
       btnVerMais.style.display = 'none';

       if (linhas > 5) {
        btnVerMais.style.display = 'block';
      }
    }
    
  });
}

function agruparBlocos(x) {
  const blocos = document.querySelectorAll('.card-comment');
  const container = document.getElementById('comments-splide');
  const totalBlocos = blocos.length;
  let grupoAtual = null;

  blocos.forEach((bloco, index) => {
    if (index % x === 0) {
      grupoAtual = document.createElement('li');
      grupoAtual.classList.add('splide__slide', 'lg:grid', 'grid-cols-2', 'gap-8');
      container.appendChild(grupoAtual); // Adiciona o novo grupo ao container
    }

    grupoAtual.appendChild(bloco);
  });
}

// document.addEventListener("DOMContentLoaded", function() {
//   setTimeout(contarLinhas, 100); // Ajuste o tempo conforme necessário
// });
// window.onload = contarLinhas;
// window.onresize = contarLinhas;
// window.onload = agruparBlocos;


/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
