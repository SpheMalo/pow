<table>
  <tr>
    <th>description</th>
    <th>fav</th>
    <th>actions</th>
  </tr>
  <?php
    if (count($prcTypList) > 0)
    {
      foreach ($prcTypList as $prctype)
      {
        include 'view_procType_row.php';        
      }

    }
  ?>
</table>
