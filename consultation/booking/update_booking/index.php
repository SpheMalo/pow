<?php
  require '../../../inc/func.php';
  session_start();
  
  if (isset($_SESSION['emp']) && isset($_SESSION['a_t']))
  {
    $l_t = date_create(date("Y-m-d h:i:s", $_SESSION['a_t']));
    $c_t = date_create(date("Y-m-d h:i:s"));
    $i = date_diff($l_t, $c_t);

    if (intval($i->format('%i')) > 10)
    {
      header("Location: ../../../login/?t");
    }

    $_SESSION['page'] = "update booking";

    if (isset($_GET['up']))
    {
      $_SESSION['c_p'] = $_GET['up'];
    }

    $emp = $_SESSION['emp'];
    $emp_access_level = loadEmpAccessLevel($emp->id);
    $o = "";

    $iList = loadIdList(null);
    $dList = loadDocList();
    $book_typeList = loadBookTypeList();
    $book_timeSlot = loadTimeSlots();  ///--  Mate Im battling with populating the timeslot of this func is diff to the one above and didnt want to change coz now it affects something else

    unset($r_link);
    $r_link = "?rem=" . $_SESSION['c_p'];
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_GET['rem']))
  {
    unset($r_link);
    $r_link = "";
    $r_i = removeConsultation($_GET['rem']);
    $r_a = patientArrived($_GET['rem']);
    //echo var_dump($r_i);
  
    if ($r_i == "remove")
    {
      $o = "The consultation has been successfully cancelled and removed.";
    }
    else if ($r_i == "removed")
    {
      $o = "The consultation has already been removed.";
    }
    else if ($r_i == "query" || $r_i == "query1" || $r_i == "query2")
    {
      $o = "The consultation was not cancelled due to a server error. Try again later.";
    }
    else if ($r_i == "rows")
    {
      $o = "The consultation was not removed, please try again";
    }
    else if ($r_i == "inactive")
    {
      $o = "The consultation has been successfully cancelled";
    }

    if ($r_a == "arrived")
    {
      $o = "Patient status successfully updated to 'arrived'";
    }
    else if ($r_a == "rows3")
    {
      $o = "The patient's status was not updated, please try again";
    }
    else if ($r_a == "query3")
    {
      $o = "The patient's status was not updated, due to a server error. please try again.";
    }
  }
else if (isset($_POST['s_upd_app']))
  {
    $u_b = updateBooking();
    if ($u_b == "query")
    {
      $o = "The booking was not updated due to a sever error. Please try again later.";
    }
    else if ($u_b == "rows")
    {
      $o = "There was an error updating the booking. Please try again.";
    }
    else
    {
      $o = "The booking has been successfully updated.";
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
    <script type="text/javascript" src="../../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" src="../../../js/jQueryRotate.js"></script>
    <script type="text/javascript" src="../../../js/init.js"></script>
    <script type="text/javascript" src="../../../js/consultation_update.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s32').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s32').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s32').parent().prevUntil().css({'color': '#00314c'});
        $('#s32').parent().nextUntil().css({'color': '#00314c'});
        $('#s32').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s32').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s32').css({'color': '#00314c'});
      });
    </script>
  </head>
  
  <body onload="getBookingById()">
    <?php
      if ($emp_access_level == "A")
      {
        include '../../../inc/menu_A.htm';
      }
      else if ($emp_access_level == "B")
      {
        include '../../../inc/menu_B.htm';
      }
      else if ($emp_access_level == "C")
      {
        include '../../../inc/menu_C.htm';
      }
      else if ($emp_access_level == "D")
      {
        include '../../../inc/menu_D.htm';
      }
      else
      {
        include '../../../inc/menu.htm';
      }
    ?>
    
    <div id="head">
      <h1 id="head_m">Booking</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
     
    <ul id="nav_xtra">
      <li><img src="../../../img/ico/gear.png" alt="gear"/>
        <ul>
          <li><a href="../../../helpFiles/Add Employee.pdf" target="_blank">Help</a></li>
        </ul>
      </li>
    </ul>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>patient details</legend>
          <div>
            <label for="id">id:</label>
            <input id="ids" type="text" name="id" list="idNums" onchange="getPatientById()" placeholder="enter patient id" autofocus/>

            <datalist id="idNums">
              <?php foreach($iList as $i):?>
                <option value="<?php echo $i;?>"/>
              <?php endforeach;?>
            </datalist>

            <datalist id="idNums">
            </datalist>
            <label for="name">name:</label>
            <input id="patientName" type="text" name="name" placeholder="enter patient name" />
          </div>
          <div>
            <label for="medical" class="display">medical aid:</label>
            <input id="patientMedicalAid" type="text" name="medical" placeholder="patient medical aid" class="display"/>
            <label for="surname">surname:</label>
            <input id="patientSurname" type="text" name="surname" placeholder="enter patient surname" />
          </div>
        </fieldset>

        <fieldset>
          <legend>booking details</legend>
           <div>
            <label for="dentist">dentist:</label> 
            <select id="dentistSelect" name="dentist" onchange="getBookWeek()">
              <!--<option name="jpMaponya">Dr J.P. Maponya</option>
              <option name="yMaponya">Dr Y. Maponya</option>-->
              <option>--select dentist--</option>
              <?php foreach($dList as $d):?>
                <?php $name = $d['name'];?>
                <option value="<?php echo $d['id'];?>">Dr. <?php echo $name[0] . ". " . $d['surname'];?></option>
              <?php endforeach;?>
            </select>

            <label for="date">consultation date:</label>
            <input id="dateID" type="date" name="date" placeholder="select consultation date"/>
            <label for="name">Status:</label>
            <input id="statusId" type="text" name="status" placeholder="Displays booking status of a patient" disabled/>

          </div>
            
          <div>
            <label for="location">booking type:</label>
            <select id="locationSelect" name="type" readonly>
              <option>--select booking type--</option>
              <?php foreach($book_typeList as $b):?>
                <option id="<?php echo $b['desc'];?>" value="<?php echo $b['id'];?>"><?php echo $b['desc'];?></option>
              <?php endforeach;?>
            </select>
            <label for="location">Time Slot:</label>
            <select id="locationSelect" name="type" readonly>
              <option>--select booking type--</option>
              <?php foreach($book_timeSlot as $t):?>
                <option id="<?php echo $t['descriptions'];?>" value="<?php echo $t['ids'];?>"><?php echo $t['descriptions'];?></option>
              <?php endforeach;?>

              ////This can be populated if the load func works the same as the booking type one... see comment above (top of file)
            </select>
          </div>
          
        </fieldset>

        <input type="submit" name="s_upd_app" class="submit" value="update appointment"/>
<!--        <input type="submit" name="s_pat_arival" class="submit" value="patient arrived"/>-->
        <a id="remove" onclick='confirm_app("<?php echo $_SESSION['c_p'];?>")'>patient arrived</a>
        <a id="remove" onclick='confirmation("<?php echo $_SESSION['c_p'];?>")'>cancel appointment</a>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>