
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Development By &copy; 2020 <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="<?php //echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php //echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap 
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php //echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart 
<script src="<?php //echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/terbilang.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->
<script>
  $(document).ready(function(){ 
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
     $('.tanggalan').daterangepicker({
        timePicker: false,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'DD.MM.YYYY'
        }
      });
     $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
      })
    //Date range picker with time picker
  })
</script>
<!-- Page script -->
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#prov").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kota"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#prov").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#kota").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_Setting/get_kecamatan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_kota : $("#kota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kecamatan").html(response.list_kec).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#nama_toko").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_suplier/cek_suplier"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_suplier : $("#nama_toko").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          // $("#nama_suplier").html("aaaa");

          // $('#limit').val(response.limit);
          $("#nama_suplier").html(response.list_suplier).show();
          $("#alamat").html(response.list_alamat).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#nama").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_pelanggan/cek_pelanggan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_pelanggan : $("#nama").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          console.log(response);
          if($("#kredit").is(':checked')){
            $('#limit').val(response.limit_pelanggan);
          }
          $("#alamat").html(response.list_alamat).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#nama_barang").change(function(){ // Ketika user mengganti atau memilih data provinsi
    // var lastRowId = $('#tabelku tr:last').attr("id");
    // var barang = new Array();
    // var jumlah = parseInt($("#jumlahform").val());
    // for (var i = 1; i <=lastRowId ; i++) {
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_barang/ceksatuan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_barang : $("#nama_barang").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#tampilharga").html(response.list_harga).show();
          $("#tampilsatuan").html(response.list_satuan).show();
          $("#namashow").html(response.list_namabarang).show();
          $("#jenisbarang").val(response.jenisbarang);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    // }
    });
  });
  </script>
  <script type="text/javascript">
    function returpembelian(){
      var d = (document.getElementById('diskonbawah').value==''?0:parseInt(document.getElementById('diskonbawah').value));
      var e = (document.getElementById('biayalain').value==''?0:parseInt(document.getElementById('biayalain').value));
      var f = (document.getElementById('subtotalbawahrupiah').value==''?0:parseInt(document.getElementById('subtotalbawahrupiah').value));
      
      if (d>f){
        var hitungtotal = f+e+1-1;
        $("#nilaidiskonbawah").css("color","#fc5d32");
        $("#diskonbawah").css("border-color","#fc5d32");
        $("#nilaidiskonbawah").html("diskon melebihi total penjualan");
        $("#diskonbawah").val("");
      }else{
        var hitungtotal = f-d+e+1-1;
      }
      var numbertotal = hitungtotal.toString(),
        sisa  = numbertotal.length % 3,
        rupiah  = numbertotal.substr(0, sisa),
        ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      document.getElementById('total').value = hitungtotal;
      document.getElementById('totalfix').innerHTML = formatRupiah(rupiah);
      var input = document.getElementById('totalfix').innerHTML.replace(/\./g, "");
      //terbilang
      document.getElementById("terbilang").innerHTML = terbilang(input);
  };
  </script>
  
