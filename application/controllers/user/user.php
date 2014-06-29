<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User extends FJFF_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setLayoutView("layout_user");
		$this->load->service('user_service', 'user');
		$this->load->library('acl_auth');
	}

	
	public function login()
	{
		$data['title'] = 'Login';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('identity', 'Identifiant', 'trim|required|xss_clean');
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
                $data['error'] = 'V&eacute;rifier votre identifiant ou mot de passe';
            }
		}
		$this->setData($data);
        $this->setContentView('user/login');
	}
	
	
	public function register($user = 'guest')
	{
		$data['title'] = 'Register';
		$isAdmin = false;
		if ($user == 'admin') {
			$isAdmin = true;	
		}		
		if ($isAdmin) {
			$this->load->library('acl_auth');
			$this->acl_auth->restrict_access('admin');
			$this->setLayoutView("layout_admin");
		}
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$post = $this->input->post();
		
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'required|matches[password]|');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
		} else {
			$post['name'] = set_value('name');
			$post['username'] = set_value('username');
			$post['password'] = set_value('password');
			if ($this->acl_auth->register($post)) {
				if ($isAdmin) {
					
				} else {
					if ($this->acl_auth->login( $post['username'], $post['password'], TRUE )) {
						redirect('/');	
					} else {
						$data['errors'] = 'V&eacute;rifier votre identifiant ou mot de passe';
					}		
				}
							
			} else { 
				$data['errors'] = $this->acl_auth->errors(); 
			}
			
		}
		if ($isAdmin) {
			$data['roles'] = $this->user->listRole();
			$data['biraos'] = $this->fkt->lister('birao', 0);	
			$data['hide_login'] = true;
		}		
		$this->setData($data);
        $this->setContentView('user/register');
	}
	
	public function listUser()
	{
		$data['title'] = 'Admin - e-Fokonolona';
		$this->load->library('acl_auth');
		$this->acl_auth->restrict_access('admin');
		$this->setLayoutView("layout_admin");
		$data['users'] = $this->user->listUser();
		$this->setData($data);
        $this->setContentView('user/list_user');
	}
	
	public function listRole()
	{
		$this->setLayoutView(null);
		$list = $this->user->listRole();
		$result = array();
 		foreach ($list as $item) {
 			$id = $item->getId();
 			$roleName = $item->getLibelle();
 			$res = array('id' => $id, 'text' => $roleName);
 			array_push($result, $res);
 		}
 		echo json_encode($result);
	}
	
	public function changeRole()
	{
		$this->setLayoutView(null);
		$post = $this->input->post();
		$return = array();
		if (array_key_exists('pk', $post) && array_key_exists('value', $post)) {
			$data = array('userId' => $post['pk'], 'roleId' => $post['value']);
			if ($this->user->changeRole($data)) {
				$return['success'] = true;
			} else {
				$return['success'] = false;
			}	
		}				
		if ($post['value'] == 3) {
			$return['isFkt'] = true;
		}
		echo json_encode($return);
	}
	
	public function changeBirao()
	{
		$this->setLayoutView(null);
		$post = $this->input->post();
		$return = array();
		if (array_key_exists('pk', $post) && array_key_exists('value', $post)) {
			$data = array('userId' => $post['pk'], 'biraoId' => $post['value']);
			if ($this->user->changeBirao($data)) {
				$return['success'] = true;
			} else {
				$return['success'] = false;
			}	
		}
		echo json_encode($return);
	}
	
	function logout()
 	{
 		if ($this->acl_auth->logout()) {
			redirect('user/login');
		}
 	}
	
	/**
     * Callback qui verifie si identifiant existe deja
     */
	public function username_check($username)
	{
		$this->load->service('user_service', 'user');
		$user = $this->user->findByUsername($username);
		if ($user) { // si user existe error
			$this->form_validation->set_message('username_check', sprintf('L\'identifiant <strong>"%s"</strong> est d&eacute;j&agrave; utilis&eacute;.', $email));
			return false;
		} else {
			return true;
		}
	}
	
	
}