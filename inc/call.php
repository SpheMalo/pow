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

  function loadShed($date, $time)
  {
    require 'dbconn.php';

    $s = "select * from schedule where available_date = '" . $date . "' and available != 1";

    if ($time != null)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $time . " and available != 1";
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

  function loadShedAlt($date, $t_s)
  {
    require 'dbconn.php';
    $s = "select * from schedule where available_date = '" . $date . "' and available = 1";

    if ($t_s != null)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $t_s . " and available = 1";
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
      $r1 = $pdo->query($s);
    }
    catch (PDOException $e)
    {
      return "query1";
    }

    if ($r->rowCount() > 0 && $r != null)
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

      if ($r > 0)
      {
        return $r;
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

  if (isset($_POST['makeSlotAv']))
  {
    echo var_dump($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //$makeSlotAv = makeSlotAv($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //echo var_dump($makeSlotAv);

    /*if ($makeSlotAv == "query")
    {
      $o = "There was an error making the slot available, query";
    }
    else if ($makeSlotAv == "rows")
    {
      $o = "There was an error making the slot unavailable";
    }
    else
    {
      header("Location: ");
    }*/
  }

  if (isset($_POST['makeSlotUnav']))
  {
    echo var_dump($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //$makeSlotUnav = makeSlotUnav($_POST['s_d'], $_POST['s_t'], $emp->id, $emp->location);
    //echo var_dump($makeDayUnav, $_POST['makeDayUnav'], $emp->id, $emp->location);

    /*if ($makeSlotUnav == "query")
    {
      $o = "There was an error making the slot available, query";
    }
    else if ($makeSlotUnav == "rows")
    {
      $o = "There was an error making the slot unavailable";
    }
    else
    {
      header("Location: ");
    }*/
  }

  if (isset($_POST['date']))
  {
    $d = strtotime($_POST['date']);
    echo "<h2>" . date("F 'y", $d) . "</h2>";
  }
  else
  {
    $d = mktime(0,0,0,date("m"), date("d"), date("Y"));
    echo "<h2>" . date("F 'y", $d) . "</h2>";
  }

  $dd = date("N", $d);
  //echo $dd;

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

?>

<ul id="call">
  
  <li>
    <?php
     //echo "<p>" . $mon . "</p>";

      $d_app = loadShed($mon, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($mon, null);

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
    ?>
  </li>
  <li>
    <?php
     //echo "<p>" . $tue . "</p>";

      $d_app = loadShed($tue, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($tue, null);

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
    ?>
  </li>
  <li>
    <?php
      //echo "<p>" . $wed . "</p>";

      $d_app = loadShed($wed, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($wed, null);

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
    ?>
  </li>
  <li> 
    <?php
      //echo "<p>" . $thu . "</p>";

      $d_app = loadShed($thu, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($thu, null);

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
    ?>
  </li>
  <li>
    <?php
      //echo "<p>" . $fri . "</p>";

      $d_app = loadShed($fri, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($fri, null);

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
    ?>
  </li>
  <li>
    <?php
      //echo "<p>" . $sat . "</p>";

      $d_app = loadShed($sat, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($sat, null);

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
    ?>
  </li>
  <li> 
    <?php
      //echo "<p>" . $sun . "</p>";

      $d_app = loadShed($sun, null);

      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($sun, null);

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
    ?>
  </li>
  <li><p>week <?php echo date("W", $d);?></p><p>time</p></li>

  <li>
    <?php 
      $d_app = loadShed($mon, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($mon, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick='makeSlot1Av('" . $mon . "')'>ma</a>";
          //echo "<a>not in</a><a onclick='makeSlotAv('" . $mon . "', 1)'>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick='makeSlotUn1av('" . $mon . "')'>mu</a>";
          //echo "<a>no app</a><a onclick='makeSlotUnav('" . $mon . "', 1)'>mu</a>";
        }
      }
      else
      {
        //echo var_dump($d_app, $d_app[0]->id);
        $s_det = loadShedDet($d_app[0]->id);
        //echo var_dump($s_det[0]->pat_name);

        echo "<p>" . $s_det[0]->pat_name . " " . $s_det[0]->pat_sur . "</p>"; //<a><br></a>;
      }
    ?>
  </li>
  <li>
    <?php
      $d_app = loadShed($tue, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($tue, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $tue . "')>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $tue . "')>mu</a>";
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
      $d_app = loadShed($wed, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($wed, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $wed . "', 1)>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $wed . "', 1)>mu</a>";
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
      $d_app = loadShed($thu, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($thu, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $thu . "', 1)>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $thu . "', 1)>mu</a>";
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
      $d_app = loadShed($fri, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($fri, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $fri . "', 1)>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $fri . "', 1)>mu</a>";
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
      $d_app = loadShed($sat, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($sat, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $sat . "', 1)>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $sat . "', 1)>mu</a>";
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
      $d_app = loadShed($sun, 1);
      
      if ($d_app == "query")
      {}
      else if ($d_app == "rows")
      {
        $d_app_alt = loadShedAlt($sun, 1);

        if ($d_app_alt == "query")
        {}
        else if ($d_app_alt == "rows")
        {
          echo "<a>not in</a><a onclick=makeSlotAv('" . $sun . "', 1)>ma</a>";
        }
        else
        {
          echo "<a>no app</a><a onclick=makeSlotUnav('" . $sun . "', 1)>mu</a>";
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
  <li><p>08h00 - 08h45</p><br></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>
    s
  </li>
  <li><p>09h00 - 09h45</p></li>
  
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>10h00 - 10h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>11h00 - 11h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>12h00 - 12h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>13h00 - 13h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>14h00 - 14h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>15h00 - 15h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>16h00 - 16h45</p></li>

  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li>s</li>
  <li><p>17h00 - 17h45</p></li>

  <!--<div class="clear"></div>-->

</ul>

<?php
  $z = mktime(0,0,0,date("m", $d), date("d", $d) - 7, date("Y", $d));
  $zz = mktime(0,0,0,date("m", $d), date("d", $d) + 7, date("Y", $d));
  //echo date("Y-m-d", $z) . " " . date("Y-m-d", $zz);
?>
<a id="week_p" onclick="week_p('<?php echo date("Y-m-d", $z);?>')"></a>
<a id="week_n" onclick="week_n('<?php echo date("Y-m-d", $zz);?>')"></a>