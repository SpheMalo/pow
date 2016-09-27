<?php
  /*  if ($prctype['fav'] == 1)
    {
        $a = "yes";
        $b = "<a href='?unfav=" . $prctype['id'] . "'>remove from favorite list</a>";
    }
    else 
    {
        $a = "no";
        $b = "<a href='?fav=" . $prctype['id'] . "'>add to favorite list</a>";
    
     <td><?php echo $a;?></td>
    }*/
?>

<tr>
  <td><?php echo $prctype->code;?></td>
  <td><?php echo $prctype->desc;?></td>
  <td><a href="../update_procedure_type/?up=<?php echo $prctype->id;?>">view</a></td>
</tr>