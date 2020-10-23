<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suratjalan extends CI_Model {
    function ceksuratjalantgl(){
        $vbulan = date("m"); 
        $where = array(
            'month(tglkirim)' => $vbulan
        );
        return $this->db->get_where('tb_sjpenjualan',$where)->result();
    }
     function suratjalanperid($id){
        $vbulan = date("m"); 
        $where = array(
            'month(tglkirim)' => $vbulan,
            'id_user' => $id
        );
        $query = $this->db->get_where('tb_sjpenjualan', $where);
        return $query->num_rows();
    }

    function cekkodesuratjalan()
    {
        $this->db->select_max('nourut');
        $idbarang = $this->db->get('tb_sjpenjualan');
        return $idbarang->row();
    }

    function getall(){
        $this->db->select('tb_sales.namasales, tb_cabang.namacabang, tb_sjpenjualan.*, tb_pelanggan.*,tb_penjualan.*');
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_sjpenjualan.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        return $this->db->get('tb_sjpenjualan')->result();
    }

    function getsj($ida){
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_sjpenjualan.id_penjualan');
        $this->db->join('tb_dtljual', 'tb_penjualan.id_penjualan = tb_dtljual.id_penjualan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_sjpenjualan.id_suratjalan' => $ida
        );
        return $this->db->get_where('tb_sjpenjualan', $where)->result();
    }

    function getsuratjalan($ida){
        $this->db->join('tb_user', 'tb_user.id_user = tb_sjpenjualan.id_user');
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_sjpenjualan.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_sjpenjualan.id_suratjalan' => $ida
        );
        return $this->db->get_where('tb_sjpenjualan', $where)->result();
    }

    function tambahdata($id){
       $pengiriman = $this->input->post('pengiriman');
        if ($pengiriman == 'kirim'){
            $status = 1;
        } else {
            $status = 0;
        }

        date_default_timezone_set('Asia/Jakarta');

        $tb_sjpenjualan = array(
            'id_user' => $id,
            'id_suratjalan' => $this->input->post('id_suratjalan'),
            'id_penjualan' => $this->input->post('nonota'),
            // 'tglkirim' => $this->input->post('tglkirim'),
            'tglkirim' => date('Y-m-d'),
            'namapengirim' => $this->input->post('namapengirim'),
            'alamatkirim' => $this->input->post('alamatkirim'),
            'status' => $status
        );
        
        $this->db->insert('tb_sjpenjualan', $tb_sjpenjualan);        
    }

    function edit($ida){
        $barang = array(
            'status' => '1'
        );

        $where = array(
            'id_suratjalan' =>  $ida,
        );
        
        $this->db->where($where);
        $this->db->update('tb_sjpenjualan',$barang);
    }

    function search($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_sjpenjualan.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_penjualan');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglkirim BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");

        }
        return $this->db->get('tb_sjpenjualan')->result();
      }

    //    function getlaporan(){
    //     if(isset($_POST) && !empty($_POST)){
    //         $tgl=explode(' - ', $_POST['tgl']);
    //         $tgl_mulai=explode('/', $tgl[0]);
    //         $tgl_sampai=explode('/', $tgl[1]);
    //     }

    //     $query = "SELECT tb_sjpenjualan.id_suratjalan,tb_sjpenjualan.status status_kirim,tb_penjualan.* from tb_penjualan 
    //     left join tb_sjpenjualan on tb_sjpenjualan.id_penjualan = tb_penjualan.id_penjualan";
    //     if(!empty($tgl[0]) && !empty($tgl[1])){
    //         $query=$query." where tglkirim between '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'";
    //     }
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }
}