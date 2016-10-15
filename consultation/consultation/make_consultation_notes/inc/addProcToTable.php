<?php

    require '../../../../inc/func.php';
    $pcList = loadProcList(null, null);

    if(isset($_POST['add_proc']))
    {
    $arr = explode("-", $_POST['add_proc']);
    
    foreach ($pcList as $pc)
    {
    if ($pc->name == $arr[0] && $pc->type == $arr[1]) {
    $_SESSION['orderBasket'][] = array(
    'name' => $pc->desc,
    'type' => $pc->type,
    'size' => $pc->price,
    'quantity' => $_POST['add_procq']
    );
    }
    }
    echo json_encode($_SESSION['orderBasket']);
    }