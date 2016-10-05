<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view stock";
    $emp = $_SESSION['emp'];
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../write_off_stock/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
      $oList = loadStockList(null, $_GET['s']);
    }
    else
    {
      $oList = loadStockList(null, null);
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
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/viewBase.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s71').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s71').parent().parent().css({'background': 'white', 'color': '#00314c'});
        //$('#s71').parent().prevUntil().css({'color': '#00314c'});
        //$('#s71').parent().nextUntil().css({'color': '#00314c'});
        $('#s71').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s71').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s71').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Stock</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <div id="cont">
      <?php
        if ($oList == "query")
        {
          echo "<p>There was a problem retrieving stock list. Reffer to help for assistance</p>";
        }
        else
        {
          if (isset($_GET['s']))
          { 
            if ($oList == "rows")
            {
              echo "<p>There were no matches for what you are are looking for.  <a href='../view_stock/'>Reload the page</a> or try refining your search citeria.</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
          }
          else
          {
            if ($oList == "rows")
            {
              echo "<p>There is currently no stock according to your database</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
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