<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="2"> Data Laba Rugi</th>
</tr>
<?php 
  $no=1; 
  foreach ($laporanpenjualan as $e) { $e->totalbulanini; }
  $jual = $e->totalbulanini;
  foreach ($laporanpembelian as $d) { $d->totalbulanini; }
  $beli = $d->totalbulanini;
   $totalkaskeluar = 0;
    foreach ($totalkas as $totalkas) {
      $totalkaskeluar += $totalkas->totalbulanini;
    }
    $kas =  $totalkaskeluar;
  ?>
</thead>
<tbody>
<tr>
 <th>TOTAL PENJUALAN</th>
 <td>Rp. <?php echo number_format($jual); ?></td>
</tr>
<tr>
 <th>TOTAL PEMBELIAN</th>
 <td>Rp. <?php echo number_format($beli); ?></td>
</tr>
<tr>
 <th>TOTAL KAS KELUAR</th>
 <td>Rp. <?php echo number_format($kas); ?></td>
</tr>
<tr>
 <th>LABA / RUGI KOTOR </th>
 <td>Rp. <?php echo number_format($jual-$beli); ?></td>
</tr>
<tr>
 <th>LABA / RUGI BERSIH </th>
 <td>Rp. <?php echo number_format($jual-($beli+$kas)); ?></td>
</tr>
<tr>
 </tr>
</tbody>
</table>