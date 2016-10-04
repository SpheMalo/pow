<tr>
    <td><?php echo $order->id;?></td>
    <td><?php echo $order->number;?></td>
    <td><?php echo $order->status;?></td>
    <td><?php echo $order->date;?></td>
    <td><?php echo $order->supplier;?></td>
    <td><a href="../receive_order/?id=<?php echo $order->id;?>">view</a></td>
</tr>