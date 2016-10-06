<?php

    require '../../inc/dbconn.php';
    require '../../inc/class.php';

    $id = $_GET["idNum"];
    $s = "select procedure.id, procedure.description, procedure.code, price, `procedure`.favorite, type_procedure.code as type_procedure 
        from `procedure` 
        join type_procedure on procedure.procedure_typeID = type_procedure.id 
        where procedure.id = $id
        order by id ";

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
       // $type[$c] = $row['type_proc'];
        

        $proc = new Procedure($id[$c], $desc[$c], $code[$c], $price[$c], $fav[$c], $type[$c]);
        $procList[] = $proc;

        $c = $c + 1;
      }
      
       echo json_encode($procList);
    }
    else
    {
      return "rows";
    }
?>