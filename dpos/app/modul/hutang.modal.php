<div class="modal fade" id="modalPembelian"    tabindex="-1" role="dialog" aria-labelledby="EditPostLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header" style="display:none">
<h5 class="modal-title" id="EditPostLabel">Transaksi Pembelian</h5>
</div>
<div class="modal-body" >
<hr>
<div id="showTablePembelian"></div>
</div>
<div class="modal-footer">
<button class="btn btn-success" id="bayarHutang"><i class="fa fa-check-square" aria-hidden="true"></i> Bayar Hutang</button>
<a class="btn btn-primary"  href="#" id="hapusTransaksi"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
<a class="btn btn-primary" onclick="jQuery('#printArea').print()" href="#" id="printPenjualan"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Tutup</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalBayarHutang" tabindex="-1" role="dialog" aria-labelledby="EditPostLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h5 class="modal-title" id="EditPostLabel">Pembayaran Hutang</h5>
</div>
<div class="modal-body" >
<div id="showFormHutang"></div>
</div>
<div class="modal-footer">
<a class="btn btn-success" id="inputHutang"><i class="fa fa-save" aria-hidden="true"></i> Simpan</a>
<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-window-close" aria-hidden="true"></i> Batal</button>
</div>
</div>
</div>
</div>
