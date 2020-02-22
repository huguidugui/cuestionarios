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
	* Muestra los cuestionarios para elgir
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

	/*
	* Muestra las preguntas del cuestionario
	*/
	public function ver_preguntas($id, $nombre)
	{
		// Verbos_model -> obtener recibe:
		// $tabla = '',
		// $campos = array(),
		// $where = array(), 
		// $columnOrder = '', 
		// $order = 'ASC', 
		// $start = 0, 
		// $end = 0
		$data['allPreguntas'] = $this->Verbos_model->obtener( 
															 'preguntas', 
															 array('id', 'pregunta', 'resp_1', 'resp_2', 'resp_3', 'correcta'), 
															 array('fk_id_tema' => $id), 
															 '', 
															 '', 
															 0, 
															 0 
															);
		$data['lenguaje'] = $id;
		$data['titulo'] = "Preguntas";
		$data['nombreCuestionario'] = $nombre;
		$this->load->view('headfoot/header', $data);
		$this->load->view('headfoot/menu');
		$this->load->view('templates/cuestionario');
		$this->load->view('headfoot/footer');
	}

	public function evaluar()
	{
		$data_session = $this->session->userdata('ci_session');
        $correoAdmin = $data_session['correo'];
		$objeto = $_POST;
		$datos['candidato'] = $objeto['candidato'];
		$emailCandidato = $objeto['emailCandidato'];
		$datos['nombreCuestionario'] = $objeto['nombreCuestionario'];
		//Se ontienen del _POST y se quitan para que quedarse solo con los input radio
		//Con esto ya se pueden evaluar
		unset($objeto['candidato']);
		unset($objeto['nombreCuestionario']);
		unset($objeto['emailCandidato']);

		$idRespCorrectas   = array();
		$idRespIncorrectas = array();
		$data['respCorrectasFromUser'] = array();
		$data['respIncorrectasFromUser'] = array();

		foreach ($objeto as $key => $value) {
 			$idPregunta = str_replace("optradio_", "", $key);
			$respuestaBD = $this->Preguntas_model->getCorrectAnswer($idPregunta);

			if($respuestaBD->correcta == $value){
				$idRespCorrectas[] = $respuestaBD->id;
				$data['respCorrectasFromUser'][] = $value;
			}else{
				$idRespIncorrectas[] = $respuestaBD->id;
				$data['respIncorrectasFromUser'][] = $value;
			}
		}

		$data['numCorrectas']   = count($idRespCorrectas);
 		$data['numIncorrectas'] = count($idRespIncorrectas);
		$data['preguntasCorrectas'] = $this->Preguntas_model->getPreguntasCorrectas($idRespCorrectas, $data['respCorrectasFromUser']);
		$data['preguntasIncorrectas'] = $this->Preguntas_model->getPreguntasIncorrectas($idRespIncorrectas, $data['respIncorrectasFromUser']);
		$data['titulo'] = "Evaluación del cuestionario";

		$this->load->library('email');
		$datos['correctas'] = $data['numCorrectas'];
		$datos['incorrectas'] = $data['numIncorrectas'];
		$this->email->from('contacto@huguidugui.com');
		$this->email->to($emailCandidato);
		//$this->email->cc('ringhugos@gmail.com');
		$this->email->cc($correoAdmin);
		$this->email->subject('Feedback de tu test');
		$enviar = $this->load->view('templates/mails/feedback', $datos, TRUE);
		$this->email->message($enviar);
		$this->email->set_mailtype("html");
		$this->email->send();


		$this->load->view('headfoot2/header', $data);
		$this->load->view('templates/evaluado');
		$this->load->view('headfoot2/footer');
	}


} //Fin Cuestionarios
