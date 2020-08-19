<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_voucher extends CI_Model {

    function getvoucher(){
        $this->db->select('*');
        $query = $this->db->get('tb_kategori');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_voucher' => $ida
        );
        return $this->db->get_where('tb_voucher',$where)->result();
    }

    function tambahdata($id){

        $voucher = array(
            'id_user' => $id,
            'kodevoucher' => $this->input->post('kodevoucher'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket'),
            'minpembelian' => $this->input->post('minpembelian'),
            'tglmulai' => date('Y-m-d'),
            'tglakhir' => date('Y-m-d'),
            'discount' => $this->input->post('discount'),
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_voucher', $voucher);
    }

    function cekkodevoucher(){
        $this->db->select_max('id_voucher');
        $idvoucher = $this->db->get('tb_voucher');
        return $idvoucher->row();
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
            'id_voucher' => $iduser
        );
        $query = $this->db->get_where('tb_voucher', $where);
        return $query->result();
    }

    function edit($id){

        $voucher = array(

            'id_user' => $id,
            'kodevoucher' => $this->input->post('kodevoucher'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket'),
            'minpembelian' => $this->input->post('minpembelian'),
            'tglmulai' => date('Y-m-d'),
            'tglakhir' => date('Y-m-d'),
            'discount' => $this->input->post('discount'),
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_voucher' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_voucher',$voucher);
    }

    function datavoucher(){
        $query = $this->db->get('tb_voucher');
        return $query->num_rows();
    }

    
}