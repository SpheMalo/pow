<ul id="cal">
  <li>monday</li>
  <li>tuesday</li>
  <li>wednesday</li>
  <li>thursday</li>
  <li>friday</li>
  <li>saturday</li>
  <li>sunday</li>

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
        $s = "select * from consultation where scheduleID = " . $id;
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
          $booking_type[] = $row['booking_type'];
          $employee[] = $row['employeeID'];
          $timeslot[] = $row['timeslotID'];
          $location[] = $row['practice_locationID'];
          $patient[] = $row['patientID'];
          $schedule[] = $row['scheduleID'];
          $empType[] = $row['empoyee_typeID'];

          $con = new Consultation($id, $notes, $status, $booking_type, $employee, $timeslot, $practice_location, $patient, $schedule, $emp_type);
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

        echo "<li id=" . $lid . ">" . $a . "</li>";
        $c++;
      }

      $c1 = 1;
      while ($c1 < $month_c + 1)
      {
        $b = abs(($month_c - $c1 + 1) - $month_c - 1);
        $li = date("Y-m", $first_day);
        $lid = $li . "-" . $b;

        echo "<li id=" . $lid . ">" . $b . "</li>";
        $c1++;
      }

      $c2 = 1;
      if ($first_d + $month_c < 37)
      {
        while ($c2 < 37 - $first_d - $month_c)
        {
          echo "<li>" . $c2 . "</li>";
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

        echo "<li id=" . $lid . ">" . $a . "<div><p>" . count($app) . "/10</p></div></li>";
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