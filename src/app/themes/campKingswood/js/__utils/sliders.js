const $ = jQuery.noConflict();

class Slider {
  constructor(selector, args = {}, beforeChangeFunction = null) {
    this.selector = selector;
    this.args = args;
    this.beforeChangeFunction = beforeChangeFunction;
  }

  getDefaultSlickSettings() {
    return {
      dots: false,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      pauseOnHover: false,
      speed: 600,
    };
  }

  /**
   * Override our default slick settings with args provided to the class.
   */
  getSlickSettings() {
    return Object.assign({}, this.getDefaultSlickSettings(), this.args);
  }

  init() {
    let settings = this.getSlickSettings();

    $(this.selector).slick(settings);
  }
}

const SimpleSlider = new Slider(".bc-gallery__slider", {
  prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Slide"></button>',
  nextArrow: '<button type="button" class="slick-next" aria-label="Next Slide"></button>',
  dots: false,
  fade: false,
  centerMode: true,
  variableWidth: true,
  lazyLoad: 'ondemand',
  centerPadding: '0px',
  arrows: true,
  draggable: true,
  swipe: true,
  touchMove: true
});

const LightboxSlider = new Slider(".lightbox-gallery__slider", {
  prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Slide"></button>',
  nextArrow: '<button type="button" class="slick-next" aria-label="Next Slide"></button>',
  dots: false,
  fade: false,
  centerMode: true,
  centerPadding: '0px',
  arrows: true,
  draggable: true,
  swipe: true,
  touchMove: true
});

const TestimonialsSlider = new Slider(".block-testimonials__slider", {
  prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Slide"></button>',
  nextArrow: '<button type="button" class="slick-next" aria-label="Next Slide"></button>',
  dots: false,
  fade: false,
  centerMode: true,
  variableWidth: true,
  lazyLoad: 'ondemand',
  centerPadding: '0px',
  arrows: true,
  draggable: true,
  swipe: true,
  touchMove: true
});

const ProgrammingContentSlider = new Slider(".block-programming-content-slider__slider", {
  prevArrow: '<button type="button" class="c-btn c-btn-tertiary c-btn-lg c-btn-color-alt slick-prev" aria-label="Previous Slide"></button>',
  nextArrow: '<button type="button" class="c-btn c-btn-tertiary c-btn-lg c-btn-color-alt slick-next" aria-label="Next Slide"></button>',
  dots: false,
  fade: false,
  lazyLoad: 'ondemand',
  arrows: true,
  draggable: true,
  swipe: true,
  touchMove: true,
  slidesToShow: 2,
  responsive: [
    {
      breakpoint: 1460,
      settings: {
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        arrows: false,
        dots: true
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        arrows: false,
        dots: true
      },
    },
  ],
});

export const handleActivitySliderChange = () => {
  const counter = document.querySelector(
    ".activities-slider__active-slide-number"
  );
  if (counter == null) {
      return;
  }
  const progressIndicator = document.querySelector(
    ".activities-slider__progress-indicator"
  );
  const totalSlidesText = document.querySelector(
    ".activities-slider__total-slides-number"
  ).textContent;
  const totalSliderNum = +totalSlidesText;
  const transformJump = 100;
  let translateValue = 0;

  if (counter && progressIndicator) {
    $(".activities-slider__slider-wrapper").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
        counter.textContent = nextSlide + 1;

        if (nextSlide < 0 || nextSlide > totalSliderNum) {
          return;
        } else if (nextSlide > currentSlide) {
          translateValue += transformJump;
          progressIndicator.style.transform = `translateX(${translateValue}%)`;
        } else if (nextSlide < currentSlide) {
          translateValue -= transformJump;
          progressIndicator.style.transform = `translateX(${translateValue}%)`;
        }
      }
    );
  }
};

const ActivitySlider = new Slider(".activities-slider__slider-wrapper", {
  appendArrows: ".activities-slider__nav",
  fade: true,
  infinite: false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        fade: false,
      },
    },
  ],
});

const BioSlider = new Slider(".bio-lightbox__slider", {
  appendArrows: ".bio-lightbox__slider-nav",
  fade: true,
  touchMove: false,
  draggable: false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        fade: false,
      },
    },
  ],
});

const BioPhotoSlider = () => {
  $(".bio-lightbox__image-slider").each(function () {
    $(this).slick({
      appendArrows: $(this).siblings(".bio-lightbox__image-slider-nav"),
      appendDots: $(this).siblings(".bio-lightbox__image-slider-nav"),
      dots: true,
      fade: true,
      arrows: true,
      draggable: false,
      swipe: false,
      touchMove: false
    });
  });
};

const ScrollHookSlider = () => {
  let shsSlider = $("#shs-navigation");
  
  if (shsSlider.length) {
    if (window.innerWidth < 992 && !shsSlider.hasClass('slick-slider')) {
        shsSlider.slick({
            prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Slide"></button>',
            nextArrow: '<button type="button" class="slick-next" aria-label="Next Slide"></button>',
            dots: false,
            fade: false,
            arrows: true,
            draggable: true,
            swipe: true,
            touchMove: true
        }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            shsSlider.find('.slick-slide[data-slick-index="' + nextSlide + '"] .shs-nav-link').trigger('click');
            shsSlider.addClass('sliding');
        }).on('afterChange', function(event, slick, currentSlide) {
            shsSlider.removeClass('sliding');
        });
    } else if (window.innerWidth >= 992 && shsSlider.hasClass('slick-slider')) {
        shsSlider.slick("unslick");
    }
  }
};

const TabSlider = () => {
  let tabSliders = $(".tabs__link-list");
  
  if (tabSliders.length) {
    tabSliders.each(function () {
      let thisSlider = $(this);

      if (window.innerWidth < 576 && !thisSlider.hasClass('slick-slider')) {
          thisSlider.slick({
              prevArrow: '<button type="button" class="slick-prev" aria-label="Previous Slide"></button>',
              nextArrow: '<button type="button" class="slick-next" aria-label="Next Slide"></button>',
              dots: false,
              fade: false,
              arrows: true,
              draggable: true,
              swipe: true,
              touchMove: true
          }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
              thisSlider.find('.slick-slide[data-slick-index="' + nextSlide + '"] .tabs_link--inner').trigger('click');
          });
      } else if (window.innerWidth >= 576 && thisSlider.hasClass('slick-slider')) {
          thisSlider.slick("unslick");
      }
    });
  }
};

export {
  SimpleSlider,
  LightboxSlider,
  ActivitySlider,
  BioSlider,
  BioPhotoSlider,
  ScrollHookSlider,
  TabSlider,
  ProgrammingContentSlider,
  TestimonialsSlider
};
