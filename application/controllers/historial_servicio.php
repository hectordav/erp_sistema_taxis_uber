<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Historial_servicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('servicio_model');
	}
	public function index(){
			redirect('historial_servicio/grilla');
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
			$crud->set_table('t_servicio');
			$crud->where('id_status_servicio',6);
			$crud->set_relation('id_usuario_conductor','t_usuario','login');
			$crud->set_subject('Historial');
			$crud->set_language('spanish');
			$crud->display_as('id_usuario_conductor','Conductor');
			$crud->display_as('codigo_servicio','Codigo');
			$crud->display_as('desde','Desde');
			$crud->display_as('hacia','Hasta');
			$crud->display_as('fecha','Fecha');
			$crud->display_as('hora_i','Hora de Inicio');
			$crud->display_as('hora_f','Hora fin');
			$crud->display_as('tiempo_trans','Tiempo');
			$crud->display_as('monto','Monto');
			$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
			$crud->columns('id_usuario_conductor','codigo_servicio','desde','hacia','fecha','hora_i','hora_f','tiempo_trans','monto');
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$crud->unset_read();
			$crud->unset_edit();
			$crud->unset_add();
			/*$crud->unset_delete();*/
			$output = $crud->render();
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('historial_servicio/historial',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
      }else{
/*si es nivel 2*/ 
       if ($usuario_data['id_nivel']=='2') {
					$crud->unset_read();
					$crud->unset_edit();
					$crud->unset_add();
					$crud->unset_delete();
       		$output = $crud->render();
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_n2');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('historial_servicio/historial',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
        }else{
						$crud->unset_read();
						$crud->unset_edit();
						$crud->unset_add();
						$crud->unset_delete();
        		$output = $crud->render();
		/*si es nivel 3*/
					$this->load->view('../../assets/inc/head_common', $output);
					$this->load->view('../../assets/inc/menu_lateral_n3');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('historial_servicio/historial',$output );
					$this->load->view('../../assets/inc/footer_common',$output);
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
			$crud->set_table('t_servicio');
			$crud->where('id_usuario_contrata',$usuario_data['id_usuario']);
			$crud->where('id_status_servicio',6);
			$crud->set_relation('id_usuario_conductor','t_usuario','login');
			$crud->set_subject('Historial');
			$crud->set_language('spanish');
			$crud->display_as('id_usuario_conductor','Conductor');
			$crud->display_as('desde','Desde');
			$crud->display_as('hacia','Hasta');
			$crud->display_as('Fecha','fecha');
			$crud->display_as('hora_i','Hora de Inicio');
			$crud->display_as('hora_f','Hora fin');
			$crud->display_as('tiempo_trans','Tiempo');
			$crud->display_as('monto','Monto');
			$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
			$crud->columns('id_usuario_conductor','desde','hacia','Fecha','hora_i','hora_f','tiempo_trans','monto');
			$crud->unset_read();
			$crud->unset_edit();
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			redirect('principal','refresh');
      }else{
/*si es nivel 2*/ 
       if ($usuario_data['id_nivel']=='2') {
			redirect('principal','refresh');
        }else{
		/*si es nivel 3*/
					$this->load->view('../../assets/inc/head_common', $output);
					$this->load->view('../../assets/inc/menu_lateral_n3');
					$this->load->view('../../assets/inc/menu_superior');
					$this->load->view('historial_servicio/historial',$output );
					$this->load->view('../../assets/inc/footer_common',$output);
			    }
		   }
 		}else{
      redirect('login','refresh');
 		}
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
			$crud->set_table('t_servicio');
			$crud->where('id_usuario_conductor',$usuario_data['id_usuario']);
			$crud->where('id_status_servicio',6);
			$crud->set_relation('id_usuario_conductor','t_usuario','login');
			$crud->set_subject('Historial');
			$crud->set_language('spanish');
			$crud->display_as('id_usuario_conductor','Conductor');
			$crud->display_as('desde','Desde');
			$crud->display_as('hacia','Hasta');
			$crud->display_as('Fecha','fecha');
			$crud->display_as('hora_i','Hora de Inicio');
			$crud->display_as('hora_f','Hora fin');
			$crud->display_as('tiempo_trans','Tiempo');
			$crud->display_as('monto','Monto');
			$crud->add_action('Ver', '', '','fa fa-eye',array($this,'fn_ver'));
			$crud->columns('id_usuario_conductor','desde','hacia','Fecha','hora_i','hora_f','tiempo_trans','monto');
			$crud->unset_read();
			$crud->unset_edit();
			$crud->unset_add();
			$crud->unset_delete();
			$output = $crud->render();
		 /*si es niel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			redirect('principal','refresh');
      }else{
/*si es nivel 2*/ 
       if ($usuario_data['id_nivel']=='2') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral_n2');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('historial_servicio/historial',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
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
		return site_url('historial_servicio/ver').'/'.$row->id;
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
	     $id_historial['id_historial']=$this->uri->segment(3);
					if ($id_historial['id_historial']) {
						$this->session->set_userdata($id_historial);
						}
				$id_historial=$this->session->userdata('id_historial');
				$id_estatus_servicio=6;
				$data = array('servicio' =>$this->servicio_model->get_servicio_id_status($id_historial,$id_estatus_servicio));
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_servicio');
				$output = $crud->render();
 /*si es niel 1*/
 if ($usuario_data['id_nivel']=='1') {
	$this->load->view('../../assets/inc/head_common', $output);
	$this->load->view('../../assets/inc/menu_lateral');
	$this->load->view('../../assets/inc/menu_superior');
	$this->load->view('historial_servicio/ver',$data );
	$this->load->view('../../assets/inc/footer_common',$output);
   }else{
/*si es nivel 2*/ 
   if ($usuario_data['id_nivel']=='2') {
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral_n2');
		$this->load->view('../../assets/inc/menu_superior');
		$this->load->view('historial_servicio/ver',$data );
		$this->load->view('../../assets/inc/footer_common',$output);
    }else{
			/*si es nivel 3*/
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/inc/menu_lateral_n3');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('historial_servicio/ver',$data );
			$this->load->view('../../assets/inc/footer_common',$output);
    }
   }
 }else{
      redirect('login','refresh');
 }
	}
}