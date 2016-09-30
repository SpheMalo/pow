<?php
    if ($proc->fav == 1)
    {
        $a = "Yes";
        $b = "<a href='?unfav=$proc->id'>remove from favorite list</a>";
    }
    else 
    {
        $a = "No";
        $b = "<a href='?fav=$proc->id'>add to favorite list</a>";
    }
?>
<tr>
  <td><?php echo $prod->id;?></td>
  <td><?php echo $prod->name;?></td>
  <td><?php echo $prod->desc;?></td>
  <td>R<?php echo $prod->price;?></td>
  <td><?php echo $prod->size;?>mg/ml</td>
  <td><?php echo $prod->quantity;?></td>
  <td><?php echo $prod->critical;?></td>
  <td><?php echo $prod->type;?></td>
  <td><?php echo $prod->stock;?></td>
  <td><a href="../update_product/?up=<?php echo $prod->id;?>">update</a></td>
</tr>