<?php

  require '../../../inc/dbconn.php';
  require '../../../inc/class.php';  

   $id = $_GET["idNum"];
   $s  = "SELECT type_medical_aid.id, type_medical_aid.description, medical_aid.name, medical_aid.email, medical_aid.telephone, medical_aid.fax,
          address_postal.number as addPNumber, address_postal.street as addPStreet, address_postal.suburb as addPSuburb, address_postal.postal_code as addPPostalCode, city.description as addPCity,
          address_pyhsical.number as addNumber, address_pyhsical.street as addStreet, address_pyhsical.suburb as addSuburb, address_pyhsical.postal_code as addPostalCode, city.description as addCity
          from type_medical_aid
          join address_pyhsical on medical_aid.address_physicalID = address_pyhsical.id
          join address_postal on medical_aid.address_postalID = address_postal.id
          join medical_aid on type_medical_aid.medical_aidID = medical_aid.id
          join city on address_pyhsical.cityID = city.id
          join city cu on address_postal.cityID = cu.id
          order by type_medical_aid.id";
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
        /*$id[$c] = $row['id'];
        $desc[$c] = $row['description'];
        $name[$c] = $row['name'];
        $email[$c] = $row['email'];
        $tell[$c] = $row['telephone'];
        $fax[$c] = $row['fax'];
        $physical[$c] = $row['address_physicalID'];
        $postal[$c] = $row['address_postalID'];*/

        //$med = new MedicalAid($id[$c], $desc[$c], $name[$c], $email[$c], $tell[$c], $fax[$c], $physical[$c], $postal[$c]);
        $med = new MedicalAid($row['id'], $row['description'], $row['name'], $row['email'], $row['telephone'], $row['fax'], $row['address_physicalID'], $row['address_postalID']);
        $mList[$c] = $med;

        $c++;
      }
      
      return $mList;
    }
    else
    {
      return "rows";
    }

?>