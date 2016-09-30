<?php
  require 'class.php';
  //require 'dbconn.php';

  function auditlog($trans_date, $trans_time, $process, $v_old, $v_new, $emp)
  {
    require 'dbconn.php';

    try
    {
      $s = "insert into audit_log (trans_date, trans_time, process, v_old, v_new, employeeID) values ('" . date("Y-m-d") . "', '" . date("h:i:s") . "', '" . $process . "', '" . $v_old . "', '" . $v_new . "', '" . $emp . "')";
      $r = $pdo->exec($s);
    }
    catch(PDOException $e)
    {
      return false;
    }

    if ($r > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function login($user, $pass)
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select employee.id, titleID, name, surname, username, password, genderID, employee_typeID, practice_locationID from employee join title on employee.titleID = title.id join gender on employee.genderID = gender.id join type_employee on employee.employee_typeID = type_employee.id where username = '" . $user . "'";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "server";
    }
    
    if ($r->rowCount() > 0)
    {
      while ($row = $r->fetch())
      {
        $id[] = $row['id'];
        $title[] = $row['titleID'];
        $name[] = $row['name'];
        $surname[] = $row['surname'];
        $username[] = $row['username'];
        $p[] = $row['password'];
        $gender[] = $row['genderID'];
        $type[] = $row['employee_typeID'];
        $loc[] = $row['practice_locationID'];
      }

      if (password_verify($pass, $p[0]))
      {
        $emp = new Employee($id[0], $title[0], $name[0], $surname[0], $username[0], $gender[0], $type[0], $loc[0]);

        return $emp;
      }
      else
      {
        return "pass";
      }
    }
    else
    {
      $o = "user";
      return $o;
    }
    
  }

  function loadTitleList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from title";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve title list" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $tList[] = array(
          'id' => $row['id'],
          'desc' => $row['description']);
      }
      
      return $tList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function loadPracticeLocList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from practice_location";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve practice location list" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $pList[] = array(
          'id' => $row['id'],
          'desc' => $row['description']);
      }
      
      return $pList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function loadGenderList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from gender";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve gender list" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $gList[] = array(
          'id' => $row['id'],
          'desc' => $row['description']);
      }
      
      return $gList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function loadStatusList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from type_employee";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve status list" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $gList[] = array(
          'id' => $row['id'],
          'desc' => $row['description']);
      }
      
      return $gList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function loadCityList()
  {
    require 'dbconn.php';

    try
    {
      $s = "select id, description from city";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $c[] = array(
          'id' => $row['id'],
          'desc' => $row['description']
        ); 
      }

      return $c;
    }
    else
    {
      return "rows";
    }
  }

  function loadIdList($something)
  {
    require 'dbconn.php';

    $s = "select id_number from patient";

    if ($something != null)
    {
      $s = "SELECT `id_number` FROM `patient` join type_member on `patient`.`member_typeID` = type_member.id WHERE type_member.patient_typeID = 1";
    }

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
      foreach ($r as $row)
      {
        $iList[] = $row['id_number'];
      }

      return $iList;
    }
    else
    {
      return "rows";
    }
  }

  function addAddresses($postal, $physical)
  {
    require 'dbconn.php';
    $o[] = array(
      'postal' => null,
      'physical' => null
    );

    if ($postal != null)
    {
      try
      {
        $s1 = "insert into address_postal(number, street, suburb, postal_code, cityID) values ('" . $postal[0]['number'] . "', '" . $postal[0]['street'] . "', '" . $postal[0]['suburb'] . "', " . $postal[0]['code'] . ", " . $postal[0]['city'] . ")";
        $r1 = $pdo->exec($s1);
      }
      catch(PDOException $e)
      {}

      try
      {
        $s2 = "select id from address_postal where number = '" . $postal[0]['number'] . "' and street = '" . $postal[0]['street'] . "' and suburb = '" . $postal[0]['suburb'] . "' and postal_code = " . $postal[0]['code'] . " and cityID = " . $postal[0]['city'];
        $r11 = $pdo->query($s2);
      }
      catch(PDOException $e)
      {}

      if ($r11->rowCount() > 0)
      {
        while ($row = $r11->fetch())
        {
          $o[0]['postal'] = $row['id'];
        }
      }
    }

    if ($physical != null)
    {
      try
      {
        $s3 = "insert into `address_pyhsical`(`number`, `street`, `suburb`, `postal_code`, `cityID`) values ('" . $physical[0]['number'] . "', '" . $physical[0]['street'] . "', '" . $physical[0]['suburb'] . "', " . $physical[0]['code'] . ", " . $physical[0]['city'] . ")";
        $r2 = $pdo->exec($s3);
      }
      catch(PDOException $e)
      {}

      try
      {
        $s4 = "select id from `address_pyhsical` where number = '" . $physical[0]['number'] . "' and street = '" . $physical[0]['street'] . "' and suburb = '" . $physical[0]['suburb'] . "' and postal_code = " . $physical[0]['code'] . " and cityID = " . $physical[0]['city'];
        $r21 = $pdo->query($s4);
      }
      catch(PDOException $e)
      {}

      if ($r21->rowCount() > 0)
      {
        while ($row = $r21->fetch())
        {
          $o[0]['physical'] = $row['id'];
        }
      }
    }

    return $o;
  }

  function loadAddressesString($postal, $physical)
  {
    require 'dbconn.php';

    try
    {
      $s = "SELECT `address_postal`.id, number, street, suburb, postal_code, `city`.description as city FROM `address_postal` join `city` on `address_postal`.cityID = `city`.id where `address_postal`.id = " . $postal;
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $out = "query1";
    }

    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $z = $row['number'] . " " . $row['street'] . ", " . $row['suburb'] . ", " . $row['city']  . " " . $row['postal_code'];
        $o[] = $z;
      }
    }
    else
    {
      $out = "rows1";
    }

    try
    {
      $s1 = "SELECT `address_postal`.id, number, street, suburb, postal_code, `city`.description as city FROM `address_postal` join `city` on `address_postal`.cityID = `city`.id where `address_postal`.id = " . $postal;
      $r1 = $pdo->query($s1);
    }
    catch(PDOException $e)
    {
      $out = "query2";
    }

    if ($r1->rowCount() > 0)
    {
      foreach ($r1 as $row)
      {
        $z1 = $row['number'] . " " . $row['street'] . ", " . $row['suburb'] . ", " . $row['city']  . " " . $row['postal_code'];
        $o[] = $z1;
      }
    }
    else
    {
      $out = "rows2";
    }

    if (isset($out))
    {
      if ($out == "query1" || $out == "query1")
      {
        return "query";
      }
      else if ($out == "rows1" || $out == "rows2")
      {
        return "rows";
      }
    }
    else
    {
      return $o;
    }

    //$ar = array("address_postal", "address_physical");
    //$arr = array($postal, $physical);
    /*$arr[] = array(
      'd' => 'address_postal',
      'i' => $postal);

    $arr[] = array(
      'd' => 'address_physical',
      'i' => $physical);*/

    /*$c = 0;
    foreach ($ar as $a)
    {
      try
      {
        $s[$c] = "SELECT `" . $a[$c] . "`.id, number, street, suburb, postal_code, `city`.description as city FROM `" . $a[$c] . "` join `city` on `" . $a[$c] . "`.cityID = `city`.id where `" . $a[$c] . "`.id = " .$arr[$c];
        $r = $pdo->query($s[$c]);
      }
      catch(PDOException $e)
      {
        $out = "query";
      }

      if ($r != null)
      {
        foreach ($r as $row)
        {
          $z = $row['number'] . " " . $row['street'] . ", " . $row['suburb'] . ", " . $row['city']  . " " . $row['postal_code'];
          $o[] = $z;
        }

      }
      else
      {
        $out = "rows";
      }

      $c++;
    }*/


  }

  function loadEmpList($id, $q)
  {
    require 'dbconn.php';
    
    $s = "select employee.id, title.description as title, name, surname, username, gender.description as gender, type_employee.description, practice_location.description as practice_location from employee join title on employee.titleID = title.id join gender on employee.genderID = gender.id join type_employee on employee.employee_typeID = type_employee.id join practice_location on employee.practice_locationID = practice_location.id order by id";
    
    if ($id != null && $q == null)
    {
      $s = "select * from employee where employee.id = " . $id;
      $t = " ";
    }

    if ($id == null && $q != null)
    {
      $s = "select employee.id, title.description as title, name, surname, username, gender.description as gender, type_employee.description, practice_location.description as practice_location from employee join title on employee.titleID = title.id join gender on employee.genderID = gender.id join type_employee on employee.employee_typeID = type_employee.id join practice_location on employee.practice_locationID = practice_location.id where employee.id like '%" . $q . "%' or name like '%" . $q . "%' or surname like '%" . $q . "%' or type_employee.description like '%" . $q . "%' or practice_location.description like '%" . $q . "%'";
    }
    
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
        $loc[$c] = $row['practice_location'];

        $emp = new Employee($id[$c], $title[$c], $name[$c], $surname[$c], $username[$c], $gender[$c], $type[$c], $loc[$c]);

        if (isset($t))
        {
          $idnum[$c] = $row['id_number'];
          $bank[$c] = $row['bank'];
          $cell[$c] = $row['cellphone'];
          $email[$c] = $row['email'];
          $postal[$c] = $row['address_postalID'];
          $tel[$c] = $row['telephone'];
          $physical[$c] = $row['address_physicalID'];

          $emp = $emp::loadRest($idnum[$c], $bank[$c], $cell[$c], $email[$c], $postal[$c], $tel[$c], $physical[$c]);
        }

        $eList[] = $emp;

        $c = $c + 1;
      }

      return $eList;
    }
    else
    {
      return "rows";
    }
  }

  function addEmployee($name, $surname, $id, $cell, $tell, $email, $banking, $postal, $physical, $gender, $title, $type, $loc)
  {
    require 'dbconn.php';
    
    $ruser = rand(1000, 9999);
    $rpass = rand(1000, 9999);
    
    $user = $name[0] . $name[1] . $name[2] . $ruser;
    $pas = $surname[0] . $surname[1] . $surname[2] . $rpass;
    $pass = password_hash($pas, PASSWORD_DEFAULT);

    $a = addAddresses($postal, $physical);
    $a_po = $a[0]['postal'];
    $a_ph = $a[0]['physical'];
    
    try
    {
      //$s = "insert into `employee`(`name`, `surname`, `id_number`, `username`, `password`, `cellphone`, `telephone`, `email`, `status`, `banking_details`, `address_postalID`, `address_physicalID`, `genderID`, `titleID`, `employee_typeID`) values ('" . $name . "', '" . $surname . "', " . $id . ", '" . $user . "', '" . $pass . "', " . $cell . ", " . $tell . ", '" . $email . "', 'active', '" . $banking . "', " . $a_po . ", " . $a_ph . ", " . $gender . ", " . $title . ", " . $type . ")";
      $s = "INSERT INTO `employee`(`name`, `surname`, `id_number`, `username`, `password`, `cellphone`, `telephone`, `email`, `status`, `banking_details`, `address_postalID`, `address_physicalID`, `genderID`, `titleID`, `employee_typeID`, `practice_locationID`) VALUES ('" . $name . "', '" . $surname . "', " . $id . ", '" . $user . "', '" . $pass . "', " . $cell . ", " . $tell . ", '" . $email . "', 'active', '" . $banking . "', " . $a_po . ", " . $a_ph . ", " . $gender . ", " . $title . ", " . $type . ", " . $loc . ")";
      $r = $pdo->exec($s);
    }
    catch(PDOException $e)
    {
      return false;
    }

    if ($r > 0)
    {
      return array($user, $pas);
    }
    else
    {
      return null;
    }
  }

  function updateEmployee($title, $name, $surname, $gender, $id, $banking, $cell, $tell, $email, $postal, $physical, $type, $loc)
  {
    require 'dbconn.php';
    
  }

  function loadMedList($id, $q)
  {
    require 'dbconn.php';
    
    $s  = "select type_medical_aid.id, description, medical_aid.name, medical_aid.email, medical_aid.telephone, medical_aid.fax, medical_aid.address_postalID, medical_aid.address_physicalID from type_medical_aid join medical_aid on type_medical_aid.medical_aidID = medical_aid.id";
    
    if ($id != null && $q == null)
    {
      $s  = "select type_medical_aid.id, description, medical_aid.name, medical_aid.email, medical_aid.telephone, medical_aid.fax, medical_aid.address_postalID, medical_aid.address_physicalID from type_medical_aid join medical_aid on type_medical_aid.medical_aidID = medical_aid.id where id = " . $id;
    }

    if ($id == null && $q != null)
    {
      $s  = "select type_medical_aid.id, description, medical_aid.name, medical_aid.email, medical_aid.telephone, medical_aid.fax, medical_aid.address_postalID, medical_aid.address_physicalID from type_medical_aid join medical_aid on type_medical_aid.medical_aidID = medical_aid.id where type_medical_aid.id like '%" . $q . "%' or description like '%" . $q . "%' or name like '%" . $q . "%' or email like '%" . $q . "%' or telephone like '%" . $q . "%' or fax like '%" . $q . "%' or address_postalID like '%" . $q . "%' or address_physicalID like '%" . $q . "%'";
    }
  
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
  }

  function loadMedListS()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select type_medical_aid.id, description, medical_aid.name from type_medical_aid join medical_aid on type_medical_aid.medical_aidID = medical_aid.id order by description";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve medical aid list" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $mList[] = array(
          'id' => $row['id'],
          'desc' => $row['description'],
          'name' => $row['name']);
      }
      
      return $mList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function addMed($name, $postal, $physical, $tell, $fax, $email, $types)
  {
    require 'dbconn.php';

    $a = addAddresses($postal, $physical);
    $a_po = $a[0]['postal'];
    $a_ph = $a[0]['physical'];

    try
    {
      $s = "INSERT INTO `medical_aid`(`name`, `email`, `telephone`, `fax`, `address_postalID`, `address_physicalID`) VALUES ('" . $name . "', '" . $email . "', " . $tell . ", '" . $fax . "', " . $a_po . ", " . $a_ph . ")";
      $r = $pdo->exec($s);
    }
    catch (PDOException $e)
    {
      return "query";
    }

    if ($r > 0)
    {
      try
      {
        $s1 = "select id from medical_aid where name = '" . $name . "' and email = '" . $email . "' and telephone = " . $tell . " and fax = " . $fax . " and  address_physicalID = " . $a_ph . " and address_postalID = " . $a_po . " order by id desc";
        $r1 = $pdo->query($s1);
      }
      catch(PDOException $e)
      {
        return "row";
      }

      if ($r1->rowCount() > 0)
      {
        while ($row = $r1->fetch())
        {
          $med = $row['id'];
        }

        $med_types = addMedType($types, $med);
        return $med_types;
      }
      else
      {
        return "row";
      }
    }
    else
    {
      return "result";
    }
  }

  function addMedType($desc, $med)
  {
    require 'dbconn.php';
    
    $z = "";
    $c = 0;
    foreach($desc as $d)
    {
      try
      {
        $s = "INSERT INTO `type_medical_aid`(`description`, `medical_aidID`) VALUES ('" . $d . "', " . $med . ")";
        $r = $pdo->exec($s);
      }
      catch(PDOException $e)
      {
        $fails[] = $c;
      }

      if ($r > 0)
      {
        $passes[] = $c;
      }

      $c++;
    } 

    if (!isset($fails))
    {
      $fails = null;
    }

    if (!isset($passes))
    {
      $passes = null;
    }

    $o = array($fails, $passes);
    return $o;
  }

  function loadPatList($id, $q)
  {
    require 'dbconn.php';

    $s = "SELECT `patient`.`id`, `name`, `surname`, `id_number`, `dob`, `telephone`, `cellphone`, `email`, `img`, `file_number`, `medical_aidID`, `title`.description as title, `gender`.description as gender, `address_postalID`, `address_physicalID`, `medical_aid_typeID`, `member_typeID` FROM `patient` join `title` on `patient`.titleID = `title`.id join `gender` on `patient`.genderID = `gender`.id ";

   if ($id != null && $q == null)
    {
       $s = "select * from patient where id = " . $id;
    }

    if ($id == null && $q != null)
    {
      $s = "SELECT `patient`.`id`, `name`, `surname`, `id_number`, `dob`, `telephone`, `cellphone`, `email`, `img`, `file_number`, `medical_aidID`, `title`.description as title, `gender`.description as gender, `address_postalID`, `address_physicalID`, `medical_aid_typeID`, `member_typeID` FROM `patient` join `title` on `patient`.titleID = `title`.id join `gender` on `patient`.genderID = `gender`.id where `patient`.id like '%" . $q . "%' or dob like '%" . $q . "%' or name like '%" . $q . "%' or surname like '%" . $q . "%' or gender.description like '%" . $q . "%' or id_number like '%" . $q . "%' or email like '%" . $q . "%' or cellphone like '%" . $q . "%' or telephone like '%" . $q . "%'";
    }

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
        $physical[$c] = $row['address_physicalID'];
        $postal[$c] = $row['address_postalID'];
        $med_type[$c] = $row['medical_aid_typeID'];
        $mem_type[$c] = $row['member_typeID']; 

        $pat = new Patient($id[$c], $title[$c], $name[$c], $surname[$c], $gender[$c], $id_num[$c], $dob[$c], $email[$c], $img[$c], $file[$c], $tell[$c], $cell[$c], $physical[$c], $postal[$c], $med_type[$c], $mem_type[$c]);
        $pList[] = $pat;

        $c = $c + 1;
      }
      
      return $pList;
    }
    else
    {
      return "rows";
    }
  }

  function checkFileNo($f_n)
  {
    require 'dbconn.php';

    try
    {
      $s = "select file_number from patient";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      foreach($r as $row)
      {
        if ($row['file_number'] === $f_n)
        {
          $a = " ";
        }
      }
    }
    else
    {
      return "rows";
    }

    if (isset($a))
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  function genFileNo()
  {
    $f_n = "f-" . rand(10000, 99999);

    if (checkFileNo($f_n))
    {
      return $f_n;
    }
    /*if (checkFileNo($f_n) == false)
    {
      genFileNo();
    }
    else if (checkFileNo($f_n) == "query")
    {
      return "query";
    }*/
    else if (checkFileNo($f_n) == "rows")
    {
      return $f_n;
    }
    else
    {
      genFileNo();
    }
  }

  function checkMemberNo($m_n)
  {
    require 'dbconn.php';

    try
    {
      $s = "select code from type_member";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      foreach($r as $row)
      {
        if ($row['code'] === $m_n)
        {
          $a = " ";
        }
      }
    }
    else
    {
      return "rows";
    }

    if (isset($a))
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  function genMemberNo()
  {
    $m_n = rand(10000, 99999);

    if (checkMemberNo($m_n))
    {
      return $m_n;
    }
    /*if (checkFileNo($f_n) == false)
    {
      genFileNo();
    }
    else if (checkFileNo($f_n) == "query")
    {
      return "query";
    }*/
    else if (checkFileNo($m_n) == "rows")
    {
      return $m_n;
    }
    else
    {
      checkMemberNo();
    }
  }

  function loadMemberTypeCode($id)
  {
    require 'dbconn.php';

    try
    {
      $s = "select member_typeID from patient where id_number = '" . $id . "'";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return "query";
    }

    if ($r->rowCount() > 0)
    {
      foreach($r as $row)
      {
        $m_t_i = $row['member_typeID'];
      }

      try
      {
        $s1 = "select `code` from type_member where id = " . $m_t_i . " and patient_typeID = 1";
        $r1 = $pdo->query($s1);
      }
      catch(PDOException $e)
      {
        return "query1";
      }

      if ($r1->rowCount() > 0)
      {
        foreach($r1 as $row)
        {
          $m_m_c = $row['code'];
        }

        return $m_m_c;
      }
      else
      {
        return "rows1";  
      }
    }
    else
    {
      return "rows";
    }
  }

  function addMemberType($standing, $medical_m_i)
  {
    require 'dbconn.php';

    if ($standing == null)
    {
      if ($medical_m_i == null)
      {
        return "e_mainMember";
      }
      else
      {
        $m_m_c = loadMemberTypeCode($medical_m_i);
        if ($m_m_c == "query" || $m_m_c == "query1")
        {
          return "e_loadMemberTypeCode_query";
        }
        else if ($m_m_c == "rows" || $m_m_c == "rows1")
        {
          return "e_loadMemberTypeCode_rows";
        }
        else
        {
          try
          {
            $s = "INSERT INTO `type_member`(`code`, `patient_typeID`) VALUES ('" . $m_m_c . "', 2)";
            $r = $pdo->exec($s);
          }
          catch(PDOException $e)
          {
            return "query";
          }

          if ($r > 0)
          {
            try
            {
              $s1 = "select id from type_member where code = '" . $m_m_c . "' and patient_typeID = 2";
              $r1 = $pdo->query($s1);
            }
            catch(PDOException $e)
            {
              return "query1";
            }

            if ($r1->rowCount() > 0)
            {
              foreach ($r1 as $row)
              {
                $a = $row['id'];
              }

              return $a;
            }
            else
            {
              return "rows1";
            }
          }
          else
          {
            return "rows";
          }    
        }
      }
    }
    else
    {
      $member_no = genMemberNo();

      try
      {
        $s2 = "INSERT INTO `type_member`(`code`, `patient_typeID`) VALUES ('" . $member_no . "', 1)";
        $r2 = $pdo->exec($s2);
      }
      catch(PDOException $e)
      {
        return "query2";
      }

      if ($r2 > 0)
      {
        try
        {
          $s3 = "select id from type_member where code = '" . $member_no . "' and patient_typeID = 1";
          $r3 = $pdo->query($s3);
        }
        catch(PDOException $e)
        {
          return "query3";
        }

        if ($r3->rowCount() > 0)
        {
          foreach ($r3 as $row)
          {
            $a2 = $row['id'];
          }

          return $a2;
        }
        else
        {
          return "rows3";
        }
      }
      else
      {
        return "rows2";
      }
    }
  }

  function addPatient($name, $surname, $id, $title, $dob, $gender, $cell, $tell, $email, $physical, $postal, $medical, $standing, $medical_m_i, $img)
  {
    require 'dbconn.php';
    
    $a = addAddresses($postal, $physical);
    $a_po = $a[0]['postal'];
    $a_ph = $a[0]['physical'];

    $file = genFileNo();
  
    if ($img == NULL)
    {
      $img = "new.png";
    }

    if (!is_numeric($medical))
    {
      $medical = "NULL";
      $member_c = "NULL";
    }
    else
    {
      $member_c = addMemberType($standing, $medical_m_i);
      if ($member_c == "e_mainMember")
      {
        return "e_mainMember";
      }
      else if ($member_c == "e_loadMemberTypeCode_query")
      {
        return "e_loadMemberTypeCode_query";
      }
      else if ($member_c == "e_loadMemberTypeCode_rows")
      {
        return "e_loadMemberTypeCode_rows";
      }
      else if ($member_c == "query" || $member_c == "query1" || $member_c == "query2" || $member_c == "query3")
      {
        return "query";
      }
      else if ($member_c == "rows" || $member_c == "rows1" || $member_c == "rows2" || $member_c == "rows3")
      {
        return "rows";
      }
    }

    try
    {
      $s = "INSERT INTO `patient`(`name`, `surname`, `id_number`, `dob`, `telephone`, `cellphone`, `email`, `img`, `file_number`, `titleID`, `genderID`, `address_postalID`, `address_physicalID`, `medical_aid_typeID`, `member_typeID`) 
            VALUES ('". $name ."', '". $surname ."', '". $id ."', '". $dob ."', '". $tell ."', '". $cell ."', '". $email ."', '". $img ."', '". $file ."', ". $title .", ". $gender .", ". $a_po .", ". $a_ph .", ". $medical .", ". $member_c .")";
      $r = $pdo->exec($s);
    }
    catch(PDOException $e)
    {
      echo $e;
      return "query1";
    }

    if ($r > 0)
    {
      return true;
    }
    else
    {
      return "rows1";
    }
  }

  function loadProcList($id, $q)
  {
    require 'dbconn.php';

    $s = "select procedure.id, procedure.description, procedure.code, price, `procedure`.favorite, type_procedure.description as type_procedure 
          from `procedure` 
          join type_procedure on procedure.procedure_typeID = type_procedure.id 
          order by id ";

    if ($id != null && $q == null)
    {
       $s = "select * from procedure where procedure.id = " . $id;
    }

    if($id == null && $q != null)
    {
      $s = "select procedure.id, procedure.description, procedure.code, price, `procedure`.favorite, type_procedure.description as type_procedure 
            from `procedure` 
            join type_procedure on procedure.procedure_typeID = type_procedure.id 
            where procedure.id like '%". $q . "%' or procedure.description like '%". $q . "%' or procedure.code like '%". $q . "%' or price like '%". $q . "%' or `procedure`.favorite like '%". $q . "%' or type_procedure.description like '%". $q . "%'";
    }

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
        $desc[$c] = $row['description'];
        $code[$c] = $row['code'];
        $price[$c] = $row['price'];
        $fav[$c] = $row['favorite'];
        $type[$c] = $row['type_procedure'];

        $proc = new Procedure($id[$c], $desc[$c], $code[$c], $price[$c], $fav[$c], $type[$c]);
        $procList[] = $proc;

        $c = $c + 1;
      }
      
      return $procList;
    }
    else
    {
      return "rows";
    }
  }

  function loadProdTypeList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from type_product order by id";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $prdList[] = array(
          'id' => $row['id'],
          'name' => $row['name'], 
          'desc' => $row['description']);
      }
      
      return $prdList;
    }
    else
    {
      return false;
    }  
  }

  function loadPrTList()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from type_procedure order by code";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      foreach ($r as $row)
      {
        $prtList[] = array(
          'id' => $row['id'],
          'desc' => $row['description'], 
          'code' => $row['code']);
      }
      
      return $prtList;
    }
    else
    {
      return false;
    }  
  }

  function loadPrcTypList($id, $q)
  {
    require 'dbconn.php';

   $s = "select type_procedure.id, description, code 
         from type_procedure 
         order by code";

    if ($id != null && $q == null)
    {
      $s = "select * from type_procedure where type_procedure.id = " . $id;
    }

   if($id == null && $q != null)
   {
     $s = "select * from type_procedure where type_procedure.id like '%" . $q . "%' or description like '%" . $q . "%' or code like '%" . $q . "%'";
   }

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
      while($row = $r->fetch())
      {
        $id[$c] = $row['id'];
        $desc[$c] = $row['description'];
        $code[$c] = $row['code'];

        $prc = new ProcedureType($id[$c], $desc[$c], $code[$c]);

        $prcTypList[] = $prc;

        $c = $c + 1;
      }
      return $prcTypList;
    }
    else
    {
      return "rows";
    }
  }

  function addProdType($name, $desc)
  {
    require 'dbconn.php';

    try
    {
      $s = "INSERT INTO `type_product`(`name`, `description`) VALUES ('" . $name . "','" . $desc . "')";
      $r = $pdo->exec($s);
    }
    catch (PDOException $e)
    {
      return false;
    }

    if($r > 0)
    {
      return true;
    }
    else
    {
      return "rows";
    }
  }

  function addProcType($code, $desc)
  {
    require 'dbconn.php';

    try
    {
      $s = "INSERT INTO `type_procedure`(`code`, `description`) VALUES ('" . $code . "','" . $desc . "')";
      $r = $pdo->exec($s);
    }
    catch (PDOException $e)
    {
      return false;
    }

    if ($r > 0)
    {
      return true;
    }
    else 
     {
       return "rows";
     } 

  }

  function addProduct($pNumber, $name, $price, $size, $quantity, $desc, $critical, $fav, $p_t_name, $p_t_desc, $prdList)
  {
    require 'dbconn.php';

    foreach ($prdList as $p)
     {
       if($p['name'] == $p_t_name)
       {
         $b = "";
       }
     }

    if (isset($b))
    {
      try
      {
        $s1 = "select id from type_product where name = '". $p_t_name . "'";
        $r1 = $pdo->query($s1);
      }
      catch(PDOException $e)
      {
        return "query";
      }

      if($r1->rowCount() > 0)
      {
        while ($row = $r1->fetch())
        {
          $prd = $row['id'];
        }
      }
    }
    else 
    {
      if(addProdType($p_t_name, $p_t_desc))
      {
        try
        {
          $s1 = "select id from type_product where name = '". $p_t_name . "'";
          $r1 = $pdo->query($s1);
        }
        catch(PDOException $e)
        {
          return "query";
        }

        if($r1->rowCount() > 0)
        {
          while ($row = $r1->fetch())
          {
            $prd = $row['id'];
          }
        }
      }
      else 
      {
        return "Product not added";
      }      
    }

    if ($fav == NULL)
    {
      $fav = 0;
    }

    try
    {
      $s = "INSERT INTO `product`(`number`, `name`, `description`, `price`, `size`, `quantity`, `critical_value`, `favorite`, `product_typeID`, `stockID`) VALUES
                                  ('" . $pNumber . "','" . $name . "','" . $desc . "'," . $price . "," . $size . "," . $quantity . "," . $critical . "," . $fav . "," . $prd . "," . $prd . ")";
      $r = $pdo->exec($s);
    }
    catch (PDOException $e)
    {
      return "rows";
    }

    if ($r > 0 )
    {
      return true;
    }
    else 
    {
      return "query ";
    }
  }

  function addProcedure($desc, $code, $price, $fav, $p_t_code, $p_t_desc, $prtList)
  {
    require 'dbconn.php';

   foreach($prtList as $p)
   {
    if ($p['code'] == $p_t_code)
    {
      $b = "";
    }
   }

    if (isset($b))
    {
      try
      {
        $s1 = "select id from type_procedure where code = '". $p_t_code . "'";
        $r1 = $pdo->query($s1);
      }
      catch(PDOException $e)
      {
        return "query";
      }

      if($r1->rowCount() > 0)
      {
        while ($row = $r1->fetch())
        {
          $pro = $row['id'];
        }
      }
    }
    else
    {
        if(addProcType($p_t_code, $p_t_desc))
        {
          try
          {
            $s1 = "select id from type_procedure where code = '". $p_t_code . "'";
            $r1 = $pdo->query($s1);
          }
          catch(PDOException $e)
          {
            return "query";
          }

          if($r1->rowCount() > 0)
          {
            while ($row = $r1->fetch())
            {
              $pro = $row['id'];
            }
          }
        }
        else 
        {
          return "Procedure not added";
        }     
     }

    if ($fav == NULL)
    {
      $fav = 0;
    }

    try
    {
      $s = "INSERT INTO `procedure`(`description`, `code`, `price`, `favorite`, `procedure_typeID`) VALUES  ('" . $desc . "','" . $code . "'," . $price . "," . $fav . "," . $pro . ")";
      $r = $pdo->exec($s);
    }
    catch (PDOException $e)
    {
      return "rows";
    }

    if ($r > 0 )
    {
      return true;
    }
    else 
    {
      return "query ";
    }
  }

  function loadProdList($id, $q)
  {
    require 'dbconn.php';

    $s = "SELECT product.id, `number`, product.name, product.description, `price`, `size`, `quantity`, `critical_value`, `favorite`, type_product.name as typeProd, `stockID` 
          FROM `product` 
          JOIN type_product on product.product_typeID = type_product.id 
          order by id";

    if ($id != null && $q == null)
    {
      $s = "select * from product where product.id = " . $id;
    }

    if($id == null && $q != null)
    {
      $s = "SELECT product.id, `number`, product.name, product.description, `price`, `size`, `quantity`, `critical_value`, `favorite`, type_product.name as typeProd, `stockID` 
            FROM `product` 
            JOIN type_product on product.product_typeID = type_product.id 
            where product.id like '%". $q . "%' or product.name like '%". $q . "%' or number like '%". $q . "%' or product.description like '%". $q . "%' or price like '%". $q . "%' or size like '%". $q . "%' or quantity like '%". $q . "%' or critical_value like '%". $q . "%' or type_product.name like '%". $q . "%'";
    }

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
        $pNumber[$c] = $row['number'];
        $name[$c] = $row['name'];
        $desc[$c] = $row['description'];
        $price[$c] = $row['price'];
        $size[$c] = $row['size'];
        $quantity[$c] = $row['quantity'];
        $critical[$c] = $row['critical_value'];
        $fav[$c] = $row['favorite'];
        $type[$c] = $row['typeProd'];
        $stock[$c] = $row['stockID'];
        

        $prod = new Product($id[$c], $pNumber[$c], $name[$c], $desc[$c], $price[$c], $size[$c], $quantity[$c], $critical[$c], $fav[$c], $type[$c], $stock[$c]);
        $prodList[] = $prod;

        $c = $c + 1;
      }
      
      return $prodList;
    }
    else
    {
      return "rows";
    }
  }

  function loadPrdType($id, $q)
  {
    require 'dbconn.php';

    $s = "select type_product.id, name, description from type_product order by name";
    
    if ($id != null && $q == null)
    {
      
      $s = "select * from type_product where type_product.id = " . $id;
    }

   if($id == null && $q != null)
   {
     $s = "select * from type_product where type_product.id like '%" . $q . "%' or name like '%" . $q . "%' or description like '%" . $q . "%'";
   }

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
      while($row = $r->fetch())
      {
        $id[$c] = $row['id'];
        $name[$c] = $row['name'];
        $desc[$c] = $row['description'];
        

        $prd = new ProductType($id[$c], $name[$c], $desc[$c]);

        $prdTypList[] = $prd;

        $c = $c + 1;
      }
      return $prdTypList;
    }
    else
    {
      return "rows";
    }
  }

  function loadSuppList($id, $q)
  {
    require 'dbconn.php';

    $s = "select * from supplier order by id";
    
   if ($id != null && $q == null)
    {
      $s = "select * from supplier where id = ". $id;
    }

    if ($id != null && $q == null)
    {

    }
    
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
        $contactPerson[$c] = $row['contactPerson'];
        $email[$c] = $row['email'];
        $telephone[$c] = $row['tel'];
        $fax[$c] = $row['fax'];
        $physical[$c] = $row['physical'];
        $bank[$c] = $row['bankName'];
        $branchN[$c] = $row['branchName'];
        $branchC[$c] = $row['branchCode'];
        $accNum[$c] = $row['accountNumber'];
        $ref[$c] = $row['reff'];
        $status[$c] = $row['status'];

        $supp = new Supplier($id[$c], $name[$c], $contactPerson[$c], $email[$c], $telephone[$c], $fax[$c], $physical[$c], $bank[$c], $branchN[$c], $branchC[$c], $accNum[$c], $ref[$c], $status[$c]);
        $sList[] = $supp;

        $c = $c + 1;
      }

      return $sList;
    }
    else
    {
      return "rows";
    }
  }
  
