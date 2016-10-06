<?php

require '../../../inc/dbconn.php';
require '../../../inc/class.php';

$id = $_GET["idNum"];
 $s = "SELECT type_product.id, name, description 
       FROM type_product 
       WHERE type_product.id = $id
       ORDER BY type_product.id";
    
    
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
      echo json_encode($prdTypList);
    }
    else
    {
      return "rows";
    }
?>