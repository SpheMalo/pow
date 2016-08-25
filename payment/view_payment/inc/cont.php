<table>
  <tr>
    <th>id</th>
    <th>amount</th>
    <th>date</th>
    <th>payment type</th>
    <th>invoice id</th>
    <th>action</th>
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
