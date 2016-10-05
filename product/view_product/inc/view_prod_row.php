<?php
    if ($prod->fav == 1)
    {
        $a = "Yes";
        $b = "<a href='?unfav=$prod->id'>Remove from favorites list</a>";
    }
    else 
    {
        $a = "No";
        $b = "<a href='?fav=$prod->id'>Add to favorites list</a>";
    }
?>
<tr>
  <td><?php echo $prod->id;?></td>
  <td><?php echo $prod->pNumber;?></td>
  <td><?php echo $prod->name;?></td>
  <td><?php echo $prod->desc;?></td>
  <td>R<?php echo $prod->price;?></td>
  <td><?php echo $prod->size;?> mg</td>
  <td><?php echo $prod->type;?></td>
  <td><?php echo $prod->quantity;?></td>
  <td><?php echo $prod->critical;?></td>
  <td><?php echo $a;?></td>
  <td><a href="../update_product/?up=<?php echo $prod->id;?>">view</a> <br> <?php echo $b;?></td>
</tr>