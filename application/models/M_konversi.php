<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_konversi extends CI_Model {

    function getkonversisatuan(){
        $this->db->select('b.satuan satuan_awal,c.satuan satuan_konversi,a.*');
        $this->db->join('tb_satuan b', 'a.id_satuan = b.id_satuan');
        $this->db->join('tb_satuan c', 'a.satuan = c.id_satuan');
        $query = $this->db->get('tb_konversi a');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_konversi' => $ida
        );
        return $this->db->get_where('tb_konversi',$where)->result();
    }

    function tambahdata($id){
        //$harga = $this->input->post('rupiah');
        //$harga_str = preg_replace("/[^0-9]/", "", $harga);

        $konversi = array(
            'id_user' => $id,
            'id_satuan' => $this->input->post('id_satuan'),
            'qttawal' => $this->input->post('qttawal'),
            'satuan' => $this->input->post('satuan'),
            'qttkonversi' => $this->input->post('qttkonversi'),
            'tgl_update' => date('Y-m-d')
        );
        
        $this->db->insert('tb_konversi', $konversi);
    }

    // function tambahdata($id){
        
    //     $st=$this->input->post('konversi');
    //     $this->db->select('b.satuan satuan_awal,c.satuan satuan_konversi,a.*');
    //     $this->db->join('tb_satuan b', 'a.id_satuan = b.id_satuan');
    //     $this->db->join('tb_satuan c', 'a.satuan = c.id_satuan');
    //     $query = $this->db->get('tb_konversi a');

    //     $query = $this->db->query("SELECT * FROM tb_konversi where konversi='".$st."'");
    //     if($query->num_rows()>0){
    //         return false;
    //     }else{
    //         $konversi = array(
    //         'id_user' => $id,
    //         'id_satuan' => $this->input->post('id_satuan'),
    //         'qttawal' => $this->input->post('qttawal'),
    //         'satuan' => $this->input->post('satuan'),
    //         'qttkonversi' => $this->input->post('qttkonversi'),
    //         'tgl_update' => date('Y-m-d')
    //     );
            
    //         $this->db->insert('tb_konversi', $konversi);
    //         return true;
    //     }
    // }

    function getspek($iduser){
        $this->db->select('b.satuan satuan_awal,c.satuan satuan_konversi,a.*');
        $this->db->join('tb_satuan b', 'a.id_satuan = b.id_satuan');
        $this->db->join('tb_satuan c', 'a.satuan = c.id_satuan');
        $where = array(
            'a.id_konversi' => $iduser
        );
        $query = $this->db->get_where('tb_konversi a', $where);
        return $query->result();
    }

    function edit($id){
        //$harga = $this->input->post('rupiah');
        //$harga_str = preg_replace("/[^0-9]/", "", $harga);
        
        $konversi = array(
            'id_user' => $id,
            'id_satuan' => $this->input->post('id_satuan'),
            'qttawal' => $this->input->post('qttawal'),
            'satuan' => $this->input->post('satuan'),
            'qttkonversi' => $this->input->post('qttkonversi'),
            'tgl_update' => date('Y-m-d')
        );
// echo '<pre>';print_r($konversi);exit;
        $where = array(
            'id_konversi' =>  $this->input->post('id_konversi'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_konversi',$konversi);
    }

    
}