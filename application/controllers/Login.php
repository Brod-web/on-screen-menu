<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function validation(){
		$userId = $this->input->get('id', TRUE);
		$hash = $this->input->get('hash', TRUE);

		if($this->User_Model->validUser($userId,$hash)){
			$data = array(
				'active' => '1'
			);
			$this->User_Model->modifUser($userId,$data);
	
			$this->session->set_flashdata('info', "Bienvenue ! Votre compte a été validé avec succès. Merci de vous connectez.");
		} else {
			$this->session->set_flashdata('notvalid', "Désolé ! Votre compte n'a pas pu être validé. Tentez une nouvelle inscription SVP.");
		}
		redirect('login');
	}

	public function connexion()
	{
		$pseudo = $this->input->post("pseudo");
		$pwd = $this->input->post("password");
		$userVerif = $this->User_Model->checkUserExist($pseudo,$pwd);

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} elseif($userVerif === FALSE) {
			$this->session->set_flashdata('notvalid', "Pseudo ou password invalide, merci de réessayer");
			$this->index();
		} elseif($userVerif != FALSE && $userVerif->active == '0') {
			$this->session->set_flashdata('notvalid', "Merci de valider tout d'abord votre inscription via le mail que vous avez du recevoir");
			$this->index();
		} else {
			$userId = $userVerif->id;
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

	public function userChangePwd(){
		
		$pseudo = $this->input->post("pseudo");
		$email = $this->input->post("email");
		$password = $this->input->post('password');
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$userVerif = $this->User_Model->verifPseudoMail($pseudo,$email);

		if ($this->form_validation->run() === FALSE){
			$this->load->view('front/change_pwd');
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
	    } else {
			if($userVerif === FALSE){
				$this->session->set_flashdata('notvalid', "Désolé ! Vérifiez ... Pseudo ou mail inconnu. Sinon tentez une nouvelle inscription.");
				$this->load->view('front/change_pwd');
			} else {
				if($userVerif->active !== '1'){
					$this->session->set_flashdata('notvalid', "Désolé ! Compte innactif. Vous n'aviez pas du finaliser votre inscription.");
					$this->load->view('front/change_pwd');
				} else {
					$data = array(
						'password' => $hash
					);
					$this->User_Model->modifUser($userVerif->id,$data);
					$this->session->set_flashdata('info', "Votre mot de passe a été changé. Merci de vous connectez.");
					redirect('login');
				}
			}
		} 
	}
}