// Color Switcher
var themeToggleBtn = document.getElementById('theme-toggle');

// Change the toggle state based on previous change
if (localStorage.getItem('str-color-theme') === 'dark' || (!('str-color-theme' in localStorage))) {
  themeToggleBtn.checked = true;
  document.documentElement.classList.add('dark');
} else {
  themeToggleBtn.checked = false;
  document.documentElement.classList.remove('dark');
}

themeToggleBtn.addEventListener('change', function () {

  // if set via local storage previously
  if (localStorage.getItem('str-color-scheme')) {
    if (localStorage.getItem('str-color-theme') === 'light') {
      document.documentElement.classList.add('dark');
      localStorage.setItem('str-color-theme', 'dark');
    } else {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('str-color-theme', 'light');
    }
    // if NOT set via local storage previously
  } else {
    if (document.documentElement.classList.contains('dark')) {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('str-color-theme', 'light');
    } else {
      document.documentElement.classList.add('dark');
      localStorage.setItem('str-color-theme', 'dark');
    }
  }
});


// Login/Register
if (document.querySelector('.js-vv-modal')) {
  const modal = document.querySelector('.js-vv-modal');
  const openModals = document.querySelectorAll('.js-vv-modal__open-btn-login-register');

  // show the modal by clicking on the button

  openModals.forEach(element => {
    element.addEventListener('click', () => {
      modal.showModal();
    });
  });
}

// Product Slider
const swiperProductsNav = new Swiper('.js-vv-product-swiper-nav', {
  spaceBetween: 20,
  slidesPerView: 4,
  watchSlidesProgress: true,
  loop: false,
  direction: 'vertical',

  breakpoints: {
    576: {
      slidesPerView: 4,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 4,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 4,
    },
  },
});

const swiperProducts = new Swiper('.js-vv-product-swiper', {
  loop: false,
  thumbs: {
    swiper: swiperProductsNav
  },
});
