<tr>
    <td><?php echo $stock->prodNo;?></td>
    <td><?php echo $stock->prodName;?></td>
    <td><?php echo $stock->prodType;?></td>
    <td><?php echo $stock->OrderNo;?></td>
    <td><?php echo $stock->QoH;?></td>
    <td><?php echo $stock->available;?></td>
    <td><a href="../write_off_stock/?id=<?php echo $stock->id;?>">Write-off</a></td>
</tr>