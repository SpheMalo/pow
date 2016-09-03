<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view order";
    $emp = $_SESSION['emp'];
    $o = "";

    //$oList = loadOrderList(null);
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
      <table>
        <tr>
          <th>order number</th>
          <th>order status</th>
          <th>order date</th>
          <th>order supplier</th>
          <th>action</th>
        </tr>
        <tr>
          <td>O-1234</td>
          <td>pending</td>
          <td>2016-08-02</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-7654</td>
          <td>cancelled</td>
          <td>2016-07-10</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-9875</td>
          <td>paid</td>
          <td>2016-05-15</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
        <tr>
          <td>O-2755</td>
          <td>recieved</td>
          <td>2016-07-02</td>
          <td>ABC Pharmacuticals</td>
          <td><a href="../receive_order/?id=">view</a></td>
        </tr>
      </table>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>