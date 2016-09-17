<?php
  $a = loadAddressesString($med->postal, $med->physical);

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
  <td><?php echo $med->id;?></td>
  <td><?php echo $med->description;?></td>
  <td><?php echo $med->name;?></td>
  <td><?php echo $med->email;?></td>
  <td><?php echo $med->tell;?></td>
  <td><?php echo $med->fax;?></td>
  <td><?php echo $ph;?></td>
  <td><?php echo $po;?></td>
  <td><a href='../update_medical_aid/?up=<?php echo $med->id;?>'>view</a></td>
</tr>