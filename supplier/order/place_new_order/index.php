<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "place new order";
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
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Order</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
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
            <input type="text" name="productName" placeholder="Enter product name" required />

            <label for="productType" >Product Type:</label>
            <input type="text" name="productType" placeholder="Enter product type" required />
            
            <label for="quantity" >Quantity:</label>
            <input type="number" min="1" name="quantity" placeholder="Enter quantity" required />
            
            <input type="submit" name="s_add_prod_list" value="Add " class="submit" id="orderProdSubmit"/>
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
                <tr>
                  <td>Panado</td>
                  <td>Pain Killer</td>
                  <td>500mg</td>
                  <td>3</td>
                  <td><a href="">remove</a></td>
                </tr>
                <tr>
                  <td>ibuprofen</td>
                  <td>Pain Killer</td>
                  <td>400mg</td>
                  <td>5</td>
                  <td><a href="">remove</a></td>
                </tr>
                <tr>
                  <td>Aspirin</td>
                  <td>Pain Killer</td>
                  <td>400mg</td>
                  <td>2</td>
                  <td><a href="">remove</a></td>
                </tr>
              </table>
          </div>
          
        </fieldset>
        <input type="submit" name="s_submit_order" value="Submit Order" class="submit"/>
        <input type="submit" name="new_prod" value="Add New Product" class="submit"/>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
    
    <?php
      if (isset($_GET['u']) && isset($_GET['p']))
      {
        echo "<p>A new order has been submitted</p>";
        include 'inc/s.htm';
      }
    ?>
  </body>
</html>