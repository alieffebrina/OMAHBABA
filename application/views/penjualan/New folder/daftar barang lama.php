<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($barang as $barang) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'><p><p><label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?><br><label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?><br><?php echo $barang->barang.' / '.$barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?><br><label>Stok : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->stok; ?><br><label>Harga : </label>&nbsp;&nbsp;&nbsp;Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?><br><label>Quantity : </label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="qtt" value="" onkeyup='Calculate()'><!-- <span class="input-group-addon" id="tampilsatuan"></span> --></td>


                  <!-- <br><label>Quantity : </label>&nbsp;&nbsp;&nbsp;<input type="<?php echo $barang->qtt; ?>" class="form-control" id="qtt" name="qtt" placeholder="Qtt"></td>

                  <input type="text" class="form-control" id="qtt" value="" onkeyup='Calculate()'>
                      <span class="input-group-addon" id="tampilsatuan"></span> -->


                  <td><img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'><p><p><label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?><br><label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?><br><?php echo $barang->barang.' / '.$barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?><br><label>Stok : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->stok; ?><br><label>Harga : </label>&nbsp;&nbsp;&nbsp;Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?><br><label>Quantity : </label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="qtt" value="" onkeyup='Calculate()'><!-- <span class="input-group-addon" id="tampilsatuan"></span> --></td>

                  <td><img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'><p><p><label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?><br><label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?><br><?php echo $barang->barang.' / '.$barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?><br><label>Stok : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->stok; ?><br><label>Harga : </label>&nbsp;&nbsp;&nbsp;Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?><br><label>Quantity : </label>&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="qtt" value="" onkeyup='Calculate()'><!-- <span class="input-group-addon" id="tampilsatuan"></span> --></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>