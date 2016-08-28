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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
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
      <form method="post" action="">
        <fieldset>
          <legend>medical aid details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter medical aid name" required />
            <label for="tel">telephone:</label>
            <input type="tel" name="tel" placeholder="enter telephone number" required />
            <label for="physical">physical address:</label>
            <textarea name="physical">enter physical address</textarea>
          </div>

          <div>
            <label for="email">email:</label>
            <input type="email" name="email" placeholder="enter medical aid email" required />
            <label for="fax">fax:</label>
            <input type="tel" name="fax" placeholder="enter medical aid fax number" required />
            <label for="postal">postal address:</label>
            <textarea name="postal">enter postal details</textarea>
          </div>
        </fieldset>
        
        <input type="submit" name="s_new_med" value="Add Medical Aid" class="submit"/>
        
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>