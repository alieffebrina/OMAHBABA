<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_voucher extends CI_Model {

    function getvoucher(){
        $this->db->select('*');
        $query = $this->db->get('tb_voucher');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_voucher' => $ida
        );
        return $this->db->get_where('tb_voucher',$where)->result();
    }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $hargar = $this->input->post('rupiahh');
        $minpembelian_str = preg_replace("/[^0-9]/", "", $harga);
        $diskon_str = preg_replace("/[^0-9]/", "", $hargar);

        $voucher = array(
            
            'kodevoucher' => $this->input->post('kodevoucher'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket'),
            'minpembelian' => $minpembelian_str,
            // 'tglmulai' => date('Y-m-d'),
            'tglakhir' => date('Y-m-d'),
            'discount' => $diskon_str,
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_voucher', $voucher);
    }

    function cekkodevoucher(){
        $this->db->select_max('id_voucher');
        $idvoucher = $this->db->get('tb_voucher');
        return $idvoucher->row();
    }

    function getspek($iduser){
        $this->db->select('*');
        $where = array(
            'id_voucher' => $iduser
        );
        $query = $this->db->get_where('tb_voucher', $where);
        return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $hargar = $this->input->post('rupiahh');
        $minpembelian_str = preg_replace("/[^0-9]/", "", $harga);
        $diskon_str = preg_replace("/[^0-9]/", "", $hargar);

        $voucher = array(
            
            'kodevoucher' => $this->input->post('kodevoucher'),
            'nama' => $this->input->post('nama'),
            'ket' => $this->input->post('ket'),
            'minpembelian' => $minpembelian_str,
            // 'tglmulai' => date('Y-m-d'),
            'tglakhir' => date('Y-m-d'),
            'discount' => $diskon_str,
            'id_user' => $id,
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