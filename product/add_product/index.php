<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add product";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $tList = loadPrdType();
    
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
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Product</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_s"><?php echo $o;?></h5>
    </div>

    <div id="cont">
      <form method="post" action="">
        <fieldset>
         <legend>product details</legend>
         <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter product name" />
            <label for="price">price:</label>
            <input type="text" name="price" placeholder="enter product price" />
            <label for="size">size:</label>
            <input type="text" name="size" placeholder="enter product size" />
            <label for="quantity">unit quantity:</label>
            <input type="text" name="quantity" placeholder="enter product unit quantity" />            
         </div>
         <div>
            <label for="desc">description:</label>
            <textarea class="prodDesc" name="desc" placeholder="enter product description"></textarea>
            
            <label for="critical">Critical Value:</label>
            <input type="text" name="critical" placeholder="enter product re-order value" />
         </div>
        </fieldset>

        <fieldset>
          <legend>product type</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter product type name"/>
            <label for="desc">description:</label>
            <textarea name="desc" placeholder="enter product type description"></textarea>
          </div>
        </fieldset>

        <input type="submit" name="s_new_prod" value="add product" class="submit"/>
      </form>

    </div>
    
    <footer></footer>
  </body>
</html>