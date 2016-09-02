<table>
  <tr>
    <th>id</th>
    <th>description</th>
    <th>name</th>
    <th>email</th>
    <th>tell</th>
    <th>fax</th>
    <th>physical address</th>
    <th>postal address</th>
    <th>action</th>
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
