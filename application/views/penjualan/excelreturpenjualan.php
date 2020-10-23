<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan Penjualan</th>
</tr>
<tr>
 <th>NO</th>
 <th>NOTA RETUR JUAL</th>
 <th>NOTA PENJUALAN</th>
 <th>TANGGAL RETUR</th>
 <th>JENIS RETUR</th>
 <th>KETERANGAN RETUR</th>
 <th>TOTAL</th>
 <th>STATUS</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $excel) { 
	?>
<tr>
 <td><?php echo $i ?></td>
 <td><?php echo $excel->id_returjual ?></td>
 <td><?php echo $excel->id_penjualan ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tanggalretur)) ?></td>
 <td><?php echo $excel->jenisretur; ?></td>
 <td><?php echo $excel->ketretur; ?></td>
 <td><?php echo $excel->total; ?></td>
 <td><?php echo $excel->status; ?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>