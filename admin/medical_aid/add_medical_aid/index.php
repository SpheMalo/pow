<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "add medical aid";
    $emp = $_SESSION['emp'];
    $o = "";
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
      if (isset($t))
      {
        $types = array($t);
      }
    }


    $res = addMed($_POST['name'], $postal, $physical, $_POST['tel'], $_POST['fax'], $_POST['email'], $types);
    if ($res == "insert")
    {
      $o = "The medical aid could not added due to a server error, please try again";
      echo var_dump($res);
    }
    else if ($res == "result")
    {
      $o = "The medical aid was not added, please try again";
      echo var_dump($res);
    }
    else
    {
      //$o = "The medical has been added successfuly";
      echo var_dump($res);
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
            <input type="text" name="name" placeholder="enter medical aid name eg. Bonitas" pattern="[a-zA-Z ]{1,35}" required title="only alphanumeric characters with no spaces" />
            <label for="tel">telephone:</label>
            <input type="tel" name="tel" placeholder="enter medical aid telephone number eg. 0112478832" required pattern="[0-9]{10}" title="a number of 10 characters"/>
            <label for="physical">physical address:</label>
            <!--<textarea name="physical" class="empPhysical" placeholder="enter employee physical address eg. 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <!--<input type="text" name="add_line1" placeholder="unit number"/>
            <input type="text" name="add_line1" placeholder="complex name"/>-->
            <input type="text" name="add_line_ph1" id="add_line_ph1" placeholder="street number"/>
            <input type="text" name="add_line_ph2" id="add_line_ph2" placeholder="street name"/>
            <input type="text" name="add_line_ph3" id="add_line_ph3" placeholder="suburb/ district"/>
            <input type="text" name="add_line_ph4" id="add_line_ph4" placeholder="town/ city"/>
            <input type="text" name="add_line_ph5" id="add_line_ph5" placeholder="postal code"/>
          </div>

          <div>
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter medical aid email eg. example@medicalaid.co.za" required />
            <label for="fax">fax:</label>
            <input type="tel" name="fax" placeholder="enter medical aid fax number eg. 0112478832" required pattern="[0-9]{10}" title="a number of 10 characters"/>
            <label for="postal">postal address:</label>
            <!--<textarea name="postal" placeholder="enter employee postal address eg. P.O.Box 4050 privatebag 9875 or 1234 some street, suburb, city - postal code" title="must match provided example format"></textarea>-->
            <input type="text" name="add_line_po1" id="add_line_po1" placeholder="address line 1"/>
            <input type="text" name="add_line_po2" id="add_line_po2" placeholder="address line 2"/>
            <input type="text" name="add_line_po3" id="add_line_po3" placeholder="suburb/ distric"/>
            <input type="text" name="add_line_po4" id="add_line_po4" placeholder="town/ city"/>
            <input type="text" name="add_line_po5" id="add_line_po5" placeholder="postal code"/>
            <button class="submit" title="copy physical address to postal address" id="copy_address" onclick="copyAddress()">same postal as physical</button>
          </div>
        </fieldset>

        <fieldset>
          <legend>medical aid packages</legend>
          <div>
            <label>types:</label>
            <input type="text" name="type1" placeHolder="type1" pattern="[a-zA-Z0-9 ]{1,255}" title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type2" placeHolder="type2" pattern="[a-zA-Z0-9 ]{1,255}" title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type3" placeHolder="type3" pattern="[a-zA-Z0-9 ]{1,255}" title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type4" placeHolder="type4" pattern="[a-zA-Z0-9 ]{1,255}" title="only alphanumeric characters with no spaces"/>
            <input type="text" name="type5" placeHolder="type5" pattern="[a-zA-Z0-9 ]{1,255}" title="only alphanumeric characters with no spaces"/>
          </div>
        </fieldset>
        
        <input type="submit" name="add_new_med" value="Add Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>