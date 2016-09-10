<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update employee";
    $emp = $_SESSION['emp'];
    
    $tList = loadTitleList();
    $gList = loadGenderList();
    $sList = loadStatusList();
  }
  else
  {
    header("Location: ../../../login/");
  }

  $o = "";

  if (isset($_POST['s_upd_emp']))
  {
    $empDet = addEmployee($_POST['title'], $_POST['name'], $_POST['surname'], $_POST['gender'], $_POST['id'], $_POST['banking'], $_POST['cell'], $_POST['tell'], $_POST['email'], $_POST['postal'], $_POST['physical'], $_POST['type']);
    
    if (count($empDet) == 2)
    {
      $o = "<script type=\"text/javascript\">alert(\"The new employees username is: " . $empDet[0] . ".\nThe new employees password is: " . $empDet[1] . "\");</script>";
      header("Location: ?u=" . $empDet[0] . "&p=" . $empDet[1]);
    }
    else
    {
      $o = "<script type=\"text/javascript\">alert(\"The new employee was not added due to a server error\");</script>";
    }
  }
  else if (isset($_GET['id']))
  {
    $tEmp = loadEmpList($_GET['id']);

    $t = array(
      'name' => $tEmp->name,
      'surname' => $tEmp->surname,
      'title' => $tEmp->title,
      'gender' => $tEmp->gender,
      'type' => $tEmp->type,
      'idnum' => $tEmp->idnum,
      'bank' => $tEmp->bank,
      'cell' => $tEmp->cell,
      'email' => $tEmp->email,
      'postal' => $tEmp->postal,
      'tel' => $tEmp->tel,
      'physical' => $tEmp->physical
    );
  }
  else
  {
    $t = array(
      'name' => "enter employees name",
      'surname' => "enter employees surname",
      'idnum' => "enter employees ID number",
      'bank' => "enter employees banking details",
      'cell' => "enter employees cellphone number",
      'email' => "enter employees email address",
      'postal' => "enter employees postal address",
      'tel' => "enter employees telephone number",
      'physical' => "enter employees physical address"
    );
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
      <h1 id="head_m">Employee</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
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
            <input type="text" name="name" placeholder="enter employee name eg. Simon" required pattern="[A-Za-z]{1,35}" title="a maximum of 35 letters with no spaces"/>
            
            <label for="title" >title:</label>
            <select name="title" >
              <option>select title</option>
              <?php foreach ($tList as $ti):?>
                <option value="<?php echo $ti['id'];?>"><?php echo $ti['desc'];?></option>
              <?php endforeach;?>
            </select>
            
            <label for="gender" >gender:</label>
            <select name="gender" >
              <option>select gender</option>
              <?php foreach ($gList as $ge):?>
                <option value="<?php echo $ge['id'];?>"><?php echo $ge['desc'];?></option>
              <?php endforeach;?>
            </select>
            
            <label for="id" >id/passport number:</label>
            <input type="text" name="id" placeholder="enter employee id/passport number eg. 8612170554087" required pattern="[0-9]{13}" title="a number of 13 characters"/>
          </div>

          <div>
            <label for="proPic" class="display">profile picture:</label>
            <img src="" alt="" class="display"/>
            <input type="file" name="proPic" class="display"/>

            <label for="surname" >surame:</label>
            <input type="text" name="surname" placeholder="enter employee surname eg. Kekana" required pattern="[A-Za-z]{1,35}" title="a maximum of 35 letters with no spaces"/>
            <label for="banking" >banking details:</label>
            <textarea name="banking" class="empBanking" placeholder="enter employee banking details eg. 4078080733 ABSA, Hatfield 687453" title="must match provided example format"></textarea>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="enter employee cellphone number eg. 0824897654" required pattern="[0-9]{10,10}" title="a number of 10 characters"/>
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter employee email eg. employee@example.co.za" required />
            
            <label for="physical" >physical address:</label>
            <!--<textarea name="physical" class="empPhysical" placeholder="enter employee physical address eg. 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <!--<input type="text" name="add_line1" placeholder="unit number"/>
            <input type="text" name="add_line1" placeholder="complex name"/>-->
            <input type="text" name="add_line1" placeholder="street number"/>
            <input type="text" name="add_line1" placeholder="street name"/>
            <input type="text" name="add_line1" placeholder="suburb/ distric"/>
            <input type="text" name="add_line1" placeholder="town/ city"/>
            <input type="text" name="add_line1" placeholder="postal code"/>
          </div>

          <div>
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="enter employee telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="a number of 10 characters"/>
            <label for="tell" class="display">telephone:</label>
            <input type="tel" name="tell" placeholder="enter employee telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="a number of 10 characters" class="display"/>
            <label for="postal">postal address:</label>
            <!--<textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <input type="text" name="add_line1" placeholder="address line 1"/>
            <input type="text" name="add_line1" placeholder="address line 2"/>
            <input type="text" name="add_line1" placeholder="suburb/ distric"/>
            <input type="text" name="add_line1" placeholder="town/ city"/>
            <input type="text" name="add_line1" placeholder="postal code"/>
            <button class="submit" title="copy physical address to postal address">same postal as physical</button>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>employee status</legend>
          <div>
            <label for="type" >employee type:</label>
            <select name="type">
              <option>select position</option>
              <?php foreach ($sList as $st):?>
                <option value="<?php echo $st['id'];?>"><?php echo $st['desc'];?></option>
              <?php endforeach;?>
            </select>
          </div>          
        </fieldset>
        
        <input type="submit" name="s_upd_emp" value="Update Employee" class="submit"/>
        <input type="submit" name="rem" value="Remove Employee" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>