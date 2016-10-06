<?php

require '../../../inc/dbconn.php';
require '../../../inc/class.php';

$id = $_GET["idNum"];
$s = "select type_procedure.id, description, code 
      from type_procedure 
      where type_procedure.id = $id
      order by type_procedure.id";

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
       echo json_encode($prcTypList);
    }
    else
    {
      return "rows";
    }
?>