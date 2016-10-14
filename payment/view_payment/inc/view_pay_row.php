<tr>
  <td><?php echo $pay->id;?></td>
  <td>R<?php echo $pay->amount;?></td>
  <td><?php echo $pay->date;?></td>
  <td><?php echo $pay->pType;?></td>
  <td><?php echo $pay->invLine;?></td>
  <td><a href="../view_invoice/?id=<?php echo $pay->id;?>">view invoice</a></td>
</tr>