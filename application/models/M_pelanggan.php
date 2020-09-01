<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	function getpelanggan(){
		$this->db->select('*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_pelanggan.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_pelanggan.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_pelanggan.id_kecamatan');
        $query = $this->db->get('tb_pelanggan');
    	return $query->result();
    }

    // function getnama($ida){
    //     $where = array(
    //         'id_pelanggan' => $ida
    //     );
    //     return $this->db->get_where('tb_pelanggan',$where)->result();
    // }

    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $pelanggan = array(
            'id_user' => $id,
            // 'nama_toko' => $this->input->post('nama_toko'),
            'nama' => $this->input->post('nama'),
            'nopelanggan' => $this->input->post('nopelanggan'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            // 'id_user' => $id,
            'tgl_update' => date('Y-m-d')
        );
        
        $this->db->insert('tb_pelanggan', $pelanggan);
    }

    function cekkodepelanggan(){
        $this->db->select_max('id_pelanggan');
        $idpelanggan = $this->db->get('tb_pelanggan');
        return $idpelanggan->row();
    }

    function getspek($iduser){
		$this->db->select('*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_pelanggan.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_pelanggan.id_kota'); 
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_pelanggan.id_kecamatan');
        $where = array(
            'id_pelanggan' => $iduser
        );
        $query = $this->db->get_where('tb_pelanggan', $where);
    	return $query->result();
    }

    function edit($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $pelanggan = array(

            'id_user' => $id,
            // 'nama_toko' => $this->input->post('nama_toko'),
            'nama' => $this->input->post('nama'),
            
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            // 'id_user' => $id,
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_pelanggan' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_pelanggan',$pelanggan);
    }

    
}