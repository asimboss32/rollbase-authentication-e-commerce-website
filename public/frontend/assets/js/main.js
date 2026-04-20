// fixed header
$(window).scroll(function() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop >= 100) {
        $('body').addClass('fixed-header');
    } else {
        $('body').removeClass('fixed-header');
    }
});
 
//Category Menu js
$(document).ready(function(e) {
    // Cetegory Show
    $(".header__category-icon-outer").on("click", function(e) {
        e.stopPropagation();
        $(".header__category-items-outer").toggleClass("show");
    });
    $(".header__category-items-outer").on("click", function(e) {
        e.stopPropagation();
    });
    $(document).on("click", function(e) {
        $(".header__category-items-outer").removeClass("show");
    });
});

// Navbar Toggle Button For Mini Device
$('.nav-toggle-btn').click(function() {
    $('.header__dynamic-page-wrapper').toggleClass('menu-visible');
    $('body').toggleClass('body-overflow');
});

//Home Slider Js
$('.slider-items-wrapper').slick({
  dots: true,
  arrows: false,
  infinite: true,
  speed: 500,
  autoplay: true,
  fade: true,
  cssEase: 'linear'
});

//Categoris Slider
$('.categoris-items-wrapper').owlCarousel({
    loop:true,
    margin:10,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        },
        1200:{
            items:7,
            nav:true,
            loop:true
        }
    }
});

$('.product-items-wrapper').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    speed: 300,
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: true,
    prevArrow:
        '<button type="button" class="slick-prev"><i class="fas fa-chevron-right"></i></button>',
    nextArrow:
        '<button type="button" class="slick-next"><i class="fas fa-chevron-left"></i></button>',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
            }
        },
        {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
            }
        },        
        {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
            }
        }
    ]
});

$('.related-product-items-wrap').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    speed: 300,
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: true,
    prevArrow:
        '<button type="button" class="slick-prev"><i class="fas fa-chevron-right"></i></button>',
    nextArrow:
        '<button type="button" class="slick-next"><i class="fas fa-chevron-left"></i></button>',
    responsive: [
        {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
            }
        },
        {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
            }
        },        
        {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
            }
        }
    ]
});

$('.slider-content').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1000,
    asNavFor: '.slider-thumb',
    arrows: true,
    prevArrow: '<i class="fas fa-chevron-left"></i>',
    nextArrow: '<i class="fas fa-chevron-right"></i>',
  });
  $('.slider-thumb').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-content',
    dots: false,
    centerMode: false,
    focusOnSelect: true
  });

//Address Show hide
$('#differentaddress').click(function() {
    $('#collapseAddress').toggle(500);
});


//Search Show hide
$('.res-search').on('click' , function() {
    $('.search-form-outer').toggleClass('show');
});

//Filter Item Show
$(document).on("click",".filter-items-outer .label", function(e) {
    $(this).closest('.filter-items-outer').find(".filter-items").slideToggle();
});

//Thanks Your Js
const Confettiful = function(el) {
    this.el = el;
    this.containerEl = null;

    this.confettiFrequency = 3;
    this.confettiColors = ['#EF2964', '#00C09D', '#2D87B0', '#48485E','#EFFF1D'];
    this.confettiAnimations = ['slow', 'medium', 'fast'];

    this._setupElements();
    this._renderConfetti();
  };

  Confettiful.prototype._setupElements = function() {
    const containerEl = document.createElement('div');
    const elPosition = this.el.style.position;

    if (elPosition !== 'relative' || elPosition !== 'absolute') {
      this.el.style.position = 'relative';
    }

    containerEl.classList.add('confetti-container');

    this.el.appendChild(containerEl);

    this.containerEl = containerEl;
  };

  Confettiful.prototype._renderConfetti = function() {
    this.confettiInterval = setInterval(() => {
      const confettiEl = document.createElement('div');
      const confettiSize = (Math.floor(Math.random() * 3) + 7) + 'px';
      const confettiBackground = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
      const confettiLeft = (Math.floor(Math.random() * this.el.offsetWidth)) + 'px';
      const confettiAnimation = this.confettiAnimations[Math.floor(Math.random() * this.confettiAnimations.length)];

      confettiEl.classList.add('confetti', 'confetti--animation-' + confettiAnimation);
      confettiEl.style.left = confettiLeft;
      confettiEl.style.width = confettiSize;
      confettiEl.style.height = confettiSize;
      confettiEl.style.backgroundColor = confettiBackground;

      confettiEl.removeTimeout = setTimeout(function() {
        confettiEl.parentNode.removeChild(confettiEl);
      }, 3000);

      this.containerEl.appendChild(confettiEl);
    }, 25);
  };

  window.confettiful = new Confettiful(document.querySelector('.js-container'));