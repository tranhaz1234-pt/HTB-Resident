/**
 * Coworking Office Theme - Main JavaScript
 * Handles theme interactive functionality
 */

// Faq
document.addEventListener("DOMContentLoaded", function () {
  const coworking_office_game_details = document.querySelectorAll(".faq-btm-title");

  coworking_office_game_details.forEach((targetDetail) => {
    targetDetail.addEventListener("toggle", () => {
      if (targetDetail.open) {
        coworking_office_game_details.forEach((coworking_office_game_detail) => {
          if (coworking_office_game_detail !== targetDetail) {
            coworking_office_game_detail.removeAttribute("open");
          }
        });
      }
    });
  });
});


jQuery(document).ready(function ($) {

// Category Slider
  $('.cat-position.owl-carousel').owlCarousel({
      nav: false,
      margin: 20,
      autoplay: true,
      lazyLoad: true,
      autoplayTimeout: 2000,
      loop: true,
      dots: false,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 2 },
        1200: { items: 3 }
      },
      autoplayHoverPause: true,
      mouseDrag: true
  });
});