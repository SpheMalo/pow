<table id="view_consultation">
  <tr>
    <th>ID</th>
    <th>Patient Name</th>
    <th>Medical Aid</th>
    <th>Dentist Name</th>
    <th>Practice Location</th>
    <th>Appointment Date</th>
    <th>Appointment Time</th>
    <th>Consultation Status</th>
    <th>Booking Type</th>
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
