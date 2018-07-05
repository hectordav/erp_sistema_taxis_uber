<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Codigo_promo extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('tipo_codigo_model');
			$this->load->model('codigo_promo_model');
	}
	public function index(){
			redirect('codigo_promo/grilla');
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
			$crud->set_table('t_codigo_promo');
			$crud->set_relation('id_tipo_codigo','t_tipo_codigo','descripcion');
			$crud->set_relation('id_status_codigo_promo','t_status_codigo_promo','descripcion');
			$crud->set_relation('id_usuario','t_usuario','nombre');
			$crud->set_subject('Codigo Promocion');
			$crud->set_language('spanish');
			$crud->display_as('id_tipo_codigo','Tipo de Codigo');
			$crud->display_as('id_status_codigo_promo','Status');
			$crud->display_as('id_usuario','Usuario');
			$crud->display_as('codigo','Codigo');
			$crud->display_as('valor','Valor');
			$crud->display_as('fecha_i','Fecha Generacion');
			$crud->display_as('fecha_f','Vencimiento');
			$crud->columns('id_tipo_codigo','id_status_codigo_promo','id_usuario','codigo','valor','fecha_i','fecha_f');
			$crud->required_fields('id_tipo_codigo','id_status_codigo_promo','id_usuario','codigo','valor','fecha_i','fecha_f');
			$crud->unset_edit();
			$output = $crud->render();
			$state = $crud->getState();
				if($state == 'add'){
				redirect('codigo_promo/add');
				}
 		/*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('codigo_promo/codigo_promo',$output );
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
			$crud->set_table('t_codigo_promo');
			$output = $crud->render();
			$codigo_aleatorio=rand();
			$data = array('tipo_codigo' =>$this->tipo_codigo_model->get_tipo_codigo(),
			'codigo_aleatorio'=>$codigo_aleatorio);
	 /*si es nivel 1*/
	 if ($usuario_data['id_nivel']=='1') {
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('codigo_promo/add',$data);
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
	public function guardar_codigo_promo(){
	 	$this->form_validation->set_rules('id_tipo', 'Tipo', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_codigo_generado', 'Codigo', 'required|required');
 		$this->form_validation->set_rules('txt_valor', 'Valor de Codigo', 'required|required');
		$this->form_validation->set_rules('txt_fecha_i', 'Fecha', 'required|required');
		$this->form_validation->set_rules('txt_fecha_f', 'Fecha Vencimiento', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
			$this->add();
		}else{
		$id_tipo=$this->input->post('id_tipo','true');
		$codigo=$this->input->post('txt_codigo_generado','true');
		$valor=$this->input->post('txt_valor','true');
		$fecha_i=$this->input->post('txt_fecha_i','true');
		$fecha_f=$this->input->post('txt_fecha_f','true');
		$id_status_codigo_promo=1;
		$this->codigo_promo_model->guardar_codigo_promo($id_tipo,$id_status_codigo_promo,$codigo,$valor,$fecha_i,$fecha_f);
		$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
				redirect('codigo_promo','refresh');

		}

	}

}