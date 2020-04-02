jQuery(function () {

  jQuery(document).ready(function($){
    jQuery(".cta-close").click(function(){
      //jQuery("p.paymentoption").toggle();
      var elem='p.paymentoption';
      if(jQuery(elem).is(':visible')){
        jQuery(elem).slideUp();
        $(this).addClass('closed');
      }
      else{
        jQuery("p.paymentoption").slideDown();
        $(this).removeClass('closed');
      }
    });
  });
});