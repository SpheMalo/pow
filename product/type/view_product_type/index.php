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
    else if (isset($_GET['s']))
    {
      $prdTypList = loadPrdType(null, $_GET['s']);
    }
    else
    {
      $prdTypList = loadPrdType(null, null);
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
        if (isset($_GET['s']))
        {
          if ($prdTypList == "query")
          {
            echo "<p>There was a problem retrieving product types. Reffer to help for assistance</p>";
          }
          else if ($prdTypList == "rows")
          {
            echo "<p>There were no matches for what you are looking for. <a href='../view_product_type/'>Reload the page</a> or try refining your search citeria.</p>";
          }
          else
          {
            include 'inc/cont.php';
          }
        }
        else
        {
          if (count($prdTypList) > 0 && $prdTypList != false)
           {
             include 'inc/cont.php'; 
           } 
          else 
          {
            echo "<p>There are currently no product types according to your database</p>";
          }
        }
      ?>
    </div>
     <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="Search criteria" id="search_input"/>
      <button>s</button>
    </form>
    <footer></footer>
  </body>
</html>