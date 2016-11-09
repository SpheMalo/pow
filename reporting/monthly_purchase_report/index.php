<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "monthly order report";
    $emp = $_SESSION['emp'];
    $dList = loadOrderList(null, null);
    $o = "";
  }
  else
  {
    header("Location: ../../login/");
  }
?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/viewBase.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/monthly_order_rpt.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="../../js/generateOrderPDF.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s101').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s101').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s101').parent().prevUntil().css({'color': '#00314c'});
        $('#s101').parent().nextUntil().css({'color': '#00314c'});
        $('#s101').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s101').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s101').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Reporting</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
     <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>Orders</legend>
          <div>
            <label for="order">Current Date:</label>
            <select id="OrderId" name="order" onchange="getOrderList()">
              <option>--select current date--</option>
              <?php ?>
              <?php $name = $d['name'];?>
              <option value="<?php echo date("Y-m-d");?>"><?php echo date("Y-m-d");?></option>
              <?php;?>
            </select>
<!--            <select id="DrSelect" onchange="getDrSchedule()">-->
<!--              <option >-- Select Dentist --</option>-->
<!--              <option name="jpMaponya">Dr J.P. Maponya</option>-->
<!--              <option name="yMaponya">Dr Y. Maponya</option>-->
<!--            </select>-->
          </div>
        </fieldset>
        <span onclick="generateOrderListPDF()" name="p_order_order" class="submit" style="padding: 2px;"/><a>  Print Report  </a></span>
      </form>
           
      <div id="order">
        
      </div>
    
    <footer></footer>
  </body>
</html>