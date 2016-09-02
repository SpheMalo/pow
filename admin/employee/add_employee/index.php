<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add employee";
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

  if (isset($_POST['s_new_emp']))
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

  if (isset($_GET['u']) && isset($_GET['p']))
  {
    $o = "A new employee has been added, reload the page if you missed it";
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
            <label for="name" >name:</label>
            <input type="text" name="name" placeholder="enter employees name" required  />
            
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
            
            <label for="id" >id number:</label>
            <input type="text" name="id" placeholder="enter employees id number" required />
          </div>

          <div>
            <label for="surname" >surame:</label>
            <input type="text" name="surname" placeholder="enter employees surname" required  />
            <label for="banking" >banking details:</label>
            <textarea name="banking" class="empBanking">enter employees banking details</textarea>
          </div>
          
        </fieldset>
        
        <fieldset>
        <legend>contact details</legend>
          <div>
            <label for="cell">cellphone:</label>
            <input type="tel" name="cell" placeholder="enter employees cellphone number" required />
            
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter employees eployee" required />
            
            <label for="postal">postal address:</label>
            <textarea name="postal">enter employees postal address</textarea>
          </div>

          <div>
            <label for="tell">telephone:</label>
            <input type="tel" name="tell" placeholder="enter employees telephone number" required />
            <label for="physical" >physical address:</label>
            <textarea name="physical" class="empPhysical">enter employees physical address</textarea>
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
        
        <input type="submit" name="s_new_emp" value="Add Employee" class="submit"/>
        
      </form>
      
    </div>
    
    <footer></footer>
    
    <?php
      if (isset($_GET['u']) && isset($_GET['p']))
      {
        //$o = "A new employee has been added, reload the page if you missed it";
        //echo "<h5 id=\"head_o\">A new employee has been added, reload the page if you missed it</h5><p id=\"username\" style=\"visibility: hidden; display: none\">" . $_GET['u'] . "</p><p id=\"password\" style=\"visibility: hidden; display: none\">" . $_GET['p'] . "</p>";
        echo "<p id=\"username\" style=\"visibility: hidden; display: none\">" . $_GET['u'] . "</p><p id=\"password\" style=\"visibility: hidden; display: none\">" . $_GET['p'] . "</p>";
        include 'inc/s.htm';
      }
    ?>
  </body>
</html>