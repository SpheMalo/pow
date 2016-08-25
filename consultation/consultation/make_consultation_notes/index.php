<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "make consultation notes";
    $emp = $_SESSION['emp'];
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
    <header>
      <a href="../../../__/"><img src="img/logout.png" alt="log out"/></a>
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
          <li><a href="">make consultation notes</a></li>
          <li>Schedule</li>
          <li><a href="../../../consultation/schedule/add_dentist_schedule">view dentist schedule</a></li>
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
          <li>suppliers</li>
          <li><a href="../../../supplier/supplier/view_supplier/">view suppliers</a></li>
          <li><a href="../../../supplier/supplier/add_new_supplier/">add a supplier</a></li>
          <li>orders</li>
          <li><a href="../../../supplier/order/view_order/">view orders</a></li>
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
      <h1 id="head_m">Consultation</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
    </div>
    
    <div id="cont">
      <form method="post" action="" class="">
        <fieldset>
          <legend>consultation notes summary</legend>
          <div>
            <label for="booking">patient name:</label>
            <input type="text" name="booking" placeholder="" />
            <label for="booking">medical aid:</label>
            <input type="text" name="booking" placeholder="" />
          </div>
          <div>
            <label for="booking">booking id:</label>
            <input type="text" name="booking" placeholder="" />
          </div>
        </fieldset>

        <ul>
          <li><a href="#" class="active">notes</a></li>
          <li><a href="#" >invoice</a></li>
          <li><a href="#">prescription</a></li>
          <div class="clear"></div>
        </ul>

        <div  style="visibility: ; display: ;">
          <label>notes describing the general condition of the patient:</label>
          <textarea name="notes" placeholder="the patient was..."></textarea>
          <a href="" class="submitt">next</a>
        </div>
          
        <div class="conInv" style="visibility: hidden; display: none;">
          <div>
            <input type="text" name="product" placeholder="select product used"/>
            <input type="text" name="price" placeholder="product price"/>
            <input type="number" name="quantity" placeholder="select product quantity used"/>
            <input type="submit" value="add product" name="s_add_prod" class="submit" />
          </div>
          <div>
            <table>
              <tr>
                <th>name</th>
                <th>type</th>
                <th>price</th>
                <th>quantity</th>
                <th>action</th>
              </tr>
              <tr>
                <td>Syringe</td>
                <td>Tuberculin</td>
                <td>R30</td>
                <td>1</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Panado</td>
                <td>Painkiller</td>
                <td>R30</td>
                <td>2</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Penicillins</td>
                <td>Antibiotic</td>
                <td>R160</td>
                <td>10</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>novocaine</td>
                <td>Anesthetic</td>
                <td>R70</td>
                <td>1</td>
                <td><a href="">remove</a></td>
              </tr>
            </table>
          </div>
          <div>
            <input type="text" name="procedure" placeholder="select procedure used"/>
            <input type="text" name="price" placeholder="procedure price"/>
            <input type="submit" value="add procedure" name="s_add_prov" class="submit" />
          </div>
          <div>
            <table>
              <tr>
                <th>name</th>
                <th>type</th>
                <th>price</th>
                <th>action</th>
              </tr>
              <tr>
                <td>Consultation Fee</td>
                <td>Standard</td>
                <td>R350.00</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Root canal preparatory</td>
                <td>Root canal</td>
                <td>R650</td>
                <td><a href="">remove</a></td>
              </tr>
              <tr>
                <td>Root Canal therapy</td>
                <td>Root canal</td>
                <td>R1200</td>
                <td><a href="">remove</a></td>
              </tr>
            </table>
          </div>

          <a href="" class="submitt">next</a>
        </div>

        <div>
         <!-- <label>Medicines prescribed for the patient:</label>
          <textarea name="prescription"></textarea>
          <input type="submit" name="s_new_consult" value="add consultation" class="submitt" /> -->
        </div>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>