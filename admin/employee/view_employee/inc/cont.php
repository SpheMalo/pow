<table>
  <tr>
    <th>id</th>
    <th>title</th>
    <th>name</th>
    <th>surname</th>
    <th>username</th>
    <th>gender</th>
    <th>position</th>
    <th>action</th>
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