<?php
  $a = loadAddressesString($pat->postal, $pat->physical);

  if ($a == "query")
  {
    $ph = "query";
    $po = "query";
  }
  else if ($a == "rows")
  {
    $ph = "rows";
    $po = "rows";
  }
  else
  {
    $ph = $a[1];
    $po = $a[0];
  }

?>

<tr>
  <td><?php echo $pat->id;?></td>
  <td><?php echo $pat->title;?></td>
  <td><?php echo $pat->name;?></td>
  <td><?php echo $pat->surname;?></td>
  <td><?php echo $pat->cell;?></td>
  <td><?php echo $pat->tell;?></td>
  <td><?php echo $ph;?></td>
  <td><?php echo $po;?></td>
  <td><a href="../update_patient/?up=<?php echo $pat->id;?>">view</a></td>
</tr>