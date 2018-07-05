<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio_model extends CI_Model {

	public function guardar_solicitar_servicio($id_usuario_contrata,$id_tipo_servicio,$id_status_servicio,$desde,$hacia,$fecha,$hora,$observacion_cliente){
			$data = array('id_usuario_contrata'=>$id_usuario_contrata,
			'id_tipo_servicio'=>$id_tipo_servicio,
			'id_status_servicio'=>$id_status_servicio,
			'desde'=>$desde,
			'hacia'=>$hacia,
			'fecha'=>$fecha,
			'observacion_cliente'=>$observacion_cliente);
			$this->db->insert('t_servicio', $data);
	}
	public function get_max_servicio(){
		$this->db->select_max('id');
		$consulta=$this->db->get('t_servicio');
			  if($consulta->num_rows() > 0){
			      return $consulta->result();
			  }
	}
	public function get_servicio_id_status($id_servicio,$id_estatus_servicio){
			$this->db->select('t_servicio.id as id_servicio,t_usuario.id as id_usuario_conductor,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario as id_estado_usuario, t_usuario.id_nivel as id_nivel,t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf, t_servicio.desde as desde, t_servicio.hacia as hasta, t_servicio.fecha as fecha, t_servicio.hora_i as hora_i,t_servicio.hora_f as hora_f, t_servicio.tiempo_trans as tiempo_trans, t_servicio.observacion_cliente as observacion_cliente, t_servicio.observacion_conductor as observacion_conductor, t_servicio.monto as monto, t_servicio.id_tipo_pago as id_tipo_pago, t_vehiculo.numero_interno_vehiculo as num_interno_vehiculo, t_vehiculo.tarjeta_operacion as tarjeta_operacion, t_vehiculo.licencia as licencia, t_vehiculo.placa as placa, t_vehiculo.ano as ano,  t_vehiculo.convenio as convenio, t_tipo.descripcion as descripcion_tipo, t_marca.descripcion as descripcion_marca, t_modelo.descripcion as descripcion_modelo, t_adjunto_vehiculo.adjunto as adjunto');
			$this->db->join('t_usuario', 't_servicio.id_usuario_conductor = t_usuario.id', 'left');
			$this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
			$this->db->join('t_vehiculo', 't_vehiculo.id_usuario = t_usuario.id', 'left');
			$this->db->join('t_adjunto_vehiculo', 't_adjunto_vehiculo.id_vehiculo = t_vehiculo.id', 'left');
			$this->db->join('t_tipo', 't_vehiculo.id_tipo = t_tipo.id', 'left');
			$this->db->join('t_marca', 't_vehiculo.id_marca = t_marca.id', 'left');
			$this->db->join('t_modelo', 't_vehiculo.id_modelo = t_modelo.id', 'left');
			$this->db->where('t_servicio.id', $id_servicio);
			$this->db->where('t_servicio.id_status_servicio',$id_estatus_servicio);
			$consulta=$this->db->get('t_servicio',1);
				  if($consulta->num_rows() > 0){
				      return $consulta->result();
				  }
	}
	public function contar_servicio(){
            $this->db->where('id_status_servicio',6);
            $this->db->from('t_servicio');
            return $this->db->count_all_results();
    }
  public function contar_servicio_entre_fechas($fecha_i, $fecha_f){
			$this->db->select('fecha as fecha, count(id) as total');
			$this->db->group_by('fecha');
      $this->db->where('fecha >=',$fecha_i);
      $this->db->where('fecha <=',$fecha_f);
      $consulta=$this->db->get('t_servicio');
      if($consulta->num_rows() > 0){
        return $consulta->result();
      }
    }
  public function contar_servicio_usuario_entre_fechas($id_usuario_2,$fecha_i,$fecha_f){
			$this->db->select('fecha as fecha, count(id) as total');
			$this->db->group_by('fecha');
      $this->db->where('fecha >=',$fecha_i);
      $this->db->where('fecha <=',$fecha_f);
      $consulta=$this->db->get('t_servicio');
      if($consulta->num_rows() > 0){
        return $consulta->result();
      }
    }

}

/* End of file servicio_model.php */
/* Location: ./application/models/servicio_model.php */