<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_satuan extends CI_Model {

    function getsatuan(){
        $this->db->select('*');
        $query = $this->db->get('tb_satuan');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_satuan' => $ida
        );
        return $this->db->get_where('tb_satuan',$where)->result();
    }

    function tambahdata($id){
        $st=$this->input->post('satuan');
        $query = $this->db->query("SELECT satuan FROM tb_satuan where satuan='".$st."'");
        if($query->num_rows()>0){
            return false;
        }else{
            $satuan = array(
                'satuan' => $st,
                'id_user' => $id,
                'tgl_update' => date('Y-m-d')
            );
            
            $this->db->insert('tb_satuan', $satuan);
            return true;
        }
    }

    function cekkodesatuan(){
        $this->db->select_max('id_satuan');
        $idsatuan = $this->db->get('tb_satuan');
        return $idsatuan->row();
    }

    function getspek($iduser){
        $this->db->select('*');
        $where = array(
            'id_satuan' => $iduser
        );
        $query = $this->db->get_where('tb_satuan', $where);
        return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $satuan = array(

            'satuan' => $this->input->post('satuan'),
            'id_user' => $id,
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_satuan' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_satuan',$satuan);
    }

    
}