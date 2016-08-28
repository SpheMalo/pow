<?php

    require "../../inc/dbconn.php";
    $doctorName = $_REQUEST['doctorName'];
    $doctorId=0;
    if (isset($doctorName)) {

        if ($doctorName == "Dr J.P. Maponya") {
            $doctorId=1;
        }
        else {
            $doctorId=2;
        }


        /*$sql = "select * from consultation where employeeID = ".$doctorId
            ." join schedule on consultation.scheduleID=schedule.scheduleID"
        ." join patient on consultation.patientID=patient.patientID"
        ." join type_booking on consultation.booking_typeID=type_booking.id";*/

        $sql = "select * from employee";
        try
        {
            $r = $pdo->query($sql);
        }
        catch(PDOException $e)
        {
            $o = "unable to retrieve employee username" . $e;
            echo $o;
        }

        if (isset($r) && $r->rowCount() > 0){
            echo $r->fetch();
        }
        else {
            echo "napped";
        }


    }
?>