<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tipo extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
	}
	public function index(){
			redirect('tipo/grilla');
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
			$crud->set_table('t_tipo');
			$crud->set_subject('Tipo');
			$crud->set_language('spanish');
			$crud->display_as('descripcion','Tipo');
			$crud->columns('descripcion');
			$crud->required_fields('descripcion');
			$output = $crud->render();
			 /*si es nivel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('tipo/tipo',$output );
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

}