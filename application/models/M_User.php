<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

 	function getuserlog(){
        $this->db->join('tb_staf', 'tb_staf.id_user = tb_userlog.id_user');
        $query = $this->db->get('tb_userlog');
        return $query->result();
    }

}