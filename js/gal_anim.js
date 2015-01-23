$(document).ready(function(){

  var window_width = $(document.width();
  var move = $("ul id='photo-float'").css;
  
  if (window_width <= 1680px) {
      move.animate({
        margin-right:'-200px',
        opacity:'0.5'
      });
  }
}