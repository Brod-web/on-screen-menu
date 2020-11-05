<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customs extends CI_Controller
{
    function index(){
		$this->load->model('Resto_Model');
		//$this->load->model('MY_Model');
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		//$this->MY_Model->debug($data);
		$this->layout->set_title('Personnalisation');
		$this->layout->view('back/customs',$data);
	}
	
	function modes_sel($restoId){
		$this->load->model('Resto_Model');

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Dashboard');
			$this->layout->view('back/dashboard');
			// TODO mettre en rouge erreurs ... ne marche pas
			$error = $this->session->set_flashdata('error', validation_errors());
			echo "<div><p style='color:red;'>$error</p></div>";
		} else {
			$data = array(
				'maintenance' => $this->input->post('switch1'),
				'quantity' => $this->input->post('switch2'),
				'QR_code' => $this->input->post('switch3'),
				'geoloc' => $this->input->post('switch4')
			);
			$this->Resto_Model->modifOptions($restoId, $data);
			redirect('back/index');
		}
	}
}