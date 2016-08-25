<?php
  session_start();

  require '../inc/func.php';
  
  if (isset($_POST['login']))
  {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $emp = login($user, $pass);
    
    if ($emp != false)
    {
      header("Location: ../");
      $_SESSION['emp'] = $emp;
    }
    else
    {
      $o = "either your username or password is incorrect, or there was a problem connecting to the db server";
    }
    
  }
  else
  {
    $o = "login maybe?";
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
      <input type="text" name="user" placeholder="username" required />
      <input type="password" name="pass" placeholder="password" required />
      <input type="submit" name="login" value="login" />
      <p><?php echo $o;?></p>
    </form>
  </body>
</html>