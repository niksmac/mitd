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
// jQuery('.uou-tabs').uouTabs();

// Superfish Menus
// ---------------------------------------------------------
if (jQuery.fn.superfish) {
  jQuery('.sf-menu').superfish();
} else {
  console.warn('not loaded -> superfish.min.js and hoverIntent.js');
}

(function ($) {
  console.log("E");

    Drupal.behaviors.propMis = {

        attach:function (context, settings) {
            
            
             $(document.body).on('change','#select-1',function(){
                if (!$('#label-2').length > 0) {
                    $( "#select-2" ).before( '<div id="label-2">My label 2</div>')
                }
                if ($('#label-3').length > 0) {
                    $('#label-3').remove();
                    
                }
            });;
            
            $(document.body).on('change','#select-2',function(){
                if (!$('#label-3').length > 0) {
                    $( "#select-3" ).before('<div id="label-3">My label 3</div>')
                }
            });
              
        }
    };

});

jQuery("#edit-select-all").click(function(){
  console.log("hh")
    jQuery('input:checkbox').not(this).prop('checked', this.checked);
});

});


