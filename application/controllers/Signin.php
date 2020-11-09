<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function index()
	{
		$this->load->view('front/login');
	}

	public function inscription()
	{
		$this->load->model('User_Model');

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			echo "Merci de remplir correctement tous les champs";
		} else {
			$data = array(
				'pseudo' => $this->input->post('pseudo'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$this->User_Model->addUser($data);
			$userId = $this->db->insert_id();
			$this->User_Model->setSession($userId);
	        redirect('back');
	    } 
	}
}


?>