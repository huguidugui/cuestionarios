<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuestionarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		//$this->load->model('parrilla_model');
	}

	public function index()
	{
		$data_session = $this->session->userdata('ci_session');
        $usuarioId = $data_session['id'];

        echo "<a href=". base_url('login/logout') . ">Salir</a>";


		echo "<pre>";
		print_r($data_session);
		echo "</pre>";
        echo "dentro de los Cuestionarios"; exit();

		// $data['titulo'] = 'Parrillas | login al sistema';
		// $data['totalesTrabajando'] = $this->parrilla_model->totalesPendientes($usuarioId);
		// $data['totalesTerminadas'] = $this->parrilla_model->totalesTerminadas($usuarioId);
		// $idsProyectos = $this->parrilla_model->obtenerIdsProyectos($usuarioId);

		// $proyecto = array();
		// $totalesPorProyecto = array();
		// foreach ($idsProyectos as $id) {
		// 	$proyecto['proyecto'] = $id->nombre;
		// 	$proyecto['terminadas'] = $this->parrilla_model->totalesTerminadasPorProyecto($id->id, $usuarioId);
		// 	$proyecto['pendientes'] = $this->parrilla_model->totalesPendientesPorProyecto($id->id, $usuarioId);
		// 	array_push($totalesPorProyecto, $proyecto);
		// }

		// $data['totalesPorProyecto'] = $totalesPorProyecto;

		// $this->load->view('headfoot/header', $data);
		// $this->load->view('templates/parrillas/wraper_inicio');
		// 	$this->load->view('templates/parrillas/header');	
		// 	$this->load->view('templates/parrillas/menu_aside');	
		// 	$this->load->view('templates/parrillas/principal');	
		// 	$this->load->view('templates/parrillas/footer');	
		// 	$this->load->view('templates/parrillas/after_footer');
		// 	$this->load->view('templates/parrillas/wraper_fin');
		// $this->load->view('headfoot/footer');
	}

	public function crearParrillas()
	{
		$data['titulo'] = 'Parrillas | Crear parrillas';
		$this->load->view('headfoot/header', $data);
		$this->load->view('templates/parrillas/wraper_inicio');
			$this->load->view('templates/parrillas/header');	
			$this->load->view('templates/parrillas/menu_aside');	
			$this->load->view('templates/parrillas/crearParrillas');	
			$this->load->view('templates/parrillas/footer');	
			$this->load->view('templates/parrillas/after_footer');
			$this->load->view('templates/parrillas/wraper_fin');
		$this->load->view('headfoot/footer');
	}

	public function crearParrillasComponentes()
	{
		$data['titulo'] = 'Parrillas | Crear parrillas con componentes';
		$this->load->view('headfoot/header', $data);
		$this->load->view('templates/parrillasCom/wraper_inicio');
			$this->load->view('templates/parrillasCom/header');	
			$this->load->view('templates/parrillasCom/menu_aside');	
			$this->load->view('templates/parrillasCom/crearParrillas');	
			$this->load->view('templates/parrillasCom/footer');	
			$this->load->view('templates/parrillasCom/after_footer');
			$this->load->view('templates/parrillasCom/wraper_fin');
		$this->load->view('headfoot/footer');
	}

} //Fin Clase
