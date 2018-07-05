<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigo_promo_model extends CI_Model {

	public function guardar_codigo_promo($id_tipo,$id_status_codigo_promo,$codigo,$valor,$fecha_i,$fecha_f){
		$data = array('id_tipo_codigo'=>$id_tipo,
			'id_status_codigo_promo'=>$id_status_codigo_promo,
			'codigo'=>$codigo,
			'valor'=>$valor,
			'fecha_i'=>$fecha_i,
			'fecha_f'=>$fecha_f);
		$this->db->insert('t_codigo_promo', $data);
	}
	

}

/* End of file codigo_promo_model.php */
/* Location: ./application/models/codigo_promo_model.php */