function addSupplier($name, $contactPerson , $email, $telephone, $fax, $physical, $bank, $branchN, $branchC, $accNum, $ref, $status)
{
  require 'dbconn.php';

  $a = addAddresses(null, $physical);
    //$a_po = $a[0]['postal'];
    $a_ph = $a[0]['physical'];
  
  try
  {
    $s = "INSERT INTO `supplier`(`id`, `name`, `contact_person`, `email`, `telephone`, `fax`, `address_physical`, `status`, `bank_name`, `branch_name`, `branch_number`, `account_number`, `bank_reference`) VALUES
     ('" . $name . "','" . $contactPerson . "','" .  $email . "'," . $telephone . "," . $fax . ",'" . $a_ph . "','" . $status . "','" . $bank . "','" . $branchN . "'," . $branchC . "," . $accNum . ",'" . $ref . "')";
    $r = $pdo->exec($s);
  }
  catch(PDOException $e)
  {
    return "query";
  }

  if($r > 0)
  {
    return true;
  }
  else 
  {
    return "rows";
  }
}

function loadOrderList($in)
{
  require 'dbconn.php';

  $s = "select * from `order`";

  if ($in != null)
  {
    $s = "select * from order where id = " . $in;
  }

  try
  {
    $r = $pdo->query($s);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0)
  {
    $c = 0;
    while ($row = $r->fetch())
    {
      $id[$c] = $row['id'];
      $amount[$c] = $row['amount'];
      $date[$c] = $row['orderDate'];
      $status[$c] = $row['statusID'];

      $ord = new Order($id[$c], $amount[$c], $date[$c], $status[$c]);
      $oList[] = $ord;

      $c = $c + 1;
    }

    return $oList;
  }
  else
  {
    return false;
  }

}

