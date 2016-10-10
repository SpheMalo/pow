<table id="view_procedure_type">
  <tr>
    <th>Code</th>
    <th>Description</th>
    <th>Actions</th>
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
