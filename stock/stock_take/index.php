<?php
  require '../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../login/?t");
    }

    $_SESSION['page'] = "stock take";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";
    
    if (isset($_GET['id']))
    {
      header("Location: ../stock_take/?id=" . $_GET['id']);
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
        $('#s72').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s72').parent().parent().css({'background': 'white', 'color': '#00314c'});
        //$('#s72').parent().prevUntil().css({'color': '#00314c'});
        //$('#s72').parent().nextUntil().css({'color': '#00314c'});
        $('#s72').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s72').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s72').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      if ($emp_access_level == "A")
      {
        include '../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../inc/menu_D.htm';
      }
      else
      {
        include '../../inc/menu.htm';
      }
    ?>
    
    <div id="head">
      <h1 id="head_m">Stock</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>status</legend>
          <div>
            <label for="l_run">Date of change:</label>
            <input type="text" name="l_run" placeholder="never run"/>
          </div>
          <div>
            <label for="notes">notes:</label>
            <textarea name="notes" placeholder=""></textarea>
          </div>
        </fieldset>
        <fieldset>
          <legend>product details</legend>
          <table class="tblBig">
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
                    echo "<p>There were no matches for what you are are looking for.  <a href='../stock_take/'>Reload the page</a> or try refining your search citeria.</p>";
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
          </table>
        </fieldset>

        <input type="submit" name="s_stock_take" value="save" class="submit" />
      </form>
    </div>
     <form method="get" action="" enctype="multipart/form-data" id="search">
      <input type="search" name="s" placeholder="Search criteria" id="search_input"/>
      <button>s</button>
    </form>
    <footer></footer>
  </body>
</html>