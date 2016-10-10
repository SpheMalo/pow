<table id="view_emp">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Practice Location</th>
    <th>Position</th>
    <th>Status</th>
    <th class="noExl">Action</th>
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
