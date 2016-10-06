<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "write off stock";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $oList = loadStockList(null, null);
    
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
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Stock</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
         <legend>product details</legend>
         <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter product name" />
            <label for="size">size:</label>
            <input type="text" name="size" placeholder="product size" />
            <label for="type">type:</label>
            <input type="text" name="type" placeholder="product type" />            
         </div>
         <div>
            <label for="desc">reason:</label>
            <textarea class="reason" name="desc" placeholder="enter write off reason"></textarea>
            <label for="quantity">quantity:</label>
            <input type="text" name="quantity" placeholder="enter product quantity" />
         </div>
        </fieldset>

        <input type="submit" name="s_new_prod" value="write off stock" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>