<?php
    require '../../../../inc/func.php';
    $pList = loadProdList(null, null);

    if(isset($_POST['add_prod']))
    {
        $arr = explode("-", $_POST['add_prod']);

        foreach ($pList as $pl)
        {
            if ($pl->name == $arr[0] && $pl->type == $arr[1])
            {
                $_SESSION['orderBasket'][] = array(
                    'name' => $pl->name,
                    'type' => $pl->type,
                    'size' => $pl->size,
                    'quantity' => $_POST['add_prodq']
                );
            }
            //$_SESSION['orderBasket'][] = $basket;
        }
        echo json_encode($_SESSION['orderBasket']);
    }