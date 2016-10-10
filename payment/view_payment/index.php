<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view payment";
    $emp = $_SESSION['emp'];
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../reconcile_payment/?id=" . $_GET['id']);
    }
    else if (isset($_GET['search']))
    {}
    else
    {
      $payList = loadPayList(null);
    }
    
  }
  else
  {
    header("Location: ../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/viewBase.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s81').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s81').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s81').parent().prevUntil().css({'color': '#00314c'});
        $('#s81').parent().nextUntil().css({'color': '#00314c'});
        $('#s81').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s81').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s81').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Payment</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a onclick=toExcel("view_payments")>Export to excel</a></li>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <?php
        if (isset($_GET['id']))
        {
          include 'inc/cont_id.php';
        }
        else if (isset($_GET['search']))
        {
          include 'inc/cont_id.php';
        }
        else
        {
          if (count($payList) > 0 && $payList != false)
          {
            include 'inc/cont.php';
          }
          else 
          {
            echo "<p>there are currently no payments according to your database</p>";
          }
        }
      ?>
      
    </div>
    
    <footer></footer>
  </body>
</html>