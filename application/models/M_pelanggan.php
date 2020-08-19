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

    function getnama($ida){
        $where = array(
            'id_pelanggan' => $ida
        );
        return $this->db->get_where('tb_pelanggan',$where)->result();
    }

    function get_limit($id){
        $this->db->select('FORMAT(tb_pelanggan.limit,0) as limit_pelanggan',false);
        $where = array(
            'id_pelanggan' => $id
        );
        return $this->db->get_where('tb_pelanggan', $where)->row();
    }
    function tambahdata($id){
        $harga = $this->input->post('rupiah');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);

        $pelanggan = array(
            'id_user' => $id,
            'nama' => $this->input->post('nama'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            'tgl_update' => date('Y-m-d')
        );
        
        $this->db->insert('tb_pelanggan', $pelanggan);
    }

    function cekkodepelanggan(){
        $this->db->select_max('id_pelanggan');
        $idpelanggan = $this->db->get('tb_pelanggan');
        return $idpelanggan->row();
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
            'nama' => $this->input->post('nama'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'limit' => $harga_str,
            'tgl_update' => date('Y-m-d')
        );

        $where = array(
            'id_pelanggan' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_pelanggan',$pelanggan);
    }

    function datapelanggan(){
        $query = $this->db->get('tb_pelanggan');
        return $query->num_rows();
    }

    
}