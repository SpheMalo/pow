<?php
  session_start();
  
  require '../../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add medical aid type";
    $emp = $_SESSION['emp'];
  }
  else
  {
    header("Location: ../../../../login/");
  }

  $o = "";
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../../css/addUpd.css" />
    <script type="text/javascript" src="../../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Product</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
        <legend>product type details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter medical aid type name"/>
            <label for="med">medical aid:</label>
            <select name="med" placeholder="select medical aid">
              <option>select medical aid</option>
            </select>
          </div>
        </fieldset>

        <input type="submit" value="add medical aid type" name="s_new_prodT" class="submit" />
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>