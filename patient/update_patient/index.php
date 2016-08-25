<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update patient";
    $emp = $_SESSION['emp'];

    $tList = loadTitleList();
    $gList = loadGenderList();
    $mList = loadMedListS();
  }
  else
  {
    header("Location: ../../login/");
  }

  $o = "";

  if (isset($_POST['s_upd_pat']))
  {
    $patient = updPatient($_POST['title'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['id'], $_POST['cell'], $_POST['tell'], $_POST['email'], $_POST['postal'], $_POST['physical']);
    
    if (count($patient) == true)
    {
      $o = "The patient has been added successfuly";
      //header("Location: ?u=" . $empDet[0] . "&p=" . $empDet[1]);
    }
    else
    {
      $o = "The new patient was not added due to a server error, please try again later";
    }
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
    <header>
      <a href="../../__/"><img src="../../img/logout.png" alt="log out"/></a>
    </header>

    <ul id="nav">
      <li><a href="../../">home</a></li>
      <li><a href="">admin</a>
        <ul id="subnav">
          <li>Employees</li>
          <li><a href="../../admin/employee/view_employee/">view employees</a></li>
          <li><a href="../../admin/employee/add_employee/">add an employee</a></li>
          <li>Medical Aids</li>
          <li><a href="../../admin/medical_aid/view_medical_aid/">view medical aids</a></li>
          <li><a href="../../admin/medical_aid/add_medical_aid/">add a medical aid</a></li>
        </ul>
      </li>
      <li><a href="">consultation</a>
        <ul id="subnav">
          <li>Booking</li>
          <li><a href="../../consultation/booking/view_booking">view bookings</a></li>
          <li><a href="../../consultation/booking/make_booking">make a booking</a></li>
          <li>Consultation</li>
          <li><a href="../../consultation/consultation/capture_patient_arival">capture patient arival</a></li>
          <li><a href="../../consultation/consultation/make_consultation_notes">make consultation notes</a></li>
          <li>Schedule</li>
          <li><a href="../../consultation/schedule/view_dentist_schedule">view dentist schedule</a></li>
          <li><a href="../../consultation/schedule/capture_dentist_schedule">capture dentist schedule</a></li>
        </ul>
      </li>
      <li><a href="">patient</a>
        <ul>
          <li><a href="../../patient/view_patient">view patients</a></li>
          <li><a href="../../patient/add_patient">add a patient</a></li>
        </ul>
      </li>
      <li><a href="">procedure</a>
        <ul>
          <li>Procedure type</li>
          <li><a href="../../procedure/type/view_procedure_type">view procedure types</a></li>
          <li><a href="../../procedure/type/add_procedure_type">add a procedure type</a></li>
          <li>Procedure</li>
          <li><a href="../../procedure/view_procedure">view procedures</a></li>
          <li><a href="../../procedure/add_procedure">add a procedure</a></li>
        </ul>
      </li>
      <li><a href="">product</a>
        <ul>
          <li>Product types</li>
          <li><a href="../../product/type/view_product_type">view product types</a></li>
          <li><a href="../../product/type/add_product_type">add a product type</a></li>
          <li>Product</li>
          <li><a href="../../product/view_product">view products</a></li>
          <li><a href="../../product/add_product">add a product</a></li>
        </ul>
      </li>
      <li><a href="">stock</a>
        <ul>
          <li><a href="../../stock/view_stock">view stock</a></li>
          <li><a href="../../stock/stock_take">stock take</a></li>
        </ul>
      </li>
      <li><a href="">payment</a>
        <ul id="subnav">
          <li><a href="../../payment/view_payment/">view payments</a></li>
          <li><a href="../../payment/make_payment/">capture a payment</a></li>
          <li><a href="../../payment/reconcile_payment/">reconcile a payment</a></li>
          <li><a href="../../payment/generate_payment_claim/">generate payment claims</a></li>
        </ul>
      </li>
      <li><a href="">supplier</a>
      <ul id="subnav">
          <li>Suppliers</li>
          <li><a href="../../supplier/supplier/view_supplier/">view suppliers</a></li>
          <li><a href="../../supplier/supplier/add_new_supplier/">add a supplier</a></li>
          <li>Orders</li>
          <li><a href="../../supplier/order/view_order/">view orders</a></li>
          <li><a href="../../supplier/order/place_new_order/">place order</a></li>
          <li><a href="../../supplier/order/receive_order">receive order</a></li>
        </ul>
      </li>
      <li><a href="">reporting</a>
        <ul id="subnav">
          <li><a href="../../reporting/daily_app_report/">daily appointment schedule</a></li>
          <li><a href="../../reporting/patient_history_report/">patient history report</a></li>
          <li><a href="../../reporting/audit_log/">audit log</a></li>
          <li><a href="../../reporting/client_statement/">client statement</a></li>
          <li><a href="../../reporting/goods_recieving_note/">goods recieving note</a></li>
          <li><a href="../../reporting/monthly_purchase_report/">monthly purchase report</a></li>
          <li><a href="../../reporting/outstanding_invoice/">outstanding invoice</a></li>
          <li><a href="../../reporting/weekly_payment_report/">weekly payment report</a></li>
          <li><a href="../../reporting/weekly_stock_level_report/">weekly stock level report</a></li>
        </ul>
      </li>
      <div class="clear"></div>
    </ul>
    
    <div id="head">
      <h1 id="head_m">Patient</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
        <legend>personal details</legend>
          <div>
            <label for="name" >name:</label>
            <input type="text" name="name" placeholder="enter patient name" required />
            
            <label for="title">title:</label>
            <select name="title">
              <option>select title</option>
              <?php foreach ($tList as $ti):?>
                <option value="<?php echo $ti['id'];?>"><?php echo $ti['desc'];?></option>
              <?php endforeach;?>
            </select>
            
            <label for="id">id number:</label>
            <input type="text" name="id" placeholder="enter patent id number" required />
            <label for="DoB">Date of Birth:</label>
            <input type="text" name="DoB" placeholder="enter date of birth" required />
          </div>
          <div>
            <label for="surname">surame:</label>
            <input type="text" name="surname" placeholder="enter patient surname" required />
            <label>gender:</label>
            <input type="radio" name="gender" value=1 class="check"/>
            <label for="gender" class="check">male</label>
            <input type="radio" name="gender" value=2 class="check"/>
            <label for="gender" class="check">female</label>
          </div>         
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="enter patient cellphone number" required />
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter patient eployee" required />
            
            <label for="postal">postal address:</label>
            <textarea name="postal">enter patient postal address</textarea>
          </div>
          
          <div>
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="enter patient telephone number" required />
            <label for="physical">physical address:</label>
            <textarea name="physical" id="patBankging">enter patient physical address</textarea>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>Medical details</legend>
          <div>
            <label for="medical">medical aid:</label>
            <select name="medical">
              <option>select medical aid</option>
              <?php foreach ($mList as $med):?>
                <option value="<?php echo $med['id'];?>"><?php echo $med['name'];?></option>
              <?php endforeach;?>
            </select>

            <label>standing:</label>
            <input type="checkbox" name="standing" value=1 class="check"/>
            <label for="standing" class="check">is main member</label>
          </div>
          <div></div>
        </fieldset>
        
        <input type="submit" name="s_upd_pat" value="Update Patient" class="submit"/>
        <input type="submit" name="rem" value="Remove Patient" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>