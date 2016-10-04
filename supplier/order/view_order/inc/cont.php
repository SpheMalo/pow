<table>
  <tr>
    <th>Id</th>
    <th>order number</th>
    <th>order status</th>
    <th>order date</th>
    <th>order supplier</th>
    <th>action</th>
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