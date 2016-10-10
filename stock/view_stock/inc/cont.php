<table id="view_stock">
  <tr>
    <th>Product Number</th>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Order Number</th>
    <th>QoH</th>
    <th>Available</th>
    <th>Action</th>
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