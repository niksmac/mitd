jQuery( document ).ready(function() {
jQuery('.texti-slide').owlCarousel({
    loop:true,
    nav:true,
    items: 2,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      responsive:{
          0:{
              items:1
          },
          800:{
              items:2
          },

      1200:{
              items:2
          },
  }});
jQuery('.sponsors-slider').owlCarousel({
    items: 6
  });
jQuery('.uou-tabs').uouTabs();
});
