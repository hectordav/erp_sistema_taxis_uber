<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modelo extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('tipo_model');
			$this->load->model('marca_model');
			$this->load->model('modelo_model');
	}
	public function index(){
			redirect('modelo/grilla');
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
			$crud->set_table('t_modelo');
			$crud->set_relation('id_tipo','t_tipo','descripcion');
			$crud->set_relation('id_marca','t_marca','descripcion');
			$crud->set_subject('Modelo');
			$crud->set_language('spanish');
			$crud->display_as('id_tipo','Tipo');
			$crud->display_as('id_marca','Marca');
			$crud->display_as('descripcion','Modelo');
			$crud->columns('id_tipo','id_marca','descripcion');
			$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'fn_editar'));
			$crud->required_fields('id_tipo','descripcion');
			$output = $crud->render();
			$state = $crud->getState();
			if($state == 'add'){
			redirect('modelo/add');
			}
	 /*si es niel 1*/
	 if ($usuario_data['id_nivel']=='1') {    	
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('modelo/modelo',$output );
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
	function fn_editar($primary_key , $row){
		return site_url('modelo/editar').'/'.$row->id;
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
				$crud->set_table('t_modelo');
				$output = $crud->render();
				$data = array('tipo' =>$this->tipo_model->get_tipo());
				 /*si es niel 1*/
				 if ($usuario_data['id_nivel']=='1') {
					$this->load->view('../../assets/inc/head_common_add', $output);
					$this->load->view('../../assets/inc/menu_lateral');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('modelo/add',$data);
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
				$id_modelo['id_modelo']=$this->uri->segment(3);
				if ($id_modelo['id_modelo']) {
				$this->session->set_userdata($id_modelo);
				}
				$id_modelo=$this->session->userdata('id_modelo');
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_modelo');
				$output = $crud->render();
				$data = array('tipo' =>$this->tipo_model->get_tipo(),
				'modelo'=>$this->modelo_model->get_modelo_id($id_modelo));
			 /*si es niel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('modelo/editar',$data);
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
	public function fill_marca(){
         $id_tipo = $this->input->post('id_tipo');
        if($id_tipo){
            $marca = $this->marca_model->get_marca_id($id_tipo);
            echo '<option value="">Seleccione Marca</option>';
            foreach($marca as $fila){
                echo '<option data-tokens="'.$fila->id.','.$fila->descripcion.'" value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
            echo '<option value="">Sin Resultados</option>';
        }
   }
   public function fill_modelo(){
            $id_marca = $this->input->post('id_marca');
           if($id_marca){
               $modelo = $this->modelo_model->get_modelo_id_marca($id_marca);
               echo '<option value="">Seleccione Modelo</option>';
               foreach($modelo as $fila){
                   echo '<option data-tokens="'.$fila->id.','.$fila->descripcion.'" value="'. $fila->id .'">'. $fila->descripcion.'</option>';
               }
           }else{
               echo '<option value="">Sin Resultados</option>';
           }
      }
   public function guardar_modelo(){
   	$this->form_validation->set_rules('id_tipo', 'Tipo', 'required|callback_check_default');
		$this->form_validation->set_rules('id_marca', 'Marca', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_modelo', 'Modelo', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add*/
				$this->add();
		}else{
			$id_tipo=$this->input->post('id_tipo','true');
			$id_marca=$this->input->post('id_marca','true');
			$modelo=$this->input->post('txt_modelo','true');
			$this->modelo_model->guardar_modelo($id_tipo,$id_marca,$modelo);
			$this->session->set_flashdata('alerta', 'Se ha guardado correctamente');
					redirect('modelo/grilla','refresh');
		}
   }
   public function actualizar_modelo(){
   	 	$this->form_validation->set_rules('id_tipo', 'Tipo', 'required|callback_check_default');
		$this->form_validation->set_rules('id_marca', 'Marca', 'required|callback_check_default');
		$this->form_validation->set_rules('txt_modelo', 'Modelo', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add*/
				$this->editar();
		}else{
			$id_modelo=$this->input->post('txt_id_modelo','true');
			$id_tipo=$this->input->post('id_tipo','true');
			$id_marca=$this->input->post('id_marca','true');
			$modelo=$this->input->post('txt_modelo','true');
			$this->modelo_model->actualizar_modelo($id_tipo,$id_marca,$id_modelo,$modelo);
			$this->session->set_flashdata('alerta', 'Se ha Actualizado Correctamente');
					redirect('modelo/grilla','refresh');
		}
   }


}