<?php

    require '../../../inc/dbconn.php';
    require '../../../inc/class.php';

    $id = $_GET["idNum"];
    $s = "SELECT employee.id, title.description as title, name, surname, username, status, `img`, gender.description as gender, type_employee.description, practice_location.description as practice_loc,  id_number, banking_details, cellphone, email, telephone,
              address_postal.number as addPNumber, address_postal.street as addPStreet, address_postal.suburb as addPSuburb, address_postal.postal_code as addPPostalCode, city.description as addPCity,
              address_pyhsical.number as addNumber, address_pyhsical.street as addStreet, address_pyhsical.suburb as addSuburb, address_pyhsical.postal_code as addPostalCode, city.description as addCity 
              from employee 
              join title on employee.titleID = title.id 
              join gender on employee.genderID = gender.id 
              join type_employee on employee.employee_typeID = type_employee.id 
              join practice_location on employee.practice_locationID = practice_location.id 
              join address_pyhsical on employee.address_physicalID = address_pyhsical.id
              join address_postal on employee.address_postalID = address_postal.id
              join city on address_pyhsical.cityID = city.id
              join city cu on address_postal.cityID = cu.id
              where employee.id = $id
              order by id";
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
            $title[$c] = $row['title'];
            $name[$c] = $row['name'];
            $surname[$c] = $row['surname'];
            $username[$c] = $row['username'];
            $gender[$c] = $row['gender'];
            $type[$c] = $row['description'];
            $loc[$c] = $row['practice_loc'];
            $idnum[$c] = $row['id_number'];
            $bank[$c] = $row['banking_details'];
            $cell[$c] = $row['cellphone'];
            $email[$c] = $row['email'];
            $physical[$c] = $row['addNumber'].'_'.$row['addStreet'].'_'.$row['addSuburb'].'_'.$row['addCity'].'_'.$row['addPostalCode'];
            $postal[$c] = $row['addPNumber'].'_'.$row['addPStreet'].'_'.$row['addPSuburb'].'_'.$row['addPCity'].'_'.$row['addPPostalCode'];
            $tel[$c] = $row['telephone'];
            $status[$c] = $row['status'];
            $img[$c] = $row['img'];

            $emp = new Employee($id[$c], $title[$c], $name[$c], $surname[$c], $username[$c], $gender[$c], $type[$c], $loc[$c], $idnum[$c], $bank[$c], $cell[$c], $email[$c], $postal[$c], $tel[$c], $physical[$c], $status[$c], $img[$c]);
            $eList[] = $emp;
            $c = $c + 1;
        }

        echo json_encode($eList);
    }
    else
    {
        return "rows";
    }
?>