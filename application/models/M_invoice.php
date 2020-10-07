<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_invoice extends CI_Model {
    function cekinvoicetgl(){
        $vbulan = date("m"); 
        $where = array(
            'month(tglinvoice)' => $vbulan
        );
        return $this->db->get_where('tb_invoicejual',$where)->result();
    }
     function invoiceperid($id){
        $vbulan = date("m"); 
        $where = array(
            'month(tglinvoice)' => $vbulan,
            'id_user' => $id
        );
        $query = $this->db->get_where('tb_invoicejual', $where);
        return $query->num_rows();
    }

    function cekkodeinvoice()
    {
        $this->db->select_max('nourut');
        $idbarang = $this->db->get('tb_invoicejual');
        return $idbarang->row();
    }

    function getall(){
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_invoicejual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        return $this->db->get('tb_invoicejual')->result();
    }

    function getinvoice($ida){
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_invoicejual.id_penjualan');
        $this->db->join('tb_dtljual', 'tb_penjualan.id_penjualan = tb_dtljual.id_penjualan');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_dtljual.id_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_invoicejual.id_invoicejual' => $ida
        );
        return $this->db->get_where('tb_invoicejual', $where)->result();
    }

    function getinvoicepenjualan($ida){
        $this->db->join('tb_user', 'tb_user.id_user = tb_invoicejual.id_user');
        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_invoicejual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_penjualan.id_cabang');
        $this->db->join('tb_sales', 'tb_sales.id_sales = tb_penjualan.id_sales');
        $where = array(
            'tb_invoicejual.id_invoicejual' => $ida
        );
        return $this->db->get_where('tb_invoicejual', $where)->result();
    }

    function tambahdata($id){
        
        $tb_invoicejual = array(
            'id_user' => $id,
            'id_invoicejual' => $this->input->post('id_invoicejual'),
            'id_penjualan' => $this->input->post('id_penjualan'),
            'tglinvoice' => $this->input->post('tglinvoice'),
            'id_voucher' => $this->input->post('id_voucher'),
            'diskon' => $this->input->post('diskon'),
            'biayakirim' => $this->input->post('biayakirim'),
            'subtotal' => $this->input->post('subtotal'),
            'total' => $this->input->post('total'),
            'status' => $status
        );
        
        $this->db->insert('tb_invoicejual', $tb_invoicejual);  
    }

    function edit($ida){
        $barang = array(
            'status' => '1'
        );

        $where = array(
            'id_invoicejual' =>  $ida,
        );
        
        $this->db->where($where);
        $this->db->update('tb_invoicejual',$barang);
    }

    function search($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->join('tb_penjualan', 'tb_penjualan.id_penjualan = tb_invoicejual.id_penjualan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_penjualan.id_penjualan');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tglinvoice BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");

        }
        return $this->db->get('tb_invoicejual')->result();
      }
}