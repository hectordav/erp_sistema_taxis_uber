<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function login_facebook($login,$clave){
		$this->db->select('t_usuario.id as id_usuario,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel,t_cliente.id as id_cliente, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf');
		$this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->where('t_usuario.login', $login);
    $this->db->where('t_usuario.clave_f', $clave);
    $consulta=$this->db->get('t_usuario');
    	  if($consulta->num_rows() > 0){
    	      return $consulta->result();
    	  }
  }
  public function get_usuario(){
    $this->db->select('t_usuario.id as id_usuario ,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel,t_usuario.token as token,t_cliente.id as id_cliente,t_cliente.fecha_nac as fecha_nac,t_cliente.id_genero as id_genero, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf,t_estado_usuario.descripcion as descripcion_estado_usuario, t_nivel.descripcion as descripcion_nivel');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_estado_usuario', 't_usuario.id_estado_usuario = t_estado_usuario.id', 'left');
     $this->db->join('t_nivel', 't_usuario.id_nivel = t_nivel.id', 'left');
    $this->db->where('t_usuario.id_nivel',3);
    $consulta=$this->db->get('t_usuario');
      if($consulta->num_rows() > 0){
          return $consulta->result();
      }
  }
  public function get_usuario_general(){
    $this->db->select('t_usuario.id as id_usuario ,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel,t_usuario.token as token,t_cliente.id as id_cliente,t_cliente.fecha_nac as fecha_nac,t_cliente.id_genero as id_genero, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf,t_estado_usuario.descripcion as descripcion_estado_usuario, t_nivel.descripcion as descripcion_nivel');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_estado_usuario', 't_usuario.id_estado_usuario = t_estado_usuario.id', 'left');
     $this->db->join('t_nivel', 't_usuario.id_nivel = t_nivel.id', 'left');
    $consulta=$this->db->get('t_usuario');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
  }
  public function get_usuario_condu(){
    $this->db->select('t_usuario.id as id_usuario ,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel,t_usuario.token as token,t_cliente.id as id_cliente,t_cliente.fecha_nac as fecha_nac,t_cliente.id_genero as id_genero, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf,t_estado_usuario.descripcion as descripcion_estado_usuario, t_nivel.descripcion as descripcion_nivel');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_estado_usuario', 't_usuario.id_estado_usuario = t_estado_usuario.id', 'left');
     $this->db->join('t_nivel', 't_usuario.id_nivel = t_nivel.id', 'left');
    $this->db->where('t_usuario.id_nivel',2);
    $consulta=$this->db->get('t_usuario');
      if($consulta->num_rows() > 0){
          return $consulta->result();
      }
  }
  public function get_usuario_id_usuario($id_usuario){
    $this->db->select('t_usuario.id as id_usuario,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel, t_usuario.token as token, t_cliente.id as id_cliente,t_cliente.fecha_nac as fecha_nac,t_cliente.id_genero as id_genero, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf,t_estado_usuario.descripcion as descripcion_estado_usuario, t_nivel.descripcion as descripcion_nivel');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_estado_usuario', 't_usuario.id_estado_usuario = t_estado_usuario.id', 'left');
     $this->db->join('t_nivel', 't_usuario.id_nivel = t_nivel.id', 'left');
    $this->db->where('t_usuario.id', $id_usuario);
    $consulta=$this->db->get('t_usuario',1);
      if($consulta->num_rows() > 0){
          return $consulta->result();
      }
  }
  public function get_usuario_condu_id_usuario($id_usuario){
    $this->db->select('t_usuario.id as id_usuario,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel, t_usuario.token as token, t_cliente.id as id_cliente,t_cliente.fecha_nac as fecha_nac,t_cliente.id_genero as id_genero, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf,t_estado_usuario.descripcion as descripcion_estado_usuario, t_nivel.descripcion as descripcion_nivel');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->join('t_estado_usuario', 't_usuario.id_estado_usuario = t_estado_usuario.id', 'left');
     $this->db->join('t_nivel', 't_usuario.id_nivel = t_nivel.id', 'left');
    $this->db->where('t_usuario.id', $id_usuario);
    $consulta=$this->db->get('t_usuario',1);
      if($consulta->num_rows() > 0){
          return $consulta->result();
      }
  }
  public function login_manual($login,$clave){
    $this->db->select('t_usuario.id as id_usuario,t_usuario.nombre as nombre, t_usuario.login as login, t_usuario.id_estado_usuario, t_usuario.id_nivel as id_nivel,t_cliente.id as id_cliente, t_cliente.cedula as cedula_cliente, t_cliente.direccion as direccion, t_cliente.telf as telf');
    $this->db->join('t_cliente', 't_cliente.id_usuario = t_usuario.id', 'left');
    $this->db->where('t_usuario.login', $login);
    $this->db->where('t_usuario.clave', $clave);
    $consulta=$this->db->get('t_usuario',1);
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
  }
  public function guardar_usuario($id_nivel,$id_estado_usuario,$login,$clave,$nombre){
  	$data = array('id_nivel' =>$id_nivel,
  	'id_estado_usuario' =>$id_estado_usuario,
  	'login' =>$login,
  	'clave_f' =>$clave,
  	'nombre' =>$nombre);
  	$this->db->insert('t_usuario', $data);
  }

   public function guardar_usuario_manual($id_nivel,$id_estado_usuario,$login,$clave_1,$nombre){
    $data = array('id_nivel' =>$id_nivel,
    'id_estado_usuario' =>$id_estado_usuario,
    'login' =>$login,
    'clave' =>$clave_1,
    'nombre' =>$nombre);
    $this->db->insert('t_usuario', $data);
  }
  public function actualizar_usuario_manual($id_usuario,$id_nivel,$id_estado_usuario,$login,$clave_1,$nombre){
    $data = array('id_nivel' =>$id_nivel,
    'id_estado_usuario' =>$id_estado_usuario,
    'login' =>$login,
    'clave' =>$clave_1,
    'nombre' =>$nombre);
    $this->db->where('id', $id_usuario);
    $this->db->update('t_usuario', $data);
  }
  public function select_max_usuario(){
  	$this->db->select_max('id');
  	$consulta=$this->db->get('t_usuario');
  		  if($consulta->num_rows() > 0){
  		      return $consulta->result();
  		  }
  }
  public function get_usuario_login($login){
    $this->db->where('login', $login);
    $consulta=$this->db->get('t_usuario');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
  }
  public function actualizar_estado_usuario($id_usuario,$id_estado){
    $data = array('id_estado_usuario' =>$id_estado);
    $this->db->where('id', $id_usuario);
    $this->db->update('t_usuario', $data);
    
  }
    public function contar_usuario($id_nivel){
      $this->db->where('id_nivel',$id_nivel);
      $this->db->from('t_usuario');
      return $this->db->count_all_results();
    }
    public function get_ubicacion($fecha, $id_nivel){
      $this->db->select('MAX(t_ubicacion.id) as id, t_ubicacion.id_usuario as id_usuario, MAX(t_ubicacion.lat_lng) as lat_lng');
      $this->db->join('t_usuario', 't_ubicacion.id_usuario = t_usuario.id', 'left');
      $this->db->where('t_ubicacion.fecha', $fecha);
      $this->db->where('t_usuario.id_nivel', $id_nivel);
      $this->db->group_by('t_ubicacion.id_usuario');
      $consulta=$this->db->get('t_ubicacion');
          if($consulta->num_rows() > 0){
              return $consulta->result();
          }
    }
    public function actualizar_usuario_pass($id_usuario,$clave){
      $data = array('clave' =>$clave);
      $this->db->where('id', $id_usuario);
      $this->db->update('t_usuario', $data);
    }

	

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */