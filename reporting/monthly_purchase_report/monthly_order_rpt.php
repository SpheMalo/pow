<?php

    require "../../inc/dbconn.php";
    $order = $_REQUEST['order'];
    $OrderId = $order;

    if (isset($order))
    {
        $sql = "SELECT order.id, `number`, `order_date`, order.status, supplier.name as supplier
                FROM `order`
                JOIN supplier on order.supplierID = supplier.id
                ORDER BY id";

        try
        {
            $r = $pdo->query($sql);
        }
        catch(PDOException $e)
        {
            $o = "unable to retrieve order list" . $e;
            echo "Exception: ".$o;
        }

        $orders = array();
        $c = 0;
        if ($r->rowCount() > 0){
            while($row = $r->fetch()) {

                $orders[$c]['number'] = $row['number'];
                $orders[$c]['order_date'] = $row['order_date'];
                $orders[$c]['status'] = $row['status'];
                $orders[$c]['supplier'] = $row['supplier'];

                $c++;
            }
            echo json_encode($orders);
        }
        else {
            echo false;
        }
    }
?>