<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "receive order";
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
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
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
            <input type="text" name="orderNumber" placeholder="P-001" required  class="middle"/>

            <label for="supplierName" class="left">Supplier Name:</label>
          <input type="text" name="supplierName" placeholder="Mabaso Traders" required class="middle" />

          </div>

          <div>
            <label for="orderDate" class="left">Order Date:</label>
            <input type="text" name="orderDate" placeholder="2016/06/29 3:29" required  class="middle"/>
            
            

            <label for="orderStatus" class="left">Order Status:</label>
            <input type="text" name="orderStatus" placeholder="in-transit" required class="middle"/>
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
    
    <?php
      if (isset($_GET['u']) && isset($_GET['p']))
      {
        echo "<p>A new supplier has been added</p>";
        include 'inc/s.htm';
      }
    ?>
  </body>
</html>