<?php

    require '../../../inc/dbconn.php';
    require '../../../inc/class.php';

    $id = $_GET["idNum"];
    $s = "SELECT supplier.id, `name`, `contact_person`, `email`, `telephone`, `fax`,  address_pyhsical.number as addNumber, address_pyhsical.street as addStreet, address_pyhsical.suburb as addSuburb, address_pyhsical.postal_code as addPostalCode, city.description as addCity, `status`, `bank_name`, `branch_name`, `branch_number`, `account_number`, `bank_reference` 
    FROM `supplier`
    JOIN address_pyhsical on supplier.address_physical = address_pyhsical.id
    JOIN city on address_pyhsical.cityID = city.id
    where supplier.id = $id
    ORDER BY id";
    //$s = "select * from supplier where id = ". $id;
    
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
        $id[$c] = $row['id'];
        $name[$c] = $row['name'];
        $contactPerson[$c] = $row['contact_person'];
        $email[$c] = $row['email'];
        $telephone[$c] = $row['telephone'];
        $fax[$c] = $row['fax'];
        $physical[$c] = $row['addNumber'].'_'.$row['addStreet'].'_'.$row['addSuburb'].'_'.$row['addCity'].'_'.$row['addPostalCode'];
        $bank[$c] = $row['bank_name'];
        $branchN[$c] = $row['branch_name'];
        $branchC[$c] = $row['branch_number'];
        $accNum[$c] = $row['account_number'];
        $ref[$c] = $row['bank_reference'];
        $status[$c] = $row['status'];

        $supp = new Supplier($id[$c], $name[$c], $contactPerson[$c], $email[$c], $telephone[$c], $fax[$c], $physical[$c], $bank[$c], $branchN[$c], $branchC[$c], $accNum[$c], $ref[$c], $status[$c]);
        $sList[] = $supp;

        $c = $c + 1;
      }

      echo json_encode($sList);
    }
    else
    {
      return "rows";
    }
?>