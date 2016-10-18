<?php

    require "../../inc/dbconn.php";
    $stock = $_REQUEST['stockWeek'];
    $StockId = $stock;

    if (isset($stock))
    {
        $sql = "SELECT product.id as prodID, product.number as prodNo, product.name as prodName, product.description as prodDesc,  product.quantity as prodQty, type_product.name as prodType, order.number as orderNo
                FROM `stock`
                JOIN product on stock.productID = product.id
                JOIN `order` on stock.orderID = order.id
                JOIN type_product on product.product_typeID = type_product.id
                order by product.id";

        try
        {
            $r = $pdo->query($sql);
        }
        catch(PDOException $e)
        {
            $o = "unable to retrieve stock levels" . $e;
            echo "Exception: ".$o;
        }

        $stocked = array();
        $c = 0;
        if ($r->rowCount() > 0){
            while($row = $r->fetch()) {

                $stocked[$c]['prodID'] = $row['prodID'];
                $stocked[$c]['prodNo'] = $row['prodNo'];
                $stocked[$c]['prodName'] = $row['prodName'];
                $stocked[$c]['prodDesc'] = $row['prodDesc'];
                $stocked[$c]['prodType'] = $row['prodType'];
                $stocked[$c]['prodQty']= $row['prodQty'];
                $c++;
            }
            echo json_encode($stocked);
        }
        else {
            echo false;
        }
    }
?>