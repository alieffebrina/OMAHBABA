<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function get($username){

	$this->db->join('tb_tipeuser', 'tb_tipeuser.id_tipeuser = tb_staf.id_tipeuser');
  	$this->db->where('username',$username);
  	$result = $this->db->get('tb_staf')->row();

  	return $result;
  }
}
?>