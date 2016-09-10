<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add medical aid";
    $emp = $_SESSION['emp'];
    
  }
  else
  {
    header("Location: ../../../login/");
  }

  $o = "";

  if (isset($_POST['s_new_med']))
  {
    $med = addMed($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['fax'], $_POST['physical'], $_POST['postal']);

    if (count($med) == true)
    {
      $o = "<script type=\"text/javascript\">alert(\"The medical has been added successfuly\");</script>";
      //header("Location: ?u=" . $empDet[0] . "&p=" . $empDet[1]);
    }
    else
    {
      $o = "<script type=\"text/javascript\">alert(\"The new medical aid was not added due to a server error\");</script>";
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
    <script type="text/javascript" src="../../../js/init.js"></script>
  </head>
  
  <body>
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Medical Aid</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><p><?php echo $o; ?></p></h5>
    </div>
    <div id="cont">
      <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>medical aid details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter medical aid name eg. Bonitas" pattern="[a-zA-Z]{1,35}" required title="only alphanumeric characters with no spaces" />
            <label for="tel">telephone:</label>
            <input type="tel" name="tel" placeholder="enter medical aid telephone number eg. 0112478832" required pattern="[0-9]{10}" title="a number of 10 characters"/>
            <label for="physical">physical address:</label>
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
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter medical aid email eg. example@medicalaid.co.za" required />
            <label for="fax">fax:</label>
            <input type="tel" name="fax" placeholder="enter medical aid fax number eg. 0112478832" required pattern="[0-9]{10}" title="a number of 10 characters"/>
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
          <legend>medical aid packages</legend>
          <div>
            <label>types:</label>
            <input type="text" name="type1" placeHolder="type1" pattern="[a-zA-Z0-9-]" required title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type2" placeHolder="type2" pattern="[a-zA-Z0-9-]" required title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type3" placeHolder="type3" pattern="[a-zA-Z0-9-]" required title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type4" placeHolder="type4" pattern="[a-zA-Z0-9-]" required title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type5" placeHolder="type5" pattern="[a-zA-Z0-9-]" required title="only alphanumeric characters with no spaces"/>
          </div>
        </fieldset>
        
        <input type="submit" name="s_new_med" value="Add Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>