<?php

    require '../../../inc/dbconn.php';
    require '../../../inc/class.php';
    $idNum = $_REQUEST['idNum'];

    $sql = "select patient.id_number, patient.name, patient.surname, type_medical_aid.description as ma_name from patient join type_medical_aid on patient.medical_aid_typeID=type_medical_aid.id";

     try
     {
         $r = $pdo->query($sql);
     }
     catch(PDOException $e)
     {
         $o = "unable to retrieve employee username" . $e;
         return false;
     }


    $count = 0;
     if ($r->rowCount() > 0) {
         while ($row = $r->fetch()) {
             $id[$count] = new Patient($row['id_number'], "", $row['name'], $row['surname'], "","" ,"" ,"" ,"" ,"" ,"" ,"","","",$row['ma_name'],"");
            $count++;
         }
     }

    echo json_encode($id);
?>