<?php
  session_start();
  class Employee
  {
    public $id;
    public $title;
    public $name;
    public $surname;
    public $username;
    public $gender;
    public $type;
    public $idnum;
    public $bank;
    public $cell;
    public $email;
    public $postal;
    public $tel;
    public $physical;
    public $location;
    
    public function __construct($id, $title, $name, $surname, $username, $gender, $type, $location)
    {
      $this->id = $id;
      $this->title = $title;
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->gender = $gender;
      $this->type = $type;
      $this->location = $location;
    }

    public function loadRest($idnum, $bank, $cell, $email, $postal, $tel, $physical)
    {
      $this->idnum = $idnum;
      $this->bank = $bank;
      $this->cell = $cell;
      $this->email = $email;
      $this->postal = $postal;
      $this->tel = $tel;
      $this->physical = $physical;
    }
  }

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

  class Consultation
  {
    public $id;
    public $notes;
    public $status;
    public $book_type;
    public $employee;
    public $timeslot;
    public $location;
    public $pat_name;
    public $pat_sur;
    public $schedule;
    public $c_date;
    public $pat;

    public function __construct($id, $notes, $status, $book_type, $employee, $timeslot, $location, $pat_name, $pat_sur, $schedule, $c_date, $pat)
    {
      $this->id = $id;
      $this->notes = $notes;
      $this->status = $status;
      $this->book_type = $book_type;
      $this->employee = $employee;
      $this->timeslot = $timeslot;
      $this->location = $location;
      $this->pat_name = $pat_name;
      $this->pat_sur = $pat_sur;
      $this->schedule = $schedule;
      $this->c_date = $c_date;
      $this->pat = $pat;
    }

    public function getMedicalAid($pat)
    {
      require 'dbconn.php';

      try
      {
        $s = "select type_medical_aid.decription as med_type from patient where patientID = " . $pat;
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
          $med_type[] = $row['med_type'];

          $c++;
        }

        return $med_type[0];
      }
      else
      {
        return false;
      }
    }
  }

  function loadShed($date, $time, $eID)
  {
    require 'dbconn.php';

    $s = "select * from schedule where available_date = '" . $date . "' and available != 1 and employeeID = " . $eID;

    if ($time != null)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $time . " and available != 1 and employeeID = " . $eID;
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
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
      return "rows";
    }
  }

  function loadShedAlt($date, $t_s, $eID)
  {
    require 'dbconn.php';
    $s = "select * from schedule where available_date = '" . $date . "' and available = 1 and employeeID = " . $eID;

    if ($t_s != null)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $t_s . " and available = 1 and employeeID = " . $eID;
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      /*foreach ($r as $ar)
      {
        $z = $ar;
      }*/
      return $r->rowCount();
    }
    else
    {
      return "rows";
    }
  }

  function loadShedDet($id)
  {
    require 'dbconn.php';

    try
    {
      $s = "select consultation.id, notes, `status`, type_booking.description as book_type, employeeID, timeslotID, practice_locationID, patient.name as pat_name, patient.surname as pat_sur, scheduleID, employee_typeID, patientID as pat from consultation join type_booking on consultation.booking_typeID = type_booking.id join patient on consultation.patientID = patient.id where scheduleID = " . $id;
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch())
      {
        /*$id[$c] = $row['id'];
        $notes[$c] = $row['notes'];
        $status[$c] = $row['status']; 
        $book_type[$c] = $row['book_type'];
        $emp[$c] = $row['employeeID'];
        $timeslot[$c] = $row['timeslotID'];
        $loc[$c] = $row['practice_locationID'];
        $pat_n[$c] = $row['pat_name'];
        $pat_s[$c] = $row['pat_sur'];
        $schedule[$c] = $row['scheduleID'];
        $c_date[$c] = null; //$row['c_date'];
        $pat[$c] = $row['pat'];*/

        $conList[] = new Consultation($row['id'], $row['notes'], $row['status'], $row['book_type'], $row['employeeID'], $row['timeslotID'], $row['practice_locationID'], $row['pat_name'], $row['pat_sur'], $row['scheduleID'], null, $row['pat']);
        //$con = new Consultation($id[$c], $notes[$c], $status[$c], $book_type[$c], $emp[$c], $timeslot[$c], $loc[$c], $pat_n[$c], $pat_s[$c], $schedule[$c], $c_date[$c], $pat[$c]);

        $c++;
      }

      return $conList;
    }
    else
    {
      return "rows";
    }
  }

  function makeSlotAv($d, $t_s, $e, $l)
  {
    require 'dbconn.php';

    try
    {
      $s1 = "SELECT * FROM `schedule` WHERE `available_date` = '" . $d . "' and `timeslotID` = " . $t_s . " and `employeeID` = " . $e . " and `practice_locationID` = " . $l . " and `available` = 1";
      $r1 = $pdo->query($s1);
    }
    catch (PDOException $e)
    {
      return "query1";
    }

    if ($r1 != null && $r1->rowCount() > 0)
    {
      return "rows1";
    }
    else
    {
      try
      {
        $s3 = "INSERT INTO `schedule`(`available_date`, `available`, `timeslotID`, `employeeID`, `practice_locationID`) VALUES ('" . $d . "', 1, " . $t_s . ", " . $e . ", " . $l . ")";
        $r3 = $pdo->exec($s3);
      }
      catch (PDOException $e)
      {
        return "query2";
      }

      if ($r3 > 0)
      {
        return $r3;
      }
      else
      {
        return "rows2";
      }
    }
  }

  function makeSlotUnav($d, $t_s, $e, $l)
  {
    require 'dbconn.php';

    try
    {
      $s = "DELETE FROM `schedule` WHERE `available_date` = '" . $d . "' and timeslotID = " . $t_s . " and `employeeID` = " . $e . " and `practice_locationID` = " . $l;
      $r = $pdo->exec($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r != null && $r > 0)
    {
      return $r;
    }
    else
    {
      return "rows";
    }
  }

  $emp = $_SESSION['emp'];

  if (isset($_POST['date']))
  {
    if ($_POST['date'] != "null")
    {
      $d = strtotime($_POST['date']);
    }
    else
    {
      $d = mktime(0,0,0,date("m"), date("d"), date("Y"));
    }
  }
  else
  {
    $d = mktime(0,0,0,date("m"), date("d"), date("Y"));
  }

  if (isset($_POST['makeSlotAv']))
  {
    //echo var_dump($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    $makeSlotAv = makeSlotAv($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //echo var_dump($makeSlotAv);

    if ($makeSlotAv == "query1" || $makeSlotAv == "query2")
    {
      $o = "There was an error making the slot available, query";
    }
    else if ($makeSlotAv == "rows1" || $makeSlotAv == "rows2")
    {
      $o = "There was an error making the slot unavailable";
    }
    else
    {
      //header("Location: ");
    }

    $d = strtotime($_POST['s_d']);
  }

  if (isset($_POST['makeSlotUnav']))
  {
    //echo var_dump($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    $makeSlotUnav = makeSlotUnav($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //echo var_dump($makeDayUnav, $_POST['makeDayUnav'], $emp->id, $emp->location);

    if ($makeSlotUnav == "query")
    {
      $o = "There was an error making the slot available, query";
    }
    else if ($makeSlotUnav == "rows")
    {
      $o = "There was an error making the slot unavailable";
    }
    else
    {
      //header("Location: ");
    }

    $d = strtotime($_POST['s_d']);
  }

  $dd = date("N", $d);

  if ($dd == 1)
  {
    $mon = date("Y-m-d", $d);
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 2, date("Y", $d)));
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 3, date("Y", $d)));
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 4, date("Y", $d)));
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 5, date("Y", $d)));
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 6, date("Y", $d)));
  }
  else if ($dd == 2)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d))); 
    $tue = date("Y-m-d", $d);
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 2, date("Y", $d)));
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 3, date("Y", $d)));
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 4, date("Y", $d)));
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 5, date("Y", $d)));
  }
  else if ($dd == 3)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 2, date("Y", $d)));
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d)));
    $wed = date("Y-m-d", $d);
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 2, date("Y", $d)));
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 3, date("Y", $d)));
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 4, date("Y", $d)));
  }
  else if ($dd == 4)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 3, date("Y", $d)));
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 2, date("Y", $d)));
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d)));
    $thu = date("Y-m-d", $d);
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 2, date("Y", $d)));
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 3, date("Y", $d)));
  }
  else if ($dd == 5)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 4, date("Y", $d)));
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 3, date("Y", $d)));
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 2, date("Y", $d)));
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d)));
    $fri = date("Y-m-d", $d);
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 2, date("Y", $d)));
  }
  else if ($dd == 6)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 5, date("Y", $d)));
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 4, date("Y", $d)));
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 3, date("Y", $d)));
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 2, date("Y", $d)));
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d)));
    $sat = date("Y-m-d", $d);
    $sun = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) + 1, date("Y", $d)));
  }
  else if ($dd == 7)
  {
    $mon = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 6, date("Y", $d)));
    $tue = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 5, date("Y", $d)));
    $wed = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 4, date("Y", $d)));
    $thu = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 3, date("Y", $d)));
    $fri = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 2, date("Y", $d)));
    $sat = date("Y-m-d", mktime(0,0,0,date("m", $d), date("d", $d) - 1, date("Y", $d)));
    $sun = date("Y-m-d", $d);
  }

  echo "<h2>" . date("F 'y", $d) . "</h2>";
