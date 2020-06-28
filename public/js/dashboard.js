$(function(){
    $('.nav-item a').click(function(){
      $('.nav-item a').each(function(a){
        $( this ).removeClass('selectedclass')
      });
      $( this ).addClass('selectedclass');
    });


 })