<script type="text/javascript">
  function startCalculate(){
    var interval=setInterval("Calculate()",10);

  };

  function startCalculatetotal(){

    var intervala=setInterval("Calculate_total()",10);
  };
  function Calculate(){
      var a = document.getElementById('harga').value;
      var b = document.getElementById('qtt').value;
      var c = document.getElementById('diskon').value;
      // alert((a*b));
      if (c>(a*b)){
        $("#nilaidiskon").css("color","#fc5d32");
        $("#diskon").css("border-color","#fc5d32");
        $("#nilaidiskon").html("diskon melebihi total penjualan");
        $("#diskon").val("");
        var bilangan = (a*b);
      }else{
        var bilangan = (a*b)-c;
      }
      var number_string = bilangan.toString(),
        sisa  = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('subtotal').value = formatRupiah(rupiah) ;
      document.getElementById('subtotalrupiah').value = bilangan ;   
  };
  function Calculate_total(){
      var d = (document.getElementById('diskonbawah').value.replace(/[^0-9]/g,'')==''?0:parseInt(document.getElementById('diskonbawah').value.replace(/[^0-9]/g,'')));
      var e = (document.getElementById('biayalain').value==''.replace(/[^0-9]/g,'')?0:parseInt(document.getElementById('biayalain').value.replace(/[^0-9]/g,'')));
      var f = (document.getElementById('subtotalbawahrupiah').value==''?0:parseInt(document.getElementById('subtotalbawahrupiah').value));
      
      if (d>f){
        var hitungtotal = f+e+1-1;
        $("#nilaidiskonbawah").css("color","#fc5d32");
        $("#diskonbawah").css("border-color","#fc5d32");
        $("#nilaidiskonbawah").html("diskon melebihi total penjualan");
        $("#diskonbawah").val("");
      }else{
        var hitungtotal = f-d+e+1-1;
      }
      var numbertotal = hitungtotal.toString(),
        sisa  = numbertotal.length % 3,
        rupiah  = numbertotal.substr(0, sisa),
        ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      document.getElementById('total').value = hitungtotal;
      document.getElementById('totalfix').innerHTML = 'Rp. '+formatRupiah(rupiah);
      var input = document.getElementById('totalfix').innerHTML.replace(/[^0-9]/g,'');
      //terbilang
      document.getElementById("terbilang").innerHTML = terbilang(input);

    //   if(d<f || f==0){
    //     var hitungtotal = f-d+e;
    //     var numbertotal = hitungtotal.toString(),
    //       sisa  = numbertotal.length % 3,
    //       rupiah  = numbertotal.substr(0, sisa),
    //       ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);


    //     // COBA UNUK MENGECEK APAKAH DISKON MELEBIHI TOTAL
    //     // var hitungtotal = f-d+e+1-1;
    //     // if (d>f){
    //     //   $("#nilaidiskonbawah").css("color","#fc5d32");
    //     //   $("#diskonbawah").css("border-color","#fc5d32");
    //     //   $("#nilaidiskonbawah").html("diskon melebihi total penjualan");
    //     //   $("#diskonbawah").val("");
    //     // }
    //     // var numbertotal = hitungtotal.toString(),
    //     //   sisa  = numbertotal.length % 3,
    //     //   rupiah  = numbertotal.substr(0, sisa),
    //     //   ribuan  = numbertotal.substr(sisa).match(/\d{3}/g);

            
    //     if (ribuan) {
    //       separator = sisa ? '.' : '';
    //       rupiah += separator + ribuan.join('.');
    //     }

    //     // ME
    //     document.getElementById('totalfixruppiah').value = hitungtotal;

    //     document.getElementById('totalfix').innerHTML = formatRupiah(rupiah);
    //     var input = document.getElementById('totalfix').innerHTML.replace(/\./g, "");

    //     document.getElementById('total').value = input;
    //     //terbilang
    //     document.getElementById("terbilang").innerHTML = terbilang(input);
    // }else{
    //   alert('diskon tidak boleh lebih besar dari subtotal penjualan');
    //   document.getElementById('diskonbawah').value=0;
    //   Calculate_total();
    // }
  };

  function stopCalc(){
    clearInterval(interval);
    // clearInterval(intervala);
  };
  function stopCalctotal(){
    clearInterval(intervala);
    // clearInterval(intervala);
  };
  
  $(document).ready(function() {
    $("#formpenjualan").on('submit', function(e){
        var limit=(($('#limit').val()=='')?0:$('#limit').val().replace(/,/g,''));
        var total=(($('#total').val()=='')?1110:$('#total').val());
        var subtotal_bawah=(($('#subtotalbawahrupiah').val()=='')?0:$('#subtotalbawahrupiah').val());
        if($("#nama").val()==''){alert('Nama Pelanggan harus diisi');
            e.preventDefault();
            return false;
        }
        if(subtotal_bawah!=0){
          if($("#kredit").is(':checked') && parseFloat(limit)<parseFloat(total)){
             // 
            alert('Penjualan melebihi limit');
            e.preventDefault();
            return false;
          }else{
            
            return true;
          }
        }else{
          alert('Detail penjualan harus diisi');
          e.preventDefault();
          return false;
        }
    });
    var id = 1; 
    var sumHsl = 0;
    var barangall=0;
      $("#butsend").click(function() {
        if($("#subtotal").val()!=''){
        var newid = id++; 
        var st = parseInt($("#subtotalrupiah").val());
        if(document.getElementById('subtotalbawahrupiah').value!=''){
          sumHsl=document.getElementById('subtotalbawahrupiah').value;
        }else{
          sumHsl=0;
        };
        $("#tabelku").append('<tr valign="top" id="'+newid+'">\n\
          <td width="100px" ><input type="hidden" name="tr" value="'+newid+'"><input type="hidden" name="no[]" value="'+$("#nonota").val()+'">' + newid + '</td>\n\
          <td width="100px" class="barang'+newid+'"><input type="hidden" name="namabara[]" value="'+$("#nama_barang").val()+'">' + $("#namabarangshow").val() + '</td>\n\
          <td width="100px" class="jenisbarang'+newid+'">' + $("#jenisbarang").val() + '</td>\n\
          <td width="100px" class="qtt'+newid+'"><input type="hidden" name="qtt[]" value="'+$("#qtt").val()+'">' + $("#qtt").val() + '</td>\n\
          <td width="100px" class="satuan'+newid+'">' + $("#satuan").val() + '</td>\n\
          <td width="100px" class="harga'+newid+'"><input type="hidden" name="harga[]" value="'+$("#harga").val()+'">Rp. ' + $("#hargashow").val() + '</td>\n\
          <td width="100px" class="diskon'+newid+'"><input type="hidden" name="diskon[]" value="'+$("#diskon").val()+'">Rp. ' + $("#diskon").val() + '</td>\n\
          <td width="100px" class="subtotal'+newid+'">Rp. ' + $("#subtotal").val() + '</td>\n\
          <td width="100px"><a href="javascript:void(0);" class="remCF" data-id="'+st+'" ><input type="hidden" id="suba" value="'+st+'" class="aatd'+newid+'">\n\
                <button type="button" class="btn btn-info btn-sm">\n\
                  <i class="fa fa-times"></i></button></a></td>\n\ </tr>');
        // var sumHsl = 0;
        // for (t=0; t<newid; t++){
          sumHsl = (sumHsl*1)+(st*1);
          // var barangall = "";
          barangall = barangall+" "+$("#nama_barang").val()+"/"+$("#qtt").val()+"/"+$("#diskon").val()+"/"+$("#harga").val()+"/"+$("#stokaw").val()+"/"+$("#kodesatuan").val()+"/"+$("#qttkonversi").val();
          document.getElementById('barangall').value = barangall;
        // }

        var number_string = sumHsl.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
              document.getElementById('subtotalbawah').value = 'Rp. '+formatRupiah(rupiah);
              document.getElementById('subtotalbawahrupiah').value =sumHsl;

          document.getElementById('subtotalrupiah').value = '';
          document.getElementById('nama_barang').value = '';
          document.getElementById('qtt').value = '';
          document.getElementById('diskon').value = '';
          document.getElementById('subtotal').value = '';
          document.getElementById('hargashow').value = '';
          document.getElementById('tampilsatuan').value = '';
          document.getElementById('nilaidiskon').innerHTML = '';
          document.getElementById('nilaidiskon').color = '';
          $("#diskon").css("border-color","");
          Calculate_total();
          return false;
        }else{
          alert('harga dan qty harus diisi');
        }
      });


      $("#butsendpenjualan").click(function() {
        if($("#subtotal").val()!=''){
          if(parseFloat($('#stok').val())<parseFloat($("#qtt").val())){
            alert('stok tidak cukup');
          }else{
            var newid=$('#tabelku tbody>tr:last').find('td:eq(0)').text();
            // alert(newid);
            if(newid!=''){
              newid=parseInt(newid)+1;
            }else{
              newid=1;
            }

            var st = parseInt($("#subtotalrupiah").val());
            if(document.getElementById('subtotalbawahrupiah').value!=''){
              sumHsl=document.getElementById('subtotalbawahrupiah').value;
            }else{
              sumHsl=0;
            };

            $("#tabelku").append('<tr valign="top" id="'+newid+'">\n\
              <td width="100px" >' + newid + '</td>\n\
              <td width="100px" class="barang'+newid+'"><input type="hidden" name="id_barang[]" value="'+$("#nama_barang").val()+'">' + $("#namabarangshow").val() + '</td>\n\
              <td width="100px" class="qtt'+newid+'"><input type="hidden" name="qtt[]" value="'+$("#qtt").val()+'">' + $("#qtt").val() + '</td>\n\
              <td width="100px" class="satuan'+newid+'"><input type="hidden" name="satuan[]" value="'+$("#satuan").val()+'">' + $("#satuan").val() + '</td>\n\
              <td width="100px" class="harga'+newid+'"><input type="hidden" name="harga[]" value="'+$("#harga").val()+'">Rp. ' + $("#hargashow").val() + '</td>\n\
              <td width="100px" class="diskon'+newid+'"><input type="hidden" name="diskon[]" value="'+$("#diskon").val()+'">Rp. ' + $("#diskon").val() + '</td>\n\
              <td width="100px" class="subtotal'+newid+'"><input type="hidden" name="subtotal[]" value="'+$("#subtotalrupiah").val()+'">Rp. ' + $("#subtotal").val() + '</td>\n\
              <td width="100px"><a href="javascript:void(0);" class="remCF" data-id="'+st+'" ><input type="hidden" id="suba" value="'+st+'" class="aatd'+newid+'">\n\
                <button type="button" class="btn btn-info btn-sm">\n\
                  <i class="fa fa-times"></i></button></a></td>\n\ </tr>');


            // var sumHsl = 0;
            // for (t=0; t<newid; t++){
              sumHsl = parseFloat(sumHsl)+parseFloat(st);

            // }
              var number_string = sumHsl.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
              document.getElementById('subtotalbawah').value = 'Rp. '+formatRupiah(rupiah);
              document.getElementById('subtotalbawahrupiah').value =sumHsl;
              
              document.getElementById('subtotal').value = '';
              document.getElementById('subtotalrupiah').value = '';
              document.getElementById('nama_barang').value = '';
              document.getElementById('qtt').value = '';
              document.getElementById('diskon').value = '';
              document.getElementById('subtotal').value = '';
              document.getElementById('hargashow').value = '';
              document.getElementById('tampilsatuan').value = '';

              $("#diskon").css("border-color","");
              Calculate_total();
              return false;
          }
        }else{
          alert('harga dan qty harus diisi');
        }
      });

    $("#tabelku").on('click', '.remCF', function() {
      // var rowid = $(this).attr('id');;
      // var sta = parseInt($("#subtotalrupiah").val());
      $(this).parent().parent().remove();
      sumHasl =  document.getElementById('subtotalbawahrupiah').value;
      var suba= $(this).parent().find('#suba').val();
      sumHasl=sumHasl-suba;
      var number_string = sumHasl.toString(),
        sisa  = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
      document.getElementById('subtotalbawah').value = formatRupiah(rupiah);
      document.getElementById('subtotalbawahrupiah').value =sumHasl ;
      Calculate_total();
    });
  });
