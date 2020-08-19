<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	function getuser(){
		$this->db->select('*');
        $this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_staf.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_staf.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_staf.id_kecamatan');
        // $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_staf.id_cabang');
        $query = $this->db->get('tb_staf');
    	return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_user' => $ida
        );
        return $this->db->get_where('tb_staf',$where)->result();
    }

    function cek_user($kode){
        $this->db->select('*');
        $where = array(
            'username' => $kode
        );
        $query = $this->db->get_where('tb_staf', $where);
        return $query->result();
    }

    function tambahdata(){
        $user = array(
            // 'nik' => $this->input->post('nik'),
            'id_user' => $id,
            'nama' => $this->input->post('nama'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'tglupdate' => date('Y-m-d')
        );
        
        $this->db->insert('tb_staf', $user);
    }

    function cekkodeuser(){
        $this->db->select_max('id_user');
        $iduser = $this->db->get('tb_staf');
        return $iduser->row();
    }

    function tambahakses($id){
        $total = $this->db->count_all_results('tb_submenu');

        for($i=0; $i<$total; $i++){
            $fungsi = array('id_submenu' => $i+1 , 
                'id_user' => $id);

            $this->db->insert('tb_akses', $fungsi);            
        }
    }

    function getspek($iduser){
		$this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_staf.id_provinsi');
        $this->db->join('tb_kota', 'tb_kota.id_kota = tb_staf.id_kota');
        $this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_staf.id_kecamatan');
        $this->db->join('tb_cabang', 'tb_cabang.id_cabang = tb_staf.id_cabang');
        $where = array(
            'id_user' => $iduser
        );
        $query = $this->db->get_where('tb_staf', $where);
    	return $query->result();
    }

    function edit(){
        $user = array(
            'id_user' => $id,
            'nama' => $this->input->post('nama'),
            'id_cabang' => $this->input->post('namacabang'),
            'id_provinsi' => $this->input->post('prov'),
            'id_kota' => $this->input->post('kota'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'alamat' => $this->input->post('alamat'),
            'tlp' => $this->input->post('tlp'),
            'jabatan' => $this->input->post('jabatan'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'tglupdate' => date('Y-m-d')
            
        );

        $where = array(
            'id_user' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_staf',$user);
    }

    
}