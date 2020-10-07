<?php 
  $no=1;
  foreach ($barang as $key=>$barang) { ?>
  <div class='col-12 col-md-6 col-lg-4' id='<?= $key; ?>'>
    <img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'>
    <br>
    <label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?>
    <br>
    <label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?>
    <br>
    <?php echo $barang->barang.' / '.$barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?>
    <br>
    <label>Stok : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->stok; ?>
    <br>
    <label>Harga : </label>&nbsp;&nbsp;&nbsp;Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?><br>
    <input type="hidden" id="id_barang<?= $key; ?>" value="<?php echo $barang->id_barang; ?>">
    <input type="hidden" id="nama_barang<?= $key; ?>" value="<?php echo $barang->barang; ?>">
    <input type="hidden" id="satuan<?= $key; ?>" value="<?php echo $barang->satuan; ?>">
    <input type="hidden" id="harga<?= $key; ?>" value="<?php echo $barang->hargabeli; ?>">
    <span>Quantity : </span>&nbsp;&nbsp;&nbsp;<input class='form-control' type="text" id="qtt<?= $key; ?>" value="">
  </div>
  <?php }?>