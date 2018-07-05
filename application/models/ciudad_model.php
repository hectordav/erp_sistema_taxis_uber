<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad_model extends CI_Model {

	public function get_ciudad_id_pais($id_pais){
		$this->db->where('id_pais', $id_pais);
		$consulta=$this->db->get('t_ciudad');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_ciudad_id($id_ciudad){
		$this->db->where('id', $id_ciudad);
		$consulta=$this->db->get('t_ciudad',1);
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_ciudad(){
		$consulta=$this->db->get('t_ciudad');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	

}

/* End of file ciudad_model.php */
/* Location: ./application/models/ciudad_model.php */