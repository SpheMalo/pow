<?php

    require '../../../inc/dbconn.php';
    require '../../../inc/class.php';
    $idNum = $_REQUEST['idNum'];

    $sql = "select id_number, name, surname, medical_aid_typeID from patient where medical_aid_typeID is null or medical_aid_typeID is not null";

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
             $id[$count] = new Patient($row['id_number'], "", $row['name'], $row['surname'], "","" ,"" ,"" ,"" ,"" ,"" ,$row['ma_name']);
            $count++;
         }
     }
 
    echo json_encode($id);
?>