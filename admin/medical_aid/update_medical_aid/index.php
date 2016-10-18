<?php
  
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../../login/?t");
    }

    $_SESSION['page'] = "update medical aid";

    if (isset($_GET['up']))
    {
      $_SESSION['c_p'] = $_GET['up'];
    }

    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    unset($r_link);
    $r_link = "?rem=" . $_SESSION['c_p'];
    $cList = loadCityList();
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_GET['rem']))
  {
    unset($r_link);
    $r_link = "";
    $r_i = removeMedicalAid($_GET['rem']);
    //echo var_dump($r_i);

    if ($r_i == "remove")
    {
      $o = "The medical aid has been successfully removed.";
    }
    //    else if ($r_i == "removed")
    //    {
    //      $o = "The product type has already been removed.";
    //    }
    else if ($r_i == "query" || $r_i == "query1")
    {
      $o = "The medical aid was not removed due to a server error. Try again later.";
    }
    else if ($r_i == "inUse")
    {
      $o = "Cannot perform action. Medical aid is linked to an existing patient";
    }
    else if ($r_i == "rows")
    {
      $o = "The medical aid was not removed, please try again";
    }
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
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript" src="../../../js/medical_update.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s24').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s24').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s24').parent().prevUntil().css({'color': '#00314c'});
        $('#s24').parent().nextUntil().css({'color': '#00314c'});
        $('#s24').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s24').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s24').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body onload="getMedicalById()">
    <?php
      if ($emp_access_level == "A")
      {
        include '../../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../../inc/menu_D.htm';
      }
      else
      {
        include '../../../inc/menu.htm';
      }
    ?>
    
    <div id="head">
      <h1 id="head_m">Medical Aid</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>

     <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>

    <div id="cont">
      <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>medical aid details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" id="nameId" name="name" placeholder="Enter medical aid name eg. Bonitas" pattern="[a-zA-Z0-9 ]{1,50}" required title="Only alphanumeric characters with no spaces" />
            <label for="tel">telephone:</label>
            <input type="tel" id="telId" name="tel" placeholder="Enter medical aid telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            <label for="physical" >physical address:</label>
            <!--<textarea name="physical" class="empPhysical" placeholder="enter employee physical address eg. 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <!--<input type="text" name="add_line1" placeholder="unit number"/>
            <input type="text" name="add_line1" placeholder="complex name"/>-->
            <input type="text" name="add_line_ph1" id="add_line_ph1" placeholder="Enter street number e.g. 395" required pattern="[A-Za-z0-9]{1,5}" title="A maximum of 5 characters"/>
            <input type="text" name="add_line_ph2" id="add_line_ph2" placeholder="Enter street name e.g. Pongola Drive" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <input type="text" name="add_line_ph3" id="add_line_ph3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <!--<input type="text" name="add_line_ph4" id="add_line_ph4" placeholder="Town/ City"/>-->
            <select name="add_line_ph4" id="add_line_ph4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option id="<?php echo $c['desc'];?>" value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_ph5" id="add_line_ph5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4}" title="A maximum of 4 digits with no spaces"/>
          </div>

          <div>
            <label for="email">email:</label>
            <input type="email" id="emailId" name="email" placeholder="Enter medical aid email eg. example@medicalaid.co.za" required />
            <label for="fax">fax:</label>
            <input type="tel" id="faxId" name="fax" placeholder="Enter medical aid fax number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters with no spaces"/>
             <label for="postal">postal address:</label>
            <input type="text" name="add_line_po1" id="add_line_po1" placeholder="address line 1"/>
            <input type="text" name="add_line_po2" id="add_line_po2" placeholder="address line 2"/>
            <input type="text" name="add_line_po3" id="add_line_po3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <select name="add_line_po4" id="add_line_po4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option id="<?php echo $c['desc'].'Postal';?>" value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_po5" id="add_line_po5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4}" title="A maximum of 4 digits with no spaces"/>
             <button class="submit" title="copy physical address to postal address">same postal as physical</button>
          </div>
        </fieldset>

        <fieldset>
          <legend>medical aid packages</legend>
          <div>
            <label>types:</label>
            <input type="text" id="type1" name="type1" placeHolder="Medical Aid Type 1" pattern="[_a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" id="type2" name="type2" placeHolder="Medical Aid Type 2" pattern="[_a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" id="type3" name="type3" placeHolder="Medical Aid Type 3" pattern="[_a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" id="type4" name="type4" placeHolder="Medical Aid Type 4" pattern="[_a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
            <input type="text" id="type5" name="type5" placeHolder="Medical Aid Type 5" pattern="[_a-zA-Z0-9 ]{1,255}" title="Only alphanumeric characters"/>
          </div>
        </fieldset>
        
        <input type="submit" name="s_upd_med" value="Update Medical Aid" class="submit"/>
        <a id="remove" onclick='confirmation("<?php echo $_SESSION['c_p'];?>")'>remove medical aid</a>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>