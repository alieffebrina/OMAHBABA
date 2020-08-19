<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_barang extends CI_Model {

    function getbarang(){
        $this->db->select('tb_jenisbarang.jenisbarang,ts2.satuan satuan_konversi,ts1.satuan nama_satuan,tb_barang.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_jenisbarang', 'tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_barang.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $this->db->order_by('barang','ASC');
        $query = $this->db->get('tb_barang');
        return $query->result();
    }


    function getnama($ida){
        $this->db->select('tb_jenisbarang.jenisbarang,ts2.satuan satuan_konversi,ts1.satuan nama_satuan, ts1.id_satuan satuanawal, ts2.id_satuan satuankon, tb_barang.*,tb_konversi.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_jenisbarang', 'tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_barang.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $where = array(
            'id_barang' => $ida
        );
        return $this->db->get_where('tb_barang',$where)->result();
    }

    function tambahdata($id,$kode){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        //$qttkonversi = $this->input->post('qttkonversi'),
        //$qttstok = $this->input->post('stok'),
        //$total = $qttkonversi * $qttstok;

        $barang = array(
            'id_user' => $id,
            'id_barang' => $kode,
            'barang' => $this->input->post('barang'),
            'id_satuan' => $this->input->post('satuan'),
            'id_jenisbarang' => $this->input->post('jenisbarang'),
            // 'merk' => $this->input->post('merk'),
            // 'nourut' => $this->input->post('nourut'),
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'hargabeli' => $harga_str,
            'id_konversi' => $this->input->post('qttkonversi'),
            'stok' => $this->input->post('stok'),
            'hasil_konversi' => $this->input->post('hasil_konversi'),
            //'id_konversi' => $total,
            'tgl_update' => date('Y-m-d')
        );
        
        $this->db->insert('tb_barang', $barang);
    }

    function cekkodebarang(){
        $this->db->select_max('no_urut');
        $idbarang = $this->db->get('tb_barang');
        return $idbarang->row();
    }

    function cekbarangtgl(){
        $now = date('Y-m-d');
        $where = array(
            'tgl_update' => $now
        );
        return $this->db->get_where('tb_barang',$where)->result();
    }

    function getspek($iduser){
        $this->db->select('tb_jenisbarang.*,ts2.satuan satuan_konversi,ts1.satuan nama_satuan,tb_barang.*, tb_konversi.*');
        $this->db->join('tb_satuan ts1', 'ts1.id_satuan = tb_barang.id_satuan');
        $this->db->join('tb_jenisbarang', 'tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang');
        $this->db->join('tb_konversi', 'tb_konversi.id_konversi = tb_barang.id_konversi');
        $this->db->join('tb_satuan ts2', 'tb_konversi.satuan = ts2.id_satuan');
        $where = array(
            'id_barang' => $iduser
        );
        $query = $this->db->get_where('tb_barang', $where);
        return $query->result();
    }

    function cekkode($kodeno){
        $this->db->select('*');
        $where = array(
            'id_barang' => $kodeno
        );
        $query = $this->db->get_where('tb_barang', $where);
        return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $barang = array(

            'id_user' => $id,
            'barang' => $this->input->post('barang'),
            'id_satuan' => $this->input->post('satuan'),
            'id_jenisbarang' => $this->input->post('jenisbarang'),
            // 'nourut' => $this->input->post('nourut'),
            'stok' => $this->input->post('stok'),
            'stokmin' => $this->input->post('stokmin'),
            'hargabeli' => $harga_str,
            'id_konversi' => $this->input->post('qttkonversi'),
            //'id_konversi' => $total,
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_barang' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_barang',$barang);
    }

    function totalitem(){
        $query = $this->db->get('tb_barang');
        return $query->num_rows();
    }

    
    
}