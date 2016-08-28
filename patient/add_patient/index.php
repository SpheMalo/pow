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
  }
  else
  {
    header("Location: ../../login/");
  }

  $o = "";

  if (isset($_POST['s_new_pat']))
  {
    $patient = addPatient($_POST['title'], $_POST['name'], $_POST['surname'], $_POST['dob'], $_POST['gender'], $_POST['id'], $_POST['cell'], $_POST['tell'], $_POST['email'], $_POST['postal'], $_POST['physical']);
    
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
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
      <form method="post" action="">
        <fieldset>
        <legend>personal details</legend>
          <div>
            <label for="name" >name:</label>
            <input type="text" name="name" placeholder="enter patient name" required />
            
            <label for="title">title:</label>
            <select name="title">
              <option>select title</option>
              <?php foreach ($tList as $ti):?>
                <option value="<?php echo $ti['id'];?>"><?php echo $ti['desc'];?></option>
              <?php endforeach;?>
            </select>
            
            <label for="id">iD number:</label>
            <input type="text" name="id" placeholder="enter patent id number" required />
            <label for="DoB">Date of Birth:</label>
            <input type="text" name="dob" placeholder="enter date of birth" required />
          </div>
          <div>
            <label for="surname">surname:</label>
            <input type="text" name="surname" placeholder="enter patient surname" required />
            <label>gender:</label>
            <input type="radio" name="gender" value=1 class="check"/>
            <label for="gender" id="patGenderLabel" class="check">male</label>
            <input type="radio" name="gender" value=2 class="check"/>
            <label for="gender" id="patGenderLabel" class="check">female</label>
          </div>         
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="enter patient cellphone number" required />
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter patient eployee" required />
            
            <label for="postal">postal address:</label>
            <textarea name="postal">enter patient postal address</textarea>
          </div>
          
          <div>
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="enter patient telephone number" required />
            <label for="physical">physical address:</label>
            <textarea name="physical" id="patBankging">enter patient physical address</textarea>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>Medical details</legend>
          <div>
            <label for="medical">medical aid:</label>
            <select name="medical">
              <option>select medical aid</option>
              <?php foreach ($mList as $med):?>
                <option value="<?php echo $med['id'];?>"><?php echo $med['name'];?></option>
              <?php endforeach;?>
            </select>

            <label>standing:</label>
            <input type="checkbox" name="standing" class="check" value=1 />
            <label for="standing" id="patStLabel" class="check">is main member</label>
          </div>
          <div></div>
        </fieldset>
        
        <input type="submit" name="s_new_pat" value="Add Patient" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>