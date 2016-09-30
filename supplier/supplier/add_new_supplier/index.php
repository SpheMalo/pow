<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "Add supplier";
    $emp = $_SESSION['emp'];
    $o = "";
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_POST['s_new_supplier']))
  {
    $supplier = addSupplier($_POST['supplierName'], $_POST['contactPersonName'], $_POST['supplierEmail'], $_POST['telephone'], $_POST['faxNumber'], $_POST['physical'], $_POST['bankName'], $_POST['branchName'], $_POST['branchCode'], $_POST['accountNumber'], $_POST['reference']);
    
    if (count($supplier) == true)
    {
      $o = "<script type=\"text/javascript\">alert(\"A new supplier has successfully been added to the system\");</script>";
      //header("Location: ?u=" . $empDet[0] . "&p=" . $empDet[1]);
    }
    else
    {
      $o = "<script type=\"text/javascript\">alert(\"The new supplier was not added due to a server error, please try again later\");</script>";
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
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
        <legend>Contact Details</legend>
        <div>
          <label for="supplierName">Name:</label>
          <input type="text" name="supplierName" placeholder="Enter Supplier Name" required />
          
          <label for="contactPersonName">Contact Person Name:</label>
          <input type="text" name="contactPersonName" placeholder="Enter Contact Person Name" required />
          
          <label for="supplierEmail">Email Address:</label>
          <input type="email" name="supplierEmail" placeholder="Enter Email" required />

          <label for="telephone">Telephone:</label>
          <input type="tel" name="telephone" placeholder="Enter Telephone Number" required />
        </div>

       <div>
          <label for="faxNumber">Fax Number:</label>
          <input type="tel" name="faxNumber" placeholder="Enter Fax Number" required />

          <label for="physical">Physical Address:</label>
          <textarea name="physical" class="addSuppAddress" placeholder="Enter suppliers Physical Address"></textarea>
       </div>
       </fieldset>

       <fieldset>
       <legend>Bank Details</legend>
       <div>
          <label for="bankName">Bank Name:</label>
          <input type="text" name="bankName" placeholder="Enter Bank Name" required />

          <label for="branchName">Branch Name:</label>
          <input type="text" name="branchName" placeholder="Enter Branch Name" required />
          
          <label for="branchCode">Branch Code:</label>
          <input type="tel" name="branchCode" placeholder="Enter Branch Code" required />
       </div>

       <div>
          <label for="accountNumber">Acount Number:</label>
          <input type="text" name="accountNumber" placeholder="Enter Account Number" required />

          <label for="reference">Reference:</label>
          <input type="text" name="reference" placeholder="Enter Reference" required />
       </div>
       </fieldset>

        <input type="submit" name="s_new_supplier" value="Add Supplier" class="submit"/>

      </form>
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>