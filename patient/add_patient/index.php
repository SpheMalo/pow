<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add patient";
    $emp = $_SESSION['emp'];

    $tList = loadTitleList();
    $gList = loadGenderList();
    $mList = loadMedListS();
<<<<<<< HEAD
    $cList = loadCityList(); 
=======
    $cList = loadCityList();
    $idList = loadIdList();
>>>>>>> c682fb9e9a010e58462a7ee0c3a3b2c258490e94

    $o = "";
  }
  else
  {
    header("Location: ../../login/");
  }

  if (isset($_POST['add_new_pat']))
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

    $dob = $_POST['dob1'] . "-" . $_POST['dob2'] . "-" . $_POST['dob3'];  

    echo var_dump($_POST['name'], $_POST['surname'], $_POST['id'], $_POST['title'], $dob, $_POST['gender'], $_POST['cell'], $_POST['tell'], $_POST['email'], $physical, $postal, $_POST['medical'], $_POST['standing'], $_POST['medical_m_i'], $_POST['medical_m_n']);
    //$patient = addPatient($_POST['title'], $_POST['name'], $_POST['surname'], $_POST['dob'], $_POST['gender'], $_POST['id'], $_POST['cell'], $_POST['tell'], $_POST['email'], $_POST['postal'], $_POST['physical'], $_POST['standing'], $_POST['medical'], NULL);
    /*if (addPat())
    {}
    else
    {}*/
    
    /*if ($patient == true)
    {
      $o = "The patient has been added successfuly";
      //header("Location: ?u=" . $empDet[0] . "&p=" . $empDet[1]);
    }
    else
    {
      $o = "The new patient was not added due to a server error, please try again later";
    }*/
  }
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" type="text/css" media="all" href="../../css/base.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/addUpd.css" />
    <script type="text/javascript" src="../../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../js/jquery.hoverIntent.minified.js"></script>
    <script type="text/javascript" src="../../js/init.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var m = document.getElementById("main_m");
        m.setAttribute("readonly", "true");
      });
    </script>
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Patient</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o; ?></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
        <legend>personal details</legend>
          <div>
            <label for="proPic" >profile picture:</label>
            <img src="" alt="" />
            <input type="file" name="proPic"/>

            <label for="name" >name:</label>
            <input type="text" name="name" placeholder="Enter patient name eg. Sarah" required pattern="[A-Za-z]{1,35}" title="A maximum of 35 letters with no spaces"/>
            
            <label for="id">id/passport number:</label>
            <input type="text" name="id" placeholder="Enter patent id/passport number eg. 8612170554087" required pattern="[0-9]{13}" title="A number of 13 characters"/>
            <label for="DoB">Date of Birth:</label>
            <!--<input type="date" name="dob" placeholder="Enter date of birth eg. 1992-11-30" required title="Must match provided example format"/>-->
            <input type="number" name="dob1" placeholder="year" required title="" />
            <span>-</span>
            <input type="number" name="dob2" placeholder="month" required title="" />
            <span>-</span>
            <input type="number" name="dob3" placeholder="day" required title="" />
          </div>
          <div>
            <label for="proPic" class="display">profile picture:</label>
            <img src="" alt="" class="display"/>
            <input type="file" name="proPic" class="display"/>

            <label for="surname">surname:</label>
            <input type="text" name="surname" placeholder="Enter patient surname eg. Moeng" required pattern="[A-Za-z]{1,35}" title="A maximum of 35 letters with no spaces"/>

            <label for="title">title:</label>
            <select name="title">
              <option>Select title</option>
              <?php foreach ($tList as $ti):?>
                <option value="<?php echo $ti['id'];?>"><?php echo $ti['desc'];?></option>
              <?php endforeach;?>
            </select>

            <label for="gender" >gender:</label>
            <select name="gender" >
              <option>Select gender</option>
              <?php foreach ($gList as $ge):?>
                <option value="<?php echo $ge['id'];?>"><?php echo $ge['desc'];?></option>
              <?php endforeach;?>
            </select>
          </div>         
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="Enter patient cellphone number eg. 0824897654" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="Enter patient email address eg. sarah@gmail.com" required />
            
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
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="Enter patient telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="A number of 10 characters"/>
            <label for="t" class="display">telephone:</label>
            <input type="tel" name="t" placeholder="enter employee telephone number eg. 0112478832" pattern="[0-9]{10,10}" title="a number of 10 characters" class="display"/>
            <label for="postal">postal address:</label>
            <!--<textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <input type="text" name="add_line_po1" id="add_line_po1" placeholder="address line 1"/>
            <input type="text" name="add_line_po2" id="add_line_po2" placeholder="address line 2"/>
            <input type="text" name="add_line_po3" id="add_line_po3" placeholder="Enter suburb/ district e.g. Birchleigh" required pattern="[A-Za-z ]{1,50}" title="A maximum of 50 characters with spaces"/>
            <!--<input type="text" name="add_line_po4" id="add_line_po4" placeholder="Town/ City"/>-->
            <select name="add_line_po4" id="add_line_po4">
              <option>Select city/town</option>
              <?php foreach ($cList as $c):?>
                <option value="<?php echo $c['id'];?>"><?php echo $c['desc'];?></option>
              <?php endforeach;?>
            </select>
            <input type="text" name="add_line_po5" id="add_line_po5" placeholder="Enter postal code e.g. 1618" required pattern="[0-9]{4}" title="A maximum of 4 digits with no spaces"/>
            <button class="submit" title="copy physical address to postal address" id="copy_address" onclick="copyAddress()">same postal as physical</button>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>Medical details</legend>
          <div>
            <label for="medical">medical aid:</label>
            <select name="medical">
              <option>Select medical aid</option>
              <?php foreach ($mList as $med):?>
                <option value="<?php echo $med['id'];?>"><?php echo $med['name'] . "-" . $med['desc'];?></option>
              <?php endforeach;?>
            </select>

            <label>Standing:</label>
            <input type="checkbox" name="standing" class="check" value=1 id="patSt" onchange='mainMember()'/>
            <label for="standing" id="patStLabel" class="check">is main member</label>
          </div>

          <div>
            <label>main member id:</label>
            <input type="text" name="medical_m_i" list="pat_id" placeholder="Main member id e.g. 9011305265088" id="main_m"  onkeypress="mainMember()" pattern="[0-9]{10,13}" checked="checked"/>

            <datalist id="pat_id">
              <?php foreach ($idList as $i):?>
                <option value="<?php echo $i;?>"> 
              <?php endforeach;?>
            </datalist>

            <label>main member name:</label>
            <input type="text" name="medical_m_n" placeholder="Main member name e.g. Malesela Ramphele" readonly/>
          </div>
        </fieldset>
        
        <input type="submit" name="add_new_pat" value="Add Patient" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>