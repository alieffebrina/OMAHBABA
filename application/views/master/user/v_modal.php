
<div class="modal fade" id="modaltipeuser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tipe User</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="tipeusermodal" name="tipeusermodal" placeholder="Tipe User">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpantipeuser">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modaladdgudang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gudang</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Gudang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="gudang" name="gudang" placeholder="Nama Gudang">
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
          <div class="col-sm-9">
            <select class="form-control select2" id="provmodal" name="prov" style="width: 100%;">
              <option value="">--Pilih--</option>
              <?php foreach ($provinsi as $provinsi) { ?>
              <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Kota</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="kotamodal" name="kota" style="width: 100%;">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
          <div class="col-sm-9">
          <select class="form-control select2" id="kecmodal" name="kecamatan" style="width: 100%;">
            </select>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="alamatgudang" id='alamat'></textarea>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="tlfgudang" name="tlf" placeholder="Telepon" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)">
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="emailgudang" name="email">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsimpangudang">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>