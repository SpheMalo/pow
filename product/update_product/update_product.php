<?php

    require '../../inc/dbconn.php';
    require '../../inc/class.php';

    $id = $_GET["idNum"];
    $s = "SELECT product.id, `number`, product.name, product.description, `price`, `size`, `quantity`, `critical_value`, `favorite`, type_product.name as typeProd 
          FROM `product` 
          JOIN type_product on product.product_typeID = type_product.id 
          where product.id = $id
          order by product.id";

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

        $prod = new Product($id[$c], $pNumber[$c], $name[$c], $desc[$c], $price[$c], $size[$c], $quantity[$c], $critical[$c], $fav[$c], $type[$c]);
        $prodList[] = $prod;

        $c = $c + 1;
      }
      
       echo json_encode($prodList);
    }
    else
    {
      return "rows";
    }
  ?>