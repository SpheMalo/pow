<table id="view_med">
  <tr>
    <th>ID</th>
    <th>Description</th>
    <th>Name</th>
    <th>Email</th>
    <th>Tell</th>
    <th>Fax</th>
    <th>Physical Address</th>
    <th>Postal Address</th>
    <th>Action</th>
  </tr>
  <?php
    if (count($mList) > 0)
    {
      foreach ($mList as $med)
      {
        include 'view_med_row.php';        
      }

    }
  ?>
</table>
