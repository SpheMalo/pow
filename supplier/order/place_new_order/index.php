<?php
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../../login/?t");
    }

    $_SESSION['page'] = "place new order";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $pList = loadprodList(null, null);
    $sList = loadSuppList(null, null);
    $o = "";
    $_SESSION['orderBask'][] = null;
  }
  else
  {
    header("Location: ../../../login/");
  }

  if ($pList == "query")
  {
    $o = "There was a problem retrieving products. Refer to help for assistance";
  }
  else if ($pList == "rows")
  {
    $o = "There are currently no products according to your database";
  }
  else
  {

  }

  /*if(isset($_POST['add_prod']))
  {
    $arr = $_POST['add_prod'];
    echo var_dump($arr);
    /*foreach ($pList as $pl)
    {
      if ($pl->name == $arr[0] && $pl->type == $arr[0])
      {
        $basket[] = $pl;
      }
    }*/   
  //}

?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s94').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s94').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s94').parent().prevUntil().css({'color': '#00314c'});
        $('#s94').parent().nextUntil().css({'color': '#00314c'});
        $('#s94').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s94').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s94').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body onload="getOrderB()">
    <?php
      if ($emp_access_level == "A")
      {
        include '../../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../../inc/menu_D.htm';
      }
      else
      {
        include '../../../inc/menu.htm';
      }
    ?>
    
    <div id="head">
      <h1 id="head_m">Order</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o; ?></h5>
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
          <legend>Order Details</legend>
          <div>
            <!--<label for="orderNumber" >Order Number:</label>
            <input type="text" name="orderNumber" placeholder="P-001" required />-->
            
            <label for="selectSupplier" >Select Supplier:</label>
            <input type="text" id="selectSupplierId" name="selectSupplier" placeholder="Type Supplier Name" required list="suppList"/>
            <datalist id="suppList">
              <?php foreach ($sList as $s):?>
              <option value="<?php echo $s->name;?>">
              <?php endforeach?>
            </datalist>
            
          </div>
          <div>
            <label for="date" >Date:</label>
            <input type="date" id="dateId" name="date" value="<?php echo date("Y-m-d g:i");?>" placeholder="<?php echo date('Y-m-d');?>" />
          </div>          

        </fieldset>

        <fieldset>
        <legend>Product Details</legend>
          <div>
            <label for="productName" >Product Name:</label>
            <input type="text" name="productName" placeholder="Enter product name"  title="Search for product to add to order list" id="orderProd" required list="prodList"/>

            <datalist id="prodList">
              <?php foreach ($pList as $p):?>
                <option value="<?php echo $p->name . '-' . $p->type;?>">
              <?php endforeach?>
            </datalist>
         <!--<label for="productType" >Product Type:</label>
            <input type="text" name="productType" placeholder="Enter product type" required/>-->
            
            <label for="quantity" >Quantity:</label>
            <input type="number" min="1" name="quantity" title="Add quantity to be ordered" placeholder="Enter quantity" required id="orderProdQ"/>
            
            <span onclick="addProdOrder()" class="submitt" id="orderProdSubmit"><a>Add</a></span>
          </div>

          <div id="prodOrderB">

          </div>
          
        </fieldset>
        <input type="submit" name="s_submit_order" value="Submit Order" class="submit"/>
        <input type="submit" name="new_prod" value="Add New Product" class="submit"/>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
    
  </body>
</html>