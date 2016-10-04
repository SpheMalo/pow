<table>
  <tr>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Size</th>
    <th>Quantity Ordered</th>
    <th>action</th>
  </tr>
<?php
  if(count($pList)> 0) 
  {
    foreach($pList as $prod)
    {
      include 'view_ord_row.php';
    }
  }
?>
</table>