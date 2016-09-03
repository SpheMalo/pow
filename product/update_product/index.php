<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update product";
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
            <label for="critical">re-order level:</label>
            <input type="text" name="critical" placeholder="enter product re-order value" />            
         </div>
         <div>
            <label for="desc">description:</label>
            <textarea class="prodDesc" name="desc" placeholder="enter product description"></textarea>
            <label for="quantity">unit quantity:</label>
            <input type="text" name="quantity" placeholder="enter product unit quantity" />
            <label for="type">type:</label>
            <select name="type" >
              <option>select type</option>
              <?php foreach ($tList as $ty):?>
                <option value="<?php echo $ty['id'];?>"><?php echo $ty['desc'];?></option>
              <?php endforeach;?>
            </select>
         </div>
        </fieldset>

        <input type="submit" name="s_upd_prod" value="update product" class="submit"/>
        <input type="submit" name="rem" value="remove product" class="submit"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>