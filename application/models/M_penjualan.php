<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penjualan extends CI_Model {
    function cekpenjualantgl(){
        $vbulan = date("m"); 
        $where = array(
            'month(tglpojual)' => $vbulan
        );
        return $this->db->get_where('tb_penjualan',$where)->result();
    }

    function getall($id, $username){
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        if($username!='admin'){
            $where = array(
            'tb_penjualan.id_user' => $id
            );
            return $this->db->get_where('tb_penjualan',$where)->result();
        } else {
            return $this->db->get('tb_penjualan')->result();
        }
    }
    function getdetail($ida){
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_penjualan.id_penjualan' => $ida
        );
        return $this->db->get_where('tb_penjualan', $where)->result();
    }

    function getpiutang(){
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'status' => 'belum lunas'
        );
        return $this->db->get_where('tb_penjualan',$where)->result();
    }

    function pemakaianlimit($iduser){
        $this->db->select('sum(total) as totalpakai, tb_pelanggan.*');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $where = array(
            'tb_pelanggan.id_pelanggan' => $iduser,
            'status' => 'belum lunas'
        );
        return $this->db->get_where('tb_penjualan', $where)->result();
    }

    function getnota($nota){
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_penjualan.id_penjualan' => $nota
        );
        return $this->db->get_where('tb_penjualan', $where)->row();
    }

    function getdetailpenjualan($ida){
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_barang.id_warna');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $where = array(
            'tb_dtljual.id_penjualan' => $ida
        );
        return $this->db->get_where('tb_dtljual', $where)->result();
    }

    function getretur($ida){
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $where = array(
            'tb_penjualan.id_penjualan' => $ida
        );
        return $this->db->get_where('tb_penjualan', $where)->result();
    }

    function getlaporan(){
        if(isset($_POST) && !empty($_POST)){
            $tgl=explode(' - ', $_POST['tgl']);
            $tgl_mulai=explode('/', $tgl[0]);
            $tgl_sampai=explode('/', $tgl[1]);
        }

        $query = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_penjualan.* from tb_penjualan 
        left join tb_sjpenjualan on tb_sjpenjualan.id_penjualan = tb_penjualan.id_penjualan";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $query=$query." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $query = $this->db->query($query);

        return $query->result();
    }

     function getlaporanpiutang(){
        if(isset($_POST) && !empty($_POST)){
            $tgl=explode(' - ', $_POST['tgl']);
            $tgl_mulai=explode('/', $tgl[0]);
            $tgl_sampai=explode('/', $tgl[1]);
        }

        $query = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_penjualan.* from tb_penjualan 
        left join tb_sjpenjualan on tb_sjpenjualan.id_penjualan = tb_penjualan.id_penjualan";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $query=$query." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $query = $this->db->query($query);

        return $query->result();
    }

    function getlaporanlabarugi(){
        if(isset($_POST) && !empty($_POST)){
            $tgl=explode(' - ', $_POST['tgl']);
            $tgl_mulai=explode('/', $tgl[0]);
            $tgl_sampai=explode('/', $tgl[1]);
        }

        $queryjual = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_penjualan.* from tb_penjualan 
        left join tb_sjpenjualan on tb_sjpenjualan.id_penjualan = tb_penjualan.id_penjualan";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $queryjual=$queryjual." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $queryjual = $this->db->queryjual($queryjual);

        $querybeli = "SELECT tb_pembelian.* from tb_pembelian";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $querybeli=$querybeli." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $querybeli = $this->db->querybeli($querybeli);

        $querykas = "SELECT tb_kas.* from tb_kas";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $querykas=$querykas." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $querykas = $this->db->querykas($querykas);

        return $query->result();
    }

     function getdetaillaporan(){
        if(isset($_POST) && !empty($_POST)){
            $tgl=explode(' - ', $_POST['tgl']);
            $tgl_mulai=explode('/', $tgl[0]);
            $tgl_sampai=explode('/', $tgl[1]);
        }
        $query = "SELECT tb_penjualan.status status_penjualan,tb_penjualan.id_penjualan ,tb_penjualan.tglpojual, tb_satuan.*,tb_kategori.*,tb_barang.*,tb_dtljual.* from tb_dtljual
        join tb_penjualan on tb_dtljual.id_penjualan = tb_penjualan.id_penjualan
        join tb_barang on tb_dtljual.id_barang = tb_barang.id_barang
        join tb_kategori on tb_kategori.id_kategori = tb_barang.id_kategori
        join tb_satuan on tb_satuan.id_satuan = tb_barang.id_satuan";
        if(!empty($tgl[0]) && !empty($tgl[1])){
            $query=$query." where tglpojual between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
        }
        $query = $this->db->query($query);

        return $query->result();
    }

    function getreturpenjualan($ida){
        $this->db->join('tb_barang', 'tb_barang.id_barang = returpenjualan.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $where = array(
            'returpenjualan.id_penjualan' => $ida
        );
        return $this->db->get_where('returpenjualan', $where)->result();
    }

    function cekkodepenjualan(){
        $this->db->select_max('nourut');
        $idbarang = $this->db->get('tb_penjualan');
        return $idbarang->row();
    }

    function getpenjualan(){
        $this->db->select('*');
        $this->db->join('tb_pelanggan', 'tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_penjualan.id_cabang = tb_cabang.id_cabang');
        $this->db->join('tb_sales', 'tb_penjualan.id_sales = tb_sales.id_sales');
        $query = $this->db->get('tb_penjualan');
        return $query->result();
    }

    function tambahdata($id){
        // echo "<pre>";print_r($this->input->post());exit;
        $jenispembayaran = $this->input->post('jenispembayaran');
        if ($jenispembayaran == 'cash'){
            $status = 1;
        } else {
            $status = 0;
        }

        date_default_timezone_set('Asia/Jakarta');
        $penjualan = array(
            'id_user' => $id,
            'id_penjualan' => $this->input->post('nonota'),
            'id_pelanggan' => $this->input->post('nama'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_sales' => $this->input->post('namasales'),
            'tglpojual' => date('Y-m-d H:i'),
            // 'tgl_update' => date('Y-m-d H:i'),
            'subtotal' => $this->input->post('subtotalbawahrupiah'),
            // 'total' => $this->input->post('total'),
            'jenispembayaran' => $this->input->post('jenispembayaran'),
            'tgljatuhtempo' => date_format(date_create($this->input->post('tgljatuhtempo')), 'Y-m-d'),
            // 'ongkir' => preg_replace('/([^0-9]+)/','',$this->input->post('biayalain')),
            // 'diskon' => preg_replace('/([^0-9]+)/','',$this->input->post('diskonbawah')),
            'status' => $status
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_penjualan', $penjualan);
        if ($jenispembayaran != 'cash'){
            $query = "UPDATE tb_pelanggan SET tb_pelanggan.limit=tb_pelanggan.limit-".$penjualan['subtotal']." WHERE id_pelanggan='".$penjualan['id_pelanggan']."'";
            $this->db->query($query);
        }
        $barang = $this->input->post('id_barang');
        $qtt=$this->input->post('qtt');
        $satuan=$this->input->post('satuan');
        $harga=$this->input->post('harga');
        $diskon=$this->input->post('diskon');
        $subtotal=$this->input->post('subtotal');
        if(!empty($barang)){
            foreach ($barang as $key=>$value) {
                    // print_r($arrayName);
                $data = array('id_penjualan' => $penjualan['id_penjualan'],
                    'id_barang' => $value,
                    'qtt' => $qtt[$key],
                    'satuan' => $satuan[$key],
                    'diskon' => $diskon[$key],
                    'harga' =>$harga[$key],
                    'subtotal' => $subtotal[$key] );

                $this->db->insert('tb_dtljual', $data);

                $query = "UPDATE tb_barang SET stok=(stok-".$qtt[$key].") WHERE id_barang='".$value."'";
                        $this->db->query($query);
            }
        }
    }

    function datapenjualan(){
        $vbulan = date("m"); 
         $this->db->select('sum(total) as totalbulanini');
        $this->db->where('month(tglpojual)',$vbulan);
        $query = $this->db->get('tb_penjualan');
        return $query->result();
    }

    function penjualanperid($id){
        $vbulan = date("m"); 
         $this->db->select('sum(total) as totalbulanini');
        $where = array(
            'month(tglpojual)' => $vbulan,
            'id_user' => $id
        );
        $query = $this->db->get_where('tb_penjualan', $where);
        return $query->result();
    }

    function penjualan1(){
        $vbulan = date('m')-1; 
         $this->db->select('sum(total) as totalbulansebelumnya');
        $this->db->where('month(tglpojual)',$vbulan);
        $query = $this->db->get('tb_penjualan');
        return $query->result();
    }

    function penjualan2(){
        $vbulanq = date('m') . '- 2 month';
         $this->db->select('sum(total) as totaljual');
        $this->db->where('month(tglpojual)',$vbulanq);
        $query = $this->db->get('tb_penjualan');
        return $query->result();
    }

    function hutangdashboard(){
        $this->db->select('sum(total) as totalhutang, nama');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->where('jenispembayaran','kredit');
        $this->db->group_by('tb_penjualan.id_pelanggan');
        $query = $this->db->get('tb_penjualan');
        return $query->result();
    }

    function search($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_penjualan');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglpojual BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_penjualan')->result();
      }

      function excel($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_dtljual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglpojual BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_detail')->result();
      }

      function lpiutang($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->where("status = '0'");

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("status = '0' and tglpojual BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_penjualan')->result();
      }

      function excelpiutang($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_dtljual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->where("status = '0'");

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("status = '0' and tglpojual BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_dtljual')->result();
      }

}