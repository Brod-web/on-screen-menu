<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	public function index()
	{
		$this->load->view('front/login');
	}

	public function inscription()
	{
		//Hachage password
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$hash = password_hash($password, PASSWORD_DEFAULT);

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			//Sauvegarde DB
			$data = array(
				'pseudo' => $this->input->post('pseudo'),
				'email' => $email,
				'password' => $hash,
				'active' => '0'
			);
			$this->User_Model->addUser($data);
			$userId = $this->db->insert_id();

			//Envoi mail validation inscription
			$this->load->library('email');
			$this->email->from('brod-web@alwaysdata.net', 'No-Reply');
			$this->email->to($email);
			$this->email->subject('Création de votre compte On-Screen Menu');

			$path = base_url('login/validation');
			$message = "Merci de cliquer sur ce lien pour valider votre compte : ";
  			$message .= "<a href='$path?id=$userId&hash=$hash'>ICI</a>";

			$this->email->message($message);
			$this->email->send();

			$this->session->set_flashdata('info', "Vous allez recevoir un mail. Merci de le valider pour finaliser votre inscription.");
			$this->index();
	    } 
	}
}