<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuestionarios extends CI_Controller 
{

	private $data_session;

	public function __construct()
	{
		// Library 'session' se carga globalmente desde autoload.php 
		parent::__construct();
		$this->data_session = $this->session->userdata('ci_session');
        if ($this->data_session === NULL) {
        	redirect('/login/', 'location');
        }
        $this->load->model('Verbos_model');
	}
	
	/*
	* Muestra los cuestionarios
	*/
	public function index()
	{
		$data['titulo'] = 'Cuestionarios';
		// Verbos_model -> obtener recibe:
		// $tabla = '',
		// $campos = array(),
		// $where = array(), 
		// $columnOrder = '', 
		// $order = 'ASC', 
		// $start = 0, 
		// $end = 0
		$data['cuestionarios'] = $this->Verbos_model->obtener( 'temas', array(), array(), '', '', 0, 0 );
  
		$this->load->view('headfoot/header', $data);
		$this->load->view('headfoot/menu');
		$this->load->view('templates/mostrar_cuestionarios');
		$this->load->view('headfoot/footer');
	
	} //index

} //Fin Cuestionarios
