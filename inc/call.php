<?php
  session_start();
  class Schedule
  {
    public $id;
    public $date;
    public $available;
    public $time;
    public $employee;
    public $location;
    
    public function __construct($id, $date, $available, $time, $employee, $location)
    {
      $this->id = $id;
      $this->date = $date;
      $this->available = $available;
      $this->time = $time;
      $this->employee = $employee;
      $this->location = $location;
    }
  }

  function loadShed($date, $time)
  {
    require 'dbconn.php';

    $s = "select * from schedule where available_date = '" . $date . "' and available != 1";

    if ($time == NULL)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $time . " and available != 1";
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return false;
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch())
      {
        $id[] = $row['id'];
        $dat[] = $row['available_date'];
        $available[] = $row['available'];
        $timeslot[] = $row['timeslotID'];
        $emp[] = $row['employeeID'];
        $loc[] = $row['practice_locationID'];

        $shed = new Schedule($id[$c], $dat[$c], $available[$c], $time[$c], $emp[$c], $loc[$c]);
        $shedList[$c] = $shed;

        $c = $c + 1;
      }

      return $shedList;
    }
    else
    {
      return false;
    }
  }

  function loadShedDet($id)
  {
    require 'dbconn.php';

    try
    {
      $s = "select consultation.id, notesm status, type_booking.description as type, employeeID, timeslotID, practice_locationID, patient.name as pat_name, patient.surname as pat_sur, scheduleID, employee_typeID from consultation where scheduleID = " . $id;
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return false;
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch())
      {
        $id[] = $row['id'];
        $notes[] = $row['notes'];
        $status[] = $row['status'];
        $booking_type[] = $row['type'];
        $employee[] = $row['employeeID'];
        $timeslot[] = $row['timeslotID'];
        $location[] = $row['practice_locationID'];
        $patient[] = $row['patientID'];
        $schedule[] = $row['scheduleID'];
        $empType[] = $row['empoyee_typeID'];

        $con = new Consultation($id, $notes, $status, $booking_type, $employee, $timeslot, $practice_location, $pat_name, $pat_sur, $schedule, $emp_type);
        $conList[] = $con;

        $c++;
      }

      return $conList;
    }
    else
    {
      return false;
    }
  }

  if (isset($_POST['date']))
  {
    $d = $_POST['date'];
  }
  else
  {
    $d = mktime(0,0,0,date("m"), date("d"), date("Y"));
  }

  $dd = date("N", $d);

  if ($dd == 1)
  {
    $mon = date("Y-m-d", $d); 
    $td = date("d", $d) + 1;
    $tue = date("Y-m", $d) . "-" . $td;
    $wd = date("d", $d) + 2;
    $wed = date("Y-m", $d) . "-" . $wd;
    $thd = date("d", $d) + 3;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fd = date("d", $d) + 4;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sd = date("d", $d) + 5;
    $sat = date("Y-m", $d) . "-" . $sd;
    $ssd = date("d", $d) + 6;
    $sun = date("Y-m", $d) . "-" . $ssd;
  }
  else if ($dd == 2)
  {
    $md = date("d", $d) - 1;
    $mon = date("Y-m", $d) . "-" . $md; 
    $tue = date("Y-m-d", $d);
    $wd = date("d", $d) + 1;
    $wed = date("Y-m", $d) . "-" . $wd;
    $thd = date("d", $d) + 2;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fd = date("d", $d) + 3;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sd = date("d", $d) + 4;
    $sat = date("Y-m", $d) . "-" . $sd;
    $ssd = date("d", $d) + 5;
    $sun = date("Y-m", $d) . "-" . $ssd;
  }
  else if ($dd == 3)
  {
    $md = date("d", $d) - 2;
    $mon = date("Y-m", $d) . "-" . $md;
    $td = date("d", $d) - 1; 
    $tue = date("Y-m", $d) . "-" . $td;
    $wed = date("Y-m-d", $d);
    $thd = date("d", $d) + 1;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fd = date("d", $d) + 2;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sd = date("d", $d) + 3;
    $sat = date("Y-m", $d) . "-" . $sd;
    $ssd = date("d", $d) + 4;
    $sun = date("Y-m", $d) . "-" . $ssd;
  }
  else if ($dd == 4)
  {
    $md = date("d", $d) - 3;
    $mon = date("Y-m", $d) . "-" . $md;
    $td = date("d", $d) - 2; 
    $tue = date("Y-m", $d) . "-" . $td;
    $wd = date("d", $d) - 1;
    $wed = date("Y-m", $d) . "-" . $wd;
    $thu = date("Y-m-d", $d);
    $fd = date("d", $d) + 1;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sd = date("d", $d) + 2;
    $sat = date("Y-m", $d) . "-" . $sd;
    $ssd = date("d", $d) + 3;
    $sun = date("Y-m", $d) . "-" . $ssd;
  }
  else if ($dd == 5)
  {
    $md = date("d", $d) - 4;
    $mon = date("Y-m", $d) . "-" . $md;
    $td = date("d", $d) - 3; 
    $tue = date("Y-m", $d) . "-" . $td;
    $wd = date("d", $d) - 2;
    $wed = date("Y-m", $d) . "-" . $wd;
    $thd = date("d", $d) - 1;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fri = date("Y-m-d", $d);
    $sd = date("d", $d) + 1;
    $sat = date("Y-m", $d) . "-" . $sd;
    $ssd = date("d", $d) + 2;
    $sun = date("Y-m", $d) . "-" . $ssd;
  }
  else if ($dd == 6)
  {
    date("d", $d) - 5;
    $mon = date("Y-m", $d) . "-" . $md;
    $td = date("d", $d) - 4; 
    $tue = date("Y-m", $d) . "-" . $td;
    $wd = date("d", $d) - 3;
    $wed = date("Y-m", $d) . "-" . $wd; 
    $thd = date("d", $d) - 2;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fd = date("d", $d) - 1;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sat = date("Y-m-d", $d);
    $sd = date("d", $d) + 1;
    $sun = date("Y-m", $d) . "-" . $sd;
  }
  else if ($dd == 7)
  {
    $ddd = date("d", $d);

    $md = $ddd - 6;
    $mon = date("Y-m", $d) . "-" . $md;
    $td = $ddd - 5; 
    $tue = date("Y-m", $d) . "-" . $td;
    $wd = $ddd - 4;
    $wed = date("Y-m", $d) . "-" . $wd;
    $thd = $ddd - 3;
    $thu = date("Y-m", $d) . "-" . $thd;
    $fd = $ddd - 2;
    $fri = date("Y-m", $d) . "-" . $fd;
    $sd = $ddd - 1;
    $sat = date("Y-m", $d) . "-" . $sd;
    $sun = date("Y-m-d", $d);

  }



