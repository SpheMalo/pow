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

  function loadShed($date, $time)
  {
    require 'dbconn.php';

    $s = "select * from schedule where available_date = '" . $date . "' and available !=1";

    if ($time != NULL)
    {
      $s = "select * from schedule where available_date = '" . $date . "' and timeslotID = " . $time;
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

  function loadShedAlt($date)
  {
    require 'dbconn.php';

    try
    {
      $s = "select count(*) from schedule where available_date = '" . $date . "' and available = 1";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      foreach ($r as $ar)
      {
        $z = $ar;
      }
      return $z;
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
      $s = "select consultation.id, notesm status, type_booking.description as type, employeeID, timeslotID, practice_locationID, patient.name as pat_name, patient.surname as pat_sur, scheduleID, employee_typeID, patientID as pat from consultation where scheduleID = " . $id;
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
        $id[$c] = $row['id'];
        $notes[$c] = $row['notes'];
        $status[$c] = $row['status']; 
        $book_type[$c] = $row['book_type'];
        $emp[$c] = $row['employeeID'];
        $timeslot[$c] = $row['timeslot'];
        $loc[$c] = $row['location'];
        $pat_n[$c] = $row['pat_name'];
        $pat_s[$c] = $row['pat_sur'];
        $schedule[$c] = $row['scheduleID'];
        $c_date[$c] = $row['c_date'];
        $pat[$c] = $row['pat'];

        $con = new Consultation($id[$c], $notes[$c], $status[$c], $book_type[$c], $emp[$c], $timeslot[$c], $loc[$c], $pat_n[$c], $pat_s[$c], $schedule[$c], $c_date[$c], $pat[$c]);
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

  function makeDayAv($d, $e, $l)
  {
    require 'dbconn.php';

    try
    {
      $s = "INSERT INTO `schedule`(`available_date`, `available`, `timeslotID`, `employeeID`, `practice_locationID`) VALUES ('" . $d . "', 1, 1, " . $e . ", " . $l . "), ('" . $d . "', 1, 2, " . $e . ", " . $l . "), ('" . $d . "', 1, 3, " . $e . ", " . $l . "), ('" . $d . "', 1, 4, " . $e . ", " . $l . "), ('" . $d . "', 1, 5, " . $e . ", " . $l . "), ('" . $d . "', 1, 6, " . $e . ", " . $l . "), ('" . $d . "', 1, 7, " . $e . ", " . $l . "), ('" . $d . "', 1, 8, " . $e . ", " . $l . "), ('" . $d . "', 1, 9, " . $e . ", " . $l . "), ('" . $d . "', 1, 10, " . $e . ", " . $l . ")";

      $r = $pdo->exec($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r != null)
    {
      return $r;
    }
    else
    {
      return "rows";
    }
  }

  $emp = $_SESSION['emp'];

  if (isset($_POST['month']))
  {
    $z = mktime(0, 0, 0, $_POST['month'], date("d"), date("Y"));
    echo "<h2>" . date("F 'y", $z) . "</h2>";
  }
  else
  {
    echo "<h2>" . date("F 'y") . "</h2>";
  }

  if (isset($_POST['makeDayAv']))
  {
    //echo var_dump($_POST['makeDayAv'], $emp->id, $emp->location);
    $makeDayAv = makeDayAv($_POST['makeDayAv'], $emp->id, $emp->location);
    echo var_dump($makeDayAv);

    if ($makeDayAv == "query")
    {
      $o = "There was an error making the day available, query";
    }
    else if ($makeDayAv == "rows")
    {
      $o = "There was an error making the day available";
    }
    else
    {
      header("Location: ../view_dentist_schedule/");
    }
  }

?>

<ul id="cal">
  <li>monday</li>
  <li>tuesday</li>
  <li>wednesday</li>
  <li>thursday</li>
  <li>friday</li>
  <li>saturday</li>
  <li>sunday</li>

  <?php
    if (isset($_POST['month']))
    {
      $m = $_POST['month'];
    }
    else
    {
      $m = date("m");
    }

    $first_day = mktime(0,0,0,$m, 1, date("Y"));
    $t = mktime(0,0,0,date("m", $first_day) - 1, 1, date("Y", $first_day));
    $t1 = mktime(0,0,0,date("m", $first_day) + 1, 1, date("Y", $first_day));

    $first_d = date("N", $first_day);
    $month_c = cal_days_in_month(CAL_GREGORIAN, date("m", $first_day), date("Y", $first_day));
    $month_p = cal_days_in_month(CAL_GREGORIAN, date("m", $t), date("Y", $t));
    $month_n = cal_days_in_month(CAL_GREGORIAN, date("m", $t1), date("Y", $t1));

    //echo $first_day . "\n" . date("N", $first_day) . "\n" . $month_c . "\n" . $month_p . "\n" . $month_n;
    //echo $d . "\n" . date("N", $d) . "\n" . cal_days_in_month(CAL_GREGORIAN, date("m", $d), date("Y", $d));

    if ($first_d > 1)
    {
      $c = 1;
      while ($c < $first_d)
      {
        $a = abs($month_p - $first_d + $c + 1);
        $li = date("Y-m", $first_day);
        $lid = $li . "-" . $a;
        //$lii = mktime(0,0,0, date("m", strtotime($lid)) - 1, date("d", strtotime($lid)), date("Y", strtotime($lid)));

        echo "<li id=" . $lid . "><div><p>" . $a . " " . date("M", mktime(0,0,0,$m - 1, 1, date("y"))) . "</p><br><p onclick=getWeek('" . $lid . "')>review week</p></div></li>";
        $c++;
      }

      $c1 = 1;
      while ($c1 < $month_c + 1)
      {
        $b = abs(($month_c - $c1 + 1) - $month_c - 1);
        $li = date("Y-m", $first_day);
        $lid = $li . "-" . $b;
        $lid = date("Y-m-d", strtotime($lid));

        $app = loadShed($lid, NULL);

        if ($app == "query")
        {
          
        }
        else if ($app == "rows")
        {
          $appAlt = loadShedAlt($lid);

          $aa = $appAlt[0];
          //$o = var_dump($appAlt);
          if ($aa == 0)
          {
            echo "<li id=" . $lid . "><div><p onclick=getWeek('" . $lid . "')>" . $b . " " . date("M", strtotime($lid)) . "</p><p>not in</p><p><a onclick=makeDayUnav('" . $lid . "')><br></a></p></div></li>";
          }
          else
          {
            echo "<li id=" . $lid . "><div><p onclick=getWeek('" . $lid . "')>" . $b . " " . date("M", strtotime($lid)) . "</p><p><br></p><p><a onclick=makeDayUnav('" . $lid . "')>no app</a></p></div></li>";
          }
          
        }
        else
        {
          $app = count($app);
          echo "<li id=" . $lid . "><div><p onclick=getWeek('" . $lid . "')>" . $b . " " . date("M", strtotime($lid)) . "</p><br><p onclick=getWeek('" . $lid . "')>" . $app . " app</p></div></li>";
        }

        //echo "<li id=" . $lid . ">" . $b . "</li>";
        $c1++;
      }

      $c2 = 1;
      if ($first_d + $month_c < 37)
      {
        while ($c2 < 37 - $first_d - $month_c)
        {
          echo "<li id=" . $lid . "><div><p>" . $c2 . " " . date("M", mktime(0,0,0,$m + 1, 1, date("y"))) . "</p><br><p><br></p></div></li>";
          $c2++;
        }
      }
    }
    else
    {
      $c = 1;
      while ($c < $month_c + 1)
      {
        $a = abs(($month_c - $c) - $month_c);
        $li = date("Y-m", $first_day);
        $lid = $li . "-" . $a;

        $app = loadShed($lid, NULL);

        if ($app === false)
        {
          $app = 0;
        }
        else
        {
          $app = count($app);
        }

        echo "<li id=" . $lid . ">" . $a . "<div><p>" . $app . "/10</p></div></li>";
        $c++;
      }

      $c1 = 1;
      if ($month_c < 37)
      {
        while ($c1 < 37 - $month_c - 1)
        {
          echo "<li>" . $c1 . "</li>";
          $c1++;
        }
      }
    }
  ?>

  <div class="clear"></div>
</ul>