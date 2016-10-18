function getCal(someDate)
{
  var s_d, s_dd;

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

function navBookWeek(datt)
{
  var dat = '&date=' + datt;
  var dentist = $("#dentistSelect").val();
  var d = 'doc=' + dentist + dat;

  $.ajax({
    type: "post",
    url: "../../../inc/calll.php",
    cache: false,
    data: d,
    success: function(result){
        $('#calendar').filter(':last').html(result);
    },
    error: function(){
    //alert('something went wrong');
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

function bookSlot1(datt)
{
  var app_d_t = datt + ",1";
  $('#app_d_t').val(app_d_t);
}

function bookSlot2(datt)
{
  var app_d_t = datt + ",2";
  $('#app_d_t').val(app_d_t);
}

function bookSlot3(datt)
{
  var app_d_t = datt + ",3";
  $('#app_d_t').val(app_d_t);
}

function bookSlot4(datt)
{
  var app_d_t = datt + ",4";
  $('#app_d_t').val(app_d_t);
}

function bookSlot5(datt)
{
  var app_d_t = datt + ",5";
  $('#app_d_t').val(app_d_t);
}

function bookSlot6(datt)
{
  var app_d_t = datt + ",6";
  $('#app_d_t').val(app_d_t);
}

function bookSlot7(datt)
{
  var app_d_t = datt + ",7";
  $('#app_d_t').val(app_d_t);
}

function bookSlot8(datt)
{
  var app_d_t = datt + ",8";
  $('#app_d_t').val(app_d_t);
}

function bookSlot9(datt)
{
  var app_d_t = datt + ",9";
  $('#app_d_t').val(app_d_t);
}

function bookSlot10(datt)
{
  var app_d_t = datt + ",10";
  $('#app_d_t').val(app_d_t);
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
  $("#pic").html("<video id='video' width='640' height='480' autoplay></video><button id='snap' onclick='snap()'>Capture Photo</button><canvas id='canvas' width='640' height='480''></canvas>");

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
  var modal = document.getElementById('myModal');
  // Elements for taking the snapshot
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, 640, 480);
  var dat = canvas.toDataURL('image/png', 1.0).replace('image/png', 'image/octet-stream');
  //imagejpeg(dat);
  //window.location.href = image;
  console.log(dat);
  $("#test").html(dat);
  $("#picOfficial").attr("src",dat);
  $("#pic").html("");
  modal.style.display = "none";
}
////////////////////////////Place Order add to prod table  /////////////////////
function getOrderB()
{
  $.ajax({
    type: "post",
    url: "../../../supplier/order/place_new_order/inc/cont.php",
    success: function(result){
      $("#prodOrderB").html(result);
    },
    error: function(){

    }
  });
}
var OrderList = [];

function addProdOrder()
{
  var z = $("#orderProd").val(), pq = $("#orderProdQ").val();
  var dat = "add_prod=" + z + "&add_prodq=" + pq;
  $.ajax({
    type: "post",
    data: dat,
    url: "../../../supplier/order/place_new_order/inc/addProdtoTable.php",
    success: function(result){
      result = result.substring(1,result.length-1);
      result = JSON.parse(result);
      OrderList.push(result);

      var newRow = ""+
      "<tr>"
        +"<td>"+result.name+"</td>"+
        "<td>"+result.type+"</td>"+
        "<td>"+result.size+"</td>"+
        "<td>"+result.quantity+"</td>"+
        "<td><span id="+"remove_"+ (OrderList.length-1) +" onclick='removeOrderItem(this.id)'><a>Remove</a></span></td>"+
      "</tr>";
      $("#prodDivID").html( $("#prodDivID").html()+ newRow);

    },
    error: function(){

    }
  });
  //console.log(OrderList);
}

function removeOrderItem(id)
{
  var productIndex = id.split("_")[1];
  productIndex = parseInt(productIndex);
  for (var i = productIndex; i < OrderList.length-1; i++)
  {
    OrderList[i].name = OrderList[i+1].name;
    OrderList[i].type = OrderList[i+1].type;
    OrderList[i].size = OrderList[i+1].size;
    OrderList[i].quantity = OrderList[i+1].quantity;
  }

  OrderList.pop();
  var tableHtml = "";
  for (var i = 0; i < OrderList.length-1; i++)
  {
      tableHtml +=
      "<tr>"
      +"<td>"+OrderList[i].name+"</td>"+
      "<td>"+OrderList[i].type+"</td>"+
      "<td>"+OrderList[i].size+"</td>"+
      "<td>"+OrderList[i].quantity+"</td>"+
      "<td><span id="+"remove_"+ (i) +" onclick='removeOrderItem(this.id)'><a>Remove</a></span></td>"+
      "</tr>";
  }
  $("#prodDivID").html(tableHtml);
}
////////////////////////////Consultation invoice add to prod table  /////////////////////
function getOrderProdConsultation()
{
  $.ajax({
    type: "post",
    url: "../../consultation/make_consultation_notes/inc/cont.php",
    success: function(result){
      $("#prodOrderCon").html(result);
    },
    error: function(){

    }

  });
  getOrderProcConsultation();
}
var OrderList = [];

function addProdOrderCon()
{
  var z = $("#prodNameId").val(), pq = $("#prodQtyId").val();
  var dat = "add_prod=" + z + "&add_prodq=" + pq;
  $.ajax({
    type: "post",
    data: dat,
    url: "../../consultation/make_consultation_notes/inc/addProdtoTable.php",
    success: function(result){
      result = result.substring(1,result.length-1);
      result = JSON.parse(result);
      OrderList.push(result);

      var newRow = ""+
          "<tr>"
          +"<td>"+result.name+"</td>"+
          "<td>"+result.type+"</td>"+
          "<td>R"+result.price+"</td>"+
          "<td>"+result.quantity+"</td>"+
          "<td><span id="+"remove_"+ (OrderList.length-1) +" onclick='removeOrderItem(this.id)'><a>Remove</a></span></td>"+
          "</tr>";
      $("#prodDivID").html( $("#prodDivID").html()+ newRow);

    },
    error: function(){

    }
  });
  //console.log(OrderList);
}

  function removeOrderItem(id)
  {
    var productIndex = id.split("_")[1];
    productIndex = parseInt(productIndex);
    for (var i = productIndex; i < OrderList.length-1; i++)
    {
      OrderList[i].name = OrderList[i+1].name;
      OrderList[i].type = OrderList[i+1].type;
      OrderList[i].price = OrderList[i+1].price;
      OrderList[i].quantity = OrderList[i+1].quantity;
    }

    OrderList.pop();
    var tableHtml = "";
    for (var i = 0; i < OrderList.length-1; i++)
    {
      tableHtml +=
          "<tr>"
          +"<td>"+OrderList[i].name+"</td>"+
          "<td>"+OrderList[i].type+"</td>"+
          "<td>R"+ OrderList[i].price+"</td>"+
          "<td>"+OrderList[i].quantity+"</td>"+
          "<td><span id="+"remove_"+ (i) +" onclick='removeOrderItem(this.id)'><a>Remove</a></span></td>"+
          "</tr>";
    }
    $("#prodDivID").html(tableHtml);
  }

  ////////////////////////////Consultation invoice add to proc table  /////////////////////
  function getOrderProcConsultation()
  {
    $.ajax({
      type: "post",
      url: "../../consultation/make_consultation_notes/inc/cont1.php",
      success: function(result){
        $("#procOrderCon").html(result);
      },
      error: function(){

      }
    });
  }
  var OrderProcList = [];

  function addProcOrderCon()
  {
    var z = $("#procNameId").val(), pq = $("#procQtyId").val();
    var dat = "add_proc=" + z + "&add_procq=" + pq;
    $.ajax({
      type: "post",
      data: dat,
      url: "../../consultation/make_consultation_notes/inc/addProcToTable.php",
      success: function(result){
        result = result.substring(1,result.length-1);
        result = JSON.parse(result);
        OrderProcList.push(result);

        var newRow = ""+
            "<tr>"
            +"<td>"+result.desc+"</td>"+
            "<td>"+result.type+"</td>"+
            "<td>R"+result.price+"</td>"+
            "<td>"+result.quantity+"</td>"+
            "<td><span id="+"remove_"+ (OrderProcList.length-1) +" onclick='removeOrderItemProc(this.id)'><a>Remove</a></span></td>"+
            "</tr>";
        $("#procDivID").html($("#procDivID").html()+ newRow);

      },
      error: function(){

      }
    });
    //console.log(OrderList);
  }

  function removeOrderItemProc(id)
  {
    var productIndex = id.split("_")[1];
    productIndex = parseInt(productIndex);
    for (var i = productIndex; i < OrderProcList.length-1; i++)
    {
      OrderProcList[i].desc = OrderProcList[i+1].desc;
      OrderProcList[i].type = OrderProcList[i+1].type;
      OrderProcList[i].price = OrderProcList[i+1].price;
      OrderProcList[i].quantity = OrderProcList[i+1].quantity;
    }

    OrderProcList.pop();
    var tableHtml = "";
    for (var i = 0; i < OrderProcList.length-1; i++)
    {
      tableHtml +=
          "<tr>"
          +"<td>"+OrderProcList[i].desc+"</td>"+
          "<td>"+OrderProcList[i].type+"</td>"+
          "<td>R"+OrderProcList[i].price+"</td>"+
          "<td>R"+OrderProcList[i].quantity+"</td>"+
          "<td><span id="+"remove_"+ (i) +" onclick='removeOrderItemProc(this.id)'><a>Remove</a></span></td>"+
          "</tr>";
    }
    $("#procDivID").html(tableHtml);
  }

  function confirmation(datt)
  {
    $('<div id="proceed"><p>Are you sure you wish to continue?</p><a href="?rem=' + datt + '" id="rem_yes" style="cursor:pointer;" >yes</a><a href="" id="rem_no" style="cursor:pointer;">no</a></div>').appendTo('body').fadeIn('fast');
    e.preventDefault();
  }

  function confirm_app(datt)
  {
    $('<div id="proceed"><p>Are you sure you wish to continue?</p><a href="?p_a=' + datt + '" id="rem_yes" style="cursor:pointer;" >yes</a><a href="" id="rem_no" style="cursor:pointer;">no</a></div>').appendTo('body').fadeIn('fast');
    e.preventDefault();
  }
  

$(document).ready(function(){

  function accessLevel()
  {
    var a_l = document.getElementById("access_level");
    //alert(a_l.innerHTML);

    if (a_l.innerHTML == "A")
    {
      //var a_l_class = document.getElementsByClassName(a_l.innerHTML);
      //$(a_l_class:contains('AD')).css({'display': 'none'});
      //$("#nav > li > ul > li > a:contains('A')").css({'display': 'none'});
      $("#nav > li > ul > li > a").hasClass(function(){
        $(this).contains(a_l.innerHTML).css({'display': 'none'});
      });
    }
    
  }
  //accessLevel();

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

  function write_off()
  {
    if ($('#w_off').is(':checked'))
    {
      $('w_o_comment').removeAttribute("disabled");
    }
    else
    {
      $('w_o_comment').setAttribute("disabled", "disabled");
    }
  }

  $('#w_o_label').click(function(){
    if ($(this).prev().is(':checked'))
    {
      $(this).prev().prop('checked', false);
      $('w_o_comment').setAttribute("disabled", "disabled");
    }
    else
    {
      $(this).prev().prop('checked', "checked");
      $('w_o_comment').removeAttribute("disabled");
    }
  });

  var proceed_ans = false;
  /*$('#remove').click(function(e){
    //$('<div id="proceed" style="z-index:99999999999999; position:fixed; top: 50%; left: 50%;"><p>Are you sure you wish to continue?</p><a id="rem_yes" style="cursor:pointer;" >yes</a><a id="rem_no" style="cursor:pointer;">no</a></div>').appendTo('body').fadeIn('fast');
    e.preventDefault();
    
    $('#rem_yes').bind('click', function(){
      alert("yes");
      //proceed_ans = "yes";
      
      /*alert(proceed_ans);

      if (proceed_ans == "no")
      {
        e.preventDefault();
      }
      else
      {}*//*
      //$('#proceed').fadeOut('slow').remove();
    });

    $('#rem_no').bind('click', function(){
      alert("no");
      //proceed_ans = "no";
      /*if (proceed_ans == "no")
      {
        e.preventDefault();
      }
      else
      {}*//*
      //$('#proceed').fadeOut('slow').remove();
      //alert(proceed_ans); 
    });
  });*/

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