<?php
  
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "Add supplier";
    $emp = $_SESSION['emp'];
    $o = "";


    $cList = loadCityList();
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_POST['s_new_supplier']))
  {
      $physical[] = array(
        'number' => $_POST['add_line_ph1'],
        'street' => $_POST['add_line_ph2'],
        'suburb' => $_POST['add_line_ph3'],
        'code' => $_POST['add_line_ph5'],
        'city' => $_POST['add_line_ph4']
      );

        $status = "Active";

      //  $s = "select * from `employee` where supplierID = $id";

    $supplier = addSupplier($_POST['supplierName'], $_POST['contactPersonName'], $_POST['supplierEmail'], $_POST['telephone'], $_POST['faxNumber'], $physical, $_POST['bankName'], $_POST['branchName'], $_POST['branchCode'], $_POST['accountNumber'], $_POST['reference'], $status);
    
    if (isset($supplier))
    {
      if($supplier == true)
      {
        $o = "A new supplier has successfully been added to the system";

/////////////////////EMAIL ////////////////////////////////////
      require_once '../../../swift/lib/swift_required.php';

      $message = "Good day \n\n A new supplier has been added to the system.. \n\nContact details\n\nSupplier name: ".$_POST['supplierName']." \nContact Person: ".$_POST['contactPersonName']. "\nTelephone: ".$_POST['telephone']."\n\n Kind regards \n D+M Maponya Dental Practice";

      $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
          ->setUsername('ntokozo.sindane12')
          ->setPassword('Fugaejou12');

      $mailer = Swift_Mailer::newInstance($transport);

      $message = Swift_Message::newInstance("New supplier added")
          ->setFrom(array('ntokozo.sindane12@gmail.com'))
          ->setTo(array($emp->email))
          ->setBody($message);

      $result = $mailer->send($message);
/////////////////////EMAIL ////////////////////////////////////
      }
      else if($supplier == "query")
      {
        $o = "The supplier was not added due to a server error, please try again"; 
      }
      else if($supplier == "rows")
      {
        $o = "The supplier was not added, please try again";
      }
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
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s92').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s92').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s92').parent().prevUntil().css({'color': '#00314c'});
        $('#s92').parent().nextUntil().css({'color': '#00314c'});
        $('#s92').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s92').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s92').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Supplier</h1>
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
        <legend>Contact Details</legend>
        <div>
          <label for="supplierName">Name:</label>
          <input type="text" name="supplierName" placeholder="Enter Supplier Name e.g. ABC Medical Supplies" required pattern= "[A-Za-z0-9 ]{1,35}" title="A maximum of 35 letters allowed" />
          
          <label for="contactPersonName">Contact Person Name:</label>
          <input type="text" name="contactPersonName" placeholder="Enter Contact Person Name e.g. Vuyani Mati" required pattern="[A-Za-z ]{1,35}" title="A maximum of 35 letters allowed"/>

          <label for="physical" >physical address:</label>
            <input type="text" name="add_line_ph1" id="add_line_ph1" placeholder="Enter street number e.g. 395" required pattern="[A-Za-z0-9]{1,5}" title="A maximum of 5 characters"/>
            <input type="text" name="add_line_ph2" id="add_line_ph2" placeholder="Enter street name e.g. Pongola Drive" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <input type="text" name="add_line_ph3" id="add_line_ph3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <select name="add_line_ph4" id="add_line_ph4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_ph5" id="add_line_ph5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4}" title="A maximum of 4 digits with no spaces"/>

        </div>

       <div>
          <label for="telephone">Telephone:</label>
          <input type="tel" name="telephone" placeholder="Enter Telephone Number e.g. 0119724075" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>

          <label for="faxNumber">Fax Number:</label>
          <input type="tel" name="faxNumber" placeholder="Enter Fax Number e.g. 0863483678" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>

          <label for="supplierEmail">Email Address:</label>
          <input type="email" name="supplierEmail" placeholder="Enter Email e.g. supplier@example.co.za" required />

       </div>
       </fieldset>

       <fieldset>
       <legend>Bank Details</legend>
       <div>
          <label for="bankName">Bank Name:</label>
          <input type="text" name="bankName" placeholder="Enter bank name e.g. ABSA" required pattern= "[A-Za-z ]{1,35}" title="A maximum of 35 letters allowed" />

          <label for="branchName">Branch Name:</label>
          <input type="text" name="branchName" placeholder="Enter Branch Name e.g. Brooklyn " required pattern= "[A-Za-z ]{1,35}" title="A maximum of 35 letters allowed" />
          
          <label for="branchCode">Branch Code:</label>
          <input type="tel" name="branchCode" placeholder="Enter Branch Code e.g. 246000" required pattern= "[0-9]{6}" title="A maximum of 4 numbers allowed with no spaces" />
       </div>

       <div>
          <label for="accountNumber">Acount Number:</label>
          <input type="text" name="accountNumber" placeholder="Enter Account Number e.g. 402560581" required pattern= "[0-9]{8,15}" title="A minimum of 8 and maximum of 15 digits allowed with no spaces" />

          <label for="reference">Reference:</label>
          <input type="text" name="reference" placeholder="Enter Reference e.g. DMaponya09"  required pattern= "[A-Za-z0-9 ]{1,35}" title="A maximum of 35 alphanumeric characters allowed" />
       </div>
       </fieldset>

        <input type="submit" name="s_new_supplier" value="Add Supplier" class="submit"/>

      </form>
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>

