<?php
    /*if ($prdtype['fav'] == 1)
    {
        $a = "yes";
        $b = "<a href='?unfav=" . $prdtype['id'] . "'>remove from favorite list</a>";
    }
    else 
    {
        $a = "no";
        $b = "<a href='?fav=" . $prdtype['id'] . "'>add to favorite list</a>";
    }*/
?>

<tr>
  <td><?php echo $prdtype->name;?></td>
  <td><?php echo $prdtype->desc;?></td>
  <td><a href="../update_product_type/?up=<?php echo $prdtype->id;?>">View</a></td>
</tr>