<?php
  session_start();
  
  require '../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update patient";
    $emp = $_SESSION['emp'];

    $tList = loadTitleList();
    $gList = loadGenderList();
    $mList = loadMedListS();
  }
  else
  {
    header("Location: ../../login/");
  }

  $o = "";

  if (isset($_POST['s_upd_pat']))
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
  </head>
  
  <body>
    <?php
      include '../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Patient</h1>
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
            <input type="text" name="name" placeholder="enter patient name eg. Sarah" required pattern="[A-Za-z]{1,35}" title="a maximum of 35 letters with no spaces"/>
            
            <label for="id">id/passport number:</label>
            <input type="text" name="id" placeholder="enter patent id/passport number eg. 8612170554087" required pattern="[0-9]{13}" title="a number of 13 characters"/>
            <label for="DoB">Date of Birth:</label>
            <input type="date" name="dob" placeholder="enter date of birth eg. 1992-11-30" required title="must match provided example format"/>
          </div>
          <div>
            <label for="proPic" class="display">profile picture:</label>
            <img src="" alt="" class="display"/>
            <input type="file" name="proPic" class="display"/>

            <label for="surname">surname:</label>
            <input type="text" name="surname" placeholder="enter patient surname eg. Moeng" required pattern="[A-Za-z]{1,35}" title="a maximum of 35 letters with no spaces"/>

            <label for="title">title:</label>
            <select name="title">
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
          </div>         
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="enter patient cellphone number eg. 0824897654" required pattern="[0-9]{10,10}" title="a number of 10 characters"/>
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter patient email address eg. sarah@gmail.com" required />
            
            <label for="postal">postal address:</label>
            <textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>
            <button class="submit" title="copy physical address to postal address">same postal as physical</button>
          </div>
          
          <div>
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="enter patient telephone number eg. 0112478832" required pattern="[0-9]{10,10}" title="a number of 10 characters"/>
            <label for="physical">physical address:</label>
            <textarea name="physical" id="patBankging" title="must match provided example format" placeholder="enter employee physical address eg. 1234 some street, suburb, city - postal code"></textarea>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>Medical details</legend>
          <div>
            <label for="medical">medical aid:</label>
            <select name="medical">
              <option>select medical aid</option>
              <?php foreach ($mList as $med):?>
                <option value="<?php echo $med['id'];?>"><?php echo $med['name'] . "-" . $med['desc'];?></option>
              <?php endforeach;?>
            </select>

            <label>standing:</label>
            <input type="checkbox" name="standing" class="check" value=1 />
            <label for="standing" id="patStLabel" class="check">is main member</label>
          </div>
          <div></div>
        </fieldset>
        
        <input type="submit" name="s_upd_pat" value="Update Patient" class="submit"/>
        <input type="submit" name="rem" value="Remove Patient" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>