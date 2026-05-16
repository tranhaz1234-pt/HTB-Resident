// Main Slider Js
jQuery(document).ready(function(){
  var owl = jQuery('.owl-carousel');
    owl.owlCarousel({
    margin: 20,
    nav: false,
    autoplay: true,
    autoplayTimeout: 3000,
    lazyLoad: true,
    loop: true,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    mouseDrag: true
  });
});

// Toggle
document.addEventListener("DOMContentLoaded", () => {
  const residential_real_estate_toggle = document.querySelector(".header-open-btn a"),
        residential_real_estate_info = document.querySelector(".header-info"),
        residential_real_estate_close = document.querySelector(".header-close-btn a");

  if (!residential_real_estate_toggle || !residential_real_estate_info) return;

  residential_real_estate_toggle.onclick = () => (residential_real_estate_info.classList.add("active"), document.body.classList.add("header-info-open"));
  residential_real_estate_close && (residential_real_estate_close.onclick = () => (residential_real_estate_info.classList.remove("active"), document.body.classList.remove("header-info-open")));

  document.addEventListener("click", e => {
    if (document.body.classList.contains("header-info-open") &&
        !residential_real_estate_info.contains(e.target) && !residential_real_estate_toggle.contains(e.target)) {
      residential_real_estate_info.classList.remove("active");
      document.body.classList.remove("header-info-open");
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const residential_real_estate_toggleBtn = document.querySelector(".header-open-btn a"); // open button
  const residential_real_estate_infoBox = document.querySelector(".header-info"); // info box
  const residential_real_estate_closeBtn = document.querySelector(".header-close-btn a"); // close button

  if (!residential_real_estate_toggleBtn || !residential_real_estate_infoBox || !residential_real_estate_closeBtn) return;

  // OPEN the info box
  residential_real_estate_toggleBtn.addEventListener("click", () => {
    residential_real_estate_infoBox.classList.add("active");
    document.body.classList.add("header-info-active");

    // Optional: move keyboard focus inside
    const firstFocusable = residential_real_estate_infoBox.querySelector(
      'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
    );
    if (firstFocusable) firstFocusable.focus();
  });

  // CLOSE the info box (when clicking the close icon)
  residential_real_estate_closeBtn.addEventListener("click", () => {
    residential_real_estate_infoBox.classList.remove("active");
    document.body.classList.remove("header-info-active");
    residential_real_estate_toggleBtn.focus(); // return focus to the button
  });

  // Trap focus inside when active
  document.addEventListener("keydown", (e) => {
    if (!residential_real_estate_infoBox.classList.contains("active")) return;

    const focusable = residential_real_estate_infoBox.querySelectorAll(
      'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])'
    );
    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (e.key === "Tab") {
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }

    // ESC key also closes the box
    if (e.key === "Escape") {
      residential_real_estate_closeBtn.click();
    }
  });
});