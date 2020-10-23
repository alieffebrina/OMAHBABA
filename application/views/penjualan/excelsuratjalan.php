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
 <th>NOTA SURAT JALAN</th>
 <th>NOTA PENJULAN PO</th>
 <th>TANGGAL KIRIM</th>
 <th>NAMA PENGIRIM</th>
 <th>ALAMAT KIRIM</th>
 <th>STATUS</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $excel) { 
	?>
<tr>
 <td><?php echo $i ?></td>
 <td><?php echo $excel->id_suratjalan ?></td>
 <td><?php echo $excel->id_penjualan ?></td>
 <td><?php echo date('d-m-Y', strtotime($excel->tglkirim)) ?></td>
 <td><?php echo $excel->namapengirim; ?></td>
 <td><?php echo $excel->alamatkirim; ?></td>
 <td><?php echo $excel->status; ?></td>
 </tr>
<?php $i++; } ?>
</tbody>
</table>