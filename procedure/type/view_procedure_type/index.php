<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view procedure type";
    $emp = $_SESSION['emp'];
    $o = "";

    if (isset($_GET['id']))
    {
      header("Location: ../update_proctype/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
      $prcTypList = loadPrcTypList(null, $_GET['s']); 
    }
    else
    {
      $prcTypList = loadPrcTypList(null, null);
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
      <h1 id="head_m">Procedure</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    
    <div id="cont">
      <?php
       if (isset($_GET['s']))
        {
          if ($prcTypList == "query")
          {
            echo "<p>There was a problem retrieving procedure types. Reffer to help for assistance</p>";
          }
          else if ($prcTypList == "rows")
          {
            echo "<p>There were no matches for what you are looking for. <a href='../view_procedure_type/'>Reload the page</a> or try refining your search citeria.</p>";
          }
          else
          {
            include 'inc/cont.php';
          }
        }
        else
        {
          if (count($prcTypList) > 0 && $prcTypList != false)
          {
            include 'inc/cont.php';
          }
          else 
          {
            echo "<p>There are currently no procedure types according to your database</p>";
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