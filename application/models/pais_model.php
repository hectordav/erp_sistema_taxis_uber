<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais_model extends CI_Model {
	public function get_pais(){
		$consulta=$this->db->get('t_pais');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	

}

/* End of file pais_model.php */
/* Location: ./application/models/pais_model.php */