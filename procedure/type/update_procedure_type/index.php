<?php

  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "Update procedure type";

    if (isset($_GET['up']))
    {
      $_SESSION['c_p'] = $_GET['up'];
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
    $r_i = removeProcedureType($_GET['rem']);
    //echo var_dump($r_i);

    if ($r_i == "remove")
    {
      $o = "The procedure type has been successfully removed.";
    }
  //    else if ($r_i == "removed")
  //    {
  //      $o = "The product type has already been removed.";
  //    }
    else if ($r_i == "query" || $r_i == "query1")
    {
      $o = "The procedure type was not removed due to a server error. Try again later.";
    }
    else if ($r_i == "inUse")
    {
      $o = "Cannot perform action. Procedure Type is linked to an existing procedure";
    }
    else if ($r_i == "rows")
    {
      $o = "The procedure type was not removed, please try again";
    }
  }
  else if (isset($_POST['s_upd_prodT']))
  {
    $procT = updateProcType($_SESSION['c_p'], $_POST['code'], $_POST['desc']);

    if($procT == true)
    {
      $o = "The procedure type was updated successfully ";
    }
    else if($procT == "query")
    {
      $o = "The procedure type was not updated successfully due to a server error.";
    }
    else if($procT == "rows")
    {
      $o = "The procedure type was not updated successfuly, please try again.";
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
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/type_procedure_update.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s54').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s54').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s54').parent().prevUntil().css({'color': '#00314c'});
        $('#s54').parent().nextUntil().css({'color': '#00314c'});
        $('#s54').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s54').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s54').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body onload="getTypeProcedureById()">
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Procedure</h1>
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
        <legend>procedure type details</legend>
          <div>
            <label for="code">code:</label>
            <input type="text" id="codeId" name="code" placeholder="Enter procedure type code eg. Z01" required pattern="[A-Z0-9.]{3,5}" title="Enter procedure type code eg. Z01.1"/>
            <label for="desc">description:</label>
            <textarea id="descId" name="desc" placeholder="Enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis" pattern="[a-zA-Z0-9 ]{1,255}" title="Enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis. A maximum of 255 alphanumeric characters may be used" required></textarea>
          </div>
        </fieldset>

        <input type="submit" value="Update procedure type" name="s_upd_prodT" class="submit" />
        <a id="remove" onclick='confirmation("<?php echo $_SESSION['c_p'];?>")'>remove procedure type</a>
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>