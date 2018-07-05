<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_codigo_model extends CI_Model {

	public function get_tipo_codigo(){
		$consulta=$this->db->get('t_tipo_codigo');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	

}

/* End of file tipo_codigo_model.php */
/* Location: ./application/models/tipo_codigo_model.php */