<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user');
	}

	public function index()
	{
		if($this->session->userdata('ci_session')) {
			$session_data = $this->session->userdata('ci_session');
			$perfil = $session_data['perfil'];
			switch ($perfil) {
				case 'admin':
					redirect('/cuestionarios/', 'location');
				break;
			}
		} else {
			$data['titulo'] = 'Cuestionarios | login al sistema';
			$this->load->view('headfoot/headerLogin', $data);
			//$this->load->view('templates/login/login');
			$this->load->view('headfoot/footerLogin');
		}
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Usuario', 'required|min_length[4]');
		$this->form_validation->set_rules('password', 'Constraseña', 'required');
		$this->form_validation->set_message('required', '%s: es obligatorio');
		$this->form_validation->set_message('min_length', '%s: Al menos 4 caracteres');

		if ($this->form_validation->run() == false) {
			//Regresa a mostrar formulario de login con los errores
			$this->index();	
		} else {
			$username = trim($this->input->post('username'));
			$password = md5(trim($this->input->post('password')));

			$result = $this->user->login_check($username, $password);

			if($result){
				$sess_array = array();
				foreach($result as $row) {
				   $sess_array = array(
				   					'id' => $row->id, 
				   					'username' => $row->username ,
				   					'perfil' => $row->perfil, 
				   					'correo' => $row->correo);
				}
				
				$this->session->set_userdata('ci_session', $sess_array);
				$session_data = $this->session->userdata('ci_session');
				$perfil = $session_data['perfil'];
				
				switch ($perfil) {
					case 'admin':
						redirect('/cuestionarios/', 'location');
						break;
				}

			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username o password incorrecto!</div>');
				$data['titulo'] = 'Cuestionarios | login al sistema';
				$this->load->view('headfoot/headerLogin', $data);
				$this->load->view('templates/login/login');
				$this->load->view('headfoot/footerLogin');
			}
		}

	}

	public function logout(){
		$this->session->unset_userdata('ci_session');
	   	session_destroy();
	   	redirect(base_url().'login');
	}

} //Fin Clase
