<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add procedure type";
    $emp = $_SESSION['emp'];
    $o = "";
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_POST['s_new_procT']))
  {
    $procT = addProcType($_POST['code'], $_POST['desc']);

    if($procT == true)
    {
      $o = "The procedure type was added successfully";
    }
    else if($procT == "rows")
    {
      $o = "The procedure type was not added successfuly, please try again";
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
  
  <body>
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
            <input type="text" name="code" placeholder="Enter procedure type code eg. Z01.1" required pattern="[A-Z0-9.]{3,5}" title="A maximum of 5 characters allowed with no spaces"/>
            <label for="desc">description:</label>
            <textarea name="desc" placeholder="Enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis" pattern="[a-zA-Z0-9 ]{1,255}" title=" A maximum of 255 alphanumeric characters may be used"></textarea>
          </div>
        </fieldset>

        <input type="submit" value="add procedure type" name="s_new_procT" class="submit" />
      </form>

    </div>
    
    <footer></footer>
  </body>
</html>