<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view product type";
    $emp = $_SESSION['emp'];
    $o = "";

    if (isset($_GET['id']))
    {
      header("Location: ../update_product/?id=" . $_GET['id']);
    }
    else if (isset($_GET['search']))
    {}
    else
    {
      $prdTypList = loadPrdType(null);
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
      <h1 id="head_m">Product</h1>
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
          if (count($prdTypList) > 0 && $prdTypList != false)
          {
            include 'inc/cont.php';
          }
          else 
          {
            echo "<p>there are currently no procedure types according to your database</p>";
          }
        }
      ?>
      
    </div>
    
    <footer></footer>
  </body>
</html>