<?php
  session_start();
  
  require 'inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "home";
    $emp = $_SESSION['emp'];
  }
  else
  {
    header("Location: login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="css/base.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
  </head>
  
  <body>
    <?php
      include 'inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Welcome</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
    </div>
    
    <div id="cont">
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>