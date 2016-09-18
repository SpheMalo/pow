<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update medical aid";
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
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
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
      <h1 id="head_m">Medical Aid</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    <div id="cont">
      <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>medical aid details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="Enter medical aid name eg. Bonitas" pattern="[a-zA-Z0-9 ]{1,50}" required title="Only alphanumeric characters with no spaces" />
            <label for="tel">telephone:</label>
            <input type="tel" name="tel" placeholder="Enter medical aid telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            <label for="physical">physical address:</label>
            <!--<textarea name="physical" class="empPhysical" placeholder="enter employee physical address eg. 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <!--<input type="text" name="add_line1" placeholder="unit number"/>
            <input type="text" name="add_line1" placeholder="complex name"/>-->
            <input type="text" name="add_line1" placeholder="Enter street number e.g. 395" required pattern="[A-Za-z0-9]{1,5}" title="A maximum of 5 characters with no spaces"/>
            <input type="text" name="add_line2" placeholder="Enter street name e.g. Pongola Drive" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <input type="text" name="add_line3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <!--<input type="text" name="add_line_ph4" id="add_line_ph4" placeholder="Town/ City"/>-->
            <select name="add_line_ph4" id="add_line_ph4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4,4]" title="A maximum of 4 digits with no spaces"/>
          </div>

          <div>
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="Enter medical aid email eg. example@medicalaid.co.za" required />
            <label for="fax">fax:</label>
            <input type="tel" name="fax" placeholder="Enter medical aid fax number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters with no spaces"/>
            <label for="postal">postal address:</label>
            <!--<textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <input type="text" name="add_line1" placeholder="Address line 1"/>
            <input type="text" name="add_line1" placeholder="Address line 2"/>
            <input type="text" name="add_line1" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <!--<input type="text" name="add_line_po4" id="add_line_po4" placeholder="Town/ City"/>-->
            <select name="add_line_po4" id="add_line_po4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line1" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4,4}" title="A maximum of 4 digits with no spaces"/>
            <button class="submit" title="copy physical address to postal address" id="copy_address" onclick="copyAddress()">same postal as physical</button>
          </div>
        </fieldset>

        <fieldset>
          <legend>medical aid packages</legend>
          <div>
            <label>types:</label>
            <input type="text" name="type1" placeHolder="Medical Aid Type 1" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type2" placeHolder="Medical Aid Type 2" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type3" placeHolder="Medical Aid Type 3" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type4" placeHolder="Medical Aid Type 4" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" name="type5" placeHolder="Medical Aid Type 5" pattern="[a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
          </div>
        </fieldset>
        
        <input type="submit" name="s_upd_med" value="Update Medical Aid" class="submit"/>
        <input type="submit" name="rem" value="Remove Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>