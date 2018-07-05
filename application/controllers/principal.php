<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Principal extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('servicio_model');
			$this->load->model('usuario_model');
			$this->load->model('vehiculo_model');
	}
	public function index(){
			redirect('principal/home');
	}
	public function home(){
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
			$crud->set_subject('principal');
			$crud->set_language('spanish');
			$crud->display_as('descripcion','principal');
			$crud->columns('descripcion');
			$crud->required_fields('descripcion');
			$output = $crud->render();
			$id_nivel_1=2;
			$id_nivel_2=3;
			$fecha=date('Y-m-d');
			$consulta=$this->usuario_model->get_ubicacion($fecha,$id_nivel_1);
			$data = array('servicio' =>$this->servicio_model->contar_servicio(),
			'conductor'=>$this->usuario_model->contar_usuario($id_nivel_1),
			'cliente'=>$this->usuario_model->contar_usuario($id_nivel_2),
			'vehiculo'=>$this->vehiculo_model->contar_vehiculo(),
			'ubicacion'=>$this->usuario_model->get_ubicacion($fecha,$id_nivel_1)
			);
			$mes=date('m');
			$ano=date('Y');
			$fecha_i= date('Y-m-d', mktime(0,0,0, $mes, 1, $ano));
			$fecha_f=date('Y-m-d', mktime(0,0,0, $mes+1, 0, $ano));
			$contar_servicio=$this->servicio_model->contar_servicio_entre_fechas($fecha_i,$fecha_f);
					if ($contar_servicio) {
					foreach ($contar_servicio as $key) {
						$fecha = date("d-m-Y", strtotime($key->fecha));
						$series_data1[] = $fecha;
						$series_data2[] =(real)$key->total;
					}
						$this->view_data['series_data1']=json_encode($series_data1);
						$this->view_data['series_data2']=json_encode($series_data2);
				}else{
					$series_data1[] =0;
					$series_data2[] =0;
					$this->view_data['series_data1']=json_encode($series_data1);
					$this->view_data['series_data2']=json_encode($series_data2);
				}
			$id_usuario_2=$usuario_data['id_usuario'];
			$contar_servicio_u=$this->servicio_model->contar_servicio_usuario_entre_fechas($id_usuario_2,$fecha_i,$fecha_f);
					if ($contar_servicio_u) {
					foreach ($contar_servicio_u as $key) {
						$fecha = date("d-m-Y", strtotime($key->fecha));
						$series_data1[] = $fecha;
						$series_data2[] =(real)$key->total;
					}
						$this->view_data['series_data1']=json_encode($series_data1);
						$this->view_data['series_data2']=json_encode($series_data2);
				}else{
					$series_data1[] =0;
					$series_data2[] =0;
					$this->view_data['series_data1']=json_encode($series_data1);
					$this->view_data['series_data2']=json_encode($series_data2);
				}
		 /*si es nivel 1*/
		 if ($usuario_data['id_nivel']=='1') {
			$this->load->view('../../assets/inc/head_common', $output);
			$this->load->view('../../assets/script/script_grafico_data',$this->view_data);
			$this->load->view('../../assets/inc/menu_lateral');
			$this->load->view('../../assets/inc/menu_superior');
			$this->load->view('../../assets/inc/central',$data);
			$this->load->view('../../assets/inc/footer_common',$output);
		      }else{
		/*si es nivel 2*/ 
		       if ($usuario_data['id_nivel']=='2') {
						$this->load->view('../../assets/inc/head_common', $output);
						$this->load->view('../../assets/script/script_grafico_data_n2',$this->view_data);
						$this->load->view('../../assets/inc/menu_lateral_n2');
						$this->load->view('../../assets/inc/menu_superior');
						$this->load->view('../../assets/inc/central_n2', $data);
						$this->load->view('../../assets/inc/footer_common',$output);
		        }else{
		/*si es nivel 3*/
							$this->load->view('../../assets/inc/head_common', $output);
							$this->load->view('../../assets/inc/menu_lateral_n3');
							$this->load->view('../../assets/inc/menu_superior');
							$this->load->view('../../assets/inc/central_n3', $data);
							$this->load->view('../../assets/inc/footer_common',$output);
		        }
		   }
		 }else{
		      redirect('login','refresh');
		 }
		}

}