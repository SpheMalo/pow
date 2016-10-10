<?php
    if ($proc->fav == 1)
    {
        $a = "Yes";
        $b = "<a href='?unfav=$proc->id'>Remove from favorites list</a>";
    }
    else 
    {
        $a = "No";
        $b = "<a href='?fav=$proc->id'>Add to favorites list</a>";
    }
?>
<tr>
  <td><?php echo $proc->id;?></td>
  <td><?php echo $proc->desc;?></td>
  <td><?php echo $proc->code;?></td>
  <td>R<?php echo $proc->price;?></td>
  <td><?php echo $proc->type;?></td>
  <td><?php echo $a;?></td>
  <td><a href="../update_procedure/?up=<?php echo $proc->id;?>">View</a> <br> <?php echo $b;?></td>
</tr>