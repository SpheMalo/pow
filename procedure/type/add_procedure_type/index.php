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
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
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
      <form method="post" action="">
        <fieldset>
        <legend>procedure type details</legend>
          <div>
            <label for="code">code:</label>
            <input type="text" name="code" placeholder="enter procedure type code eg. Z01" required pattern="[A-Z0-9.]{3,3}" title="enter procedure type code eg. Z01"/>
            <label for="desc">description:</label>
            <textarea name="desc" placeholder="enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis" pattern="[a-zA-Z0-9 ]{1,255}" title="enter procedure type decription eg. Encounter for other special examination without complaint, suspected or reported diagnosis. A maximum of 255 alphanumeric characters may be used" required></textarea>
          </div>
        </fieldset>

        <input type="submit" value="add procedure type" name="s_new_procT" class="submit" />
      </form>

    </div>
    
    <footer></footer>
  </body>
</html>