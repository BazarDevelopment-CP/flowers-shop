$(document).ready(function () {
  // if ($(".home-works .swiper").length) {
  //   const swiper = new Swiper(".home-works .swiper", {
  //     slidesPerView: 1,
  //     watchOverflow: true,
  //     loop: true,
  //     spaceBetween: 16,
  //     navigation: {
  //       nextEl: $(".home-works .swiper")
  //         .closest(".swiper-container")
  //         .find(".button-next")[0],
  //       prevEl: $(".home-works .swiper")
  //         .closest(".swiper-container")
  //         .find(".button-prev")[0],
  //     },
  //     breakpoints: {
  //       500: {
  //         slidesPerView: 2,
  //       },
  //       744: {
  //         slidesPerView: 3,
  //       },
  //     },
  //   });
  // }
  $(".slider").slick({
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 840,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 570,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".gallery-slider").slick({
    slidesToShow: 4,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 840,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 570,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 470,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".slider-banner").slick({
    slidesToShow: 1,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 3000,
  });
  if ($(".reviews .swiper").length) {
    const swiper = new Swiper(".reviews .swiper", {
      slidesPerView: 1,
      watchOverflow: true,
      loop: true,
      spaceBetween: 16,
      navigation: {
        nextEl: $(".reviews .swiper")
          .closest(".swiper-container")
          .find(".button-next")[0],
        prevEl: $(".reviews .swiper")
          .closest(".swiper-container")
          .find(".button-prev")[0],
      },
      breakpoints: {
        744: {
          slidesPerView: 3,
        },
      },
    });
  }
  if ($(".gallery-swiper .swiper").length) {
    const swiper = new Swiper(".gallery-swiper .swiper", {
      slidesPerView: 1,
      spaceBetween: 16,
      loop: true,
      navigation: {
        nextEl: $(".gallery-swiper .swiper")
          .closest(".swiper-container")
          .find(".button-next")[0],
        prevEl: $(".gallery-swiper .swiper")
          .closest(".swiper-container")
          .find(".button-prev")[0],
      },
      breakpoints: {
        450: {
          slidesPerView: 2,
        },
        744: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 4,
        },
      },
    });
  }
});
