<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suplier extends CI_Model {

	function getsuplier(){
		$this->db->select('*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_suplier.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_suplier.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_suplier.id_kecamatan');
        $query = $this->db->get('tb_suplier');
    	return $query->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_suplier' => $ida
    //     );
    //     return $this->db->get_where('tb_suplier',$where)->result();
    // }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $suplier = array(
            'id_user' => $id,
            'nama_toko' => $this->input->post('nama_toko'),
            'nama_suplier' => $this->input->post('nama_suplier'),
            
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            'id_user' => $id,
            'tgl_update' => date('Y-m-d')
        );
        
        $this->db->insert('tb_suplier', $suplier);
    }

    function cekkodesuplier(){
        $this->db->select_max('id_suplier');
        $idsuplier = $this->db->get('tb_suplier');
        return $idsuplier->row();
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
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_suplier.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_suplier.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_suplier.id_kecamatan');  
        $where = array(
            'id_suplier' => $iduser
        );
        $query = $this->db->get_where('tb_suplier', $where);
    	return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $suplier = array(

            'id_user' => $id,
            'nama_toko' => $this->input->post('nama_toko'),
            'nama_suplier' => $this->input->post('nama_suplier'),
            
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            'id_user' => $id,
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_suplier' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_suplier',$suplier);
    }

    
}