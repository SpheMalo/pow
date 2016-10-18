<?php  
  require 'inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: login/?t");
    }

    $_SESSION['page'] = "home";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";
  }
  else
  {
    header("Location: login/");
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/addUpd.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s1').css({'background': 'white', 'color': '#00314c'});
      });
    </script>
  </head>
  
  <body>
    <?php
      if ($emp_access_level == "A")
      {
        include 'inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include 'inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include 'inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include 'inc/menu_D.htm';
      }
      else
      {
        include 'inc/menu.htm';
      }
      
    ?>
    
    <div id="head">
      <h1 id="head_m">Welcome</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend style="padding-bottom: 25px; padding-top: 25px">Current User logged on:</legend>
            <label ><?php echo $emp->name;?></label>
            <label><?php echo $emp->surname;?></label>
        </fieldset>
      </form>
      <div id="noti"></div>
    </div>
    
    <?php
      echo "<p id='access_level' style='display: none;'>" . $emp_access_level . "</p>";
    ?>
    <footer></footer>
  </body>
</html>