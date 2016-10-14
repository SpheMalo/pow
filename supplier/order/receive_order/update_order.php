<?php

    require '../../../inc/dbconn.php';
    require '../../../inc/class.php';

    $id = $_GET["idNum"];
    $s = "SELECT order.id, `number`, `order_date`, order.status, supplier.name as supplier 
            FROM `order` 
            JOIN supplier on order.supplierID = supplier.id 
            where order.id = $id
            ORDER BY id";


    try
    {
        $r = $pdo->query($s);
    }
    catch(PDOException $e)
    {
        echo "testing";
        return "query";
    }

    if ($r->rowCount() > 0)
    {
        $c = 0;
        while ($row = $r->fetch())
        {
            $id[$c] = $row['id'];
            $number[$c] = $row['number'];
            $date[$c] = $row['order_date'];
            $status[$c] = $row['status'];
            $supplier[$c] = $row['supplier'];

            $ord = new Order($id[$c], $number[$c], $date[$c], $status[$c], $supplier[$c]);
            $oList[] = $ord;

            $c = $c + 1;
        }

        echo json_encode($oList);
    }
    else
    {
        return "rows";
    }
