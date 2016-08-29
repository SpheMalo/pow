<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "view bookings";
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
    <link rel="stylesheet" type="text/css" media="all" href="../../../css/viewBase.css" />
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
      <table>
        <tr>
          <th>ID</th>
          <th>patient name</th>
          <th>medical aid</th>
          <th>dentist name</th>
          <th>practice location</th>
          <th>appointment date</th>
          <th>appointment time</th>
          <th>Consultation status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>2</td>
          <td>Kgotso Thobejane</td>
          <td>None</td>
          <td>Dr. Maponya</td>
          <td>Thembisa - Practice A</td>
          <td>15 July</td>
          <td>14h00-14h45</td>
          <td>Arrived</td>
          <td><a href="../update_booking/?id=<?php?>">view</a></td>
        </tr>
        <tr>
          <td>1</td>
          <td>Khutjo Monakedi</td>
          <td>Discovery</td>
          <td>Dr. Dludla</td>
          <td>Thembisa - Practice B</td>
          <td>16 July</td>
          <td>10h00-10h45</td>
          <td>Pending</td>
          <td><a href="../update_booking/?id=<?php?>">view</a></td>
        </tr>
      </table>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>