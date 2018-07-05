<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cliente extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('cliente_model');
			$this->load->model('usuario_model');
			 $this->load->helper('security');
	}
	public function index(){
			redirect('cliente/grilla');
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
			$crud->set_table('t_cliente');
			$crud->set_subject('cliente');
			$crud->set_language('spanish');
			$crud->display_as('descripcion','cliente');
			$crud->columns('descripcion');
			$crud->required_fields('descripcion');
			$crud->unset_read();
			$output = $crud->render();
 /*si es niel 1*/
 if ($usuario_data['id_nivel']=='1') {
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('cliente/cliente',$output );
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
	public function llenar_datos(){
			if($this->session->userdata('logueado')){
			$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
			'nombre_usuario'=>$this->session->userdata('nombre'),
			'id_nivel'=>$this->session->userdata('id_nivel'),
			'id_cliente' =>$this->session->userdata('id_cliente'),
			'cedula_cliente'=>$this->session->userdata('cedula_cliente'),
			'direccion'=>$this->session->userdata('direccion'),
			'telf'=>$this->session->userdata('telf'),
			'genero'=>$this->session->userdata('genero'));
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_cliente');
			$output = $crud->render();
			$data = array('cliente' =>$this->cliente_model->get_cliente_id($data_usuario['id_cliente']));
			$this->load->view('../../assets/inc/head_common_login',$output);
			$this->load->view('../../assets/inc/menu_inicio');
			$this->load->view('login/llenar_datos',$data);
			$this->load->view('../../assets/inc/footer_common_login',$output);
			}else{
				redirect('login','refresh');
			}
	}
	public function actualizar_cliente(){
			if($this->session->userdata('logueado')){
		$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
			'nombre_usuario'=>$this->session->userdata('nombre'),
			'id_nivel'=>$this->session->userdata('id_nivel'),
			'id_cliente' =>$this->session->userdata('id_cliente'),
			'cedula_cliente'=>$this->session->userdata('cedula_cliente'),
			'direccion'=>$this->session->userdata('direccion'),
			'telf'=>$this->session->userdata('telf'),
			'genero'=>$this->session->userdata('genero'),
			'login'=>$this->session->userdata('login'));
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_cliente');
		$output = $crud->render();
		$this->form_validation->set_rules('txt_cedula', 'Cedula', 'required|required');
		$this->form_validation->set_rules('txt_direccion', 'Direccion', 'required|required');
		$this->form_validation->set_rules('txt_telf', 'telf', 'required|required');
		$this->form_validation->set_rules('txt_fecha_nac', 'Fecha de Nacimiento', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->llenar_datos();
		}else{
				$dni=$this->input->post('txt_dni','true');
				$nombre=$data_usuario['nombre_usuario'];
				$direccion_1=$this->input->post('txt_direccion','true');
				$cedula=$this->input->post('txt_cedula','true');
				$telf=$this->input->post('txt_telf','true');
				$login=$data_usuario['login'];
				$fecha_nac=$this->input->post('txt_fecha_nac','true');
				$clave_1=do_hash($this->input->post('txt_clave_1','true'));
				$id_usuario=$data_usuario['id_usuario'];
				if ($data_usuario['genero']=='male') {
					$id_genero=1;
				}else{
					$id_genero=2;
				}
			$this->cliente_model->guardar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion_1,$telf,	$login,$fecha_nac);	
			$this->session->set_flashdata('alerta', 'Se ha guardado correctamente, ya puede iniciar sesion');
			redirect('login','refresh');
		}	
	}
}
/*fin*/
}
