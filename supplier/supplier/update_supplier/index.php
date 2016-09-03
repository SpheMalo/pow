<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update supplier";
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
    <script type="text/javascript" src="../../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Supplier</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
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
          <textarea class="addSuppAddress" name="physical" placeholder="Enter suppliers Physical Address"></textarea>
          <label for="status">Status:</label>
          <input type="text" name="status" placeholder="supplier status" required />
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
        
         <input type="submit" name="s_upd_sup" value="Update Supplier" class="submit"/>
         <input type="submit" name="rem" value="Remove Supplier" class="submit"/>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
    
  </body>
</html>