<?php

	class Mascota extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model('mascota_model');
			session_start();
			if (!isset($_SESSION['mascusuario']) && !defined('NOLOGIN')) {
				redirect('seguridad');
			}
		}

		public function index(){
			$data = array();
			$id = (isset($_GET['edit']))?$_GET['edit']+0:0;
			$data['mascota'] = $this->mascota_model->cargarMascota($id);
			$this->load->view('mascota',$data);
		}

		public function guardar(){
			$men = array();
			if($_POST){
				foreach ($_POST as $campo => $valor) {
					if($valor == ""){
						$men[] = $campo;
					}
				}
				
				if (count($men) > 0) {
					$mensaje = implode(', ', $men);
					echo "<script> alert(\"lo campos {$mensaje} estan vacios\"); </script>";
					$mascota = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$mascota->$campo = $valor;
					}
					$data['mascota'] = $mascota;
					$data['mascotas'] = $this->mascota_model->listarMascotas();
					$this->load->view('mascota',$data);
				}else{
					$this->mascota_model->guardar($_POST);
					$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Los datos de esta mascota se guardaron correctamente.', 'bt' => 'info', 'link' => 'mascota');
					$this->load->view('mensaje', $dat);
				}
			}
		}

		function del(){
			$id = (isset($_GET['id']))?$_GET['id']+0:0;
			$this->mascota_model->eliminarMascota($id);
			$dat = array('titulo' => 'Mensaje', 'mensaje' => 'mascota eliminada.', 'bt' => 'info', 'link' => 'mascota');
			$this->load->view('mensaje', $dat);
		}

		public function info(){
			$id = (isset($_GET['id']))?$_GET['id']+0:0;
			$datos['id'] = $id;
			$comen = $this->mascota_model->getInfo($id);
			$datos['comentario'] = $comen[0]->comentario;
			$this->load->view('mascotaInfo',$datos);
		}	

		public function registros()
		{
			$data['mascotas'] = $this->mascota_model->listarMascotas();
			$this->load->view('registros',$data);
		}
	}

?>

