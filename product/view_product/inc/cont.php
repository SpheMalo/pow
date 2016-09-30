<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>description</th>
    <th>price</th>
    <th>size</th>
    <th>Unit quantity</th>
    <th>critical value</th>
    <th>type</th>
    <th>stock</th>
    <th>action</th>
  </tr>
  <?php
    if (count($prodList) > 0)
    {
      foreach ($prodList as $prod)
      {
        include 'view_prod_row.php';        
      }
    }
  ?>
</table>
