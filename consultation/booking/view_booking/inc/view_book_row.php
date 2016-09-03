<tr>
  <td><?php echo $book->id;?></td>
  <td><?php echo $book->pat_name . " " . $book->pat_sur;?></td>
  <td><?php echo $book::getMedicalAid($book->pat);?></td>
  <td><?php echo $book->employee;?></td>
  <td><?php echo $book->location;?></td>
  <td><?php echo $book->c_date;?></td>
  <td><?php echo $book->timeslot;?></td>
  <td><?php echo $book->status;?></td>
  <td><?php echo $book->book_type;?></td>
  <td><a href='../update_booking/?up=<?php echo $book->id;?>'>view</a></td>
</tr>