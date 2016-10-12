<table id="view_patient">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Name</th>
    <th>Surname</th>
    <th>ID Number</th>
    <th>Cellphone</th>
    <th>File Number</th>
    <th>Physical Address</th>
    <th>action</th>
  </tr>
  <?php
    if (count($pList) > 0)
    {
      foreach ($pList as $pat)
      {
        include 'view_pat_row.php';        
      }

    }
  ?>
</table>
