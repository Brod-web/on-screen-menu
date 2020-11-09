<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customs extends CI_Controller
{
    function index(){
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		//$this->MY_Model->debug($data);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Personnalisation');
			$this->layout->view('back/customs',$data);
			
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'facebook' => $this->input->post('facebook'),
				'instagram' => $this->input->post('instagram'),
        		'twitter' => $this->input->post('twitter'),
        		'phrase' => $this->input->post('phrase'),
        		'QR_code' => $this->input->post('QR_code'),
        		'logo_url' => $this->input->post('logo_url'),
        		'fond_url' => $this->input->post('fond_url'),
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('customs/index');
		}
	}
	
	function modes_sel(){
		$restoId = $this->session->restoId;
		
		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Dashboard');
			$this->layout->view('back/dashboard');
			// TODO mettre en rouge erreurs ... ne marche pas
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'maintenance' => $this->input->post('switch1'),
				'quantity' => $this->input->post('switch2')
				//'QR_code' => $this->input->post('switch3'),
				//'geoloc' => $this->input->post('switch4')
			);
			$this->Resto_Model->modifOptions($restoId, $data);
			redirect('back/index');
		}
	}

	function QR_code(){
		$this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = 'hello+world';
		$this->ciqrcode->generate($params);
	}
}