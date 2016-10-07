<?php
    require '../../../inc/func.php';
    require '../../../inc/dbconn.php';
    //$idNum = $_REQUEST['idNum'];

    $sql = "select * from patient where
     medical_aid_typeID is null or medical_aid_typeID is not null";

     try
     {
         $r = $pdo->query($sql);
     }
     catch(PDOException $e)
     {
         $o = "unable to retrieve employee username" . $e;
         return false;
     }


    $c = 0;
     if ($r->rowCount() > 0) {
         while ($row = $r->fetch()) {
             $id[$c] = $row['id'];
            $title[$c] = $row['titleID'];
            $name[$c] = $row['name'];
            $surname[$c] = $row['surname'];
            $gender[$c] = $row['genderID'];
            $id_num[$c] = $row['id_number'];
            $dob[$c] = $row['dob'];
            $email[$c] = $row['email'];
            $img[$c] = $row['img'];
            $file[$c] = $row['file_number'];
            $tell[$c] = $row['telephone'];
            $cell[$c] = $row['cellphone'];
            $physical[$c] = $row['address_physicalID'];
            $postal[$c] = $row['address_postalID'];
            $med_type[$c] = $row['medical_aid_typeID'];
            $mem_type[$c] = $row['member_typeID']; 

            $id[$c] = new Patient($id[$c], $title[$c], $name[$c], $surname[$c], $gender[$c], $id_num[$c], $dob[$c], $email[$c], $img[$c], $file[$c], $tell[$c], $cell[$c], $physical[$c], $postal[$c], $med_type[$c], $mem_type[$c]);
             //$id[$count] = new Patient($row['id_number'], "", $row['name'], $row['surname'], "","" ,"" ,"" ,"" ,"" ,"" ,$row['ma_name']);
            $c++;
         }
     } 
 
    echo json_encode($id);
?>