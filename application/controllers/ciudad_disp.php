<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudad_disp extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('pais_model');
			$this->load->model('ciudad_disp_model');
	}
	public function index(){
			redirect('ciudad_disp/grilla');
	}
	public function grilla(){
		try {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_ciudad_disp');
		$crud->set_relation('id_pais','t_pais','pais');
		$crud->set_relation('id_ciudad','t_ciudad','descripcion');
		$crud->set_subject('Ciudad Disponible');
		$crud->set_language('spanish');
		$crud->display_as('id_pais','Pais');
		$crud->display_as('id_ciudad','Ciudad Disponible');
		$crud->columns('id_pais','id_ciudad');
		$crud->unset_edit();
	/*	$crud->required_fields('id_pais','id_ciudad');*/
		$output = $crud->render();
		$state = $crud->getState();
			if($state == 'add'){
			redirect('ciudad_disp/add');
			}
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('ciudades_disponibles/ciudades_disponibles',$output );
		$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}
	}
		public function add(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$output = $crud->render();
		$data = array('pais'=>$this->pais_model->get_pais());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('ciudades_disponibles/add',$data);
		$this->load->view('../../assets/script/script_combo');
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function guardar_ciudad(){
		$this->form_validation->set_rules('id_pais', 'Pais', 'required|callback_check_default');
		$this->form_validation->set_rules('id_ciudad', 'Ciudad', 'required|callback_check_default');
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->add();
		}else{
			$id_pais=$this->input->post('id_pais','true');
			$id_ciudad=$this->input->post('id_ciudad','true');
			$this->ciudad_disp_model->guardar_ciudad_disp($id_pais,$id_ciudad);
			$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
					redirect('ciudad_disp/grilla','refresh');
		}
	}

}