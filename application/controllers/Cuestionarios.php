<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuestionarios extends CI_Controller {

	private $data_session;

	public function __construct()
	{
		parent::__construct();
		$this->data_session = $this->session->userdata('ci_session');
        if ($this->data_session === NULL) {
        	redirect('/login/', 'location');
        }
	}
	
	/*
	* Muestra los cuestionarios
	*/
	public function index()
	{
		$data['titulo'] = 'Cuestionarios';
		$data['sesion'] = $this->data_session;
  
		$this->load->view('headfoot/header', $data);
		$this->load->view('headfoot/menu');
		$this->load->view('templates/mostrar_cuestionarios');
		$this->load->view('headfoot/footer');



        // if ($data_session === NULL) {
        // 	echo "<br><br><br><br><br><br>No estás logueado";
        // 	echo "<a href=". base_url('login') . ">Ir a login</a>";
        // } else {
        // 	echo "Estás dentro del sistema";
        // 	echo "<a href=". base_url('login/logout') . ">Salir</a>";
        // }
	
	}

} //Fin Cuestionarios
