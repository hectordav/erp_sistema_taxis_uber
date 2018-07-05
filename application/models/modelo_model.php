<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_model extends CI_Model {

	public function guardar_modelo($id_tipo,$id_marca,$modelo){
		$data = array('id_tipo' =>$id_tipo,
		'id_marca' =>$id_marca,
		'descripcion' =>$modelo);
		$this->db->insert('t_modelo', $data);
	}
	public function get_modelo_id($id_modelo){
		$this->db->where('id', $id_modelo);
		$consulta=$this->db->get('t_modelo');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	public function get_modelo_id_marca($id_marca){
			$this->db->where('id_marca',$id_marca);
			$consulta=$this->db->get('t_modelo');
				  if($consulta->num_rows() > 0){
				      return $consulta->result();
				  }
	}
	public function actualizar_modelo($id_tipo,$id_marca,$id_modelo,$modelo){
		$data = array('id_tipo' =>$id_tipo,
		'id_marca'=>$id_marca,
		'descripcion' =>$modelo);
		$this->db->where('id', $id_modelo);
		$this->db->update('t_modelo', $data);
	}
	

}

/* End of file modelo_model.php */
/* Location: ./application/models/modelo_model.php */