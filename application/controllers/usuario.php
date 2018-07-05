<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('security');
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->library('upload');
			$this->load->model('usuario_model');
			$this->load->model('tipo_model');
			$this->load->model('empresa_model');
			$this->load->model('cliente_model');
			$this->load->model('vehiculo_model');
			$this->load->model('estado_usuario_model');	
			$this->load->model('pais_model');
			$this->load->model('ciudad_model');
	}
	public function index(){
			redirect('usuario/grilla_conductor');
	}
	public function grilla_conductor(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->where('id_nivel',2);
			$crud->set_relation('id_nivel','t_nivel','descripcion');
			$crud->set_subject('Usuario');
			$crud->set_language('spanish');
			$crud->display_as('nombre','Nombre');
			$crud->display_as('login','Login');
			$crud->display_as('id_nivel','Nivel');
			$crud->columns('nombre','login','id_nivel');
			$crud->required_fields('nombre','login','id_nivel');
			$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
			$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'fn_editar'));
			$crud->add_action('Activar/Desactivar', '', '','fa fa-power-off',array($this,'fn_activar_desactivar'));
			$crud->unset_read();
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add'){
			redirect('usuario/add');
			}
 /*si es niel 1*/
 if ($usuario_data['id_nivel']=='1') {
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('usuario/usuario',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
      }else{
/*si es nivel 2*/ 
       if ($usuario_data['id_nivel']=='2') {
				redirect('principal','refresh');
        }else{
/*si es nivel 3*/
					redirect('principal','refresh');
       	 	}
   			}
			 }else{
			      redirect('login','refresh');
			 }
	}
	function fn_ver($primary_key , $row){
		return site_url('usuario/ver').'/'.$row->id;
	}
		function fn_editar($primary_key , $row){
		return site_url('usuario/editar').'/'.$row->id;
	}
	public function editar(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
      $id_usuario['id_usuario']=$this->uri->segment(3);
				if ($id_usuario['id_usuario']) {
					$this->session->set_userdata($id_usuario);
					}
			$id_usuario=$this->session->userdata('id_usuario');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$consulta=$this->usuario_model->get_usuario_id_usuario($id_usuario);
			foreach ($consulta as $key) {
				$id_nivel=$key->id_nivel;
			}
			$data = array('usuario'=>$this->usuario_model->get_usuario_id_usuario($id_usuario),
			'tipo' =>$this->tipo_model->get_tipo(),
			'vehiculo'=>$this->vehiculo_model->get_vehiculo_id_usuario($id_usuario),
			'adjunto'=>$this->vehiculo_model->get_adjunto_vehiculo_id_usuario($id_usuario));
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
		 	/*verifica si es conductor o cliente*/
			if ($id_nivel=='2') {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('usuario/editar',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common',$output);
			}else{
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('usuario/ver_n2',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common',$output);
			}
			/***********************************/
		    }else{
		/*si es nivel 2*/ 
	       if ($usuario_data['id_nivel']=='2') {
					redirect('principal','refresh');
	        }else{
	/*si es nivel 3*/
						redirect('principal','refresh');
	        }
		   }
		 }else{
		      redirect('login','refresh');
		 }	
	}

	public function ver(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
      $id_usuario['id_usuario']=$this->uri->segment(3);
				if ($id_usuario['id_usuario']) {
					$this->session->set_userdata($id_usuario);
					}
			$id_usuario=$this->session->userdata('id_usuario');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$consulta=$this->usuario_model->get_usuario_id_usuario($id_usuario);
			foreach ($consulta as $key) {
				$id_nivel=$key->id_nivel;
			}
			$data = array('usuario'=>$this->usuario_model->get_usuario_id_usuario($id_usuario),
			'vehiculo'=>$this->vehiculo_model->get_vehiculo_id_usuario($id_usuario),
			'adjunto'=>$this->vehiculo_model->get_adjunto_vehiculo_id_usuario($id_usuario));
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
		 	/*verifica si es conductor o cliente*/
			if ($id_nivel=='2') {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('usuario/ver',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common',$output);
			}else{
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('usuario/ver_n2',$data);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common',$output);
			}
			/***********************************/
		    }else{
		/*si es nivel 2*/ 
	       if ($usuario_data['id_nivel']=='2') {
					redirect('principal','refresh');
	        }else{
	/*si es nivel 3*/
						redirect('principal','refresh');
	        }
		   }
		 }else{
		      redirect('login','refresh');
		 }	
	}

	public function grilla_cliente(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->where('id_nivel',3);
			$crud->set_relation('id_nivel','t_nivel','descripcion');
			$crud->set_subject('Cliente');
			$crud->set_language('spanish');
			$crud->display_as('nombre','Nombre');
			$crud->display_as('login','Login');
			$crud->display_as('id_nivel','Nivel');
			$crud->columns('nombre','login','id_nivel');
			$crud->required_fields('nombre','login','id_nivel');
			$crud->add_action('Activar/Desactivar', '', '','fa fa-power-off',array($this,'fn_activar_desactivar'));
			$crud->unset_edit();
			$crud->unset_read();
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add'){
			redirect('usuario/add_cliente');
			}
 /*si es niel 1*/
 if ($usuario_data['id_nivel']=='1') {
	$this->load->view('../../assets/inc/head_common', $output);
	$this->load->view('../../assets/inc/menu_lateral');
	$this->load->view('../../assets/inc/menu_superior');
	$this->load->view('usuario/usuario',$output );
	$this->load->view('../../assets/inc/footer_common',$output);
  }else{
/*si es nivel 2*/ 
   if ($usuario_data['id_nivel']=='2') {
		redirect('principal','refresh');
    }else{
/*si es nivel 3*/
		redirect('principal','refresh');
    }
   }
 }else{
      redirect('login','refresh');
 }
}
public function add_cliente(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$data = array('tipo' =>$this->tipo_model->get_tipo(),
			'empresa'=>$this->empresa_model->get_empresa(),
			'pais'=>$this->pais_model->get_pais());
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('cliente/add',$data);
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common',$output);
		      }else{
		/*si es nivel 2*/ 
		       if ($usuario_data['id_nivel']=='2') {
						redirect('principal','refresh');
		        }else{
		/*si es nivel 3*/
						redirect('principal','refresh');
		       	 }
		   			}
		 }else{
		      redirect('login','refresh');
		 }
}
	public function guardar_usuario_cliente(){
		$this->form_validation->set_rules('txt_cedula', 'Cedula', 'required|required');
		$this->form_validation->set_rules('txt_nombre', 'Nombre', 'required|required');
		$this->form_validation->set_rules('txt_direccion', 'Direccion', 'required|required');
		$this->form_validation->set_rules('txt_telf', 'Telefono', 'required|required');
		$this->form_validation->set_rules('txt_login', 'Login', 'required|required');
		$this->form_validation->set_rules('txt_fecha_nac', 'Fecha de Nacimiento', 'required|required');
		$this->form_validation->set_rules('txt_clave_1', 'Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', 'Repita su Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', ' Confirmacion de Clave', 'required|matches[txt_clave_1]');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
		$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->add_cliente();
		}else{
			$id_genero='1';
			$cedula=$this->input->post('txt_cedula','true');
			$nombre=$this->input->post('txt_nombre','true');
			$direccion=$this->input->post('txt_direccion','true');
			$telf=$this->input->post('txt_telf','true');
			$login=$this->input->post('txt_login','true');
			$clave_1=do_hash($this->input->post('txt_clave_1','true'));
			$fecha_nac=$this->input->post('txt_fecha_nac','true');
			$consulta_usuario=$this->usuario_model->get_usuario_login($login);
			$id_nivel=3;
			$id_estado_usuario=1;
			if ($consulta_usuario) {
				$this->session->set_flashdata('alerta', 'Cliente ya existe, si ha perdido su clave, haga clic en olvidó su password');
						redirect('usuario/grilla_cliente','refresh');
			}else{
				$this->usuario_model->guardar_usuario_manual($id_nivel,$id_estado_usuario,$login,$clave_1,$nombre);
				$consulta_usuario=$this->usuario_model->select_max_usuario();
				foreach ($consulta_usuario as $key) {
 					$id_usuario=$key->id;
 				}
 				$this->cliente_model->guardar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac);
 				$this->session->set_flashdata('alerta', 'Registro Guardado, ya puede iniciar sesion');
 					redirect('usuario/grilla_cliente','refresh');
			}
		}
	}

	function fn_activar_desactivar($primary_key , $row){
		return site_url('usuario/activar_desactivar').'/'.$row->id;
		}
	public function add(){
		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$data = array('tipo' =>$this->tipo_model->get_tipo(),
			'empresa'=>$this->empresa_model->get_empresa(),
			'pais'=>$this->pais_model->get_pais(),
			'ciudad'=>$this->ciudad_model->get_ciudad());
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('usuario/add',$data);
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common',$output);
		      }else{
		/*si es nivel 2*/ 
		       if ($usuario_data['id_nivel']=='2') {
						redirect('principal','refresh');
		        }else{
		/*si es nivel 3*/
						redirect('principal','refresh');
		        }
		   		}
 }else{
      redirect('login','refresh');
 }
	
	}
	public function fill_ciudad(){
         $id_pais = $this->input->post('id_pais');
        if($id_pais){
            $ciudad = $this->ciudad_model->get_ciudad_id_pais($id_pais);
            echo '<option value="">Seleccione Ciudad</option>';
            foreach($ciudad as $fila){
                echo '<option data-tokens="'.$fila->id.','.$fila->descripcion.'" value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
            echo '<option value="">Sin Resultados</option>';
        }
   }
	/************************************************/
	public function activar_desactivar(){

		if ($this->session->userdata('logueado')) {
      $usuario_data = array(
           'id_usuario' => $this->session->userdata('id'),
           'id_estado_usuario'=>$this->session->userdata('id_estado_usuario'),
           'id_nivel' => $this->session->userdata('id_nivel'),
           'id_cliente'=>$this->session->userdata('id_cliente'),
           'nombre' => $this->session->userdata('nombre'),
           'login'=>$this->session->userdata('login'),
           'cedula_cliente' =>$this->session->userdata('cedula_cliente'),
           'direccion'=>$this->session->userdata('direccion'),
           'telf'=>$this->session->userdata('telf'));

			$id_usuario['id_usuario']=$this->uri->segment(3);
					if ($id_usuario['id_usuario']) {
						$this->session->set_userdata($id_usuario);
						}
			$id_usuario=$this->session->userdata('id_usuario');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$output = $crud->render();
			$data = array('usuario' =>$this->usuario_model->get_usuario_id_usuario($id_usuario),
				'estado'=>$this->estado_usuario_model->get_estado_usuario());
 /*si es niel 1*/
 if ($usuario_data['id_nivel']=='1') {
	$this->load->view('../../assets/inc/head_common', $output);
	$this->load->view('../../assets/inc/menu_lateral');
	$this->load->view('../../assets/inc/menu_superior');
	$this->load->view('usuario/activar_desactivar',$data);
	$this->load->view('../../assets/inc/footer_common',$output);
      }else{
/*si es nivel 2*/ 
       if ($usuario_data['id_nivel']=='2') {
				redirect('principal','refresh');
        }else{
/*si es nivel 3*/
					redirect('principal','refresh');
        }
   		}
 }else{
      redirect('login','refresh');
 }
		
	}
	public function activar_desactivar_usuario(){
		$id_usuario=$this->input->post('txt_id_usuario','true');
		$id_estado=$this->input->post('id_estado','true');
		$this->usuario_model->actualizar_estado_usuario($id_usuario,$id_estado);
		$this->session->set_flashdata('alerta', 'Se ha Actualizado el estado del usuario corectamente');
				redirect('usuario/grilla_conductor','refresh');
	}
	/*************************************************/
 public function guardar_usuario_vehiculo(){
		$this->form_validation->set_rules('txt_fecha_nac', 'Fecha de Nacimiento', 'required|required');
			$this->form_validation->set_rules('id_pais', 'Pais', 'required|callback_check_default');
		$this->form_validation->set_rules('id_ciudad', 'Ciudad', 'required|callback_check_default');
 		$this->form_validation->set_rules('txt_cedula', 'Cedula', 'required|required');
		$this->form_validation->set_rules('txt_nombre', 'Nombre', 'required|required');
		$this->form_validation->set_rules('txt_direccion', 'Direccion', 'required|required');
		$this->form_validation->set_rules('txt_telf', 'Telefono', 'required|required');
		$this->form_validation->set_rules('txt_login', 'Login', 'required|required');
		$this->form_validation->set_rules('txt_clave_1', 'Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', 'Repita su Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', ' Confirmacion de Clave', 'required|matches[txt_clave_1]');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->add();
		}else{
			$id_genero=1;
			$id_pais=$this->input->post('id_pais','true');
			$id_ciudad=$this->input->post('id_ciudad','true');
			$fecha_nac=$this->input->post('txt_fecha_nac','true');
			$cedula=$this->input->post('txt_cedula','true');
			$nombre=$this->input->post('txt_nombre','true');
			$direccion=$this->input->post('txt_direccion','true');
			$telf=$this->input->post('txt_telf','true');
			$login=$this->input->post('txt_login','true');
			$clave_1=do_hash($this->input->post('txt_clave_1','true'));
			
			$id_nivel=2;
			$id_estado_usuario=1;
			
			/*verifica si el usuario existe*/
			$consulta=$this->usuario_model->get_usuario_login($login);
			if ($consulta) {
				$this->session->set_flashdata('alerta', 'Usuario ya Existe');
						redirect('usuario/grilla_conductor','refresh');
			}else{

				/*guarda el usuario, busca el ultimo usuario guardado y luego guarda el cliente*/
				$this->usuario_model->guardar_usuario_manual($id_nivel,$id_estado_usuario,$login,$clave_1,$nombre);
				$consulta_2=$this->usuario_model->select_max_usuario();
				foreach ($consulta_2 as $key) {
					$id_usuario=$key->id;
				}
				$this->cliente_model->guardar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac);
				/*******************************************************************************/
			
			$this->session->set_flashdata('alerta', 'Se han guardado los datos correctamente');
				redirect('usuario/grilla_conductor','refresh');
			}
		}
 }
 public function actualizar_usuario_vehiculo(){
		$this->form_validation->set_rules('txt_fecha_nac', 'Fecha de Nacimiento', 'required|required');
 		$this->form_validation->set_rules('txt_cedula', 'Cedula', 'required|required');
		$this->form_validation->set_rules('txt_nombre', 'Nombre', 'required|required');
		$this->form_validation->set_rules('txt_direccion', 'Direccion', 'required|required');
		$this->form_validation->set_rules('txt_telf', 'Telefono', 'required|required');
		$this->form_validation->set_rules('txt_login', 'Login', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->editar();
		}else{
			$id_genero=1;
			$id_usuario=$this->input->post('txt_id_usuario','true');
			$id_vehiculo=$this->input->post('txt_id_vehiculo','true');
			$id_pais=$this->input->post('id_pais','true');
			$id_ciudad=$this->input->post('id_ciudad','true');
			$fecha_nac=$this->input->post('txt_fecha_nac','true');
			$cedula=$this->input->post('txt_cedula','true');
			$nombre=$this->input->post('txt_nombre','true');
			$direccion=$this->input->post('txt_direccion','true');
			$telf=$this->input->post('txt_telf','true');
			$login=$this->input->post('txt_login','true');
			$clave_1=do_hash($this->input->post('txt_clave_1','true'));
			$id_nivel=2;
			$id_estado_usuario=1;
		/*	echo $id_vehiculo;
			exit();*/
		
				/*guarda el usuario, busca el ultimo usuario guardado y luego guarda el cliente*/
				$this->usuario_model->actualizar_usuario_manual($id_usuario,$id_nivel,$id_estado_usuario,$login,$clave_1,$nombre);
				$this->cliente_model->actualizar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac);
				/*******************************************************************************/
				/*guarda los datos del vehiculo*/
			
			$this->session->set_flashdata('alerta', 'Se han actualizado los datos correctamente');
				redirect('usuario/grilla_conductor','refresh');
			
		}
 }

}