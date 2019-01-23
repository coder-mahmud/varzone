( function( $ ) {
$( document ).ready(function() {

  
  $('.cssmenu > ul > li > a').click(function() {
      $('.cssmenu li').removeClass('active');
      $(this).closest('li').addClass('active');	
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
      }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('.cssmenu ul ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
      }
      if($(this).closest('li').find('ul').children().length == 0) {
        return true;
      } else {
        return false;	
      }		
  });

  $('#filter').submit(function(){
      var filter = $('#filter');
      $.ajax({
          url:filter.attr('action'),
          data:filter.serialize(), // form data
          type:filter.attr('method'), // POST
          beforeSend:function(xhr){
              filter.find('button').text('Processing...'); // changing the button label
          },
          success:function(data){
              filter.find('button').text('Apply filter'); // changing the button label back
              $('#response').html(data); // insert data
          }
      });
      return false;
  });





  });
} )( jQuery );