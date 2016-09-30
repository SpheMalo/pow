<table>
  <tr>
    <th>id</th>
    <th>description</th>
    <th>code</th>
    <th>price</th>
    <th>Procedure type</th>
    <th>favourites</th>
    <th>actions</th>
  </tr>
  <?php
    if (count($procList) > 0)
    {
      foreach ($procList as $proc)
      {
        include 'view_proc_row.php';        
      }
    }
  ?>
</table>
