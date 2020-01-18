<?php

class Login_model extends CI_Model
{

	function login_check($username, $password)
	{
	  	$this->db->select('*');
   		$this->db->from('usuarios');
   		$this->db->where('username', $username);
   		$this->db->where('password', $password);
   		$this->db->where('activo', 's');
   		$this->db->limit(1);
   		$query = $this->db->get();
		
		if($query->num_rows() == 1){
			return $query->result();
	  	} else {
	  	    return false;
	  	}
 	}
}

