<?php
  class Employee
  {
    public $id;
    public $title;
    public $name;
    public $surname;
    public $username;
    public $gender;
    public $type;
    public $idnum;
    public $bank;
    public $cell;
    public $email;
    public $postal;
    public $tel;
    public $physical;
    public $location;
    
    public function __construct($id, $title, $name, $surname, $username, $gender, $type, $location)
    {
      $this->id = $id;
      $this->title = $title;
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->gender = $gender;
      $this->type = $type;
      $this->location = $location;
    }

    public function loadRest($idnum, $bank, $cell, $email, $postal, $tel, $physical)
    {
      $this->idnum = $idnum;
      $this->bank = $bank;
      $this->cell = $cell;
      $this->email = $email;
      $this->postal = $postal;
      $this->tel = $tel;
      $this->physical = $physical;
    }
  }

  class MedicalAid
  {
    public $id;
    public $description;
    public $name;
    public $email;
    public $tell;
    public $fax;
    public $physical;
    public $postal;
    
    public function __construct($id, $description, $name, $email, $tell, $fax, $physical, $postal)
    {
      $this->id = $id;
      $this->description = $description;
      $this->name = $name;
      $this->email = $email;
      $this->tell = $tell;
      $this->fax = $fax;
      $this->physical = $physical;
      $this->postal = $postal;
    }
  }

  class Patient
  {
    public $id;
    public $title;
    public $name;
    public $surname;
    public $gender;
    public $id_num;
    public $dob;
    public $email;
    public $img;
    public $file;
    public $tell;
    public $cell;
    public $physical;
    public $postal;
    public $medical_aid_type;
    public $member_type;
    
    public function __construct($id, $title, $name, $surname, $gender, $id_num, $dob, $email, $img, $file, $tell, $cell, $physical, $postal, $medical_aid_type, $member_type)
    {
      $this->id = $id;
      $this->title = $title;
      $this->name = $name;
      $this->surname = $surname;
      $this->gender = $gender;
      $this->id_num = $id_num;
      $this->dob = $dob;
      $this->email = $email;
      $this->img = $img;
      $this->file = $file;
      $this->tell = $tell;
      $this->cell = $cell;
      $this->physical = $physical;
      $this->postal = $postal;
      $this->medical_aid_type = $medical_aid_type;
      $this->member_type = $member_type;
    }
  }

  class Procedure
  {
    public $id;
    public $desc;
    public $code;
    public $price;
    public $fav;
    public $type;

    public function __construct($id, $desc, $code, $price, $fav, $type)
    {
      $this->id = $id;
      $this->desc = $desc;
      $this->code = $code;
      $this->price = $price;
      $this->fav = $fav;
      $this->type = $type;
    }
  }

   class ProcedureType
  {
    public $id;
    public $desc;
    public $code;

    public function __construct($id, $desc, $code)
    {
      $this->id = $id;
      $this->desc = $desc;
      $this->code = $code;
    }
  }
  

  class Product
  {
    public $id;
    public $pNumber;
    public $name;
    public $desc;
    public $price;
    public $size;
    public $quantity;
    public $critical;
    public $fav;
    public $type;

    public function __construct($id, $pNumber,$name, $desc, $price, $size, $quantity, $critical, $fav, $type)
    {
      $this->id = $id;
      $this->pNumber = $pNumber;
      $this->name = $name;
      $this->desc = $desc;
      $this->price = $price;
      $this->size = $size;
      $this->quantity = $quantity;
      $this->critical = $critical;
      $this->fav = $fav;
      $this->type = $type;
    }
  }

  class Stock
  {
    public $id;
    public $prodNo;
    public $prodName;
    public $prodType;
    public $OrderNo;
    public $QoH;
    public $available;
    public $productID;
    public $orderID;

    public function __construct($id, $prodNo, $prodName, $prodType, $OrderNo, $QoH, $available)
    {
      $this->id = $id;
      $this->prodNo = $prodNo;
      $this->prodName = $prodName;
      $this->prodType = $prodType;
      $this->OrderNo = $OrderNo;
      $this->QoH = $QoH;
      $this->available = $available;
    }
  }

  class ProductType
  {
    public $id;
    public $name;
    public $desc;

    public function __construct($id, $name, $desc)
    {
      $this->id = $id;
      $this->name = $name;
      $this->desc = $desc;
    }
  }
  

  class Supplier
  {
    public $id;
    public $name;
    public $contactPerson;
    public $email;
    public $telephone;
    public $fax;
    public $physical;
    public $bank;
    public $branchN;
    public $branchC;
    public $accNum;
    public $ref;
    public $status;

    public function __construct($id, $name, $contactPerson, $email, $telephone, $fax, $physical, $bank, $branchN, $branchC, $accNum, $ref, $status)
    {
      $this->id = $id;
      $this->name = $name;
      $this->contactPerson = $contactPerson;
      $this->email = $email;
      $this->telephone = $telephone;
      $this->fax = $fax;
      $this->physical = $physical;
      $this->bank = $bank;
      $this->branchN = $branchN;
      $this->branchC = $branchC;
      $this->accNum = $accNum;
      $this->ref = $ref;
      $this->status = $status;
    }
  }

  class Payment
  {
    public $id;
    public $amount;
    public $date;
    public $pType;
    public $invLine;

    public function __construct($id, $amount, $date, $pType, $invLine)
    {
      $this->id = $id;
      $this->amount = $amount;
      $this->date = $date;
      $this->pType = $pType;
      $this->invLine = $invLine;
    }
  }

  class Order
  {
    public $id;
    public $number;
    public $date;
    public $status;
    public $supplier;

    public function __construct($id, $number, $date, $status, $supplier)
    {
      $this->id = $id;
      $this->number = $number;
      $this->date = $date;
      $this->status = $status;
      $this->supplier = $supplier;
    }
  }

  class Consultation
  {
    public $id;
    public $notes;
    public $status;
    public $book_type;
    public $employee;
    public $timeslot;
    public $location;
    public $pat_name;
    public $pat_sur;
    public $schedule;
    public $c_date;
    public $pat;

    public function __construct($id, $notes, $status, $book_type, $employee, $timeslot, $location, $pat_name, $pat_sur, $schedule, $c_date, $pat)
    {
      $this->id = $id;
      $this->notes = $notes;
      $this->status = $status;
      $this->book_type = $book_type;
      $this->employee = $employee;
      $this->timeslot = $timeslot;
      $this->location = $location;
      $this->pat_name = $pat_name;
      $this->pat_sur = $pat_sur;
      $this->schedule = $schedule;
      $this->c_date = $c_date;
      $this->pat = $pat;
    }

    public function getMedicalAid($pat)
    {
      require 'dbconn.php';

      try
      {
        $s = "select type_medical_aid.decription as med_type from patient where patientID = " . $pat;
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
          $med_type[] = $row['med_type'];

          $c++;
        }

        return $med_type[0];
      }
      else
      {
        return false;
      }
    }
  }
?>