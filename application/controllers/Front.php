<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_Model');
	}
	
	public function index()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_accueil',$data);
	}

	public function demo_resto()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_resto',$data);
	}

	public function demo_menus()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);
		
		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_menus',$data);
	}

	public function demo_carte()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);
		
		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_carte',$data);
	}
}