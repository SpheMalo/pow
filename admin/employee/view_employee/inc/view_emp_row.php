<tr>
  <td><?php echo $emp->id;?></td>
  <td><?php echo $emp->title;?></td>
  <td><?php echo $emp->name;?></td>
  <td><?php echo $emp->surname;?></td>
  <td><?php echo $emp->location;?></td>
  <td><?php echo $emp->type;?></td>
  <td><?php echo $emp->status;?></td>
  <td class="noExl"><a href='../update_employee/?up=<?php echo $emp->id;?>'>View</a></td>
</tr>