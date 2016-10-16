<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update patient";
    $emp = $_SESSION['emp'];
    $o = "";
    
    $tList = loadTitleList();
    $gList = loadGenderList();
    $mList = loadMedListS();
    $cList = loadCityList(); 
    $idList = loadIdList(" ");

  }
  else
  {
    header("Location: ../../login/");
  }

 /*if (isset($_POST['s_upd_pat']))
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
  }*/
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript" src="../../js/patient_update.js">
    <script type="text/javascript">
    $(document).ready(function(){
      $('#s42').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
      $('#s42').parent().parent().css({'background': 'white', 'color': '#00314c'});
      $('#s42').parent().prevUntil().css({'color': '#00314c'});
      $('#s42').parent().nextUntil().css({'color': '#00314c'});
      $('#s42').parent().prevUntil().children().css({'color': '#00314c'});
      $('#s42').parent().nextUntil().children().css({'color': '#00314c'});
      $('#s42').css({'color': '#00314c'});

    });
  </script>   
  </head>
  
  <body onload="getPatientById()">
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Patient</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o; ?></h5>
    </div>
    <ul id="nav_xtra">
      <li><img src="../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    <div id="cont">
      <form method="post" action="">
        <fieldset>
        <legend>personal details</legend>
          <div>
            <label for="proPic" >profile picture:</label>
            <img  id="proPicId" src="" alt="" />
            <input type="file" name="proPic"/>

            <label for="name" >name:</label>
            <input type="text" id="nameId" name="name" placeholder="Enter patient name eg. Sarah" required pattern="[A-Za-z]{1,35}" title="A maximum of 35 letters with no spaces"/>
            
            <label for="id">ID/Passport number:</label>
            <input type="text" id="id_Id" name="id" placeholder="Enter patent id/passport number eg. 8612170554087" required pattern="[0-9]{13}" title="A number of 13 characters"/>
            <label for="DoB">Date of Birth:</label>
            <!--<input type="date" name="dob" placeholder="Enter date of birth eg. 1992-11-30" required title="Must match provided example format"/>-->
            <input type="number" id="dob1Id" name="dob1" placeholder="Year" required title="Only numerical characters allowed" />
            <span>-</span>
            <input type="number" id="dob2Id" name="dob2" placeholder="Month" required title="Only numerical characters allowed" />
            <span>-</span>
            <input type="number" id="dob3Id" name="dob3" placeholder="Day" required title="Only numerical characters allowed" />
            <label for="fileNo">File Number:</label>
            <input type="text" id="fileNoId" name="fileNo" placeholder="Placeholder for file number eg. F-0001" required pattern="[-f0-9]{7,10}" title="A maximum of 6 characters with no spaces" disabled=""/>
            </div>
          <div>
            <label for="proPic" class="display">profile picture:</label>
            <img src="" alt="" class="display"/>
            <input type="file" name="proPic" class="display"/>

            <label for="surname">surname:</label>
            <input type="text" id="surnameId" name="surname" placeholder="Enter patient surname eg. Moeng" required pattern="[A-Za-z]{1,35}" title="A maximum of 35 letters with no spaces"/>

            <label for="title">title:</label>
            <select id="titleId" name="title">
              <option>Select title</option>
              <?php foreach ($tList as $ti):?>
                <option id="<?php echo $ti['desc'];?>" value="<?php echo $ti['id'];?>"><?php echo $ti['desc'];?></option>
              <?php endforeach;?>
            </select>

            <label for="gender" >gender:</label>
            <select id="genderId" name="gender" >
              <option>Select gender</option>
              <?php foreach ($gList as $ge):?>
                <option id="<?php echo $ge['desc'];?>" value="<?php echo $ge['id'];?>"><?php echo $ge['desc'];?></option>
              <?php endforeach;?>
            </select>
          </div>         
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" id="cellId" name="cell" placeholder="Enter patient cellphone number eg. 0824897654" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            
            <label for="email">email:</label>
            <input type="email" id="emailId" name="email" placeholder="Enter patient email address eg. sarah@gmail.com" required />
            
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
            <label for="tell">telephone:</label>
            <input type="tel" id="tellId" name="tell" placeholder="Enter patient telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            <label for="t" class="display">telephone:</label>
            <input type="tel" name="t" placeholder="enter employee telephone number eg. 0112478832" pattern="[0-9]{10,10}" title="A number of 10 characters" class="display"/>
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
        <legend>Medical details</legend>
          <div>
            <label for="medical">medical aid:</label>
            <select id="medicalId" name="medical">
              <option>Select medical aid</option>
              <?php foreach ($mList as $med):?>
                <option id="<?php echo $med['desc'];?>" value="<?php echo $med['id'];?>"><?php echo $med['desc'];?></option>
              <?php endforeach;?>
            </select>

            <label>standing:</label>
            <input type="checkbox" name="standing" class="check" value=1 />
            <label for="standing" id="patStLabel" class="check">is main member</label>
          </div>
          <div>
            <label>main member id:</label>
            <input type="text" id="medical_m_iId" name="medical_m_i" list="pat_id" placeholder="Enter Main member ID e.g. 9011305265088" id="main_m" pattern="[0-9]{10,13}" required autocomplete="off" title="A number of 13 characters"/>

            <datalist id="pat_id">
              <?php foreach ($idList as $i):?>
                <option value="<?php echo $i;?>"> 
              <?php endforeach;?>
            </datalist>

            <label>main member name:</label>
            <input type="text" id="medical_m_nId" name="medical_m_n" placeholder="Main member name e.g. Malesela Ramphele" disabled/>
          </div>
        </fieldset>
        
        <input type="submit" name="s_upd_pat" value="Update Patient" class="submit"/>
        <input type="submit" name="rem" value="Remove Patient" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>