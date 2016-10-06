<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "goods recieving note";
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s105').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s105').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s105').parent().prevUntil().css({'color': '#00314c'});
        $('#s105').parent().nextUntil().css({'color': '#00314c'});
        $('#s105').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s105').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s105').css({'color': '#00314c', 'text-decoration': 'underline'});
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
    <div id="cont">
      <form method="post" action="">
        <fieldset>
         <legend>order details</legend>
         <div>
            <label for="ord">order number:</label>
            <input type="text" name="ord" placeholder="enter order number" />            
         </div>
        </fieldset>

        <input type="submit" name="s_new_goods_recieve" value="print" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>