<?php

    require '../../../../inc/func.php';
    
    $pcList = loadProcList(null, null);

    if(isset($_POST['add_proc']))
    {
        $arr = explode("-", $_POST['add_proc']);

        foreach ($pcList as $pc)
        {
            if ($pc->desc == $_POST['add_proc']) {
                $_SESSION['orderBasket'][] = array(
                    'desc' => $pc->desc,
                    'type' => $pc->type,
                    'price' => $pc->price,
                    'quantity' => $_POST['add_procq']
                 );
            }
        }
        echo json_encode($_SESSION['orderBasket']);
    }