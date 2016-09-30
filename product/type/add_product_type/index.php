<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  { 
    $_SESSION['page'] = "add product type";
    $emp = $_SESSION['emp'];
    $o = "";
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
      $o = "The product type was added successfully";
    }
    else if($prodT == "rows")
    {
      $o = "The product type was not added successfully, please try again";
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