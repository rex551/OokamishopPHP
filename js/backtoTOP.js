$(document).ready(function(){

  $(window).scroll(function(){
    if($(this).scrollTop() > 40){
      $('#backtoTOP').fadeIn();
    } else{
      $('#backtoTOP').fadeOut();
    }
  });

  $("#backtoTOP").click(function(){
    $('html ,body').animate({scrollTop : 0},800);
  });
});
