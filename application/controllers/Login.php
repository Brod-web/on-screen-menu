<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
	    $this->load->view('partials/header');
		$this->load->view('front/login');
		$this->load->view('partials/footer');
	}

	public function connexion()
	{
		//$this->load->helper('form');
		//$this->load->library(array('form_validation','session','email'));
		$this->load->model('User_Model');

		$email = $this->input->post("email");
		$pwd = $this->input->post("password");

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			echo "Email ou password invalide, merci de réessayer";
		} elseif($this->User_Model->checkUserExist($email,$pwd) == FALSE) {
			$this->index();
			echo "Email ou password inconnu, inscrivez-vous";
	    } else {
			$userId = $this->User_Model->checkUserExist($email,$pwd);
			$this->User_Model->setSession($userId);
			redirect('back');
		}
	}

	public function deconnexion(){
		$array_items = array('id', 'pseudo', 'email', 'restoId');
		$this->session->unset_userdata($array_items);
		session_destroy();
		redirect('login');
	}
}


?>