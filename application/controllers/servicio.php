<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Servicio extends CI_Controller {
  public function __construct(){
    parent::__construct();
      $this->load->helper('url');
      $this->load->library('grocery_crud');
      $this->load->model('servicio_model');
  }
  public function index(){
      redirect('servicio/grilla');
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
      $crud->set_subject('servicio');
      $crud->set_language('spanish');
      $crud->display_as('descripcion','servicio');
      $crud->columns('descripcion');
      $crud->required_fields('descripcion');
      $output = $crud->render();
       /*si es niel 1*/
     if ($usuario_data['id_nivel']=='1') {
        $this->load->view('../../assets/inc/head_common', $output);
        $this->load->view('../../assets/inc/menu_lateral');
        $this->load->view('../../assets/inc/menu_superior');
        $this->load->view('servicio/servicio',$output );
        $this->load->view('../../assets/inc/footer_common',$output);
        }else{
       /*si es nivel 2*/ 
          if ($usuario_data['id_nivel']=='2') {
           redirect('principal','refresh');
           }else{
        /*si es nivel 3*/
              $this->load->view('../../assets/inc/head_common', $output);
              $this->load->view('../../assets/inc/menu_lateral_n3');
              $this->load->view('../../assets/inc/menu_superior');
              $this->load->view('servicio/servicio',$output );
              $this->load->view('../../assets/inc/footer_common',$output);
        }
   }
    }else{
      redirect('login','refresh');
    }    
  }
  public function nuevo_servicio(){
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
         $output = $crud->render();
          /*si es niel 1*/
          if ($usuario_data['id_nivel']=='1') {
           $this->load->view('../../assets/inc/head_common', $output);
           $this->load->view('../../assets/inc/menu_lateral');
           $this->load->view('../../assets/inc/menu_superior');
           $this->load->view('servicio/add',$output );
           $this->load->view('../../assets/inc/footer_common',$output);
           }else{
          /*si es nivel 2*/ 
            if ($usuario_data['id_nivel']=='2') {
            redirect('principal','refresh');
            }else{
               $this->load->view('../../assets/inc/head_common', $output);
               $this->load->view('../../assets/inc/menu_lateral_n3');
               $this->load->view('../../assets/inc/menu_superior');
               $this->load->view('servicio/add',$output );
               $this->load->view('../../assets/inc/footer_common',$output);
            }
          }
     }else{
          redirect('login','refresh');
     }
  }
  public function buscar_conductor(){
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
  			$this->form_validation->set_rules('txt_origen', 'Fecha de Nacimiento', 'required|required');
  			$this->form_validation->set_rules('txt_destino', 'Fecha de Nacimiento', 'required|required');
  			$this->form_validation->set_message("required","El campo %s es Requerido");
  			$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
  			$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
  			$this->form_validation->set_message("matches","Las Claves no coinciden");
  			if ($this->form_validation->run()===false) {
  				/*lo regresa al add porque no furula*/
  					$this->nuevo_servicio();
  			}else{
  			//si furula
  			}
  	$id_usuario_contrata=$usuario_data['id_usuario'];
  	$desde=$this->input->post('txt_origen','true');
  	$hacia=$this->input->post('txt_destino','true');
  	$observacion_cliente=$this->input->post('txt_nota_conductor','true');
  	$id_tipo_servicio='1';
  	$id_status_servicio='1';
  	$fecha=date('Y-m-d');
		$hora= date('H:i');
  	$this->servicio_model->guardar_solicitar_servicio($id_usuario_contrata,$id_tipo_servicio,$id_status_servicio,$desde,$hacia,$fecha,$hora,$observacion_cliente);
  	$consulta=$this->servicio_model->get_max_servicio();
  	foreach ($consulta as $key) {
  		$id_servicio['id_servicio']=$key->id;
  	}
  	  $this->session->set_userdata($id_servicio);
  		/*muestra buscar conductor*/
      $data['id_servicio']=$id_servicio['id_servicio'];
  		$crud = new grocery_CRUD();
	    $crud->set_theme('bootstrap');
	    $crud->set_table('t_servicio');
	    $output = $crud->render();
       /*si es nivel 1*/
       if ($usuario_data['id_nivel']=='1') {
         $this->load->view('../../assets/inc/head_common', $output);
         $this->load->view('../../assets/inc/menu_lateral');
         $this->load->view('../../assets/inc/menu_superior');
         $this->load->view('servicio/buscar_conductor',$data);
         $this->load->view('../../assets/inc/footer_common',$output);
            }else{
      /*si es nivel 2*/ 
             if ($usuario_data['id_nivel']=='2') {
              redirect('principal','refresh');
              }else{
      /*si es nivel 3*/
               $this->load->view('../../assets/inc/head_common', $output);
               $this->load->view('../../assets/inc/menu_lateral_n3');
               $this->load->view('../../assets/inc/menu_superior');
               $this->load->view('servicio/buscar_conductor',$data);
               $this->load->view('../../assets/inc/footer_common',$output);
              }
         }   
	    /*************************************************************/
  		}else{
  		redirect('login','refresh');
  	}
  }
  public function buscar_conductor_2(){
  	$id_servicio=$this->session->userdata('id_servicio');
  	$id_estatus_servicio='2';
  	$consulta=$this->servicio_model->get_servicio_id_status($id_servicio,$id_estatus_servicio);
  	if ($consulta) {
      echo "lo encontro";
  	}else{
  		echo "no hay nadie";
  	}
  }
  public function conductor_encontrado(){
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
      $id_servicio=$this->session->userdata('id_servicio');
      $id_estatus_servicio='2';
      $data = array('servicio' =>$consulta=$this->servicio_model->get_servicio_id_status($id_servicio,$id_estatus_servicio));
      $crud = new grocery_CRUD();
      $crud->set_theme('bootstrap');
      $crud->set_table('t_servicio');
      $output = $crud->render();
      /*si es niel 1*/
     if ($usuario_data['id_nivel']=='1') {
        $this->load->view('../../assets/inc/head_common', $output);
        $this->load->view('../../assets/inc/menu_lateral');
        $this->load->view('../../assets/inc/menu_superior');
        $this->load->view('servicio/conductor_encontrado',$data);
        $this->load->view('../../assets/inc/footer_common',$output);
      }else{
        /*si es nivel 2*/
        if ($usuario_data['id_nivel']=='2') {
          redirect('principal','refresh');
        }else{
          /*si es nivel 3*/
           $this->load->view('../../assets/inc/head_common', $output);
           $this->load->view('../../assets/inc/menu_lateral_n3');
           $this->load->view('../../assets/inc/menu_superior');
           $this->load->view('servicio/conductor_encontrado',$data);
           $this->load->view('../../assets/inc/footer_common',$output);
        }
      }
   }else{
        redirect('login','refresh');
   }	
  }
}