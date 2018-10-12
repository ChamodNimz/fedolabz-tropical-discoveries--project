<?php 
	require_once '../core/init.php';

	$vNo= $_POST['no'];
	$query="SELECT `ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`, `receivedCode`, `nationalty`, `guestName` FROM `voucherh`  WHERE voucherNo ='$vNo' and status ='pending' ";
	$dataSet= mysqli_query($connection,$query);

 ob_start();	
	while($row= mysqli_fetch_array($dataSet)):
 ?>

 <tr>
          <td><?php echo $row[0] ?></td>
           <td><?php echo $row[1] ?></td>
           <td><?php echo $row[2] ?></td>
           <td><?php echo $row[3] ?></td>
           <td><?php echo $row[4] ?></td>
           <td><?php echo $row[5] ?></td>
           <td><?php echo $row[6] ?></td>
           <td><?php echo $row[7] ?></td>
           <td><?php echo $row[8] ?></td>
           <td><?php echo $row[9] ?></td>
           <td><?php echo $row[10] ?></td>
</tr>

<?php endwhile; ?>
<?php ob_flush();  ?>
<?php echo ob_get_flush(); ?>