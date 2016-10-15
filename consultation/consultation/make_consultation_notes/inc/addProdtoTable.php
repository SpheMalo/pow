<?php

    require '../../../../inc/func.php';

    $pList = loadProdList(null, null);

    if(isset($_POST['add_prod']))
    {
        $arr = explode("-", $_POST['add_prod']);

        foreach ($pList as $pl)
        {
            if ($pl->name == $arr[0] && $pl->type == $arr[1]) {
                $_SESSION['orderBasket'][] = array(
                    'name' => $pl->name,
                    'type' => $pl->type,
                    'size' => $pl->price,
                    'quantity' => $_POST['add_prodq']
                );
            }
        }
        echo json_encode($_SESSION['orderBasket']);
    }
