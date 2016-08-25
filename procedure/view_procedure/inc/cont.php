<table>
  <tr>
    <th>id</th>
    <th>description</th>
    <th>code</th>
    <th>price</th>
    <th>type</th>
    <th>fav</th>
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
