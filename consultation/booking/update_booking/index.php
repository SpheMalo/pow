<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update booking";
    $emp = $_SESSION['emp'];
  }
  else
  {
    header("Location: ../../../login/");
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
      <h1 id="head_m">Booking</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>patient details</legend>
          <div>
            <label for="name">name:</label>
            <input type="text" name="name" placeholder="enter patient name"/>
            <label for="id">id:</label>
            <input type="text" name="id" placeholder="enter patient id"/>
          </div>
          <div>
            <label for="surname">surname:</label>
            <input type="text" name="surname" placeholder="enter patient surname"/>
            <label for="medical">medical aid:</label>
            <input type="text" name="medical" placeholder="patient medical aid"/>
          </div>
        </fieldset>

        <fieldset>
          <legend>booking details</legend>
           <div>
            <label for="dentist">dentist:</label>
            <select name="dentist">
              <option>select dentist</option>
              <?php
                 
              ?>
            </select>
            <label for="date">consultation date:</label>
            <input type="date" name="date" placeholder="select consultation date"/>
          </div>
            
          <div>
            <label for="location">practice location:</label>
            <select name="location">
              <option>select practice location</option>
              <?php
                 
              ?>
            </select>
            <label for="time">consultation time:</label>
            <select name="time">
              <option>select consultation time</option>
              <?php
                 
              ?>
            </select>
          </div>
          
        </fieldset>

        <input type="submit" name="s_pat_arival" class="submit" value="update appointment"/>
        <input type="submit" name="s_pat_arival" class="submit" value="patient arrived"/>
        <input type="submit" name="s_new_book" class="submit" value="cancel appointment"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>