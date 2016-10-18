<?php
  $o = "You have been logged out due to inactivity. <a href='../login/'>Login</a>";
  $_SESSION['page'] = "inactivity";
?>

<html>
  <head>
    <title>D+M Dental Practice System - <?php echo $_SESSION['page'];?></title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
  </head>
  
  <body>
    <form method="post" action="">
      <!--<img src="../img/logo.png" alt="logo"/>
      <input type="text" name="user" placeholder="username" pattern="[a-zA-Z0-9]{7}" required title="only alphanumeric characters allowed" autocomplete="off" autofocus/>
      <input type="password" name="pass" placeholder="password" pattern="[a-zA-Z0-9]{7,8}" required autocomplete="off"/>
      <input type="submit" name="login" value="login" />-->
      <p><?php echo $o;?></p>
    </form>
  </body>
</html>