<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuestionarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data_session = $this->session->userdata('ci_session');
        $usuarioId = $data_session['id'];

        if ($data_session === NULL) {
        	echo "No estás logueado";
        	echo "<a href=". base_url('login') . ">Ir a login</a>";
        } else {
        	echo "Estás dentro del sistema";
        	echo "<a href=". base_url('login/logout') . ">Salir</a>";
        }
        



	
	}

	

} //Fin Clase
