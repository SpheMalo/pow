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
    
    public function __construct($id, $title, $name, $surname, $username, $gender, $type)
    {
      $this->id = $id;
      $this->title = $title;
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->gender = $gender;
      $this->type = $type;
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
    public $name;
    public $email;
    public $tell;
    public $fax;
    public $physical;
    public $postal;
    
    public function __construct($id, $name, $email, $tell, $fax, $physical, $postal)
    {
      $this->id = $id;
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
    public $identity;
    public $email;
    public $tell;
    public $cell;
    public $physical;
    public $postal;
    public $medicalAid;
    
    public function __construct($id, $title, $name, $surname, $gender, $identity, $email, $tell, $cell, $physical, $postal, $medicalAid)
    {
      $this->id = $id;
      $this->title = $title;
      $this->name = $name;
      $this->surname = $surname;
      $this->gender = $gender;
      $this->identity = $identity;
      $this->email = $email;
      $this->tell = $tell;
      $this->cell = $cell;
      $this->physical = $physical;
      $this->postal = $postal;
      $this->medicalAid = $medicalAid;
    }
  }

  class Procedure
  {
    public $id;
    public $desc;
    public $code;
    public $price;
    public $type;
    public $fav;

    public function __construct($id, $desc, $code, $price, $type, $fav)
    {
      $this->id = $id;
      $this->desc = $desc;
      $this->code = $code;
      $this->price = $price;
      $this->type = $type;
      $this->fav = $fav;
    }
  }

  class Product
  {
    public $id;
    public $desc;
    public $name;
    public $price;
    public $size;
    public $quantity;
    public $critical;
    public $type;
    public $stock;

    public function __construct($id, $desc, $name, $price, $size, $quantity, $critical, $type, $stock)
    {
      $this->id = $id;
      $this->desc = $desc;
      $this->name = $name;
      $this->price = $price;
      $this->size = $size;
      $this->quantity = $quantity;
      $this->critical = $critical;
      $this->type = $type;
      $this->stock = $stock;
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
      $this->ref = $status;
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
    public $amount;
    public $date;
    public $status;

    public function __construct($id, $amount, $date, $status)
    {
      $this->id = $id;
      $this->amount = $amount;
      $this->date = $date;
      $this->status = $status;
    }
  }

  class Consultation
  {
    public $id;
    public $notes;
    public $status;
    public $booking_type;
    public $employee;
    public $timeslot;
    public $practice_location;
    public $pat_name;
    public $pat_sur;
    public $schedule;
    public $emp_type;

    public function __construct($id, $notes, $status, $booking_type, $employee, $timeslot, $practice_location, $pat_name, $pat_sur, $schedule, $emp_type)
    {
      $this->id = $id;
      $this->notes = $notes;
      $this->status = $status;
      $this->booking_type = $booking_type;
      $this->employee = $employee;
      $this->timeslot = $timeslot;
      $this->practice_location = $practice_location;
      $this->pat_name = $pat_name;
      $this->pat_sur = $pat_sur;
      $this->schedule = $schedule;
      $this->schedule = $emp_type;
    }
  }
?>