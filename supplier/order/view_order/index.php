<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view order";
    $emp = $_SESSION['emp'];

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
    <header>
      <a href="../../../__/"><img src="../../../img/logout.png" alt="log out"/></a>
    </header>
    
    <ul id="nav">
      <li><a href="../../../">home</a></li>
      <li><a href="">admin</a>
        <ul id="subnav">
          <li>Employees</li>
          <li><a href="../../../admin/employee/view_employee/">view employees</a></li>
          <li><a href="../../../admin/employee/add_employee/">add an employee</a></li>
          <li>Medical Aids</li>
          <li><a href="../../../admin/medical_aid/view_medical_aid/">view medical aids</a></li>
          <li><a href="../../../admin/medical_aid/add_medical_aid/">add a medical aid</a></li>
        </ul>
      </li>
      <li><a href="">consultation</a>
        <ul id="subnav">
          <li>Booking</li>
          <li><a href="../../../consultation/booking/view_booking">view bookings</a></li>
          <li><a href="../../../consultation/booking/make_booking">make a booking</a></li>
          <li>Consultation</li>
          <li><a href="../../../consultation/consultation/capture_patient_arival">capture patient arival</a></li>
          <li><a href="../../../consultation/consultation/make_consultation_notes">make consultation notes</a></li>
          <li>Schedule</li>
          <li><a href="../../../consultation/schedule/view_dentist_schedule">view dentist schedule</a></li>
          <li><a href="../../../consultation/schedule/capture_dentist_schedule">capture dentist schedule</a></li>
        </ul>
      </li>
      <li><a href="">patient</a>
        <ul>
          <li><a href="../../../patient/view_patient">view patients</a></li>
          <li><a href="../../../patient/add_patient">add a patient</a></li>
        </ul>
      </li>
      <li><a href="">procedure</a>
        <ul>
          <li>Procedure type</li>
          <li><a href="../../../procedure/type/view_procedure_type">view procedure types</a></li>
          <li><a href="../../../procedure/type/add_procedure_type">add a procedure type</a></li>
          <li>Procedure</li>
          <li><a href="../../../procedure/view_procedure">view procedures</a></li>
          <li><a href="../../../procedure/add_procedure">add a procedure</a></li>
        </ul>
      </li>
      <li><a href="">product</a>
        <ul>
          <li>Product types</li>
          <li><a href="../../../product/type/view_product_type">view product types</a></li>
          <li><a href="../../../product/type/add_product_type">add a product type</a></li>
          <li>Product</li>
          <li><a href="../../../product/view_product">view products</a></li>
          <li><a href="../../../product/add_product">add a product</a></li>
        </ul>
      </li>
      <li><a href="">stock</a>
        <ul>
          <li><a href="../../../stock/view_stock">view stock</a></li>
          <li><a href="../../../stock/stock_take">stock take</a></li>
        </ul>
      </li>
      <li><a href="">payment</a>
        <ul id="subnav">
          <li><a href="../../../payment/view_payment/">view payments</a></li>
          <li><a href="../../../payment/make_payment/">capture a payment</a></li>
          <li><a href="../../../payment/reconcile_payment/">reconcile a payment</a></li>
          <li><a href="../../../payment/generate_payment_claim/">generate payment claims</a></li>
        </ul>
      </li>
      <li><a href="">supplier</a>
      <ul id="subnav">
          <li>Suppliers</li>
          <li><a href="../../../supplier/supplier/view_supplier/">view suppliers</a></li>
          <li><a href="../../../supplier/supplier/add_new_supplier/">add a supplier</a></li>
          <li>Orders</li>
          <li><a href="">view orders</a></li>
          <li><a href="../../../supplier/order/place_new_order/">place order</a></li>
          <li><a href="../../../supplier/order/receive_order">receive order</a></li>
        </ul>
      </li>
      <li><a href="">reporting</a>
        <ul id="subnav">
          <li><a href="../../../reporting/daily_app_report/">daily appointment schedule</a></li>
          <li><a href="../../../reporting/patient_history_report/">patient history report</a></li>
          <li><a href="../../../reporting/audit_log/">audit log</a></li>
          <li><a href="../../../reporting/client_statement/">client statement</a></li>
          <li><a href="../../../reporting/goods_recieving_note/">goods recieving note</a></li>
          <li><a href="../../../reporting/monthly_purchase_report/">monthly purchase report</a></li>
          <li><a href="../../../reporting/outstanding_invoice/">outstanding invoice</a></li>
          <li><a href="../../../reporting/weekly_payment_report/">weekly payment report</a></li>
          <li><a href="../../../reporting/weekly_stock_level_report/">weekly stock level report</a></li>
        </ul>
      </li>
      <div class="clear"></div>
    </ul>
    
    <div id="head">
      <h1 id="head_m">Order</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
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