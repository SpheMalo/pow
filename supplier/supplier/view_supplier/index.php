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
    else if (isset($_GET['s']))
    {
      $sList = loadSuppList(null, $_GET['s']);
    }
    else
    {
      $sList = loadSuppList(null, null);
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
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s91').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s91').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s91').parent().prevUntil().css({'color': '#00314c'});
        $('#s91').parent().nextUntil().css({'color': '#00314c'});
        $('#s91').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s91').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s91').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
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

     <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a onclick=toExcel("view_supplier")>Export to excel</a></li>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>

    <div id="cont">
      <?php
        if ($sList == "query")
        {
          echo "<p>There was a problem retrieving suppliers. Reffer to help for assistance</p>";
        }
        else
        {
          if (isset($_GET['s']))
          { 
            if ($sList == "rows")
            {
              echo "<p>There were no matches for what you are are looking for.  <a href='../view_supplier/'>Reload the page</a> or try refining your search citeria.</p>";
            }
            else
            {
              include 'inc/cont.php';
            }
          }
          else
          {
            if ($sList == "rows")
            {
              echo "<p>There are currently no suppliers according to your database</p>";
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