<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "update booking";
    $emp = $_SESSION['emp'];
    $o = "";

    $iList = loadIdList(null);
    $dList = loadDocList();
    $book_typeList = loadBookTypeList();
  }
  else
  {
    header("Location: ../../../login/");
  }

  if (isset($_GET['rem']))
  {
    if ($u_b == "remove")
    {
      $o = "The booking has been successfully removed.";
    }
    else if ($u_b == "removed")
    {
      $o = "The booking has been removed already.";
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
  
  <body>
    <?php
      include '../../../inc/menu.htm';
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
            <input id="ids" type="text" name="id" list="idNums" onchange="getPatientById()" placeholder="enter patient id" autofocus autocomplete="off"/>

            <datalist id="idNums">
              <?php foreach($iList as $i):?>
                <option value="<?php echo $i;?>"/>
              <?php endforeach;?>
            </datalist>

            <datalist id="idNums">
            </datalist>
            <label for="name">name:</label>
            <input id="patientName" type="text" name="name" placeholder="enter patient name" disabled/>
          </div>
          <div>
            <label for="medical" class="display">medical aid:</label>
            <input id="patientMedicalAid" type="text" name="medical" placeholder="patient medical aid" disabled class="display"/>
            <label for="surname">surname:</label>
            <input id="patientSurname" type="text" name="surname" placeholder="enter patient surname" disabled/>
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
            <!--<label for="date">consultation date:</label>
            <input type="date" name="date" placeholder="select consultation date"/>-->
          </div>
            
          <div>
            <label for="location">booking type:</label>
            <select id="locationSelect" name="type" readonly>
              <option>--select booking type--</option>
              <?php foreach($book_typeList as $b):?>
                <option value="<?php echo $b['id'];?>"><?php echo $b['desc'];?></option>              
              <?php endforeach;?>              
            </select>
              
          </div>
          
        </fieldset>

        <input type="submit" name="s_upd_app" class="submit" value="update appointment"/>
        <input type="submit" name="s_pat_arival" class="submit" value="patient arrived"/>
        <input type="submit" name="s_new_book" class="submit" value="cancel appointment"/>
      </form>

      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>