<?php
  require 'class.php';
  //require 'dbconn.php';

  function login($user, $pass)
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select * from employee where username = '" . $user . "'";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "unable to retrieve employee username" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      while ($row = $r->fetch())
      {
        $id[] = $row['id'];
        $name[] = $row['name'];
        $surname[] = $row['surname'];
        $empType[] = $row['empType'];
        $p[] = $row['password'];
      }

      if (password_verify($pass, $p[0]))
      {
        $emp = new Employee($id[0], $name[0], $surname[0], $user, $pass, $empType[0]);

        return $emp;
      }
      else
      {
        return false;
      }
    }
    else
    {
      $o = "";
      return false;
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
      $s = "select * from status";
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

  function loadEmpList($in)
  {
    require 'dbconn.php';
    
    $s = "select employee.id, title.description as title, name, surname, username, gender.description as gender, employeeType.description as type from employee join title on employee.title = title.id join gender on employee.gender = gender.id join employeeType on employee.empType = employeeType.id order by id";
    
    if ($in != null)
    {
      $s = "select * from employee where employee.id = " . $in;
      $t = " ";
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
    {/*
      foreach ($r as $row)
      {
        $eList[] = array(
          'id' => $row['id'],
          'title' => $row['title'],
          'name' => $row['name'],
          'surname' => $row['surname'],
          'username' => $row['username'],
          'gender' => $row['gender'],
          'type' => $row['type']);
      }*/
      $c = 0;
      while ($row = $r->fetch()) 
      {
        $id[$c] = $row['id'];
        $title[$c] = $row['title'];
        $name[$c] = $row['name'];
        $surname[$c] = $row['surname'];
        $username[$c] = $row['username'];
        $gender[$c] = $row['gender'];
        $type[$c] = $row['type'];

        $emp = new Employee($id[$c], $title[$c], $name[$c], $surname[$c], $username[$c], $gender[$c], $type[$c]);

        if (isset($t))
        {
          $idnum[$c] = $row['idnum'];
          $bank[$c] = $row['bank'];
          $cell[$c] = $row['cell'];
          $email[$c] = $row['email'];
          $postal[$c] = $row['postal'];
          $tel[$c] = $row['tel'];
          $physical[$c] = $row['physical'];

          $emp = $emp::loadRest($idnum[$c], $bank[$c], $cell[$c], $email[$c], $postal[$c], $tel[$c], $physical[$c]);
        }

        $eList[] = $emp;

        $c = $c + 1;
      }

      return $eList;
    }
    else
    {
      return false;
    }
  }

  function addEmployee($title, $name, $surname, $gender, $id, $banking, $cell, $tell, $email, $postal, $physical, $type)
  {
    require 'dbconn.php';
    
    $ruser = rand(1000, 9999);
    $rpass = rand(1000, 9999);
    
    $user = $name[0] . $name[1] . $name[2] . $ruser;
    $pas = $surname[0] . $surname[1] . $surname[2] . $rpass;
    $pass = password_hash($pas, PASSWORD_DEFAULT);
    
    try
    {
      $s = "insert into employee (title, name, surname, username, password, gender, idNumber, banking, cell, tell, email, postal, physical, empType) values (" . $title . ",'" . $name . "','" .  $surname . "','" .  $user . "','" . $pass . "'," . $gender . "," . $id . ",'" . $banking . "'," . $cell . "," . $tell . ",'" . $email . "','" . $postal . "','" . $physical . "'," . $type . ")";
      $r = $pdo->exec($s);
      
      return array($user, $pas);
    }
    catch(PDOException $e)
    {
      return null;
    }
  }

  function updateEmployee($title, $name, $surname, $gender, $id, $banking, $cell, $tell, $email, $postal, $physical, $type)
  {
    require 'dbconn.php';
    
    $ruser = rand(1000, 9999);
    $rpass = rand(1000, 9999);
    
    $user = $name[0] . $name[1] . $name[2] . $ruser;
    $pas = $surname[0] . $surname[1] . $surname[2] . $rpass;
    $pass = password_hash($pas, PASSWORD_DEFAULT);
    
    try
    {
      $s = "insert into employee (title, name, surname, username, password, empType) values (" . $title . ",'" . $name . "','" .  $surname . "','" .  $user . "','" .  $pass . "'," . $type . ")";
      $r = $pdo->exec($s);
      
      return array($user, $pas);
    }
    catch(PDOException $e)
    {
      return null;
    }
  }

  function loadMedList($in)
  {
    require 'dbconn.php';
    
    $s  = "select * from medicalaid order by id";
    
    if ($in != null)
    {
      $s  = "select * from medicalaid where id = " . $in;
    }
    
    try
    {
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      $o = "" . $e;
      return false;
    }
    
    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch()) 
      {
        $id[$c] = $row['id'];
        $name[$c] = $row['name'];
        $email[$c] = $row['email'];
        $tell[$c] = $row['tell'];
        $fax[$c] = $row['fax'];
        $physical[$c] = $row['physical'];
        $postal[$c] = $row['postal'];

        $med = new MedicalAid($id[$c], $name[$c], $email[$c], $tell[$c], $fax[$c], $physical[$c], $postal[$c]);
        $mList[] = $med;

        $c = $c + 1;
      }
      
      return $mList;
    }
    else
    {
      $o = "";
      return false;
    }
  }

  function loadMedListS()
  {
    require 'dbconn.php';
    
    try
    {
      $s = "select id, name from medicalaid order by name";
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

  function addMed($name, $email, $tell, $fax, $physical, $postal)
  {
    require 'dbconn.php';

    try
    {
      $s = "insert into medicalaid (name, email, tell, fax, physical, postal) values ('" . $name . "', '" . $email . "', " . $tell . ", '" . $fax . "', '" . $physical . "', '" . $postal . "')";
      $r = $pdo->exec($s);

      return true;
    }
    catch (PDOException $e)
    {
      return false;
    }
  }

  function loadPatList($in)
  {
    require 'dbconn.php';

    $s = "select patient.id, title.description as title, name, surname, gender.description as gender, identity, email, cell, tell, physical, postal from patient join gender on patient.genderID = gender.id join title on patient.titleID = title.id order by patient.id";

    if ($in != null)
    {
       $s = "select patient.id, title.description as title, name, surname, gender.description as gender, identity, email, cell, tell, physical, postal from patient join gender on patient.genderID = gender.id join title on patient.titleID = title.id where id = " . $in;
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch (PDOException $e)
    {
      return false;
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
        $identity[$c] = $row['identity'];
        $email[$c] = $row['email'];
        $tell[$c] = $row['tell'];
        $cell[$c] = $row['cell'];
        $physical[$c] = $row['physical'];
        $postal[$c] = $row['postal'];

        $pat = new Patient($id[$c], $title[$c], $name[$c], $surname[$c], $gender[$c], $identity[$c], $email[$c], $tell[$c], $cell[$c], $physical[$c], $postal[$c]);
        $pList[] = $pat;

        $c = $c + 1;
      }
      
      return $pList;
    }
    else
    {
      return false;
    }
  }

  function addPatient($title, $name, $surname, $gender, $id, $cell, $tell, $email, $postal, $physical)
  {
    require 'dbconn.php';
    
    try
    {
      $s = "insert into patient (titleID, name, surname, genderID, identity, cell, tell, email, postal, physical) values (" . $title . ",'" . $name . "','" .  $surname . "'," . $gender . "," . $id . "," . $cell . "," . $tell . ",'" . $email . "','" . $postal . "','" . $physical . "')";
      $r = $pdo->exec($s);
      
      return true;
    }
    catch(PDOException $e)
    {
      return false;
    }
  }

  function loadProcList($in)
  {
    require 'dbconn.php';

    $s = "select procedure.id, procedure.description as `desc`, `procedure`.code, price, proceduretype.description as type, procedure.fav from `procedure` join proceduretype on `procedure`.proceduretypeID = proceduretype.id order by `procedure`.id";

    if ($in != null)
    {
       $s = "select procedure.id, procedure.description as `desc`, `procedure`.code, price, proceduretype.description as type, procedure.fav from `procedure` join proceduretype on `procedure`.proceduretypeID = proceduretype.id where `procedure`.id = " . $in;
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch (PDOException $e)
    {
      return false;
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch()) 
      {
        $id[$c] = $row['id'];
        $desc[$c] = $row['desc'];
        $code[$c] = $row['code'];
        $price[$c] = $row['price'];
        $type[$c] = $row['type'];
        $fav[$c] = $row['fav'];

        $proc = new Procedure($id[$c], $desc[$c], $code[$c], $price[$c], $type[$c], $fav[$c]);
        $procList[] = $proc;

        $c = $c + 1;
      }
      
      return $procList;
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
      $s = "select * from proceduretype order by code";
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

  function loadPrcTypList()
  {
    require 'dbconn.php';

    try
    {
      $s = "select * from proceduretype";
      $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
      return false;
    }

    if ($r->rowCount() > 0)
    {
      foreach($r as $row)
      {
        $prcTypList[] = array(
          'id' => $row['id'],
          'desc' => $row['description'],
          'fav' => $row['fav']
        );
      }

      return $prcTypList;
    }
    else
    {
      return false;
    }
  }

  function addProcedure($desc, $type, $code, $price, $fav)
  {
    require 'dbconn.php';

    if ($fav == NULL)
    {
      $fav = 0;
    }

    try
    {
      $s = "insert into procedure (description, code, price, proceduretypeID, fav) values ('" . $desc . "'," . $code . "," . $price . "," . $type . "," . $fav . ")";
      $r = $pdo->exec($s);

      return true;
    }
    catch (PDOException $e)
    {
      return false;
    }
  }

  function loadProdList($in)
  {
    require 'dbconn.php';

    $s = "select product.id, name, product.description, price, size, critical, quantity, producttype.description as typeID, stockID from product join producttype on product.typeID = producttype.id order by product.id";

    if (isset($in))
    {
      $s = "select * from product where id = " . $in;
    }

    try
    {
      $r = $pdo->query($s);
    }
    catch (PDOException $e)
    {
      return false;
    }

    if ($r->rowCount() > 0)
    {
      $c = 0;
      while ($row = $r->fetch()) 
      {
        $id[$c] = $row['id'];
        $name[$c] = $row['name'];
        $desc[$c] = $row['description'];
        $price[$c] = $row['price'];
        $size[$c] = $row['size'];
        $quantity[$c] = $row['quantity'];
        $critical[$c] = $row['critical'];
        $type[$c] = $row['typeID'];
        $stock[$c] = $row['stockID'];
        

        $prod = new Product($id[$c], $name[$c], $desc[$c], $price[$c], $size[$c], $quantity[$c], $critical[$c], $type[$c], $stock[$c]);
        $prodList[] = $prod;

        $c = $c + 1;
      }
      
      return $prodList;
    }
    else
    {
      return false;
    }
  }

  function loadPrdType()
  {
    require 'dbconn.php';

    try
    {
      $s = "select * from producttype";
      $r = $pdo->query($s);
    }
    catch (PDOException $e)
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
          'fav' => $row['fav']);
      }

      return $prtList;
    }
    else
    {
      return false;
    }
  }

  function loadSuppList($in)
  {
    require 'dbconn.php';
    
    //$s = "select supplier.id, Name, ContactPerson, Email, Telephone, Fax, Bank, AccNum, Ref, status from supplier";
    $s = "select * from supplier order by id";
    
    if ($in != null)
    {
      //$s = "select supplier.id, Name, ContactPerson, Email, Telephone, Fax, Bank, AccNum, Ref, status from supplier". $in;
      $s = "select * from supplier where id = ". $in;
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
      return false;
    }
}

function addSupplier($name, $contactPerson , $email, $telephone, $fax, $physical, $bank, $branchN, $branchC, $accNum, $ref)
{
  require 'dbconn.php';
  
  try
  {
    $s = "insert into supplier (name, contactPerson, email, telephone, fax, physical, bank, branchN, branchC, accNum, ref) values ('" . $name . "','" . $contactPerson . "','" .  $email . "'," . $telephone . "," . $fax . ",'" . $physical . "','" . $bank . "','" . $branchN . "'," . $branchC . "," . $accNum . ",'" . $ref . "')";
    $r = $pdo->exec($s);
    
    return true;
  }
  catch(PDOException $e)
  {
    return false;
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

?>