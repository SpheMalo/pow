<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "patient history report";
    $emp = $_SESSION['emp'];
    $o = "";
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
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s102').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s102').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s102').parent().prevUntil().css({'color': '#00314c'});
        $('#s102').parent().nextUntil().css({'color': '#00314c'});
        $('#s102').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s102').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s102').css({'color': '#00314c', 'text-decoration': 'underline'});
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
         <legend>patient details</legend>
         <div>
            <label for="idNum">ID Number:</label>
            <input type="text" name="idNum" placeholder="enter patient ID number" />            
         </div>
        </fieldset>

        <input type="submit" name="s_new_pat_history" value="print" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>