<table id="view_orders">
  <tr>
    <th>ID</th>
    <th>Order Number</th>
    <th>Order Status</th>
    <th>Order Date</th>
    <th>Order Supplier</th>
    <th>Action</th>
  </tr>
<?php
  if(count($oList)> 0)
  {
    foreach($oList as $order)
    {
      include 'view_ord_row.php';
    }
  }
?>
</table>