<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view employee";
    $emp = $_SESSION['emp'];
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../update_employee/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
      $eList = loadEmpList(null, $_GET['s']);
    }
    else
    {
      $eList = loadEmpList(null, null);
    }
    
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
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Employee</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
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
          if (count($eList) > 0 && $eList != false)
          {
            include 'inc/cont.php';
          }
          else 
          {
            echo "<p>there are currently no employees according to your database</p>";
          }
        }
      ?>
      <div id="noti"></div>
    </div>
    
    <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="What are you looking for?" id="search_input"/>
      <button>s</button>
    </form>
    <footer></footer>
  </body>
</html>