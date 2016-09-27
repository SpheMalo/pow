<table>
  <tr>
    <th>name</th>
    <th>description</th>
    <th>actions</th>
  </tr>
  <?php
    if (count($prdTypList) > 0)
    {
      foreach ($prdTypList as $prdtype)
      {
        include 'view_prodType_row.php';        
      }
    }
  ?> 
</table>
