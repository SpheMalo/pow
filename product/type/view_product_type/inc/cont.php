<table id="view_product_type">
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
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