?>

<ul id="call">
  <li class="blue"><p>week <?php echo date("W", $d);?></p><p>time</p></li>
  <li class="blue">
    <?php
     //echo "<p>" . $mon . "</p>";
     if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
     {
       $d_app = loadShed($mon, null, $emp->id);

       if ($d_app == "query")
       {}
       else if ($d_app == "rows")
       {
         $d_app_alt = loadShedAlt($mon, null, $emp->id);

         if ($d_app_alt == "query")
         {}
         else if ($d_app_alt == "rows")
         {
           echo "<p>monday</p><p>" . date("j M", strtotime($mon)) . " <a onclick=makeDayAv('" . $mon . "')>ma</a></p>";
         }
         else
         {
           echo "<p>monday</p><p>" . date("j M", strtotime($mon)) . " <a onclick=makeDayUnav('" . $mon . "')>mu</a></p>";
         }
       }
       else
       {
         $app = count($d_app);
         echo "<p>monday</p><p>" . date("j M", strtotime($mon)) . " <a>- " . $app . " app</a></p>";
       }
     }
     else
     {
       echo "<p>monday</p><p>" . date("j M", strtotime($mon)) . " <a></a></p>";
     }

    ?>
  </li>
  <li class="blue">
    <?php
     //echo "<p>" . $tue . "</p>";
     if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
     {
       $d_app = loadShed($tue, null, $emp->id);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($tue, null, $emp->id);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<p>tuesday</p><p>" . date("j M", strtotime($tue)) . " <a onclick=makeDayAv('" . $tue . "')>ma</a></p>";
        }
        else
        {
          echo "<p>tuesday</p><p>" . date("j M", strtotime($tue)) . " <a onclick=makeDayUnav('" . $tue . "')>mu</a></p>";
        }
      }
      else
      {
        $app = count($d_app);
        echo "<p>tuesday</p><p>" . date("j M", strtotime($tue)) . " <a>- " . $app . " app</a></p>";
      }
     }
     else
     {
       echo "<p>tuesday</p><p>" . date("j M", strtotime($tue)) . " <a></a></p>";
     }

    ?>
  </li>
  <li class="blue">
    <?php
      //echo "<p>" . $wed . "</p>";
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, null, $emp->id);

        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, null, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<p>wednesday</p><p>" . date("j M", strtotime($wed)) . " <a onclick=makeDayAv('" . $wed . "')>ma</a></p>";
          }
          else
          {
            echo "<p>wednesday</p><p>" . date("j M", strtotime($wed)) . " <a onclick=makeDayUnav('" . $wed . "')>mu</a></p>";
          }
        }
        else
        {
          $app = count($d_app);
          echo "<p>wednesday</p><p>" . date("j M", strtotime($wed)) . " <a>- " . $app . " app</a></p>";
        }
      }
      else
      {
        echo "<p>wednesday</p><p>" . date("j M", strtotime($wed)) . " <a></a></p>";
      }

    ?>
  </li>
  <li class="blue"> 
    <?php
      //echo "<p>" . $thu . "</p>";
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, null, $emp->id);

        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, null, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<p>thursday</p><p>" . date("j M", strtotime($thu)) . " <a onclick=makeDayAv('" . $thu . "')>ma</a></p>";
          }
          else
          {
            echo "<p>thursday</p><p>" . date("j M", strtotime($thu)) . " <a onclick=makeDayUnav('" . $thu . "')>mu</a></p>";
          }
        }
        else
        {
          $app = count($d_app);
          echo "<p>thursday</p><p>" . date("j M", strtotime($thu)) . " <a>- " . $app . " app</a></p>";
        }
      }
      else
      {
        echo "<p>thursday</p><p>" . date("j M", strtotime($thu)) . " <a></a></p>";
      }

    ?>
  </li>
  <li class="blue">
    <?php
      //echo "<p>" . $fri . "</p>";
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, null, $emp->id);

        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, null, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<p>friday</p><p>" . date("j M", strtotime($fri)) . " <a onclick=makeDayAv('" . $fri . "')>ma</a></p>";
          }
          else
          {
            echo "<p>friday</p><p>" . date("j M", strtotime($fri)) . " <a onclick=makeDayUnav('" . $fri . "')>mu</a></p>";
          }
        }
        else
        {
          $app = count($d_app);
          echo "<p>friday</p><p>" . date("j M", strtotime($fri)) . " <a>- " . $app . " app</a></p>";
        }
      }
      else
      {
        echo "<p>friday</p><p>" . date("j M", strtotime($fri)) . " <a></a></p>";
      }

    ?>
  </li>
  <li class="blue">
    <?php
      //echo "<p>" . $sat . "</p>";
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, null, $emp->id);

        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, null, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<p>saturday</p><p>" . date("j M", strtotime($sat)) . " <a onclick=makeDayAv('" . $sat . "')>ma</a></p>";
          }
          else
          {
            echo "<p>saturday</p><p>" . date("j M", strtotime($sat)) . " <a onclick=makeDayUnav('" . $sat . "')>mu</a></p>";
          }
        }
        else
        {
          $app = count($d_app);
          echo "<p>saturday</p><p>" . date("j M", strtotime($sat)) . " <a>- " . $app . " app</a></p>";
        }
      }
      else
      {
        echo "<p>saturday</p><p>" . date("j M", strtotime($sat)) . " <a></a></p>";
      }

      
    ?>
  </li>
  <li class="blue"> 
    <?php
      //echo "<p>" . $sun . "</p>";
      if($sun > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, null, $emp->id);

        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, null, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<p>sunday</p><p>" . date("j M", strtotime($sun)) . " <a onclick=makeDayAv('" . $sun . "')>ma</a></p>";
          }
          else
          {
            echo "<p>sunday</p><p>" . date("j M", strtotime($sun)) . " <a onclick=makeDayUnav('" . $sun . "')>mu</a></p>";
          }
        }
        else
        {
          $app = count($d_app);
          echo "<p>sunday</p><p>" . date("j M", strtotime($sun)) . " <a>- " . $app . " app</a></p>";
        }
      }
      else
      {
        echo "<p>sunday</p><p>" . date("j M", strtotime($sun)) . " <a></a></p>";
      }

    ?>
  </li>
  
  <li><p>08h00 - 08h45</p><br></li>
  <li>
    <?php 
      $d_app = loadShed($mon, 1, $emp->id);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
        {
          $d_app_alt = loadShedAlt($mon, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          echo "<a class='gray'><br></a><a class='gray'><br></a>";
        }
        
      }
      else
      {
        //echo var_dump($d_app, $d_app[0]->id);
        $s_det = loadShedDet($d_app[0]->id);
        //echo var_dump($s_det[0]->pat_name);

        echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a></a>"; 
      }

    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($tue, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
          {
            $d_app_alt = loadShedAlt($tue, 1, $emp->id);

            if ($d_app_alt == "query")
            {}
            else if ($d_app_alt == "rows")
            {
              echo "<a>not in</a><a onclick=makeSlot1Av('" . $tue . "')>ma</a>";
            }
            else
            {
              echo "<a>no app</a><a onclick=makeSlot1Unav('" . $tue . "')>mu</a>";
            }
          }
          else
          {
            echo "<a class='gray'><br></a><a class='gray'><br></a>";
          }
          
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 1, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 1, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot1Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot1Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>09h00 - 09h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 2, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 2, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot2Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot2Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>10h00 - 10h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 3, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 3, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot3Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot3Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>11h00 - 11h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 4, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 4, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot4Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot4Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>12h00 - 12h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 5, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 5, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot5Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot5Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>13h00 - 13h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 6, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 6, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot6Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot6Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>14h00 - 14h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 7, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 7, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot7Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot7Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>15h00 - 15h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 8, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 8, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot8Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot8Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>16h00 - 16h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 9, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 9, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot9Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot9Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  
  <li><p>17h00 - 17h45</p><br></li>
  <li>
    <?php 
      if($mon > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($mon, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($mon, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $mon . "')>ma</a>";
            //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $mon . "')>mu</a>";
            //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>"; 
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }

    ?>
  </li>
  <li>
    <?php
      if($tue > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($tue, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($tue, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $tue . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $tue . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($wed > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($wed, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($wed, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $wed . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $wed . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($thu > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($thu, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($thu, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $thu . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $thu . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($fri > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($fri, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($fri, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $fri . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $fri . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sat > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sat, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sat, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $sat . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $sat . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app, $d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det[0]->pat_name);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>
  <li>
    <?php
      if($sun > date("Y-m-d", mktime(0,0,0,date("m"), date("d") - 1, date("Y"))))
      {
        $d_app = loadShed($sun, 10, $emp->id);
      
        if ($d_app == "query")
        {}
        else if ($d_app == "rows")
        {
          $d_app_alt = loadShedAlt($sun, 10, $emp->id);

          if ($d_app_alt == "query")
          {}
          else if ($d_app_alt == "rows")
          {
            echo "<a>not in</a><a onclick=makeSlot10Av('" . $sun . "')>ma</a>";
          }
          else
          {
            echo "<a>no app</a><a onclick=makeSlot10Unav('" . $sun . "')>mu</a>";
          }
        }
        else
        {
          //echo var_dump($d_app[0]->id);
          $s_det = loadShedDet($d_app[0]->id);
          //echo var_dump($s_det);

          echo "<a>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</a><a><br></a>";
        }
      }
      else
      {
        echo "<a class='gray'><br></a><a class='gray'><br></a>";
      }
      
    ?>
  </li>  

  <!--<div class="clear"></div>-->

</ul>

<?php
  $z = mktime(0,0,0,date("m", $d), date("d", $d) - 7, date("Y", $d));
  $zz = mktime(0,0,0,date("m", $d), date("d", $d) + 7, date("Y", $d));
  //echo date("Y-m-d", $z) . " " . date("Y-m-d", $zz);
?>
<a id="week_p" onclick="navWeek('<?php echo date("Y-m-d", $z);?>')"></a>
<a id="week_n" onclick="navWeek('<?php echo date("Y-m-d", $zz);?>')"></a>