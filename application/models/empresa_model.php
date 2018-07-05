<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

	public function get_empresa(){
		$consulta=$this->db->get('t_empresa');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	

}

/* End of file empresa_model.php */
/* Location: ./application/models/empresa_model.php */