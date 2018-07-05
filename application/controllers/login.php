<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller {
	/*debe crearse la variable privada para facebook*/
	private $fb;
	private $push;
	/************************************************/
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
		  $this->load->library('facebooksdk');
		  $this->load->helper('security');
		  $this->load->model('usuario_model');
		  $this->load->model('cliente_model');
		  $this->load->library('html2pdf');
		  /*esto es de facebook, asi debe estar*/
		  $this->fb=$this->facebooksdk;
		 
		  /*************************************/
	}
	public function index(){
	$crud = new grocery_CRUD();
	$crud->set_theme('bootstrap');
	$crud->set_table('t_marca');
	$output = $crud->render();
	/*llama a la funcion iniciar sesion facebook para tomar los datos*/
	$cb="http://tetransportamos.com/reservas/taxi/login/iniciar_sesion_facebook";
	/*llama a getloginurl y le pasa la url*/
	$url['login']=$this->fb->getLoginUrl($cb);
	$this->load->view('../../assets/inc/head_common_login',$output);
	$this->load->view('../../assets/inc/menu_inicio');
	$this->load->view('login/login',$url);
	$this->load->view('../../assets/inc/footer_common_login',$output);
}
public function registro_usuario(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$output = $crud->render();
		/*llama a la funcion iniciar sesion facebook para tomar los datos*/
		$cb="http://localhost/taxi/login/iniciar_sesion_facebook";
		/*llama a getloginurl y le pasa la url*/
		$url['login']=$this->fb->getLoginUrl($cb);
		$this->load->view('../../assets/inc/head_common_login',$output);
		$this->load->view('../../assets/inc/menu_inicio');
		$this->load->view('login/registro',$url);
			$this->load->view('../../assets/inc/footer_common_login',$output);

	}
	
	public function iniciar_sesion_facebook(){
		/*crea el toquen y lo enia a getuserdata*/
		$act=$this->fb->getAccessToken();
		$data=$this->fb->getUserData($act);
 		$login=$data['email'];
 		$clave=do_hash($data['id']);
 		$nombre=$data['name'];
 		$genero=$data['gender'];
 		$id_nivel=3;
 		$id_estado_usuario=1;
 	
 		if ($genero=="male") {
 			$id_genero=1;
 		}else{
 			$id_genero=2;
 		}
 		$usuario = $this->usuario_model->login_facebook($login, $clave);
 		if ($usuario) {
 		foreach ($usuario as $key) {
 			$usuario_data = array(
         'id' => $key->id_usuario,
         'id_estado_usuario'=>$key->id_estado_usuario,
         'id_nivel' => $key->id_nivel,
         'id_cliente'=>$key->id_cliente,
         'nombre' => $key->nombre,
         'login'=>$key->login,
         'cedula_cliente' =>$key->cedula_cliente,
         'direccion'=>$key->direccion,
         'telf'=>$key->telf,
         'logueado' => TRUE
      );
 		}
 		$this->session->set_userdata($usuario_data);
 		redirect('login/logueado','refresh');
 		}else{
 			$consulta=$this->usuario_model->get_usuario_login($login);
 			if ($consulta) {
				$this->session->set_flashdata('alerta', 'Este email ya está registrado en la base de datos; si no recuerda su Password, haga clic en Olvido su password');
				redirect('login','refresh');
 			}
 		$this->usuario_model->guardar_usuario($id_nivel,$id_estado_usuario,$login,$clave,$nombre);
 		$consulta_usuario=$this->usuario_model->select_max_usuario();
 		foreach ($consulta_usuario as $key) {
 					$id_usuario=$key->id;
 		}
 		$this->cliente_model->guardar_cliente($id_usuario,$login,$nombre,$id_genero);
 		$usuario = $this->usuario_model->login_facebook($login, $clave);
 		if ($usuario) {
 		foreach ($usuario as $key) {
 			$usuario_data = array(
         'id' => $key->id_usuario,
         'id_estado_usuario'=>$key->id_estado_usuario,
         'id_nivel' => $key->id_nivel,
         'id_cliente'=>$key->id_cliente,
         'nombre' => $key->nombre,
         'login'=>$key->login,
         'cedula_cliente' =>$key->cedula_cliente,
         'direccion'=>$key->direccion,
         'telf'=>$key->telf,
         'logueado' => TRUE,
         'genero'=>$genero
      );

 		}
 		$this->session->set_userdata($usuario_data);
 		redirect('login/logueado','refresh');
 		}
	}
}
	public function logueado(){
		if($this->session->userdata('logueado')){
			$data_usuario = array('id_usuario' =>$this->session->userdata('id'),
		'nombre_usuario'=>$this->session->userdata('nombre'),
		'id_nivel'=>$this->session->userdata('id_nivel'),
		'cedula_cliente'=>$this->session->userdata('cedula_cliente'),
		'direccion'=>$this->session->userdata('direccion'),
		'telf'=>$this->session->userdata('telf'),
		'genero'=>$this->session->userdata('genero'));
			if ($data_usuario['cedula_cliente']==null) {
					redirect('cliente/llenar_datos','refresh');
				}else{	
					if ($data_usuario['direccion']==null) {
							redirect('cliente/llenar_datos','refresh');
						}else{
							if ($data_usuario['telf']==null) {
								redirect('cliente/llenar_datos','refresh');
								}else{
								redirect('principal/home','refresh');
								}
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
				$this->registro_usuario();
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
						redirect('login/index','refresh');
			}else{
				$this->usuario_model->guardar_usuario_manual($id_nivel,$id_estado_usuario,$login,$clave_1,$nombre);
				$consulta_usuario=$this->usuario_model->select_max_usuario();
				foreach ($consulta_usuario as $key) {
 					$id_usuario=$key->id;
 				}
 				$this->cliente_model->guardar_cliente_manual($id_usuario,$id_genero,$cedula,$nombre,$direccion,$telf,$login,$fecha_nac);
 				$this->session->set_flashdata('alerta', 'Registro Guardado, ya puede iniciar sesion');
 					redirect('login/index','refresh');
			}
		}
	}
 public function cerrar_sesion(){
    $usuario_data = array('logueado' => FALSE);
     $this->session->sess_destroy();
      redirect('login');
   }
 public function login_manual(){
			$this->form_validation->set_rules('txt_login', 'Login', 'required|required');
			$this->form_validation->set_rules('txt_password', 'Clave', 'required|required');
			$this->form_validation->set_message("required","El campo %s es Requerido");
			if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->index();
			}else{
				$login=$this->input->post('txt_login','true');
				$clave=do_hash($this->input->post('txt_password','true'));
				$usuario = $this->usuario_model->login_manual($login, $clave);
				if ($usuario) {
 			foreach ($usuario as $key) {
 			$usuario_data = array(
         'id' => $key->id_usuario,
         'id_estado_usuario'=>$key->id_estado_usuario,
         'id_nivel' => $key->id_nivel,
         'id_cliente'=>$key->id_cliente,
         'nombre' => $key->nombre,
         'login'=>$key->login,
         'cedula_cliente' =>$key->cedula_cliente,
         'direccion'=>$key->direccion,
         'telf'=>$key->telf,
         'logueado' => TRUE
      );

 		}
	 		$this->session->set_userdata($usuario_data);
	 		redirect('login/logueado','refresh');
	 			}else{
	 			$this->session->set_flashdata('alerta', 'Login o Clave invalidos');
	 					redirect('login/index','refresh');
	 				}
				}
 			}
 	public function olvido_pass(){

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_marca');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common_login',$output);
		$this->load->view('../../assets/inc/menu_inicio');
		$this->load->view('login/olvido_pass');
		$this->load->view('../../assets/inc/footer_common_login',$output);
 	}
 	public function olvido_pass2(){
 				$this->form_validation->set_rules('txt_login', 'Login', 'required|required');
 				$this->form_validation->set_message("required","El campo %s es Requerido");
 				$this->form_validation->set_message("valid_email","El campo %s Debe contener un Email");
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_marca');
				$output = $crud->render();
 				if ($this->form_validation->run()===false) {
 					/*lo regresa al add porque no furula*/
 						$this->olvido_pass();
 				}else{
 				$login=$this->input->post('txt_login','true');
 				$consulta=$this->usuario_model->get_usuario_login($login);
 				if ($consulta) {
 					foreach ($consulta as $key) {
 						$id_usuario=$key->id;
 					}
 		
			/************************/
			$id_login_hash= do_hash($id_usuario);
			$destinatario=$login;
			$mensaje_español="Para Cambiar su password haga clic en el siguiente Enlace para Continuar.";
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->load->library('email');
			$this->email->from('info@tetransportamos.com');
			$this->email->to($login);
			$this->email->subject('Recuperar Password');
			$direccion=base_url();
			$this->email->message(''.$mensaje_español.'&nbsp;<a href="'.base_url().'login/cambiar_password/'.$id_login_hash.'">Haga Clic Aqui</a>');
				$result = $this->email->send();
					//con esto podemos ver el resultado
				/*var_dump($this->email->print_debugger());*/
						$this->load->view('../../assets/inc/head_common_login',$output);
						$this->load->view('../../assets/inc/menu_inicio');
						$this->load->view('login/envio_email');
						$this->load->view('../../assets/inc/footer_common',$output);
           
 				}else{
 				}
 				}
 	}
 	public function cambiar_password(){
 		$id_usuario=$this->uri->segment(3);
 			if (!$id_usuario) {
			redirect('login/index','refresh');
		}else{
			$this->session->set_userdata($id_usuario);
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_marca');
			$output = $crud->render();
			$data = array('id_usuario' =>$id_usuario);
			$this->load->view('../../assets/inc/head_common_login',$output);
			$this->load->view('../../assets/inc/menu_inicio');
			$this->load->view('login/reset_pass',$data);
			$this->load->view('../../assets/inc/footer_common_login',$output);
		}
 	}
 	public function reset_pass(){
		$this->form_validation->set_rules('txt_clave_1', 'Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', 'Repita su Clave', 'required|required');
		$this->form_validation->set_rules('txt_clave_2', ' Confirmacion de Clave', 'required|matches[txt_clave_1]');
		$this->form_validation->set_message("required","El campo %s es Requerido");
		$this->form_validation->set_message("matches","Las Claves no coinciden");
		if ($this->form_validation->run()===false) {
			/*lo regresa al add porque no furula*/
				$this->cambiar_password();
		}else{
		$id_usuario=$this->input->post('txt_id_usuario','true');
		$clave=do_hash($this->input->post('txt_clave_1','true'));
		$consulta=$this->usuario_model->get_usuario_general();
		foreach ($consulta as $key) {
			$id_usuario_hash=do_hash($key->id_usuario);
				if ($id_usuario===$id_usuario_hash){
				$id_usuario_2=$key->id_usuario;
				}
		}
		$this->usuario_model->actualizar_usuario_pass($id_usuario_2,$clave);
		$this->session->set_flashdata('alerta', 'Se ha cambiado el Password Correctamente');
			redirect('login/index','refresh');

		}
 	}

}