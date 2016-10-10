<table id="view_procedure">
  <tr>
    <th>ID</th>
    <th>Description</th>
    <th>Code</th>
    <th>Price</th>
    <th>Procedure type</th>
    <th>Favourites</th>
    <th>Actions</th>
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
