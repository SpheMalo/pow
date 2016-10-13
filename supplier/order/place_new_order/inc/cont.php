<?php
  require '../../../../inc/func.php';
  $pList = loadProdList(null, null);

  if(isset($_POST['add_prod']))
  {
    $arr = explode("-", $_POST['add_prod']);
  
    foreach ($pList as $pl)
    {
      if ($pl->name == $arr[0] && $pl->type == $arr[1])
      {
        $_SESSION['orderBasket'][] = array(
          'name' => $pl->name,
          'type' => $pl->type,
          'size' => $pl->size,
          'quantity' => $_POST['add_prodq']
        );
      }

      //$_SESSION['orderBasket'][] = $basket;
    }   
  } 
?>

<table>
  <tr>
    <th>Product Name</th>
    <th>Product Type</th>
    <th>Size</th>
    <th>Quantity Ordered</th>
    <th>action</th>
  </tr>
<?php
  if (isset($_SESSION['orderBasket']))
  {
    $basket = $_SESSION['orderBasket'];
  }
  if(isset($basket) && count($basket)> 0) 
  {
    foreach($basket as $prod)
    {
      include 'view_ord_row.php';
    }
  }
?>
</table>

<?php
  if(!isset($basket))
  {
    echo "<p>the are no products selected</p>";
  }
?>