<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	public function guardar_cliente($id_usuario,$login,$nombre,$id_genero){
		$data = array('id_usuario'=>$id_usuario,
			'id_genero' =>$id_genero,
			'nombre' =>$nombre,
			'email'=>$login);
		$this->db->insert('t_cliente', $data);
	}
	public function guardar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac){
		$data = array('id_usuario'=>$id_usuario,
			'id_genero' =>$id_genero,
			'cedula' =>$nombre,
			'nombre'=>$login,
			'direccion'=>$direccion,
			'telf'=>$telf,
			'email'=>$login,
			'fecha_nac'=>$fecha_nac);
		$this->db->insert('t_cliente', $data);
	}
	public function actualizar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac){
		$data = array('id_usuario'=>$id_usuario,
			'id_genero' =>$id_genero,
			'cedula' =>$nombre,
			'nombre'=>$login,
			'direccion'=>$direccion,
			'telf'=>$telf,
			'email'=>$login,
			'fecha_nac'=>$fecha_nac);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->update('t_cliente', $data);
	}
	public function get_cliente_id($id_cliente){
		$this->db->where('id', $id_cliente);
		$consulta=$this->db->get('t_cliente');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
	}
	public function actualizar_cliente($id_cliente,$cedula,$direccion,$telf){
		$data = array('cedula' =>$cedula ,
		'direccion'=>$direccion,
		'telf'=>$telf);
		$this->db->where('id', $id_cliente);
		$this->db->update('t_cliente',$data);
	}
}

/* End of file cliente_model.php */
/* Location: ./application/models/cliente_model.php */