function loadPayList($in)
{
  require 'dbconn.php';

  $s = "select * from payment";

  if ($in != null)
  {
    $s = "select * from payment where id = " . $in;
  }

  try
  {
    $r = $pdo->query($s);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0)
  {
    $c = 0;
    while ($row = $r->fetch())
    {
      $id[$c] = $row['id'];
      $amount[$c] = $row['amount'];
      $date[$c] = $row['date'];
      $pType[$c] = $row['paymentTypeID'];
      $invLine[$c] = $row['invoiceLineID'];

      $pay = new Payment($id[$c], $amount[$c], $date[$c], $pType[$c], $invLine[$c]);
      $payList[] = $pay;

      $c = $c + 1;
    }

    return $payList;
  }
  else
  {
    return false;
  }
}

function loadTimeSlots() {
  require 'dbconn.php';

  $s = "select * from timeslot";

  try
  {
    $r = $pdo->query($s);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0)
  {
    while ($row = $r->fetch()) {
      $ids[] = $row["id"];
      $descriptions[] = $row["description"];
    }
    
    $timeSlots["ids"] = $ids;
    $timeSlots["descriptions"] = $descriptions;
    return $timeSlots;
  }
  return false;
}

function bookConsultation($idNum, $patientName, $patientSurname, $medicalAidID, $dentistID, $practiceLocationID, $date, $timeslot) {
  require 'dbconn.php';

  if ($dentistID == "Dr J.P. Maponya") {
    $dentistID = 1;
  }
  else {
    $dentistID = 2;
  }

  $sql = "select id from timeslot where description='$timeslot'";

  try
  {
    $r = $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0) {
    $row = $r->fetch();
    $timeslot = $row["id"];
  }

  $sql = "select id from patient where id_number='$idNum'";
  try
  {
    $r = $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0) {
    $row = $r->fetch();
    $idNum = $row["id"];
  }

  $sql = "select id from schedule where available_date='$date'";
  try
  {
    $r = $pdo->query($sql);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0) {
    $row = $r->fetch();
    $date = $row["id"];
  }

  //setting the locationID
  if ($practiceLocationID == "Tembisa") {
    $practiceLocationID=1;
  }
  else {
    $practiceLocationID=2;
  }

  $s = "INSERT INTO `consultation`(`notes`, `status`, `booking_typeID`,
 `employeeID`, `timeslotID`, `practice_locationID`, `patientID`, `scheduleID`, `employee_typeID`)
 VALUES ('', 'Pending', 3, '$dentistID',$timeslot, $practiceLocationID,$idNum,$date,2)";

  try
  {
    $r = $pdo->query($s);
  }
  catch(PDOException $e)
  {
    return false;
  }
  return true;
}

