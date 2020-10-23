<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sales extends CI_Model {

    function getsales(){
        $this->db->select('tb_sales.*, tb_provinsi.name_prov, tb_kota.name_kota, tb_kecamatan.kecamatan, tb_cabang.namacabang, tb_tipeuser.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_sales.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_sales.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_sales.id_kecamatan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_sales.id_cabang');
        $this->db->join('tb_tipeuser', 'tb_tipeuser.id_tipeuser = tb_sales.id_tipeuser');
        $query = $this->db->get('tb_sales');
        return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_sales' => $ida
        );
        return $this->db->get_where('tb_sales',$where)->result();
    }

    function tambahdata($id){

        $sales = array(
            'id_user' => $id,
            'nopegawai' => $this->input->post('nopegawai'),
            'id_tipeuser' => $this->input->post('tipeuser'),
            'namasales' => $this->input->post('namasales'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_sales', $sales);
    }

    function cekkodesales(){
        $this->db->select_max('id_sales');
        $idsales = $this->db->get('tb_sales');
        return $idsales->row();
    }

    function getspek($iduser){
        $this->db->select('tb_sales.*, tb_provinsi.name_prov, tb_kota.name_kota, tb_kecamatan.kecamatan, tb_cabang.namacabang, tb_tipeuser.*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_sales.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_sales.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_sales.id_kecamatan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_sales.id_cabang');
        $this->db->join('tb_tipeuser', 'tb_tipeuser.id_tipeuser = tb_sales.id_tipeuser');
        $where = array(
            'id_sales' => $iduser
        );
        $query = $this->db->get_where('tb_sales', $where);
        return $query->result();
    }

    function edit($id){
        $sales = array(

            'id_user' => $id,
            'namasales' => $this->input->post('namasales'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'tglupdate' => date('Y-m-d')
        );

        $where = array(
            'id_sales' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_sales',$sales);
    }

    function datasales(){
        $query = $this->db->get('tb_sales');
        return $query->num_rows();
    }

    
}