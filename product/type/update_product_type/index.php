<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update product type";
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
    <script type="text/javascript" src="../../../js/type_product_update.js"></script>
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
        <input type="submit" name="rem" value="remove product type" class="submit"/>
      </form>
      
    </div>
    
    <footer></footer>
  </body>
</html>