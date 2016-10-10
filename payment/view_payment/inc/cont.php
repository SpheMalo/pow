<table id="view_payments">
  <tr>
    <th>ID</th>
    <th>Amount</th>
    <th>Date</th>
    <th>Payment Type</th>
    <th>Invoice ID</th>
    <th>Action</th>
  </tr>
  <?php
    if (count($payList) > 0)
    {
      foreach ($payList as $pay)
      {
        include 'view_pay_row.php';        
      }

    }
  ?>
</table>
