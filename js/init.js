function getCal()
{
  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    cache: false,
    //data: dat,
    success: function(result){
      $('#calendar > div').filter(':first').html(result);
    },
    error: function(){
      alert('something went wrong');
    }
  });

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    cache: false,
    //data: dat,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
    },
    error: function(){
      alert('something went wrong');
    }
  });
}

function getWeek(datt)
{
  var dat = 'date=' + datt;

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      $('#nav_c > li > a')
      .filter('.active')
      .removeClass();

      $('#nav_c > li > a')
      .filter(':last')
      .addClass('active');
      
      $('#calendar div').filter(':first').fadeOut('fast', function(){
        $('#calendar div').filter(':last').fadeIn('slow');
      });
    },
    error: function(){
      alert('something went wrong');
    } 
  });
}

function copyAddress()
{
  var a = $('#add_line_ph1').val();
  var b = $('#add_line_ph2').val();
  var c = $('#add_line_ph3').val();
  var d = $('#add_line_ph4').val();
  var e = $('#add_line_ph5').val();
  $('#add_line_po1').val(a);
  $('#add_line_po2').val(b);
  $('#add_line_po3').val(c);
  $('#add_line_po4').val(d);
  $('#add_line_po5').val(e); 
}

function searchMed()
{}

function makeDayAv(datt)
{
  var dat = 'makeDayAv=' + datt;

  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':first').html(result);
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeDayUnav(datt)
{
  var dat = 'makeDayUnav=' + datt;

  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':first').html(result);
    },
    error: function(res){
      //location.reload();
    }
  });
}

$(document).ready(function(){
  $('#copy_address').click(function(e){
    e.preventDefault();
  });

  $('#nav > li > ul').css({
    display: "none",
    left: "auto"
  });
  $('#nav > li').hover(function() {
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

  $('form > div > div, #calendar > div')
      .click(function(event) {
        event.stopPropagation();
      })
      .filter(':not(:first)')
      .hide();

  $('form > div > ul > li > a').click(function(e){
    var div = $(this).attr('href');
    $('form > div > ul > li > a')
    .filter('.active')
    .removeClass();

    if (div == "note")
    {
      $('form > div > div:nth-of-type(2), form > div > div:last-of-type').fadeOut('fast');

      $('form > div > div:first-of-type').fadeIn('slow');
    }
    else if (div == "inv")
    {
      $('form > div > div:first-of-type, form > div > div:last-of-type').fadeOut('fast');

      $('form > div > div:nth-of-type(2)').fadeIn('slow');
    }
    else if (div == "pre")
    {
      $('form > div > div:nth-of-type(2), form > div > div:first-of-type').fadeOut('fast');

      $('form > div > div:last-of-type').fadeIn('slow');
    }

    $(this).addClass('active');

    e.preventDefault();
  });

  $('#nav_c > li > a').click(function(e){
    var div = $(this).attr('href');
    $('#nav_c > li > a')
    .filter('.active')
    .removeClass();
    
    if (div == "week")
    {
      $('#calendar div').filter(':first').fadeOut('fast', function(){
        $('#calendar div').filter(':last').fadeIn('slow');
      });
    }
    else if (div == "month")
    {
      $('#calendar div').filter(':last').fadeOut('fast', function(){
        $('#calendar div').filter(':first').fadeIn('slow');
      });
      
    }

    $(this).addClass('active');
    e.preventDefault();
  });

  function getUserImg()
  {
    //var img = $(this).attr('');

    /*$.ajax({
      type: "post"
    });*/
  }

});