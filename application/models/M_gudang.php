<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_gudang extends CI_Model {

    function getgudang(){
        $this->db->select('*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_gudang.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_gudang.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_gudang.id_kecamatan');
        $query = $this->db->get('tb_gudang');
        return $query->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_gudang' => $ida
    //     );
    //     return $this->db->get_where('tb_gudang',$where)->result();
    // }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $gudang = array(
            'id_user' => $id,
            'gudang' => $this->input->post('gudang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlf' => $this->input->post('tlf'),
            'email' => $this->input->post('email'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_gudang', $gudang);
    }

    function cekkodegudang(){
        $this->db->select_max('id_gudang');
        $idgudang = $this->db->get('tb_gudang');
        return $idgudang->row();
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
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_gudang.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_gudang.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_gudang.id_kecamatan');
        $where = array(
            'id_gudang' => $iduser
        );
        $query = $this->db->get_where('tb_gudang', $where);
        return $query->result();
    }

    function edit($id){
        $gudang = array(

            'id_user' => $id,
            'gudang' => $this->input->post('gudang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlf' => $this->input->post('tlf'),
            'email' => $this->input->post('email'),
            'id_user' => $id,
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_gudang' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_gudang',$gudang);
    }

    
}