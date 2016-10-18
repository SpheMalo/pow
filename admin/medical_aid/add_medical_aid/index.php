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

    $_SESSION['page'] = "add medical aid";
    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    $cList = loadCityList();
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_POST['add_new_med']))
  {
    $postal[] = array(
      'number' => $_POST['add_line_po1'],
      'street' => $_POST['add_line_po2'],
      'suburb' => $_POST['add_line_po3'],
      'code' => $_POST['add_line_po5'],
      'city' => $_POST['add_line_po4']
    );

    $physical[] = array(
      'number' => $_POST['add_line_ph1'],
      'street' => $_POST['add_line_ph2'],
      'suburb' => $_POST['add_line_ph3'],
      'code' => $_POST['add_line_ph5'],
      'city' => $_POST['add_line_ph4']
    );

    $ty = array($_POST['type1'], $_POST['type2'], $_POST['type3'], $_POST['type4'], $_POST['type5']);

    foreach($ty as $t)
    {
      if (isset($t) && $t != "")
      {
        $types[] = $t;
      }
    }

    $res = addMed($_POST['name'], $postal, $physical, $_POST['tel'], $_POST['fax'], $_POST['email'], $types);
    if ($res == "query")
    {
      $o = "The medical aid could not added due to a server error, please try again";
     
    }
    else if ($res == "result")
    {
      $o = "The medical aid was not added, please try again";
     
    }
    else if ($res == "row")
    {
      $o = "The medical was added successfuly, though the medical types were not. That can be done manualy";
     
    }
    else
    {
    

      if (count($res[0]) == $types)
      {
        $o = "The medical was added successfuly, though the medical types were not. That can be done manualy";
      }
      else if (count($res[0]) > 0 && count($res[0]) != $types)
      {
        $o = "The medical was added successfuly, and so were a few medical types. The rest can be added manualy";
      }
      else 
      {
        $o = "The medical and its types have been added successfuly";
      }
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
  
  <body>
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
            <input type="text" name="name" placeholder="Enter medical aid name e.g. Bonitas" pattern="[a-zA-Z ]{1,35}" required title="Only alphanumeric characters with no spaces" />
            <label for="tel">telephone:</label>
            <input type="tel" name="tel" placeholder="Enter medical aid telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters with no spaces"/>
            <label for="physical">physical address:</label>
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
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_ph5" id="add_line_ph5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4,4]" title="A maximum of 4 digits with no spaces"/>
          </div>

          <div>
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="Enter medical aid email eg. example@medicalaid.co.za" required />
            <label for="fax">fax:</label>
            <input type="tel" name="fax" placeholder="Enter medical aid fax number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters with no spaces"/>
            <label for="postal">postal address:</label>
            <!--<textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <input type="text" name="add_line_po1" id="add_line_po1" placeholder="Address line 1"/>
            <input type="text" name="add_line_po2" id="add_line_po2" placeholder="Address line 2"/>
            <input type="text" name="add_line_po3" id="add_line_po3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <!--<input type="text" name="add_line_po4" id="add_line_po4" placeholder="Town/ City"/>-->
            <select name="add_line_po4" id="add_line_po4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_po5" id="add_line_po5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4,4]" title="A maximum of 4 digits with no spaces"/>
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
        
        <input type="submit" name="add_new_med" value="Add Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>