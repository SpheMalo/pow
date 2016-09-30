<?php
  session_start();

  require '../inc/func.php';
  
  if (isset($_POST['login']))
  {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $emp = login($user, $pass);
    
    if ($emp == "server")
    {
      $o = "Unable to log in, there was a problem connecting to the db server";
    }
    else if ($emp == "user")
    {
      $o = "Unable to log in, the user does not exist. Contact the practice manager";
    }
    else if ($emp == "pass")
    {
      $o = "Unable to log in, the password provided does not check out";
    }
    else
    {
      header("Location: ../");
      $_SESSION['emp'] = $emp;
    }
    
  }
  else
  {
    $o = "Both username and password are required";
  }

  $_SESSION['page'] = "login";
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
  </head>
  
  <body>
    <form method="post" action="">
      <img src="../img/logo.png" alt="logo"/>
      <input type="text" name="user" placeholder="username" pattern="[a-zA-Z0-9]{7}" required title="only alphanumeric characters allowed" autocomplete="off"/>
      <input type="password" name="pass" placeholder="password" pattern="[a-zA-Z0-9]{7,8}" required autocomplete="off"/>
      <input type="submit" name="login" value="login" />
      <p><?php echo $o;?></p>
    </form>
  </body>
</html>