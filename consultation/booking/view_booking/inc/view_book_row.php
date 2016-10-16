<tr>
  <td><?php echo $book->id;?></td>
  <td><?php echo $book->pat_name . " " . $book->pat_sur;?></td>
  <td><?php echo loadPatMed($book->pat);?></td>
  <td><?php echo loadDocInitials($book->employee);?></td>
  <td><?php echo loadEmpLocation($book->employee);?></td>
  <td><?php echo date("d M Y", strtotime($book->c_date));?></td>
  <td><?php echo $book->timeslot;?></td>
  <td><?php echo $book->status;?></td>
  <td><?php echo $book->book_type;?></td>
  <td><a href='../update_booking/?up=<?php echo $book->id;?>'>view</a></td>
</tr>