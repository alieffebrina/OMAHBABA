<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cabang extends CI_Model {

	function getcabang(){
		$this->db->select('tb_cabang.*, tb_gudang.gudang, tb_kecamatan.*, tb_kota.name_kota,tb_provinsi.name_prov');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_cabang.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_cabang.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_cabang.id_kecamatan');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_cabang.id_gudang');
        $query = $this->db->get('tb_cabang');
    	return $query->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_cabang' => $ida
    //     );
    //     return $this->db->get_where('tb_cabang',$where)->result();
    // }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $cabang = array(
            'namacabang' => $this->input->post('namacabang'),
            'id_gudang' => $this->input->post('gudang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlf' => $this->input->post('tlf'),
            'email' => $this->input->post('email'),
            'user' => $id,
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_cabang', $cabang);
    }

    function cekkodecabang(){
        $this->db->select_max('id_cabang');
        $idcabang = $this->db->get('tb_cabang');
        return $idcabang->row();
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
        $this->db->select('tb_cabang.*, tb_gudang.gudang, tb_kecamatan.*, tb_kota.name_kota,tb_provinsi.name_prov');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_cabang.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_cabang.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_cabang.id_kecamatan');
        $this->db->join('tb_gudang', 'tb_gudang.id_gudang = tb_cabang.id_gudang');
        $where = array(
            'id_cabang' => $iduser
        );
        $query = $this->db->get_where('tb_cabang', $where);
    	return $query->result();
    }

    function edit($id){
        $cabang = array(
            'namacabang' => $this->input->post('namacabang'),
            'id_gudang' => $this->input->post('gudang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlf' => $this->input->post('tlf'),
            'email' => $this->input->post('email'),
            'user' => $id,
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_cabang' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_cabang',$cabang);
    }

    
}