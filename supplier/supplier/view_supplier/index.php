<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "View Supplier";
    $emp = $_SESSION['emp'];
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../update_supplier/?id=" . $_GET['id']);
    }
    else if (isset($_GET['search']))
    {}
    else
    {
      $sList = loadSuppList(null);
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
      <h1 id="head_m">Supplier</h1>
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
          if (count($sList) > 0 && $sList != false)
          {
            include 'inc/cont.php';
          }
          else 
          {
            echo "<p>there are currently no suppliers according to your database</p>";
          }
        }
      ?>
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>