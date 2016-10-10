<table id="view_product">
  <tr>
    <th>ID</th>
    <th>Product Number</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Size</th>
    <th>Type</th>
    <th>Unit qty</th>
    <th>Critical Value</th>
    <th>Favourites</th>
    <th>Action</th>
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
