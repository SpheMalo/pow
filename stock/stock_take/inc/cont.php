<table>
  <tr>
    <th>Product Number</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Order Number</th>
    <th>QoH</th>
    <th>Count</th>
    <th>Variances</th>
  </tr>
<?php
  if(count($oList)> 0)
  {
    foreach($oList as $stock)
    {
      include 'view_stock_row.php';
    }
  }
?>
</table>