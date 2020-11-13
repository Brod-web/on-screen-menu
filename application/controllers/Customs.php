<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customs extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	function index()
	{
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
        		'phrase' => $this->input->post('phrase')
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('customs/index');
		}
	}
	
	function modes_sel()
	{
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

	function choose_background()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Personnalisation');
			$this->layout->view('back/customs',$data);
		} else {
			$data = array(
				'fond' => $this->input->post('fond')
			);
			$this->Resto_Model->modifOptions($restoId, $data);
			redirect('customs/index');
		}
	}

	function QR_code($carte_link)
	{
		$restoId = $this->session->restoId;
		$this->load->library('ciqrcode');

		$params['data'] = "$carte_link";
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH."uploads/$restoId/QR_code.png";
		$this->ciqrcode->generate($params);

		$data = array(
			'QR_code' => "QR_code.png"
		);
		$this->Resto_Model->modifResto($restoId, $data);
		redirect('back/index');
	}

	function del_photo($img)
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Personnalisation');
			$this->layout->view('back/customs',$data);
		} else {
			unlink("./uploads/$img");

			$data = array(
				'photo_url' => ''
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('customs/index');
		}
	}

	function del_logo($img)
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Personnalisation');
			$this->layout->view('back/customs',$data);
		} else {
			unlink("./uploads/$img");

			$data = array(
				'logo_url' => ''
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('customs/index');
		}
	}

	function del_fond($img)
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Personnalisation');
			$this->layout->view('back/customs',$data);
		} else {
			unlink("./uploads/$img");

			$data = array(
				'fond_url' => ''
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('customs/index');
		}
	}

}