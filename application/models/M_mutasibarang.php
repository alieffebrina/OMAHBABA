<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_mutasibarang extends CI_Model {
    function cekmutasibarangtgl(){
        $vbulan = date("m"); 
        $where = array(
            'month(tglmutasi)' => $vbulan
        );
        return $this->db->get_where('tb_mutasibarang',$where)->result();
    }

    function getall($id, $username){
        // $this->db->select('tb_invoicejual.id_invoicejual, tb_mutasibarang.*, tb_cabang.namacabang');
        // $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_mutasibarang.id_mutasibarang','left');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_mutasibarang.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_mutasibarang.id_cabang');
        if($username!='admin'){
            $where = array(
            'tb_mutasibarang.id_user' => $id
            );
            return $this->db->get_where('tb_mutasibarang',$where)->result();
        } else {
            return $this->db->get('tb_mutasibarang')->result();
        }
    }
    function getdetail($ida){
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_mutasibarang.id_gudang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_mutasibarang.id_cabang');
        $where = array(
            'tb_mutasibarang.id_mutasibarang' => $ida
        );
        return $this->db->get_where('tb_mutasibarang', $where)->result();
    }

    // function getpiutang(){
    //     $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_pelanggan');
    //     $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_mutasibarang.id_cabang');
    //     $this->db->join('tb_sales', 'tb_sales.id_sales = tb_mutasibarang.id_sales');
    //     $where = array(
    //         'status' => 'belum lunas'
    //     );
    //     return $this->db->get_where('tb_mutasibarang',$where)->result();
    // }

    // function pemakaianlimit($iduser){
    //     $this->db->select('sum(total) as totalpakai, tb_pelanggan.*');
    //     $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_pelanggan');
    //     $where = array(
    //         'tb_pelanggan.id_pelanggan' => $iduser,
    //         'status' => 'belum lunas'
    //     );
    //     return $this->db->get_where('tb_mutasibarang', $where)->result();
    // }

    // function getnota($nota){
    //     $this->db->select('tb_sales.namasales, tb_cabang.namacabang, tb_pelanggan.*,tb_mutasibarang.*');
    //     $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_pelanggan');
    //     $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_mutasibarang.id_cabang');
    //     $this->db->join('tb_sales', 'tb_sales.id_sales = tb_mutasibarang.id_sales');
    //     $where = array(
    //         'tb_mutasibarang.id_mutasibarang' => $nota
    //     );
    //     return $this->db->get_where('tb_mutasibarang', $where)->row();
    // }

    function getdetailpenjualan($ida){
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_warna', 'tb_warna.id_warna = tb_barang.id_warna');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $where = array(
            'tb_dtljual.id_mutasibarang' => $ida
        );
        return $this->db->get_where('tb_dtljual', $where)->result();
    }

    // function getretur($ida){
    //     $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_pelanggan');
    //     $where = array(
    //         'tb_mutasibarang.id_mutasibarang' => $ida
    //     );
    //     return $this->db->get_where('tb_mutasibarang', $where)->result();
    // }

    // function getlaporan(){
    //     if(isset($_POST) && !empty($_POST)){
    //         $tgl=explode(' - ', $_POST['tgl']);
    //         $tgl_mulai=explode('/', $tgl[0]);
    //         $tgl_sampai=explode('/', $tgl[1]);
    //     }

    //     $query = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_mutasibarang.* from tb_mutasibarang 
    //     left join tb_sjpenjualan on tb_sjpenjualan.id_mutasibarang = tb_mutasibarang.id_mutasibarang";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $query=$query." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }

    //  function getlaporanpiutang(){
    //     if(isset($_POST) && !empty($_POST)){
    //         $tgl=explode(' - ', $_POST['tgl']);
    //         $tgl_mulai=explode('/', $tgl[0]);
    //         $tgl_sampai=explode('/', $tgl[1]);
    //     }

    //     $query = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_mutasibarang.* from tb_mutasibarang 
    //     left join tb_sjpenjualan on tb_sjpenjualan.id_mutasibarang = tb_mutasibarang.id_mutasibarang";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $query=$query." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }

    // function getlaporanlabarugi(){
    //     if(isset($_POST) && !empty($_POST)){
    //         $tgl=explode(' - ', $_POST['tgl']);
    //         $tgl_mulai=explode('/', $tgl[0]);
    //         $tgl_sampai=explode('/', $tgl[1]);
    //     }

    //     $queryjual = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_mutasibarang.* from tb_mutasibarang 
    //     left join tb_sjpenjualan on tb_sjpenjualan.id_mutasibarang = tb_mutasibarang.id_mutasibarang";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $queryjual=$queryjual." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $queryjual = $this->db->queryjual($queryjual);

    //     $querybeli = "SELECT tb_pembelian.* from tb_pembelian";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $querybeli=$querybeli." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $querybeli = $this->db->querybeli($querybeli);

    //     $querykas = "SELECT tb_kas.* from tb_kas";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $querykas=$querykas." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $querykas = $this->db->querykas($querykas);

    //     return $query->result();
    // }

    //  function getdetaillaporan(){
    //     if(isset($_POST) && !empty($_POST)){
    //         $tgl=explode(' - ', $_POST['tgl']);
    //         $tgl_mulai=explode('/', $tgl[0]);
    //         $tgl_sampai=explode('/', $tgl[1]);
    //     }
    //     $query = "SELECT tb_mutasibarang.status status_penjualan,tb_mutasibarang.id_mutasibarang ,tb_mutasibarang.tglmutasi, tb_satuan.*,tb_kategori.*,tb_barang.*,tb_dtljual.* from tb_dtljual
    //     join tb_mutasibarang on tb_dtljual.id_mutasibarang = tb_mutasibarang.id_mutasibarang
    //     join tb_barang on tb_dtljual.id_barang = tb_barang.id_barang
    //     join tb_kategori on tb_kategori.id_kategori = tb_barang.id_kategori
    //     join tb_satuan on tb_satuan.id_satuan = tb_barang.id_satuan";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $query=$query." where tglmutasi between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }

    // function getreturpenjualan($ida){
    //     $this->db->join('tb_barang', 'tb_barang.id_barang = returpenjualan.id_barang');
    //     $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
    //     $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
    //     $where = array(
    //         'returpenjualan.id_mutasibarang' => $ida
    //     );
    //     return $this->db->get_where('returpenjualan', $where)->result();
    // }

    function cekkodepenjualan(){
        $this->db->select_max('nourut');
        $idbarang = $this->db->get('tb_mutasibarang');
        return $idbarang->row();
    }

    function getpenjualan(){
        $this->db->select('*');
        $this->db->join('tb_pelanggan', 'tb_mutasibarang.id_pelanggan = tb_pelanggan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_mutasibarang.id_cabang = tb_cabang.id_cabang');
        $this->db->join('tb_sales', 'tb_mutasibarang.id_sales = tb_sales.id_sales');
        $query = $this->db->get('tb_mutasibarang');
        return $query->result();
    }

    function tambahdata($id){
        // echo "<pre>";print_r($this->input->post());exit;
        
        date_default_timezone_set('Asia/Jakarta');
        $penjualan = array(
            'id_user' => $id,
            'id_mutasibarang' => $this->input->post('nonota'),
            'tglmutasi' => date('Y-m-d H:i'),
            'gudang' => $this->input->post('gudangmutasi'),
            'cabang' => $this->input->post('cabangmutasi'),
            'tglmutasi' => date('Y-m-d H:i'),
            // 'tgl_update' => date('Y-m-d H:i'),
            // 'subtotal' => $this->input->post('subtotalbawahrupiah'),
            // 'total' => $this->input->post('total'),
            'totalmutasi' => $this->input->post('totalmutasi'),
            'statusmutasi' => 'proses'
        );
        // echo'<pre>';print_r($penjualan);exit;
        $this->db->insert('tb_mutasibarang', $penjualan);
        // if ($statusmutasi != 'proses'){
        //     $query = "UPDATE tb_pelanggan SET tb_pelanggan.limit=tb_pelanggan.limit-".$penjualan['subtotal']." WHERE id_pelanggan='".$penjualan['id_pelanggan']."'";
        //     $this->db->query($query);
        // }
        $barang = $this->input->post('id_barang');
        $qtt=$this->input->post('qtt');
        $totalmutasi=$this->input->post('totalmutasi');
        if(!empty($barang)){
            foreach ($barang as $key=>$value) {
                    // print_r($arrayName);
                $data = array('id_mutasibarang' => $penjualan['id_mutasibarang'],
                    'id_barang' => $value,
                    'qtt' => $qtt[$key]);

                $this->db->insert('tb_dtlmutasi', $data);

                $query = "UPDATE tb_barang SET stok=(stok-".$qtt[$key].") WHERE id_barang='".$value."'";
                        $this->db->query($query);
            }
        }
    }

    function edit($ida){
        $barang = array(

            'status' => '1'
        );

        $where = array(
            'id_mutasibarang' =>  $ida,
        );
        
        $this->db->where($where);
        $this->db->update('tb_mutasibarang',$barang);
    }

    function datapenjualan(){
        $vbulan = date("m"); 
         $this->db->select('sum(total) as totalbulanini');
        $this->db->where('month(tglmutasi)',$vbulan);
        $query = $this->db->get('tb_mutasibarang');
        return $query->result();
    }

    function penjualanperid($id){
        $vbulan = date("m"); 
         $this->db->select('sum(total) as totalbulanini');
        $where = array(
            'month(tglmutasi)' => $vbulan,
            'id_user' => $id
        );
        $query = $this->db->get_where('tb_mutasibarang', $where);
        return $query->result();
    }

    function penjualan1(){
        $vbulan = date('m')-1; 
         $this->db->select('sum(total) as totalbulansebelumnya');
        $this->db->where('month(tglmutasi)',$vbulan);
        $query = $this->db->get('tb_mutasibarang');
        return $query->result();
    }

    function penjualan2(){
        $vbulanq = date('m') . '- 2 month';
         $this->db->select('sum(total) as totaljual');
        $this->db->where('month(tglmutasi)',$vbulanq);
        $query = $this->db->get('tb_mutasibarang');
        return $query->result();
    }

    // function hutangdashboard(){
    //     $this->db->select('sum(total) as totalhutang, nama');
    //     $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_pelanggan');
    //     $this->db->where('jenispembayaran','kredit');
    //     $this->db->group_by('tb_mutasibarang.id_pelanggan');
    //     $query = $this->db->get('tb_mutasibarang');
    //     return $query->result();
    // }

    function search($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_mutasibarang.id_mutasibarang');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglmutasi BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_mutasibarang')->result();
      }

      function excel($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_mutasibarang', 'tb_mutasibarang.id_mutasibarang = tb_dtlmutasi.id_mutasibarang');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_mutasibarang.id_cabang');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_mutasibarang.id_gudang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtlmutasi.id_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglmutasi BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_detail')->result();
      }
}