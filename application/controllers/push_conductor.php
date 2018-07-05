<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Push_conductor extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->library('push_condu');
	}
	public function notificacion_conductor(){
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
				$crud->set_table('t_marca');
				$output = $crud->render();
				$data['conductor']=$this->usuario_model->get_usuario_condu();
			 /*si es niel 1*/
			 if ($usuario_data['id_nivel']=='1') {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('push/push_condu',$data);
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
	public function enviar_push_conductor(){
		$id_cliente=$this->input->post('id_cliente','true');
		$titulo=$this->input->post('txt_titulo','true');
		$mensaje=$this->input->post('txt_mensaje','true');
		$this->form_validation->set_rules('id_cliente', 'Cliente', 'required|callback_check_default');
 		$this->form_validation->set_rules('txt_titulo', 'Titulo', 'required|required');
		$this->form_validation->set_rules('txt_mensaje', 'Mensaje', 'required|required');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("callback_check_default","El campo %s es Requerido");
		if ($this->form_validation->run()===false) {
			/*lo regresa porque no furula*/
				$this->notificacion_cliente();
		}else{
			if ($id_cliente=='0') {
				$consulta=$this->usuario_model->get_usuario_condu();
				foreach ($consulta as $key) {
					$token=$key->token;
				/***********envia mensaje a todos*******/
				$user_id = $token;
				$headings = array
				("en" => "$titulo");
	      $content = array(
	        "en" => "$mensaje"
	      );
	    $fields = array(
	      'app_id' => "0af49d38-af20-4f51-8978-65f50615031c", /*el id del proyecto onesignal*/
	      'include_player_ids' => array($user_id),
	      'send_after'=> $n_fecha_hora.' '. "GMT-0500",  /*aqui envia la hora que quieres que envie el mensaje al conductor*/
	      'data' => array("foo" => "bar"),
	      'headings' =>$headings,
	      'contents' => $content
	    );
    	$fields = json_encode($fields);
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
	        'Authorization: Basic ZjU1NjVhNjEtZWRlMi00YjI3LWJjNWYtYWJkMGY3OTk5MGY0'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    curl_setopt($ch, CURLOPT_POST, TRUE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    $response = curl_exec($ch);
    	curl_close($ch);
    /*	return $response;*/
    /***************fin ******************/
				/***************************************/
				}

			}else{
				/*lo envia al cliente seleccionado*/
					$consulta=$this->usuario_model->get_usuario_condu_id_usuario($id_cliente);
				
				foreach ($consulta as $key) {
						$token=$key->token;
				}
				$user_id = $token;
	      $content = array(
	        "en" => "$mensaje"
	      );
		    $fields = array(
		      'app_id' => "0af49d38-af20-4f51-8978-65f50615031c", /*el id del proyecto onesignal*/
		      'include_player_ids' => array($user_id),
		     /* 'send_after'=>"2018-01-20 21:16:00 GMT-0400",*/  /*aqui envia la hora que quieres que envie el mensaje al conductor*/
		      'data' => array("foo" => "bar"),
		      'contents' => $content
		    );
    		$fields = json_encode($fields);
	    	$ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
		        'Authorization: Basic ZjU1NjVhNjEtZWRlMi00YjI3LWJjNWYtYWJkMGY3OTk5MGY0'));
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    curl_setopt($ch, CURLOPT_HEADER, FALSE);
		    curl_setopt($ch, CURLOPT_POST, TRUE);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		    $response = curl_exec($ch);
	    	curl_close($ch);
	    	/*return $response;*/
				/***************************************/
			}
			$this->session->set_flashdata('alerta', 'Se ha enviado la notificacion');
			redirect('push_conductor/notificacion_conductor','refresh');
	}
	}
}