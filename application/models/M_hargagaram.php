<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hargagaram extends CI_Model {

    function gethargagaram(){
        $this->db->select('*');
        $this->db->join('tb_baranggaram', 'tb_baranggaram.id_barang = tb_hargagaram.id_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_baranggaram.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_baranggaram.id_kategori');
        $query = $this->db->get('tb_hargagaram');
        return $query->result();
    }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $harga = array(
            
            'id_barang' => $this->input->post('barang'),
            'harga' => $harga_str,
            'minqtt' => $this->input->post('minqtt'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_hargagaram', $harga);
    }

    function cekkodeharga(){
        $this->db->select_max('id_harga');
        $idharga = $this->db->get('tb_hargagaram');
        return $idharga->row();
    }

     function getspek($iduser){
       $this->db->select('*');
        $this->db->join('tb_baranggaram', 'tb_baranggaram.id_barang = tb_hargagaram.id_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_baranggaram.id_satuan');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_baranggaram.id_kategori');
        $where = array(
            'id_harga' => $iduser
        );
        $query = $this->db->get_where('tb_hargagaram', $where);
        return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $harga = array(
            'id_barang' => $this->input->post('barang'),
            'harga' => $harga_str,
            'minqtt' => $this->input->post('minqtt'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_harga' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_hargagaram',$harga);
    }

    
}