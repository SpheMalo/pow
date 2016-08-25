<tr>
  <td><?php echo $emp->id;?></td>
  <td><?php echo $emp->title;?></td>
  <td><?php echo $emp->name;?></td>
  <td><?php echo $emp->surname;?></td>
  <td><?php echo $emp->username;?></td>
  <td><?php echo $emp->gender;?></td>
  <td><?php echo $emp->type;?></td>
  <td><a href='../update_employee/?up=<?php echo $emp->id;?>'>view</a></td>
</tr>