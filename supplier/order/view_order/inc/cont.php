<table>
  <tr>
    <th>Id</th>
    <th>order amount</th>
    <th>Order date</th>
    <th>status</th>
    <th>action</th>
  </tr>
<?php
  if(count($oList)> 0)
  {
    foreach($oList as $o)
    {
      include 'view_ord_row.php';
    }
  }
?>
</table>