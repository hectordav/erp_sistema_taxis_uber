<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca_model extends CI_Model {

	public function get_marca(){
			
		}	
	public function get_marca_id($id_tipo){
		$this->db->where('id_tipo', $id_tipo);
		$consulta=$this->db->get('t_marca');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
}

/* End of file marca_model.php */
/* Location: ./application/models/marca_model.php */