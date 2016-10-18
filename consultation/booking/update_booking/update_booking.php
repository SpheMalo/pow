<?php
    require '../../../inc/func.php';
    require '../../../inc/dbconn.php';

    $idNum = $_REQUEST['idNum'];

    //$sql = "select * from patient where medical_aid_typeID is null or medical_aid_typeID is not null";

    $sql = "SELECT `consultation`.id, consultation.status, patient.id_number as patientId, patient.name as patientName, patient.surname as patientSurname,
            employee.name as empName, employee.surname as empSurname, practice_location.description as pracLoc, type_booking.description as bookingType,
            schedule.available_date as bDate, timeslot.description as btimeSlot
              FROM `consultation`
              join patient on consultation.patientID = patient.id
              join employee on consultation.employeeID = employee.id
              join practice_location on consultation.practice_locationID = practice_location.id
              join type_booking on consultation.booking_typeID = type_booking.id
              join `schedule` on consultation.scheduleID = schedule.id
              join timeslot on consultation.timeslotID = timeslot.id
              WHERE consultation.id = $idNum 
              ORDER BY `consultation`.id";
            
     try
     {
         $r = $pdo->query($sql);
     }
     catch(PDOException $e)
     {
         $o = "unable to retrieve employee username" . $e;
         return false;
     }

    if ($r->rowCount() > 0)
    {
        $c = 0;
        while ($row = $r->fetch())
        {
            $id[$c] = $row['id'];
            $status[$c] = $row['status'];
            $book_type[$c] = $row['bookingType'];
            $employee[$c] = $row['empName'].'_'.$row['empSurname'];
            $location[$c] = $row['pracLoc'];
            $pat[$c] = $row['patientId'];
            $pat_name[$c] = $row['patientName'];
            $pat_sur[$c] = $row['patientSurname'];
            $schedule[$c] = $row['bDate'];
            $timeslot[$c] = $row['btimeSlot'];
            $c_date[$c] = $row['bDate'];

            $ids[$c] = new Consultation($id[$c],"",$status[$c], $book_type[$c], $employee[$c], $timeslot[$c], $location[$c], $pat_name[$c], $pat_sur[$c], $schedule[$c], $c_date[$c], $pat[$c]);
            $c++;
        }

        echo json_encode($ids);
    }
?>