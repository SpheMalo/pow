<?php
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view dentist schedule";
    $emp = $_SESSION['emp'];
    $o = "";
  }
  else
  {
    header("Location: ../../../login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/cal.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s34').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s34').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s34').parent().prevUntil().css({'color': '#00314c'});
        $('#s34').parent().nextUntil().css({'color': '#00314c'});
        $('#s34').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s34').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s34').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body onload="getCal(null)">
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Schedule</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <ul id="nav_xtra">
    <li><img src="../../../img/ico/gear.png" alt="gear"/>
       <ul>
         <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
       </ul>
     </li>
   </ul>

    <ul id="nav_c">
      <li><a href="month" class="active">month view</a></li>
      <li><a href="week" >week view</a></li>
      <div class="clear"></div>
    </ul>
    
    <div id="calendar">
      <?php echo "<p id='empID' style='position: fixed; bottom:0; left:0; visibility:hidden'>" . $emp->id . "</p>";?>
      <div></div>
      <div></div>
    </div>
    
    <footer></footer>

  </body>
</html>