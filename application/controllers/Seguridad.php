<?php

	class Seguridad extends CI_Controller
	{

		public function __construct(){
			define('NOLOGIN', 'true');
			parent::__construct();
			$this->load->model('usuario_model');
			session_start();
		}

		public function index(){
			$this->load->view('login');
		}

		public function login()
		{
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];
			$tmp = $this->usuario_model->iniciarSesion($usuario,$clave);
			if($tmp)
			{
				$_SESSION['mascusuario'] = $tmp;
				redirect('mascota');
			}
			else
			{
				$data = array('titulo' => 'Error', 'mensaje' => 'Este usuario no existe o la contraseña es incorrecta.', 'bt' => 'danger', 'link' => 'seguridad');
				$this->load->view('mensaje', $data);
			}
		}

		function logOut()
		{
			session_destroy();
			redirect('seguridad');
		}
	}
	


?>
