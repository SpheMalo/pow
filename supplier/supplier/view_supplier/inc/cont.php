<table id="view_supplier">
  <tr>
    <th>ID</th>
    <th>Supplier Name</th>
    <th>Contact Person</th>
    <th>Email</th>
    <th>Telephone</th>
    <th>Fax</th>
    <th>Bank Name</th>
    <th>Account Number</th>
    <th>Reference</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
<?php
  if(count($sList)> 0)
  {
    foreach($sList as $supp)
    {
      include 'view_supp_row.php';
    }
  }
?>
</table>