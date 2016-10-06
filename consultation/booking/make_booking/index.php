<?php
  session_start();
  
  require '../../../inc/func.php';
  
  if (isset($_SESSION['emp']))
  {
    $_SESSION['page'] = "make a booking";
    $emp = $_SESSION['emp'];
    $iList = loadIdList(null);
    $dList = loadDocList();
    $o = "";

    $result = "";

    if (isset($_POST['id'])) {
      $result = bookConsultation($_POST['id'],$_POST["name"] ,$_POST["surname"] ,$_POST["medical"] 
          , $_POST["dentist"], $_POST["location"],$_POST["date"] , $_POST["time"]);
      //check above form to see what I do with $result
    }

    if ($result == true) 
    {
      $o =  "Successfully booked consultation";
    }
    else
    {
      if (isset($_POST["id"])) 
      {
        $o = "Error booking Consultation. Please try again";
      }
    }
  }

  else
  {
    header("Location: ../../../login/");
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
    <script type="text/javascript" src="../../../js/make_booking.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#s32').parent().parent().prev().css({'background': 'white', 'color': '#00314c'});
        $('#s32').parent().parent().css({'background': 'white', 'color': '#00314c'});
        $('#s32').parent().prevUntil().css({'color': '#00314c'});
        $('#s32').parent().nextUntil().css({'color': '#00314c'});
        $('#s32').parent().prevUntil().children().css({'color': '#00314c'});
        $('#s32').parent().nextUntil().children().css({'color': '#00314c'});
        $('#s32').css({'color': '#00314c', 'text-decoration': 'underline'});
      });
    </script>
  </head>
  
  <body onload="getPatientById()">
    <?php
      include '../../../inc/menu.htm';
    ?>
    
    <div id="head">
      <h1 id="head_m">Booking</h1>
      <h4 id="head_s"><?php echo $_SESSION['page'];?></h4>
      <h5 id="head_o"><?php echo $o;?></h5>
    </div>
    
    <div id="cont">
      <form method="post" action="">
        <fieldset>
          <legend>patient details</legend>
          <div>
            <label for="id">id:</label>
            <input id="ids" type="text" name="id" list="idNums" onchange="populateFields()" placeholder="enter patient id" autofocus autocomplete="off"/>

            <datalist id="idNums">
              <?php foreach($iList as $i):?>
                <option value="<?php echo $i;?>"/>
              <?php endforeach;?>
            </datalist>

            <label for="name">name:</label>
            <input id="patientName" type="text" name="name" placeholder="enter patient name" readonly/>
          </div>
          <div>
            <label for="medical">medical aid:</label> 
            <input id="patientMedicalAid" type="text" name="medical" placeholder="patient medical aid" readonly/>
            <label for="surname">surname:</label>
            <input id="patientSurname" type="text" name="surname" placeholder="enter patient surname" readonly/>
          </div>
        </fieldset>

        <fieldset>
          <legend>booking details</legend>
           <div>
            <label for="dentist">dentist:</label>
            <select id="dentistSelect" name="dentist" onchange="setPracticeLocation()">
              <!--<option name="jpMaponya">Dr J.P. Maponya</option>
              <option name="yMaponya">Dr Y. Maponya</option>-->

              <?php foreach($dList as $d):?>
                <?php $name = $d['name'];?>
                <option value="<?php echo $d['id'];?>">Dr. <?php echo $name[0] . ". " . $d['surname'];?></option>
              <?php endforeach;?>
            </select>
            <label for="date">consultation date:</label>
            <input type="date" name="date" placeholder="select consultation date"/>
          </div>
            
          <div>
            <label for="location">practice location:</label>
            <select id="locationSelect" name="location" readonly>
              <option id="optionThembisa" value="Tembisa">Tembisa</option>
              <option id="optionBirchAcres" value="Birch Acres">Birch Acres</option>
            </select>
            <label for="time">consultation time:</label>
            <select name="time">
              <?php
              $timeSlots = loadTimeSlots();

                if ($timeSlots != false) {
                  for ($i = 0; $i < count($timeSlots["ids"]); $i++){
                    $currentID = $timeSlots["ids"][$i];
                    $currentTime = $timeSlots["descriptions"][$i];
                    echo "<option name='$currentID'>".$currentTime."</option>";
                  }
                }
              ?>
            </select>
          </div>
          
        </fieldset>

        <input type="submit" name="s_new_book" class="submit" value="add appointment"/>
      </form>
      
      <div id="noti"></div>
    </div>
    
    <footer></footer>
  </body>
</html>