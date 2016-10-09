<?php
 
  require '../../inc/dbconn.php';
  require '../../inc/class.php';  
 
 $id = $_GET["idNum"];
 $s = "SELECT `patient`.`id`, `name`, `surname`, `id_number`, `dob`, `telephone`, `cellphone`, `email`, `img`, `file_number`, patient.medical_aidID, `title`.description as title, `gender`.description as gender, 
       address_postal.number as addPNumber, address_postal.street as addPStreet, address_postal.suburb as addPSuburb, address_postal.postal_code as addPPostalCode, city.description as addPCity,
       address_pyhsical.number as addNumber, address_pyhsical.street as addStreet, address_pyhsical.suburb as addSuburb, address_pyhsical.postal_code as addPostalCode, city.description as addCity, 
       type_medical_aid.description as med, `member_typeID` 
       FROM `patient` 
       join `title` on `patient`.titleID = `title`.id 
       join `gender` on `patient`.genderID = `gender`.id 
       join type_medical_aid on patient.medical_aid_typeID = type_medical_aid.id 
       join address_pyhsical on patient.address_physicalID = address_pyhsical.id
       join address_postal on patient.address_postalID = address_postal.id
       join city on address_pyhsical.cityID = city.id
       join city cu on address_postal.cityID = cu.id
       WHERE patient.id =  $id 
       order by patient.id";

    try
    {
      $r = $pdo->query($s);
    }
    catch (PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch()) 
      {
        $id[$c] = $row['id'];
        $title[$c] = $row['title'];
        $name[$c] = $row['name'];
        $surname[$c] = $row['surname'];
        $gender[$c] = $row['gender'];
        $id_num[$c] = $row['id_number'];
        $dob[$c] = $row['dob'];
        $email[$c] = $row['email'];
        $img[$c] = $row['img'];
        $file[$c] = $row['file_number'];
        $tell[$c] = $row['telephone'];
        $cell[$c] = $row['cellphone'];
        $physical[$c] = $row['addNumber'].'_'.$row['addStreet'].'_'.$row['addSuburb'].'_'.$row['addCity'].'_'.$row['addPostalCode'];
        $postal[$c] = $row['addPNumber'].'_'.$row['addPStreet'].'_'.$row['addPSuburb'].'_'.$row['addPCity'].'_'.$row['addPPostalCode'];
        $med_type[$c] = $row['med'];
        $mem_type[$c] = $row['member_typeID']; 

        $pat = new Patient($id[$c], $title[$c], $name[$c], $surname[$c], $gender[$c], $id_num[$c], $dob[$c], $email[$c], $img[$c], $file[$c], $tell[$c], $cell[$c], $physical[$c], $postal[$c], $med_type[$c], $mem_type[$c]);
        $pList[] = $pat;

        $c = $c + 1;
      }
      
      echo json_encode($pList);
    }
    else
    {
      return "rows";
    }
?>