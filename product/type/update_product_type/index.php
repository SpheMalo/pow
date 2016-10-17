<?php
  
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update product type";

    if (isset($_GET['up']))
    {
      $_SESSION['c_p_t'] = $_GET['up'];
    }

    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    unset($r_link);
    $r_link = "?rem=" . $_SESSION['c_p'];
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_GET['rem']))
  {
    unset($r_link);
    $r_link = "";
    $r_i = removeProductType($_GET['rem']);
    //echo var_dump($r_i);

    if ($r_i == "remove") 
    {
      $o = "The product type has been successfully removed.";
    }
//    else if ($r_i == "removed")
//    {
//      $o = "The product type has already been removed.";
//    }
    else if ($r_i == "query" || $r_i == "query1")
    {
      $o = "The product type was not removed due to a server error. Try again later.";
    }
    else if ($r_i == "inUse")
    {
      $o = "Cannot perform action. Product Type is linked to an existing product";
    }
    else if ($r_i == "rows")
    {
      $o = "The product type was not removed, please try again";
    }
  }
  else if (isset($_POST['s_new_prodT']))
  {
    //echo var_dump($_SESSION['c_p_t'], $_POST['name'], $_POST['desc']);
    $u_p_t = updateProdType($_SESSION['c_p_t'], $_POST['name'], $_POST['desc']);

    if($u_p_t == true)
    {
      $o = "The product type was updated successfully.";
    }
    else if($u_p_t == "rows")
    {
      $o = "The product type was not updated due to a server error. Try again later.";
    }
    else if($u_p_t == "rows")
    {
      $o = "The product type was not updated successfully. Please try again.";
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
    <script type="text/javascript" src="../../../js/type_product_update.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s61').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s61').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s61').parent().prevUntil().css({'color': '#00314c'});
        $('#s61').parent().nextUntil().css({'color': '#00314c'});
        $('#s61').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s61').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s61').css({'color': '#00314c'});

      });
    </script>
  </head>
  
  <body onload="getTypeProductById()">
    <?php
      include '../../../inc/menu.htm';
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
            <input type="text" id="nameId" name="name" placeholder="Enter product type name e.g. Antibiotics" required pattern="[A-Za-z0-9 ]{1,35}" title="A maximum of 35 characters allowed"/>
            <label for="desc">description:</label>
            <textarea id="descId" name="desc" placeholder="Enter product type description e.g. For treatment of infections" pattern="[A-Za-z0-9 ]{1,255}" title="A maximum of 255 alphanumeric characters may be used"></textarea>
          </div>
        </fieldset>

        <input type="submit" value="Update product type" name="s_new_prodT" class="submit" />
        <a id="remove" onclick='confirmation("<?php echo $_SESSION['c_p'];?>")'>remove product</a>
      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>