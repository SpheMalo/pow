<?php
    if ($proc->fav == 1)
    {
        $a = "yes";
        $b = "<a href='?unfav=$proc->id'>remove from favorite list</a>";
    }
    else 
    {
        $a = "no";
        $b = "<a href='?fav=$proc->id'>add to favorite list</a>";
    }
?>

<tr>
  <td><?php echo $proc->id;?></td>
  <td><?php echo $proc->desc;?></td>
  <td><?php echo $proc->code;?></td>
  <td>R<?php echo $proc->price;?></td>
  <td><?php echo $proc->type;?></td>
  <td><?php echo $a;?></td>
  <td><a href="../update_procedure/?up=<?php echo $proc->id;?>">view</a> <br> <?php echo $b;?></td>
</tr>