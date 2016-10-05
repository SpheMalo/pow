<table id="view_emp">
  <tr>
    <th>id</th>
    <th>title</th>
    <th>name</th>
    <th>surname</th>
    <th>practice location</th>
    <th>position</th>
    <th class="noExl">action</th>
  </tr>
  <?php
    if (count($eList) > 0)
    {
      foreach ($eList as $emp)
      {
        include 'view_emp_row.php';        
      }

    }
  ?>
</table>