</script>

  <script type="text/javascript">
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_username(){
        $("#pesan").hide();
 
        var username = $("#username").val();
 
        if(username != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_user'; ?>", //arahkan pada proses_tambah di controller member
                data: 'user='+username,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan").css("color","#fc5d32");
                        $("#username").css("border-color","#fc5d32");
                        $("#pesan").html("Username sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan").css("color","#59c113");
                        $("#username").css("border-color","#59c113");
                        $("#pesan").html("");
                        error = 0;
                    }
 
                    $("#pesan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>

<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_gudang(){
        $("#pesan").hide();
 
        var gudang = $("#gudang").val();
 
        if(gudang != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_Gudang/cek_gudang'; ?>", //arahkan pada proses_tambah di controller member
                data: 'gudang='+gudang,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan").css("color","#fc5d32");
                        $("#gudang").css("border-color","#fc5d32");
                        $("#pesan").html("Gudang sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan").css("color","#59c113");
                        $("#gudang").css("border-color","#59c113");
                        $("#pesan").html("");
                        error = 0;
                    }
 
                    $("#pesan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>

<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_namasuplier(){
        $("#pesan_suplier").hide();
 
        var nama_suplier = $("#nama_suplier").val();
 
        if(nama_suplier != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_suplier/cek_namasuplier'; ?>", //arahkan pada proses_tambah di controller member
                data: 'nama_suplier='+nama_suplier,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_suplier").css("color","#fc5d32");
                        $("#nama_suplier").css("border-color","#fc5d32");
                        $("#pesan_suplier").html("Nama Suplier sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan_suplier").css("color","#59c113");
                        $("#nama_suplier").css("border-color","#59c113");
                        $("#pesan_suplier").html("");
                        error = 0;
                    }
 
                    $("#pesan_suplier").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_tlpsuplier(){
        $("#pesan_tlpsuplier").hide();
 
        var tlp_suplier = $("#tlp_suplier").val();
 
        if(tlp_suplier != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_suplier/cek_tlpsuplier'; ?>", //arahkan pada proses_tambah di controller member
                data: 'tlp_suplier='+tlp_suplier,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_tlpsuplier").css("color","#fc5d32");
                        $("#tlp_suplier").css("border-color","#fc5d32");
                        $("#pesan_tlpsuplier").html("Tlp Suplier sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan_tlpsuplier").css("color","#59c113");
                        $("#tlp_suplier").css("border-color","#59c113");
                        $("#pesan_tlpsuplier").html("");
                        error = 0;
                    }
 
                    $("#pesan_tlpsuplier").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_namapelanggan(){
        $("#pesan_pelanggan").hide();
 
        var nama_pelanggan = $("#nama_pelanggan").val();
 
        if(nama_pelanggan != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_Pelanggan/cek_namapelanggan'; ?>", //arahkan pada proses_tambah di controller member
                data: 'nama_pelanggan='+nama_pelanggan,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_pelanggan").css("color","#fc5d32");
                        $("#nama_pelanggan").css("border-color","#fc5d32");
                        $("#pesan_pelanggan").html("Nama Pelanggan sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan_pelanggan").css("color","#59c113");
                        $("#nama_pelanggan").css("border-color","#59c113");
                        $("#pesan_pelanggan").html("");
                        error = 0;
                    }
 
                    $("#pesan_pelanggan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_tlppelanggan(){
        $("#pesan_tlppelanggan").hide();
 
        var tlp_pelanggan = $("#tlp_pelanggan").val();
 
        if(tlp_pelanggan != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_Pelanggan/cek_tlppelanggan'; ?>", //arahkan pada proses_tambah di controller member
                data: 'tlp_pelanggan='+tlp_pelanggan,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan_tlppelanggan").css("color","#fc5d32");
                        $("#tlp_pelanggan").css("border-color","#fc5d32");
                        $("#pesan_tlppelanggan").html("Tlp Pelanggan sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan_tlppelanggan").css("color","#59c113");
                        $("#tlp_pelanggan").css("border-color","#59c113");
                        $("#pesan_tlppelanggan").html("");
                        error = 0;
                    }
 
                    $("#pesan_tlppelanggan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type="text/javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#belikredit").click(function () {
      if($("#nama_toko").val()!=''){
        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("index.php/C_Pembelian/getlimit"); ?>", // Isi dengan url/path file php yang dituju
          data: {id_suplier : $("#nama_toko").val()}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil
            $('#limit').val(response.limit);
            $('#tgljatuhtempo').removeAttr('disabled');
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      }else{
        alert('pilih suplier terlebih dahulu');
        $(this).prop('checked', false);
        $('#belicash').prop('checked', true);
      }
    });
    $("#belicash").click(function(){

            $('#limit').val('');
            document.getElementById("tgljatuhtempo").disabled = true;
    });
        });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#kredit").click(function () {
      if($("#nama").val()!=''){
        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("index.php/C_pelanggan/get_limit"); ?>", // Isi dengan url/path file php yang dituju
          data: {id : $("#nama").val()}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil
            $('#limit').val(response.limit_pelanggan);
            $('#tgljatuhtempo').removeAttr('disabled');
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      }else{
        alert('pilih pelanggan terlebih dahulu');
        $(this).prop('checked', false);
        $('#cash').prop('checked', true);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#belikredit").click(function () {
      if($("#nama_toko").val()!=''){
            $('#tgljatuhtempo').removeAttr('disabled');
      }else{
        alert('pilih pelanggan terlebih dahulu');
        $(this).prop('checked', false);
      }
    });
    $("#cash").click(function () {
        $('#tgljatuhtempo').attr('disabled','disabled'); 
        var limit = document.getElementById('limit');
        if(limit){
          $('#limit').val('');
        }
    });
  });
</script>
<script type="text/javascript">
  function embuh(){
    var embuha = document.getElementById('kodeformat1').value;
    if(embuha=='huruf'){
    document.getElementById('texthuruf1').style.visibility='visible';
    // document.getElementById('texthuruf1').value = embuha;
    } else {
    document.getElementById('texthuruf1').style.visibility='hidden';

    }
  }

  function embuhb(){
    var embuhtext = document.getElementById('format2').value;
    if(embuhtext=='huruf'){
    document.getElementById('texthuruf2').style.visibility='visible';
    } else {
    document.getElementById('texthuruf2').style.visibility='hidden';

    }
  }

  function embuhc(){
    var embuhtext3 = document.getElementById('format3').value;
    if(embuhtext3=='huruf'){
    document.getElementById('texthuruf3').style.visibility='visible';  
    } else {
    document.getElementById('texthuruf3').style.visibility='hidden';   
    }
    // document.getElementById('texthuruf3').value=embuhtext3;
  }
  function embuhhub(){
      var a = document.getElementById('kodeformat1').value;
      var b = document.getElementById('format2').value;
      var c = document.getElementById('format3').value;
      var d = document.getElementById('penghubung').value;
      var e = document.getElementById('texthuruf1').value;
      var f = document.getElementById('texthuruf2').value;
      var g = document.getElementById('texthuruf2').value;
      if (a == "huruf"){
        var a = e;
      } 
      if (b == "huruf"){
        var b = f;
      } 
      if(c == "huruf"){
        var c = g;
      }
      document.getElementById('final').value = 'username'+d+a+d+b+d+c;
    // var embuhhuba = document.getElementById('penghubung').value;
  // document.getElementById('final').value= a+b;
  }
</script>
<script type="text/javascript">
//  $(document).ready(function() {
//     // Kondisi saat Form di-load
//             // $('#texthuruf1').hide();
      
//       document.getElementById('texthuruf1').style.visibility='hidden';
//       document.getElementById('texthuruf2').style.visibility='hidden';
//       document.getElementById('texthuruf3').style.visibility='hidden';
    
//     $("#format1").change(function() {
//       if (this.value != "huruf") {
//             document.getElementById('texthuruf2').style.visibility='hidden';
//             $('#texthuruf2').val('');
//       else 
//             document.getElementById('texthuruf2').style.visibility='visible';
//             $('#texthuruf2').focus();
//     }
//     $("#format2").change(function() {
//         if (this.value != "huruf") {
//             document.getElementById('texthuruf2').style.visibility='hidden';
//             $('#texthuruf2').val('');
//         } else {
//             document.getElementById('texthuruf2').style.visibility='visible';
//             $('#texthuruf2').focus();
//         } 
//     });
//     $("#format3").change(function() {
//         if (this.value != "huruf") {
//             document.getElementById('texthuruf3').style.visibility='hidden';
//             $('#texthuruf3').val('');
//         } else {
//             document.getElementById('texthuruf3').style.visibility='visible';
//             $('#texthuruf2').focus();
//         } 
//     });

//     $("#penghubung").change(function() {
//        var format1 = $("#format1").value();
//        document.getElementById('final').value = format1;
//       var a = document.getElementById('format1').value;
//       var b = document.getElementById('format2').value;
//       var c = document.getElementById('format3').value;
//       var d = document.getElementById('penghubung').value;
//       var e = document.getElementById('texthuruf1').value;
//       var f = document.getElementById('texthuruf2').value;
//       var g = document.getElementById('texthuruf2').value;
//       document.getElementById('kodefinal').innerHTML = a;
//       if (a == "huruf"){
//         var a = e;
//       } 
//       if (b == "huruf"){
//         var b = f;
//       } 
//       if(c == "huruf"){
//         var c = g;
//       }
//       document.getElementById('final').value = a+d+b+d+c;
//     });
// });
</script>
  
<script type="text/javascript">
    
    var rupiah = document.getElementById('rupiah');
    if(rupiah){
      rupiah.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var diskonbawah = document.getElementById('diskonbawah');
    if(diskonbawah){
      diskonbawah.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        diskonbawah.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var biayalain = document.getElementById('biayalain');
    if(biayalain){
      biayalain.addEventListener('keyup', function(e){
      //   // tambahkan 'Rp.' pada saat form di ketik
      //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        biayalain.value = formatRupiah(this.value, 'Rp. ');
      });
    }
 
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    var id_penjualan = document.getElementById('id_penjualan');
    
    if(id_penjualan){
      if($("#id_penjualan").val()!=''){
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_penjualan/get_info_penjualan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_penjualan : $("#id_penjualan").val(), type : $("#type").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
        console.log(response);// Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $('#id_pelanggan').val(response.id_pelanggan);
          $("#nama").val(response.nama);
          $("#alamat").html(response.alamat).show();
          $("#tabelku > tbody").html(response.detail_penjualan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }}

    $("#id_penjualan").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/C_penjualan/get_info_penjualan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_penjualan : $("#id_penjualan").val(), type : $("#type").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
        console.log(response);// Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $('#id_pelanggan').val(response.id_pelanggan);
          $("#nama").val(response.nama);
          $("#alamat").html(response.alamat).show();
          $("#tabelku > tbody").html(response.detail_penjualan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
    $("#formretur").on('submit', function(e){
        if($("#id_penjualan").val()==''){alert('Penjualan retur harus diisi');
            e.preventDefault();
            return false;
        }else{
          if($("#ketretur").val()==''){alert('Keterangan retur harus diisi');
              e.preventDefault();
              return false;
          }else{
            return true;
          }
        }
        
    });
  });

  function check_retur(row){
    var id=$(row).closest('tr').attr('id');
    var qtt= $("#tabelku > tbody").find('td').find('#qtt_'+id).val();
    if(parseInt(qtt)<$(row).val()){
      $(row).val(qtt);
      alert('retur tidak boleh melebihi penjualan');
    }
  }
  </script>
</body>
</html>