<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_warna extends CI_Model {

    function getwarna(){
        $this->db->select('*');
        $query = $this->db->get('tb_warna');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_warna' => $ida
        );
        return $this->db->get_where('tb_warna',$where)->result();
    }

    function tambahdata($id){
        $st=$this->input->post('warna');
        $query = $this->db->query("SELECT warna FROM tb_warna where warna='".$st."'");
        if($query->num_rows()>0){
            return false;
        }else{
            $warna = array(
                'id_user' => $id,
                'warna' => $st,
                'tglupdate' => date('Y-m-d')
            );
            
            $this->db->insert('tb_warna', $warna);
            return true;
        }
    }

    function cekkodewarna(){
        $this->db->select_max('id_warna');
        $idwarna = $this->db->get('tb_warna');
        return $idwarna->row();
    }

    function getspek($iduser){
        $this->db->select('*');
        $where = array(
            'id_warna' => $iduser
        );
        $query = $this->db->get_where('tb_warna', $where);
        return $query->result();
    }

    function edit($id){
        $warna = array(

            'id_user' => $id,
            'warna' => $this->input->post('warna'),
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_warna' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_warna',$warna);
    }

    
}