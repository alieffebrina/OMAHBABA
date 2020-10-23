<?php 
  $no=1;

  foreach ($barang as $key=>$barang) { ?>
  <a href="javascript:void(0)" onclick='add_to_cart(<?= $key; ?>)'>
  <div class='col-12 col-md-6 col-lg-4' id='<?= $key; ?>'> <br>
    <center><img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'></center>
    
    <!-- <label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?>
    <br>
    <label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?>
    <br> -->
    <center><?php echo $barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?></center>
    <center>Harga : Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?></center>
    <center>Stok : <?php echo $barang->stok; ?>
    <!-- <button type="button" class="btn btn-warning" id='butsendpenjualan' >Beli</button> --></center>
    <input type="hidden" id="id_barang<?= $key; ?>" value="<?php echo $barang->id_barang; ?>">
    <input type="hidden" id="barcode<?= $key; ?>" value="<?php echo $barang->barcode; ?>">
    <input type="hidden" id="nama_barang<?= $key; ?>" value="<?php echo $barang->barang; ?>">
    <input type="hidden" id="merk<?= $key; ?>" value="<?php echo $barang->merk; ?>">
    <input type="hidden" id="warna<?= $key; ?>" value="<?php echo $barang->warna; ?>">
    <input type="hidden" id="ukuran<?= $key; ?>" value="<?php echo $barang->ukuran; ?>">
    <input type="hidden" id="satuan<?= $key; ?>" value="<?php echo $barang->satuan; ?>">
    <input type="hidden" id="stok<?= $key; ?>" value="<?php echo $barang->stok; ?>">
    <input type="hidden" id="harga<?= $key; ?>" value="<?php echo $barang->hargabeli; ?>">
    <!-- <span>Quantity : </span>&nbsp;&nbsp;&nbsp;<input class='form-control' type="text" id="qtt<?= $key; ?>" value=""> -->
  </div>
</a>
  <?php }?>