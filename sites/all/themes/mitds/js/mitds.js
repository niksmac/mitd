// jshint ignore: start
jQuery( document ).ready(function() {

  if (jQuery.fn.superfish) {
    jQuery('.sf-menu').superfish();
  } else {
    console.warn('not loaded -> superfish.min.js and hoverIntent.js');
  }
});

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

jQuery( document ).ready(function() {
  //jQuery(".panel-body .form-checkboxes input[class='form-checkbox']").click(function(){ 
    if(jQuery('.panel-body .form-checkboxes [type="checkbox"]').is(":checked")){
      console.log("sd")
    jQuery("#edit-submit").css("background-color","#808080");
  //});
}
});

jQuery(document).idle({
  onIdle: function(){
    jQuery( ".colorbox-node" ).trigger( "click" );
  },
  keepTracking: false,
  idle: 5000
})