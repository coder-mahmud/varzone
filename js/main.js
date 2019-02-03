( function( $ ) {
$( document ).ready(function() {


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
              filter.find('button').text('Search'); // changing the button label back
              $('#response').html(data); // insert data
          },
          error: function (request, status, error) {
                  alert(error);
          }
      });
      return false;
  }); // form submit ajax call


/*
  $('.cvf-universal-pagination li.active').live('click',function(){
      var page = $(this).attr('p');
      cvf_load_all_posts(page);
      
  });  


  var ajaxurl = 'varzone.me/wp-admin/admin-ajax.php';
  
  function cvf_load_all_posts(page){
      // Start the transition
      $(".cvf_pag_loading").fadeIn().css('background','#ccc');
      
      // Data to receive from our server
      // the value in 'action' is the key that will be identified by the 'wp_ajax_' hook 
      var data = {
          page: page,
          action: "demo-pagination-load-posts"
      };
      
      // Send the data
      $.post(ajaxurl, data, function(response) {
          // If successful Append the data into our html container
          $(".cvf_universal_container").html(response);
          // End the transition
          $(".cvf_pag_loading").css({'background':'none', 'transition':'all 1s ease-out'});
      });
  }
                
*/
var current_page = 1;
$(document).on('click','.page-numbers',function(e){
  e.preventDefault();
  var total_page = $('.total_page').html();
  var makeCall = false;
  //console.log($(this).text());

  // if(page != "next »"){
  //   current_page = page;
  // }else{
  //   page = current_page + 1;
  // }
  if($(this).hasClass('next') && current_page !=total_page){

    page = parseInt(current_page) + 1;
    current_page = page;
    makeCall = true;
    console.log(page);
  }else if($(this).hasClass('next') && current_page ==total_page){
      makeCall = false;
  }else{
    var page = $(this).text();
    current_page = page;
    makeCall = true;
  }

  var division_id = $('.division_id').html();
  var conference_id = $('.conference_id').html();
  var state_id = $('.state_id').html();
  var sport_id = $('.sport_id').html();
  

  if(makeCall){
    $.ajax({
        url:'http://varzone.me/wp-admin/admin-ajax.php',
        data:{
         page: page,
         action:'myfilter_new',
         division_id:division_id,
         conference_id:conference_id,
         state_id:state_id,
         sport_id:sport_id,
        },
        type:'POST',

        success:function(data){
          //alert(data);
           $('#response').html(data);
           //console.log(divisin_id);
        },
        error: function (request, status, error) {
                alert(error);
        }
    });    
  }





})




  });//document ready
})( jQuery );