function loadConsult($in)
{
  require 'dbconn.php';

  $s = "select consultation.id, notes, status, type_booking.description as book_type, consultation.employeeID, timeslot.description as timeslot, practice_location.description as location, patient.name as pat_name, patient.surname as pat_sur, scheduleID, schedule.available_date as c_date, patientID from consultation join type_booking on consultation.booking_typeID = type_booking.id join timeslot on consultation.timeslotID = timeslot.id join practice_location on consultation.practice_locationID = practice_location.id join patient on consultation.patientID = patient.ID join schedule on consultation.scheduleID = schedule.id order by c_date desc";

  if ($in !== null)
  {
    $s = "select consultation.id, notes, status, type_booking.description as book_type, consultation.employeeID, timeslot.description as timeslot, practice_location.description as location, patient.name as pat_name, patient.surname as pat_sur, scheduleID, schedule.available_date as c_date, patientID from consultation join type_booking on consultation.booking_typeID = type_booking.id join timeslot on consultation.timeslotID = timeslot.id join practice_location on consultation.practice_locationID = practice_location.id join patient on consultation.patientID = patient.ID join schedule on consultation.scheduleID = schedule.id where consultation.id = " . $in . " order by c_date desc";
  }

  try
  {
    $r = $pdo->query($s);
  }
  catch(PDOException $e)
  {
    return false;
  }

  if ($r->rowCount() > 0)
  {
    $c = 0;
    while ($row = $r->fetch())
    {
      $id[$c] = $row['id'];
      $notes[$c] = $row['notes'];
      $status[$c] = $row['status']; 
      $book_type[$c] = $row['book_type'];
      $emp[$c] = $row['employeeID'];
      $timeslot[$c] = $row['timeslot'];
      $loc[$c] = $row['location'];
      $pat_n[$c] = $row['pat_name'];
      $pat_s[$c] = $row['pat_sur'];
      $schedule[$c] = $row['scheduleID'];
      $c_date[$c] = $row['c_date'];
      $pat[$c] = $row['patientID'];

      $consul = new Consultation($id[$c], $notes[$c], $status[$c], $book_type[$c], $emp[$c], $timeslot[$c], $loc[$c], $pat_n[$c], $pat_s[$c], $schedule[$c], $c_date[$c], $pat[$c]);
      $cList[$c] = $consul; 

      $c++;
    }

    return $cList;
  }
  else
  {
    return false;
  }
}

?>