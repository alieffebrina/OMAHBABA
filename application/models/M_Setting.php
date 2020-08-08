<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Setting extends CI_Model {

    function getsatuan(){
        $this->db->select('*');
        $this->db->from('tb_satuan');
        $query = $this->db->get();
        return $query->result();
    }

    function getjenisbarang(){
        $this->db->select('*');
        $this->db->from('tb_jenisbarang');
        $query = $this->db->get();
        return $query->result();
    }

    function getkonversi(){
        $this->db->select('*');
        $this->db->from('tb_konversi');
        $query = $this->db->get();
        return $query->result();
    }

    function getkonversisatuan(){
        $this->db->select('b.satuan satuan_awal,c.satuan satuan_konversi,a.*');
        $this->db->join('tb_satuan b', 'a.id_satuan = b.id_satuan');
        $this->db->join('tb_satuan c', 'a.satuan = c.id_satuan');
        $query = $this->db->get('tb_konversi a');
        return $query->result();
    }

    function getharga(){
        $this->db->select('*');
        $this->db->from('tb_harga');
        $query = $this->db->get();
        return $query->result();
    }

	function getprovinsi(){
		$this->db->select('*');
		$this->db->from('tb_provinsi');
		$query = $this->db->get();
    	return $query->result();
    }

    function getkota($id){
        $this->db->select('*');
        $where = array(
            'id_provinsi' => $id
        );
        $query = $this->db->get_where('tb_kota', $where);
        return $query->result();
    }

    function getakses($ida){
        $this->db->select('*');
        $this->db->join('tb_submenu', 'tb_submenu.id_submenu = tb_akses.id_submenu');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_submenu.id_menus');
        $this->db->join('tb_user', 'tb_user.id_user = tb_akses.id_user');
        $where = array(
            'tb_akses.id_user' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();

        // return $this->db->get('tb_menu')->result();
    }

    function getuser(){
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $query = $this->db->get();
        return $query->result();
    }

    function getbarang(){
        $this->db->select('*');
        $this->db->from('tb_satuan');
        $this->db->from('tb_jenisbarang');
        $this->db->from('tb_konversi');
        $query = $this->db->get();
        return $query->result();
    }

    function gethargabarang(){
        $this->db->select('*');
        $this->db->join('tb_jenisbarang', 'tb_jenisbarang.id_jenisbarang = tb_barang.id_jenisbarang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan');
        $this->db->from('tb_barang');
        $query = $this->db->get();
        return $query->result();
    }

    // function getbarangbarang(){
    //     $this->db->select('*');
    //     $this->db->from('tb_satuan');
    //     $this->db->from('tb_jenisbarang');
    //     $this->db->from('tb_konversi');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    function getsuplier(){
        $this->db->select('*');
        $this->db->from('tb_provinsi');
        $query = $this->db->get();
        return $query->result();
    }

    //function getharga(){
        //$this->db->select('*');
        //$this->db->from('tb_barang');
        //$query = $this->db->get();
        //return $query->result();
    //}

    // function getkonversisatuan(){
    //     $this->db->select('*');
    //     $this->db->from('tb_satuan');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    function getmenu1($id){
        $this->db->distinct();
        $this->db->select('id_menu, menu, icon');
        $this->db->order_by('id_menu', 'ASC');
        $this->db->join('tb_submenu', 'tb_submenu.id_menus = tb_menu.id_menu');
        $this->db->join('tb_akses', 'tb_akses.id_submenu = tb_submenu.id_submenu');
        $where = array(
            'tb_akses.id_user' => $id, 'tb_akses.view' => '1'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function editv($iduser,$submenu,$view){
            $where = array(
                'id_user' =>  $iduser,
                'id_submenu' => $view
            );

            $view = array(
                'view' =>  '1'
            );

            $this->db->where($where);
            $this->db->update('tb_akses',$view);         
        }

    function edita($iduser,$submenu,$add){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $add
        );

        $add = array(
            'add' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$add);         
    }

    function edite($iduser,$submenu,$edit){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $edit
        );

        $edit = array(
            'edit' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$edit);         
    }


    function editd($iduser,$submenu,$delete){
        $where = array(
            'id_user' =>  $iduser,
            'id_submenu' => $delete
        );

        $delete = array(
            'delete' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$delete);         
    }

    function refresh($iduser){
        $user = array(
            'view' => '0',
            'add' => '0',
            'edit' => '0',
            'delete' => '0'
        );

        $where = array(
            'id_user' =>  $iduser
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_akses',$user);       
    }


    function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    }

     function getkode(){
        $this->db->select('*');
        $this->db->from('tb_kode');
        $query = $this->db->get();
        return $query->result();
    }

    function tambahdata(){
        $kode = array(
            'modultransaksi' => $this->input->post('modultransaksi'),
            'kodefinal' => $this->input->post('final')
        );
        
        $this->db->insert('tb_kode', $kode);
    }

    function cekkode($modul){        
        $this->db->select('kodefinal');
        $where = array(
            'modultransaksi' => $modul
        );
        $query = $this->db->get_where('tb_kode', $where);
        return $query->result();
    }
 }