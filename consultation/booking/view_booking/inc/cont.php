<table>
  <tr>
    <th>ID</th>
    <th>patient name</th>
    <th>medical aid</th>
    <th>dentist name</th>
    <th>practice location</th>
    <th>appointment date</th>
    <th>appointment time</th>
    <th>Consultation status</th>
    <th>Action</th>
  </tr>
  <?php
    if (count($cList) > 0)
    {
      foreach ($cList as $book)
      {
        include 'view_book_row.php';        
      }

    }
  ?>
</table>
