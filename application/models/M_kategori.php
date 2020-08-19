<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kategori extends CI_Model {

    function getkategori(){
        $this->db->select('*');
        $query = $this->db->get('tb_kategori');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_kategori' => $ida
        );
        return $this->db->get_where('tb_kategori',$where)->result();
    }

    function tambahdata($id){
        $st=$this->input->post('kategori');
        $query = $this->db->query("SELECT kategori FROM tb_kategori where kategori='".$st."'");
        if($query->num_rows()>0){
            return false;
        }else{
            $kategori = array(
                'id_user' => $id,
                'kategori' => $st,
                'tgl_update' => date('Y-m-d')
            );
            
            $this->db->insert('tb_kategori', $kategori);
            return true;
        }
    }

    function getspek($iduser){
        $this->db->select('*');
        $where = array(
            'id_kategori' => $iduser
        );
        $query = $this->db->get_where('tb_kategori', $where);
        return $query->result();
    }

    function edit($id){
        $kategori = array(

            'id_user' => $id,
            'kategori' => $this->input->post('kategori'),
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_kategori' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_kategori',$kategori);
    }

    
}