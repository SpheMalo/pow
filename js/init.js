function getCal(someDate)
{
  var s_d, S_dd;
  /*if (someDate = null)
  {
    s_dd = 'date=' + Date(year, month, day);
    s_d = 'month=' + Date(year, month, day);
  }
  else
  {
    
  }*/

  s_dd = 'date=' + someDate;
  s_d = 'month=' + someDate;

  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    cache: false,
    data: s_d,
    success: function(result){
      $('#calendar > div').filter(':first').html(result);
    },
    error: function(){
      //alert('something went wrong');
    }
  });

  
  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    cache: false,
    data: s_dd,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
    },
    error: function(){
      //alert('something went wrong');
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

function makeDayAv(datt)
{
  var dat = 'makeDayAv=' + datt;

  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    data: dat,
    cache: false,
    success: function(result){
      //$('#calendar > div').filter(':first').html(result);
      getCal(datt);
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
      getCal(datt);
      //$('#calendar > div').filter(':first').html(result);
    },
    error: function(res){
      //location.reload();
    }
  });
}

function navMonth(month)
{
  var dat = "month=" + month;
  
  $.ajax({
    type: "post",
    url: "../../../inc/cal.php",
    cache: false,
    data: dat,
    success: function(result){
      $('#calendar > div').filter(':first').html(result);
    },
    error: function(){
      alert('something went wrong');
    }
  });  
}

function navWeek(datt)
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

function makeSlot1Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=1&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot1Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=1&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot2Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=2&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot2Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=2&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot3Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=3&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot3Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=3&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot4Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=4&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot4Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=4&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot5Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=5&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot5Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=5&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot6Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=6&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot6Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=6&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot7Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=7&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot7Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=7&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot8Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=8&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot8Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=8&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot9Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=9&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot9Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=9&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot10Av(datt)
{
  var dat = 's_d=' + datt + '&s_t=10&makeSlotAv=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function makeSlot10Unav(datt)
{
  var dat = 's_d=' + datt + '&s_t=10&makeSlotUnav=y';

  $.ajax({
    type: "post",
    url: "../../../inc/call.php",
    data: dat,
    cache: false,
    success: function(result){
      $('#calendar > div').filter(':last').html(result);
      //getCal();
    },
    error: function(res){
      //location.reload();
    }
  });
}

function toExcel(datt)
{
  var datt_id = "#" + datt;

  $(datt_id).table2excel({
    exclude: ".noExl",
    name: datt,
    filename: datt,
    fileext: ".xls",
    exclude_img: true,
    exclude_links: false,
    exclude_inputs: true
  });
}

function takePicture()
{
  $("#pic").html("<video id='video' width='640' height='480' autoplay style='border: 1px dashed lime;'></video><button id='snap' onclick='snap()'>Capture Photo</button><canvas id='canvas' width='640' height='480' style='border: 1px dashed lime;'></canvas><a id='cancelSnap'>cancel</a>");

  if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) 
  {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({video: true}).then(function(stream) 
    {
      // Grab elements, create settings, etc.
      var video = document.getElementById('video');
      video.src = window.URL.createObjectURL(stream);
      
      // Elements for taking the snapshot
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
    });
  }
  else
  {
    alert("not");
  }
}

function snap()
{
  // Grab elements, create settings, etc.
  var video = document.getElementById('video');
  
  // Elements for taking the snapshot
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, 640, 480);
  var dat = canvas.toDataURL('image/png', 1.0);
  console.log(dat);
  $("#test").html(dat);
  $("#picOfficial").attr("src",dat);
  $("#pic").html("");
}

$(document).ready(function()
{
  function mainMember()
  {
    var mem = document.getElementById("main_m");

    if ($('#patSt').is(':checked'))
    {
      mem.setAttribute('disabled', 'disabled');
    }
    else
    {
      mem.removeAttribute('disabled');
    }
  }


  function addProdOrder()
  {
    var p = document.getElementById("orderProd");
   // var z = p.innerHTML();
   alert("dfsd");
    var dat = "s_add_prod=";
    $.ajax({
      type: "post",
      data: dat,
      url: "../supplier/order/place_new_order/index.php",
      success: function(){

      },
      error: function(){

      }
    });
  }

  

$('#orderProdSubmit').click(function(e){
    addProdOrder();
    //e.preventDefault();
  }); 

  /*if ($('#check').is(':checked'))
  {
    //alert("worked");
    $('#main_m').removeAttribute("readonly");
  }
  else
  {
    //alert("didnt worked");
    $('#main_m').setAttribute("readonly");
  }*/

  $('takeP').click(function(e){
    takePicture();
    e.preventDefault();
  });

  $('#copy_address').click(function(e){
    e.preventDefault();
  });

  $('#patStLabel').click(function(){
    //var check = document.getElementById('patSt');
    //var mem = document.getElementById("main_m");

    if ($(this).prev().is(':checked'))
    {
      $(this).prev().prop('checked', false);
      //mem.removeAttribute("readonly");
      mainMember();
    }
    else
    {
      $(this).prev().prop('checked', true);
      //mem.setAttribute("readonly", "true");
      mainMember();
    }
  });

  $('#nav > li > ul, #nav_xtra > li > ul').css({
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

  $('#nav_xtra > li').hover(function() {
    $(this)
    .find('ul')
    .stop(true, true)
    .slideDown('medium')
    .css({display: "block"});

    $('#nav_xtra > li > img').rotate({
      angle: 0,
      animateTo: 100
    });
  }, function() {
    $(this)
    .find('ul')
    .stop(true,true)
    .fadeOut('fast')
    .css({display: "none"});

    $('#nav_xtra > li > img').rotate({
      angle: 100,
      animateTo: 0
    });
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

});