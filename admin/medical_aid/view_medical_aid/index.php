<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../../login/?t");
    }

    $_SESSION['page'] = "view medical aid";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../update_medical_aid/?id=" . $_GET['id']);
    }
    else if (isset($_GET['s']))
    {
      $mList = loadMedList(null, $_GET['s']);
    }
    else
    {
      $mList = loadMedList(null, null);
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
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s23').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s23').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s23').parent().prevUntil().css({'color': '#00314c'});
        $('#s23').parent().nextUntil().css({'color': '#00314c'});
        $('#s23').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s23').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s23').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      if ($emp_access_level == "A")
      {
        include '../../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../../inc/menu_D.htm';
      }
      else
      {
        include '../../../inc/menu.htm';
      }
    ?>
    
    <div id="head">
      <h1 id="head_m">medical aid</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>

    <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a onclick=toExcel("view_med")>Export to excel</a></li>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>

    <div id="cont">
      <?php
        if (isset($_GET['s']))
        {
          if ($mList == "query")
          {
            echo "<p>There was a problem retrieving medical aids. Reffer to help for assistance</p>";
          }
          else if ($mList == "rows")
          {
            echo "<p>There were no matches for what you are looking for. <a href='../view_medical_aid/'>Reload the page</a> or try refining your search term.</p>";
          }
          else
          {
            include 'inc/cont.php';
          }
        }
        else
        {
          if ($mList =="query")
          {
            echo "<p>there was an error retrieving medical aids, please try again later</p>";
          }
          else if ($mList =="rows")
          {
            echo "<p>there are currently no medical aids according to your database</p>";
          }
          else if (count($mList) > 0 && $mList != false)
          {
            include 'inc/cont.php';
          }
        }
      ?>
    </div>
    
    <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="Search criteria" id="search_input"/>
      <button>s</button>
    </form>
  </body>
</html>