?>

<ul id="call">
  <li>time</li>
  <li>monday <?php echo $mon; ?></li>
  <li>tuesday <?php echo $tue; ?></li>
  <li>wednesday <?php echo $wed; ?></li>
  <li>thursday <?php echo $thu; ?></li>
  <li>friday <?php echo $fri; ?></li>
  <li>saturday <?php echo $sat; ?></li>
  <li>sunday <?php echo $sun; ?></li>

  <li>08h00 - 08h45</li>
  <li>
    <?php
      $d_app = loadShed($mon, 1);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }  
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($tue, 1);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($wed, 1);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($thu, 1);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($fri, 1);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($sat, 1);
      
      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
          $det_app1 = $det_app[0];

          echo $det_app1->pat_name . " " . $det_app1->pat_sur; 
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($sun, 1);
      
      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);

          $det_app1 = $det_app[0]; 
        }
        else
        {
          if ($_SESSION['page'] == "make a booking")
          {
            echo "<a href='book'>book <img src='img/ico/add_app.png' alt='i'/></a>";
          }
          else if ($_SESSION['page'] == "view dentist schedule")
          {
            echo "<a href='?unavailable=" . $app->id . "'>make unavailable <img src='img/ico/lock.png' alt='i'/></a>";
          }
        }
      }
      else
      {
        if ($_SESSION['page'] == "view dentist schedule")
        {
          echo "<a href='?available='><img src='img/ico/unlock.png' alt='i'/></a>";
        }
      }
    ?>
  </li>

  <li>09h00 - 09h45</li>
  <li>
    <?php
      $d_app = loadShed($mon, 2);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }      
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($tue, 2);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($wed, 2);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($thu, 2);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($fri, 2);

      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($sat, 2);
      
      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($sun, 2);
      
      if ($d_app !== false)
      {
        $app = $d_app[0];

        if ($app->available == 0)
        {
          $det_app = loadShedDet($app->id);
        }
        else
        {
          echo "empty";
        }
      }
      else
      {
        echo "empty";
      }
    ?>
  </li>
  
  <li>10h00 - 10h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>11h00 - 11h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>12h00 - 12h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>13h00 - 13h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>14h00 - 14h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>15h00 - 15h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>16h00 - 16h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <li>17h00 - 17h45</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>

  <?php
    require 'func.php';

    /*if (isset($_POST['date']))
    {
      $d = $_POST['date'];
    }
    else
    {
      $d = date("Y-m-d");
    }

    $app = loadShed($d);*/

  ?>
</ul>