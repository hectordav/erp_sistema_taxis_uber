<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo_model extends CI_Model {
	public function guardar_vehiculo($id_tipo,$id_marca,$id_modelo,$id_empresa,$num_interno_vehiculo,$num_tarjeta_operacion,$num_interno_contrato,$licencia,$licencia_vence,$placa,$ano,$convenio){
		$data = array('id_tipo'=>$id_tipo,
			'id_marca'=>$id_marca,
			'id_modelo'=>$id_modelo,
			'id_empresa'=>$id_empresa,
			'numero_interno_vehiculo'=>$num_interno_vehiculo,
			'tarjeta_operacion'=>$num_tarjeta_operacion,
			'num_interno_contrato'=>$num_interno_contrato,
			'licencia'=>$licencia,
			'vencimiento_licencia'=>$licencia_vence,
			'placa'=>$placa,
			'ano'=>$ano,
			'convenio'=>$convenio);
		$this->db->insert('t_vehiculo', $data);
	}
  public function actualizar_vehiculo($id_vehiculo,$id_usuario,$id_tipo,$id_marca,$id_modelo,$num_interno_vehiculo,$num_tarjeta_operacion,$num_interno_contrato,$licencia,$licencia_vence,$placa,$ano,$convenio){
    $data = array('id_usuario'=>$id_usuario,
      'id_tipo'=>$id_tipo,
      'id_marca'=>$id_marca,
      'id_modelo'=>$id_modelo,
      'numero_interno_vehiculo'=>$num_interno_vehiculo,
      'tarjeta_operacion'=>$num_tarjeta_operacion,
      'num_interno_contrato'=>$num_interno_contrato,
      'licencia'=>$licencia,
      'vencimiento_licencia'=>$licencia_vence,
      'placa'=>$placa,
      'ano'=>$ano,
      'convenio'=>$convenio);
    $this->db->where('id', $id_vehiculo);
    $this->db->update('t_vehiculo', $data);
  }
	public function select_max_vehiculo(){
  	$this->db->select_max('id');
  	$consulta=$this->db->get('t_vehiculo');
  		  if($consulta->num_rows() > 0){
  		      return $consulta->result();
  		  }
  }
  public function guardar_adjunto_vehiculo($id_vehiculo,$adjunto){
  	$data = array('id_vehiculo' =>$id_vehiculo,
  	'adjunto'=>$adjunto);
  	$this->db->insert('t_adjunto_vehiculo', $data);
  }
  public function actualizar_adjunto_vehiculo($id_vehiculo,$adjunto){
    $data = array('adjunto'=>$adjunto);
    $this->db->where('id', $id_vehiculo);
    $this->db->update('t_adjunto_vehiculo', $data);
  }
  public function get_vehiculo_id_usuario($id_usuario){
  	$this->db->select('t_vehiculo.id as id_vehiculo, t_vehiculo.numero_interno_vehiculo as numero_interno_vehiculo, t_vehiculo.tarjeta_operacion as tarjeta_operacion, t_vehiculo.num_interno_contrato as num_interno_contrato, t_vehiculo.licencia as licencia, t_vehiculo.vencimiento_licencia as vencimiento_licencia, t_vehiculo.placa as placa, t_vehiculo.ano as ano, t_vehiculo.convenio as convenio, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as descripcion_marca, t_modelo.descripcion as descripcion_modelo, t_empresa.nombre as nombre_empresa');
  	$this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
  	$this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
  	$this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
  	$this->db->join('t_empresa', 't_vehiculo.id_empresa = t_empresa.id', 'left');
  	$this->db->where('t_vehiculo.id_usuario', $id_usuario);
  	$consulta=$this->db->get('t_vehiculo',1);
  		  if($consulta->num_rows() > 0){
  		      return $consulta->result();
  		  }
  }
  public function get_vehiculo_id_vehiculo($id_vehiculo){
    $this->db->select('t_vehiculo.id as id_vehiculo, t_vehiculo.numero_interno_vehiculo as numero_interno_vehiculo, t_vehiculo.tarjeta_operacion as tarjeta_operacion, t_vehiculo.num_interno_contrato as num_interno_contrato, t_vehiculo.licencia as licencia, t_vehiculo.vencimiento_licencia as vencimiento_licencia, t_vehiculo.placa as placa, t_vehiculo.ano as ano, t_vehiculo.convenio as convenio, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as descripcion_marca, t_modelo.descripcion as descripcion_modelo, t_empresa.nombre as nombre_empresa, t_usuario.id as id_usuario, t_usuario.login as login, t_usuario.nombre as nombre, t_cliente.direccion as direccion, t_cliente.telf as telf');
    $this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
    $this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
    $this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
    $this->db->join('t_empresa', 't_vehiculo.id_empresa = t_empresa.id', 'left');
    $this->db->join('t_usuario', 't_vehiculo.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');    
    $this->db->where('t_vehiculo.id', $id_vehiculo);
    $consulta=$this->db->get('t_vehiculo',1);
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
  }
  public function get_adjunto_vehiculo_id_usuario($id_usuario){
  	$this->db->select('t_adjunto_vehiculo.id as id, t_adjunto_vehiculo.adjunto as adjunto');
  	$this->db->join('t_vehiculo', 't_adjunto_vehiculo.id_vehiculo = t_vehiculo.id', 'left');
  	$this->db->join('t_usuario', 't_vehiculo.id_usuario = t_usuario.id', 'left');
  	$this->db->where('t_vehiculo.id_usuario', $id_usuario);
  	$consulta=$this->db->get('t_adjunto_vehiculo');
		  if($consulta->num_rows() > 0){
		      return $consulta->result();
		  }
  }
  public function get_adjunto_vehiculo_id_vehiculo($id_vehiculo){
    $this->db->select('t_adjunto_vehiculo.id as id, t_adjunto_vehiculo.adjunto as adjunto');
    $this->db->join('t_vehiculo', 't_adjunto_vehiculo.id_vehiculo = t_vehiculo.id', 'left');
    $this->db->join('t_usuario', 't_vehiculo.id_usuario = t_usuario.id', 'left');
    $this->db->where('t_vehiculo.id', $id_vehiculo);
    $consulta=$this->db->get('t_adjunto_vehiculo');
      if($consulta->num_rows() > 0){
          return $consulta->result();
      }
  }
  public function actualizar_conductor_vehiculo($id_vehiculo,$id_conductor){
    $data = array('id_usuario' =>$id_conductor);
    $this->db->where('id', $id_vehiculo);
    $this->db->update('t_vehiculo', $data);
  }
    public function contar_vehiculo(){
      $this->db->from('t_vehiculo');
      return $this->db->count_all_results();
    }

	

}

/* End of file vehiculo_model.php */
/* Location: ./application/models/vehiculo_model.php */