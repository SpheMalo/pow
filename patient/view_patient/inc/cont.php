<table id="view_patient">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>name</th>
    <th>surname</th>
    <th>cellphone</th>
    <th>telephone</th>
    <th>physical address</th>
    <th>postal address</th>
    <th>action</th>
  </tr>
  <?php
    if (count($pList) > 0)
    {
      foreach ($pList as $pat)
      {
        include 'view_pat_row.php';        
      }

    }
  ?>
</table>
