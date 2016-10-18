<?php
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../../login/?t");
    }

    $_SESSION['page'] = "add product type";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    if (isset($_GET['up']))
    {
      $_SESSION['c_p_t'] = $_GET['up'];
    }
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_POST['s_new_prodT']))
  {
    $prodT = addProdType($_POST['name'], $_POST['desc']);

    if($prodT == true)
    {
      $o = "The product type was added successfully.";
    }
    else if($prodT == "query")
    {
      $o = "The product type was not added successfully due to a server error. Try again later.";
    }
    else if($prodT == "rows")
    {
      $o = "The product type was not added successfully, please try again.";
    }
  }

?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s64').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s64').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s64').parent().prevUntil().css({'color': '#00314c'});
        $('#s64').parent().nextUntil().css({'color': '#00314c'});
        $('#s64').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s64').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s64').css({'color': '#00314c', 'text-decoration': 'underline'});
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
      <h1 id="head_m">Product</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
        <legend>product type details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="Enter product type name e.g. Antibiotics" required pattern="[A-Za-z0-9 ]{1,35}" title="A maximum of 35 characters allowed"/>
            <label for="desc">description:</label>
            <textarea name="desc" placeholder="Enter product type description e.g. For treatment of infections" pattern="[A-Za-z0-9 ]{1,255}" title="A maximum of 255 alphanumeric characters may be used"></textarea>
          </div>
        </fieldset>

        <input type="submit" value="add product type" name="s_new_prodT" class="submit" />
      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>