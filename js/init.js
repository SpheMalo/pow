$(document).ready(function(){
  $('#nav > li > ul').css({
    display: "none",
    left: "auto"
  });
  $('#nav > li').hoverIntent(function() {
    $(this)
      .find('ul')
      .stop(true, true)
      .slideDown('medium');
  }, function() {
    $(this)
      .find('ul')
      .stop(true,true)
      .fadeOut('fast');
  });

});