<?php

    require "../../inc/dbconn.php";
    $doctorName = $_REQUEST['doctorName'];
    $doctorId = $doctorName;
echo $doctorName;
  if (isset($doctorName)) {
//
//        if ($doctorName == "Dr J.P. Maponya") {
//            $doctorId=1;
//        }
//        else {
//            $doctorId=2;
//        }


        $sql = "select schedule.available_date as appointment_date, timeslot.description as appointment_time, 
                employee.name as empl_name, employee.surname as empl_surname, patient.name as patient_name, 
                type_booking.description as booking_type 
                from consultation 
                join schedule on consultation.scheduleID=schedule.id 
                join employee on consultation.employeeID=employee.id 
                join patient on consultation.patientID=patient.id 
                join type_booking on consultation.booking_typeID=type_booking.id 
                join timeslot on consultation.timeslotID=timeslot.id 
                where consultation.employeeID = ".$doctorId;

        try
        {
            $r = $pdo->query($sql);
        }
        catch(PDOException $e)
        {
            $o = "unable to retrieve employee username" . $e;
            echo "Exception: ".$o;
        }

        $bookings = array();
        $count = 0;
        if ($r->rowCount() > 0){
            while($row = $r->fetch()) {
                $bookings[$count]["appointment_date"] = $row['appointment_date'];
                $bookings[$count]["appointment_time"] = $row['appointment_time'];
                $bookings[$count]["empl_name"] = $row['empl_name'];
                $bookings[$count]["empl_surname"] = $row['empl_surname'];
                $bookings[$count]["patient_name"] = $row['patient_name'];
                $bookings[$count]["booking_type"] = $row['booking_type'];
                $count++;
            }
            echo json_encode($bookings);
        }
        else {
            echo false;
        }


    }
?>