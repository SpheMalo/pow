<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "place new order";
    $emp = $_SESSION['emp'];
    $pList = loadprodList(null, null);
    $o = "";
  }
  else
  {
    header("Location: ../../../login/");
  }

  if ($pList == "query")
  {
    $o = "There was a problem retrieving products. Reffer to help for assistance";
  }
  else if ($pList == "rows")
  {
    $o = "There are currently no products according to your database";
  }
  else
  {
  }

  if(isset($_POST['s_add_prod']))
  {
    $arr = $_POST['s_add_prod'];
    foreach ($pList as $pl)
    {
      if ($pl->name == $arr[0] && $pl->type == $arr[0])
      {
        $basket[] = $pl;
      }
    }   
  }
 

?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/addUpd.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
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
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Order</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o; ?></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>Order Details</legend>
          <div>
            <label for="orderNumber" >Order Number:</label>
              <input type="text" name="orderNumber" placeholder="P-001" required />
              
              <label for="selectSupplier" >Select Supplier:</label>
              <input type="text" name="selectSupplier" placeholder="Type Supplier Name" required />
            
          </div>
          <div>
              <label for="date" >Date:</label>
              <input type="date" name="date" placeholder="<?php echo date('Y/m/d');?>" required />
            </div>          

        </fieldset>

        <fieldset>
        <legend>Product Details</legend>
          <div>
            <label for="productName" >Product Name:</label>
            <input type="text" name="productName" placeholder="Enter product name" required list="prodList"/>

            <datalist id="prodList">
              <?php foreach ($pList as $p):?>
                <option value="<?php echo $p->name . ' - ' . $p->type;?>">
              <?php endforeach?>
            </datalist>


            <label for="productType" >Product Type:</label>
            <input type="text" name="productType" placeholder="Enter product type" required id="orderProd"/>
            
            <label for="quantity" >Quantity:</label>
            <input type="number" min="1" name="quantity" placeholder="Enter quantity" required />
            
            <a name="s_add_prod" class="submit" id="orderProdSubmit">Add</a>
          </div>

          <div>
            <table>
              <tr>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Size</th>
                <th>Quantity Ordered</th>
                <th>action</th>
              </tr>
            </table>

            <?php
              if (isset($basket) && $basket != null)
              {
                foreach($basket as $prod)
                {
                  include 'inc/view_ord_row.php';
                }
              }
              else {
                echo "<p>select a product to be ordered</p>";
              }
            ?>
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