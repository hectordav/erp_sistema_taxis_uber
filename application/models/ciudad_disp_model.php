<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad_disp_model extends CI_Model {

	public function guardar_ciudad_disp($id_pais,$id_ciudad){
			$data = array('id_pais' =>$id_pais,
			'id_ciudad'=>$id_ciudad);
			$this->db->insert('t_ciudad_disp', $data);
		}	

}

/* End of file ciudad_disp_model.php */
/* Location: ./application/models/ciudad_disp_model.php */