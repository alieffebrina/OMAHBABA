<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
  public function get($username){
  	$this->db->where('username',$username);
  	$result = $this->db->get('tb_user')->row();

  	return $result;
  }
}
?>