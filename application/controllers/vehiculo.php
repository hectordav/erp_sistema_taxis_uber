<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class vehiculo extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('vehiculo_model');
			$this->load->model('usuario_model');
			$this->load->model('tipo_model');
			$this->load->model('empresa_model');
			$this->load->library('upload');
	}
	public function index(){
			redirect('vehiculo/grilla');
	}
	public function grilla(){
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
			$crud->set_table('t_vehiculo');
			$crud->set_relation('id_tipo','t_tipo','descripcion');
			$crud->set_relation('id_marca','t_marca','descripcion');
			$crud->set_relation('id_modelo','t_modelo','descripcion');
			$crud->set_relation('id_usuario','t_usuario','nombre');
			$crud->set_subject('Vehiculo');
			$crud->set_language('spanish');
			$crud->display_as('id_tipo','Tipo');
			$crud->display_as('id_marca','Marca');
			$crud->display_as('id_modelo','Modelo');
			$crud->display_as('id_usuario','Conductor');
			$crud->display_as('numero_interno_vehiculo','# Interno');
			$crud->display_as('placa','Placa');
			$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
			$crud->add_action('Cambiar Conductor', '', '','fa fa-arrows-h',array($this,'fn_cambiar_conductor'));
			$crud->columns('id_tipo','id_marca','id_modelo','id_usuario','numero_interno_vehiculo','placa');
			$crud->unset_read();
			$crud->unset_delete();
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
				if($state == 'add'){
				redirect('vehiculo/add_vehiculo');
				}

		 /*si es nivel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('vehiculo/vehiculo',$output );
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
		return site_url('vehiculo/ver').'/'.$row->id;
	}
	function fn_cambiar_conductor($primary_key , $row){
		return site_url('vehiculo/cambiar_conductor').'/'.$row->id;
	}
	public function add_vehiculo(){
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
      /*lo que toma del segment*/
    
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_vehiculo');
			$output = $crud->render();
			$data = array('tipo' =>$this->tipo_model->get_tipo(),
				'empresa'=>$this->empresa_model->get_empresa());
 				/*si es nivel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('vehiculo/add',$data );
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
      /*lo que toma del segment*/
      	$id_vehiculo['id_vehiculo']=$this->uri->segment(3);
						if ($id_vehiculo['id_vehiculo']) {
						$this->session->set_userdata($id_vehiculo);
						}
					$id_vehiculo=$this->session->userdata('id_vehiculo');
			/*************************/
			$data = array('vehiculo'=>$this->vehiculo_model->get_vehiculo_id_vehiculo($id_vehiculo),
			'adjunto'=>$this->vehiculo_model->get_adjunto_vehiculo_id_vehiculo($id_vehiculo));
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_vehiculo');
					$output = $crud->render();
 				/*si es nivel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('vehiculo/ver',$data );
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
	public function cambiar_conductor(){
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
      /*lo que toma del segment*/
      	$id_vehiculo['id_vehiculo']=$this->uri->segment(3);
						if ($id_vehiculo['id_vehiculo']) {
						$this->session->set_userdata($id_vehiculo);
						}
					$id_vehiculo=$this->session->userdata('id_vehiculo');
			/*************************/
			$data = array('vehiculo'=>$this->vehiculo_model->get_vehiculo_id_vehiculo($id_vehiculo),
			'adjunto'=>$this->vehiculo_model->get_adjunto_vehiculo_id_vehiculo($id_vehiculo),
			'usuario'=>$this->usuario_model->get_usuario_condu());
					$crud = new grocery_CRUD();
					$crud->set_theme('bootstrap');
					$crud->set_table('t_vehiculo');
					$output = $crud->render();
 				/*si es nivel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('vehiculo/cambiar_conductor',$data );
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
	public function actualizar_conductor(){
		$this->form_validation->set_rules('id_conductor', 'Conductor', 'required|callback_check_default');
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->cambiar_conductor();
		}else{
		$id_conductor=$this->input->post('id_conductor','true');
		$id_vehiculo=$this->input->post('id_vehiculo','true');
		$this->vehiculo_model->actualizar_conductor_vehiculo($id_vehiculo,$id_conductor);
		$this->session->set_flashdata('alerta', 'Se ha asignado el conductor correctamente');
				redirect('vehiculo/grilla','refresh');
		}
	}
	public function guardar_vehiculo(){
		$this->form_validation->set_rules('id_tipo', 'Tipo', 'required|callback_check_default');
		$this->form_validation->set_rules('id_marca', 'Marca', 'required|callback_check_default');
		$this->form_validation->set_rules('id_modelo', 'Modelo', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_placa', 'Placa', 'required|required');
		$this->form_validation->set_rules('txt_ano', 'Año', 'required|required');
		$this->form_validation->set_rules('txt_licencia', 'Licencia', 'required|required');
		$this->form_validation->set_rules('txt_licencia_vence', 'Vencimiento de Licencia', 'required|required');
		$this->form_validation->set_rules('id_empresa', 'Empresa', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_num_interno_vehiculo', 'Numero Interno de Vehiculo', 'required|required');
		$this->form_validation->set_rules('txt_num_tarjeta_operacion', 'Numero de tarjeta de Operacion', 'required|required');
		$this->form_validation->set_rules('txt_num_interno_contrato', 'Numero Interno de Contrato', 'required|required');
			$this->form_validation->set_message("required","El campo %s es Requerido");
			if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->add();
		}else{
			$id_tipo=$this->input->post('id_tipo','true');
			$id_marca=$this->input->post('id_marca','true');
			$id_modelo=$this->input->post('id_modelo','true');
			$placa=$this->input->post('txt_placa','true');
			$ano=$this->input->post('txt_ano','true');
			$licencia=$this->input->post('txt_licencia','true');
			$licencia_vence=$this->input->post('txt_licencia_vence','true');
			$id_empresa=$this->input->post('id_empresa','true');
			$num_interno_vehiculo=$this->input->post('txt_num_interno_vehiculo','true');
			$num_tarjeta_operacion=$this->input->post('txt_num_tarjeta_operacion','true');
			$num_interno_contrato=$this->input->post('txt_num_interno_contrato','true');
			$convenio=$this->input->post('txt_convenio','true');
			/*guarda los datos del vehiculo*/
			$this->vehiculo_model->guardar_vehiculo($id_tipo,$id_marca,$id_modelo,$id_empresa,$num_interno_vehiculo,$num_tarjeta_operacion,$num_interno_contrato,$licencia,$licencia_vence,$placa,$ano,$convenio);
				/*busca el ultimo vehiculo registrado*/
				$consulta_vehiculo=$this->vehiculo_model->select_max_vehiculo();
				foreach ($consulta_vehiculo as $key) {
					$id_vehiculo=$key->id;
				}
				/*ahora guarda las imagenes del Vehiculo*/
				$mi_archivo_1 = 'mi_archivo_1';
				$mi_archivo_2 = 'mi_archivo_2';
				$mi_archivo_3 = 'mi_archivo_3';
				$mi_archivo_4 = 'mi_archivo_4';

				if (!empty($_FILES['mi_archivo_1']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_1')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->vehiculo_model->guardar_adjunto_vehiculo($id_vehiculo,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_2']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_2')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->vehiculo_model->guardar_adjunto_vehiculo($id_vehiculo,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_3']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_3')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->vehiculo_model->guardar_adjunto_vehiculo($id_vehiculo,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
				if (!empty($_FILES['mi_archivo_4']['name'])) {
						$config['upload_path'] = "./assets/img";
						$config['allowed_types'] = "*";
						$config['max_size'] = "0";
						$config['max_width'] = "0";
						$config['max_height'] = "0";
						$config['remove_spaces']=TRUE;
						$config['overwrite'] = true;
						$this->upload->initialize($config);
					if ($this->upload->do_upload('mi_archivo_4')){
						$data= $this->upload->data();
						$archivo=$data['file_name'];
						$this->vehiculo_model->guardar_adjunto_vehiculo($id_vehiculo,$archivo);
						}else{
						echo $this->upload->display_errors();
						$archivo_1_1=null;
						}
				}
		$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
		redirect('vehiculo/grilla','refresh');
		}
	}

}