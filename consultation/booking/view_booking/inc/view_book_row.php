<tr>
  <td><?php echo $book->id;?></td>
  <td><?php echo $book->patient;?></td>
  <td><?php echo $book->pat_name . " " . $book->pat_sur;?></td>
  <td><?php echo $book->surname;?></td>
  <td><?php echo $book->username;?></td>
  <td><?php echo $book->gender;?></td>
  <td><?php echo $book->type;?></td>
  <td><a href='../update_booking/?up=<?php echo $book->id;?>'>view</a></td>
</tr>