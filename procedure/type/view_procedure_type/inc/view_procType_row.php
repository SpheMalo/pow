<?php
    if ($prctype['fav'] == 1)
    {
        $a = "yes";
        $b = "<a href='?unfav=" . $prctype['id'] . "'>remove from favorite list</a>";
    }
    else 
    {
        $a = "no";
        $b = "<a href='?fav=" . $prctype['id'] . "'>add to favorite list</a>";
    }
?>

<tr>
  <td><?php echo $prctype['desc'];?></td>
  <td><?php echo $a;?></td>
  <td><a href="../update_procedure_type/?up=<?php echo $prc->id;?>">view</a> <br> <?php echo $b;?></td>
</tr>