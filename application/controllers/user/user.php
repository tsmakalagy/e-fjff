<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->setLayoutView("layout_user");
		$this->load->library('acl_auth');
	}

	
	public function login()
	{
		$data['title'] = 'Login';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('identity', 'Identifiant', 'trim|valid_email|required|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			
		} else {
			$identity = set_value('identity');
			$password = set_value('password');
			$post = $this->input->post();
			$remember_me = FALSE;
			if (array_key_exists('remember_me', $post)) {
				$remember_me = TRUE;
			}
			if ($this->acl_auth->login($identity, $password, $remember_me)) {
				redirect('/');
			} else {
                $data['error'] = 'V&eacute;rifier votre email ou mot de passe';
            }
		}
		$this->setData($data);
        $this->setContentView('user/login');
	}
	
	
	public function register()
	{
		$data['title'] = 'Register';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required|matches[password]|');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
		} else {
			$post = array();
			$post['name'] = set_value('name');
			$post['email'] = set_value('email');
			$post['password'] = set_value('password');
			if ($this->acl_auth->register($post)) {
				redirect('home');
			} else { 
				$data['errors'] = $this->acl_auth->errors(); 
			}
			
		}
		
		$this->setData($data);
        $this->setContentView('user/register');
		
				
	}
	
	function logout()
 	{
 		if ($this->acl_auth->logout()) {
			redirect('/');
		}
 	}
	
	/**
     * Callback qui verifie si email existe deja
     */
	public function email_check($email)
	{
		$this->load->service('user_service', 'user');
		$user = $this->user->findByEmail($email);
		if ($user) { // si user existe error
			$this->form_validation->set_message('email_check', sprintf('L\'adresse mail <strong>"%s"</strong> est d&eacute;j&agrave; utilis&eacute;.', $email));
			return false;
		} else {
			return true;
		}
	}
	
	
}