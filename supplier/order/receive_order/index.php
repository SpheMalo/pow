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

    $_SESSION['page'] = "receive order";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
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
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript" src="../../../js/order_update.js"></script>
  </head>
  
  <body onload="getOrderById()">
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
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
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
            <label for="orderNumber" class="left">Order Number:</label>
            <input type="text" id="orderNumberId" name="orderNumber" placeholder="Placeholder for product number e.g. O-1001" title="A maximum of 5 characters allowed 'O' must be uppercase" pattern="[-A-Z0-9]{1,6}" required />

            <label for="supplierName" class="left">Supplier Name:</label>
          <input type="text" id="supplierNameId" name="supplierName" placeholder="Enter Supplier Name e.g. ABC Medical Supplies" required pattern= "[A-Za-z0-9 ]{1,35}" title="A maximum of 35 letters allowed"  />

          </div>

          <div>
            <label for="orderDate" class="left">Order Date:</label>
            <input type="text" id="orderDateId" name="orderDate" placeholder="Placeholder for the date" title="Placeholder for the date" required/>
            
            

            <label for="orderStatus" class="left">Order Status:</label>
            <input type="text" id="orderStatusId" name="orderStatus" placeholder="Placeholder for the order status" title="Placeholder for the order status" required class="middle"/>
          </div>

        </fieldset>

        <fieldset>
          <legend>product summary</legend>
          <table  class="tblBig">
            <tr>
              <th>Product Name</th>
              <th>Product Type</th>
              <th>Size</th>
              <th>Quantity Ordered</th>
              <th>Quantity Received</th>
            </tr>
            <tr>
              <td>Panado</td>
              <td>Pain Killer</td>
              <td>500mg</td>
              <td>18</td>
              <td><input type="number" name="" placeholder="quantity recieved"/></td>
            </tr>
            <tr>
              <td>ibuprofen</td>
              <td>Pain Killer</td>
              <td>400mg</td>
              <td>20</td>
              <td><input type="number" name="" placeholder="quantity recieved"/></td>
            </tr>
            <tr>
              <td>Aspirin</td>
              <td>Pain Killer</td>
              <td>400mg</td>
              <td>10</td>
              <td><input type="number" name="" placeholder="quantity recieved"/></td>
            </tr>
          </table>
          
        </fieldset>
        
        <input type="submit" name="s_receive_Ord" value="Receive Order" class="submit"/>
        <input type="submit" name="s_paid_Ord" value="Pay" class="submit"/>
        <input type="submit" name="rem" value="Cancel Order" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>

  </body>
</html>