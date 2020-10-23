<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan Invoice</th>
</tr>
<tr>
 <th>NO</th>
 <th>NOTA INVOICE</th>
 <th>NOTA PO</th>
 <th>TANGGAL INVOICE</th>
 <th>VOUCHER</th>
 <th>DISKON</th>
 <th>BIAYA KIRIM</th>
 <th>TOTAL</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $excel) { 
	?>
<tr>
 <td><?php echo $i ?></td>
 <td><?php echo $excel->id_invoicejual ?></td>
 <td><?php echo $excel->id_penjualan ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tglinvoice)) ?></td>
 <td><?php echo $excel->voucher; ?></td>
 <td><?php echo $excel->diskon; ?></td>
 <td><?php echo $excel->biayakirim; ?></td>
 <td><?php echo $excel->total; ?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>