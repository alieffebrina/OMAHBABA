<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan Piutang</th>
</tr>
<tr>
 <th>NO</th>
 <th>NOTA PENJUALAN</th>
 <th>TANGGAL NOTA</th>
 <th>PELANGGAN</th>
 <th>JENIS PEMBAYARAN</th>
 <th>TANGGAL JATUH TEMPO</th>
 <th>TOTAL HARGA</th>
 <th>STATUS PEMBAYARAN</th>
 <th>NAMA BARANG</th>
 <th>JENIS BARANG</th>
 <th>SATUAN</th>
 <th>QTT</th>
 <th>HARGA</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $excel) { 
	?>
<tr>
 <td><?php echo $i ?></td>
 <td><?php echo $excel->id_penjualan ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tglnota)) ?></td>
 <td><?php echo $excel->nama; ?></td>
 <td><?php echo $excel->jenispembayaran; ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tgljatuhtempo)) ?></td>
 <td><?php echo $excel->total; ?></td>
 <td><?php echo $excel->status; ?></td>
 <td><?php echo $excel->barang; ?></td>
 <td><?php echo $excel->jenisbarang; ?></td>
 <td><?php echo $excel->qtt; ?></td>
 <td><?php echo $excel->satuan; ?></td>
 <td><?php echo $excel->harga; ?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>