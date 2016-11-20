<?php

	class Usuario extends CI_Controller
	{	

		public function __construct(){
			parent::__construct();
			$this->load->model('usuario_model');
			$this->load->library('form_validation');
			session_start();

			if (!isset($_SESSION['mascusuario']) && !defined('NOLOGIN')) {
				redirect('seguridad');
			}
		}

		public function index(){
			$data = array();
			$id = (isset($_GET['edit']))?$_GET['edit']+0:0;
			$data['usuario'] = $this->usuario_model->cargarUsuario($id);
			$data['usuarios'] = $this->usuario_model->listarUsuarios();
			$this->load->view('usuario',$data);
		}

		public function guardar(){
	        if($this->input->post()){             
	            $this->form_validation->set_rules('usuario', 'Usuario', 'required|min_length[3]');
	            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
	            $this->form_validation->set_rules('clave', 'Clave', 'required|min_length[3]');
	             
	            $this->form_validation->set_message('required','El campo %s es obligatorio'); 
	            $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
	            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
	           	
	            if($this->form_validation->run()!= false){ 
	            	$this->usuario_model->guardar($_POST);
					$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Los datos de este usuario se guardaron correctamente.', 'bt' => 'info', 'link' => 'usuario');
					
					$this->load->view('mensaje',$dat);
	            }else{
	            	$usuario = new stdClass();
					foreach ($_POST as $campo => $valor) {
						$usuario->$campo = $valor;
					}
					$data['usuario'] = $usuario;
					$data['usuarios'] = $this->usuario_model->listarUsuarios();
					$data['error'] = validation_errors();
					$this->load->view('usuario',$data);
	            }
	              

	        }
    

		}

		function del(){
			$id = (isset($_GET['id']))?$_GET['id']+0:0;
			$this->usuario_model->eliminarUsuario($id);
			$dat = array('titulo' => 'Mensaje', 'mensaje' => 'Usuario eliminado.', 'bt' => 'info', 'link' => 'usuario');
			$this->load->view('mensaje',$dat);
		}
		
	}


?>
