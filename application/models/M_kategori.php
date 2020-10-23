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
                'kategori' => $st,
                'id_user' => $id,
                'tglupdate' => date('Y-m-d')
            );
            
            $this->db->insert('tb_kategori', $kategori);
            return true;
        }
        
        $this->db->insert('tb_kategori', $kategori);

    }

    function cekkodekategori(){
        $this->db->select_max('id_kategori');
        $idkategori = $this->db->get('tb_kategori');
        return $idkategori->row();
    }

    //function tambahakses($id){
    //    $total = $this->db->count_all_results('tb_submenu');

    //    for($i=0; $i<$total; $i++){
    //        $fungsi = array('id_submenu' => $i+1 , 
    //            'id_user' => $id);

    //        $this->db->insert('tb_akses', $fungsi);            
    //    }
    //}

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
            'kategori' => $this->input->post('kategori'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_kategori' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_kategori',$kategori);
    }

    
}