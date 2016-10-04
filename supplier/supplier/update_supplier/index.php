<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update supplier";
    $emp = $_SESSION['emp'];
    $o = "";

    $cList = loadCityList();
     
  }
  else
  {
    header("Location: ../../../login/");
  }



////////////////////////////////////////////////////////////////////////
  try
  {
    $pdo = new PDO('mysql:host=localhost;dbname=dental', 'DUser','somePassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
  }
  catch (PDOException $e)
  {
    $o = "unable to connect to database. " . $e;
    return false;
  }

   $ID = $_GET['id'];
  $s = "SELECT `id`, `name`, `contact_person`, `email`, `telephone`, `fax`, `address_physical`, `status`, `bank_name`, `branch_name`, `branch_number`, `account_number`, `bank_reference` 
    FROM `supplier`
    WHERE id = $ID";

  $r = $pdo->query($s);

  if ($r->rowCount() > 0)
  {
      $c = 0;
      while ($row = $r->fetch()) 
      {
              echo "id: " . $row["id"]. "<br> Name: " . $row["name"]. "<br> Contact Person: " . $row["contact_person"]. "<br>";
      }
     //$("#supplierName").val(name);
  }
  else 
    echo "0 results";

  // echo $r->fetch(PDO::FETCH_ASSOC);
  // echo $_GET['id'];
   ////////////////////////////////////////////////////////////////////////////
/*function dbToForm(id) {
var id_val = id.value;
var name = '';
var url = "http://localhost:81/PG_crud_experiment1/retrieve.php?id="+id_val; 
$.getJSON(url, function(json) {
               $.each(json, function(i,v) {    

                 name += v.name;   
                 alert (name);

                });
                         $("#e_name").val(name);   
       });

};*/
   ////////////////////////////////////////
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
          <input type="text" name="supplierName" placeholder="Enter Supplier Name e.g. ABC Medical Supplies" required pattern= "[A-Za-z0-9 ]{1,35}" title="A maximum of 35 letters allowed" />
          
          <label for="contactPersonName">Contact Person Name:</label>
          <input type="text" name="contactPersonName" placeholder="Enter Contact Person Name e.g. Vuyani Mati" required pattern="[A-Za-z ]{1,35}" title="A maximum of 35 letters allowed"/>
          
          <label for="supplierEmail">Email Address:</label>
          <input type="email" name="supplierEmail" placeholder="Enter Email e.g. supplier@example.co.za" required />

          <label for="telephone">Telephone:</label>
          <input type="tel" name="telephone" placeholder="Enter Telephone Number e.g. 0119724075" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
        </div>

       <div>
          <label for="faxNumber">Fax Number:</label>
          <input type="tel" name="faxNumber" placeholder="Enter Fax Number e.g. 0863483678" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>

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
        
         <input type="submit" name="s_upd_sup" value="Update Supplier" class="submit"/>
         <input type="submit" name="rem" value="Remove Supplier" class="submit"/>

      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
    
  </body>
</html>