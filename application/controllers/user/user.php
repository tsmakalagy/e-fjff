<?php
session_start();
class User extends CI_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
	}

	public function index()
	{
//		$attributeRepository = $this->em->getRepository('Entities\Attribute');
//		$attributes = $attributeRepository->findAll();
//		
//		$data['attributes'] = $attributes;		
//		$data['title'] = 'Attribute archive';
//		$data['content'] = $this->load->view('attributes/index', $data, true);
//		
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/layout', $data);		
//		$this->load->view('templates/footer');
	}
	
	public function login()
	{
		$data['title'] = 'Login - e-Fokonolona';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('login-username', 'Username', 'trim|required|min_length[4]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('login-password', 'Password', 'trim|required|min_length[6]|md5|xss_clean|callback_user_check');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			$login_form = $this->load->view('user/login', array(), true); 
			$register_form = $this->load->view('user/register', array(), true);
			$res['form'] = $login_form . $register_form;
			$res['success'] = false;
			$json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
			echo $json_decode;
		} else {
			echo json_encode(array('success' => true));						
		}	
	}
	
	public function loadLoginForm()
	{
		$this->load->library('form_validation');
		$login_form = $this->load->view('user/login', array(), true);
		$register_form = $this->load->view('user/register', array(), true);
		$res['form'] = $login_form . $register_form;
		$json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
		echo $json_decode;
	}
	
	public function register()
	{
		$data['title'] = 'Register - e-Fokonolona';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|xss_clean');
		$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required|matches[password]|');
		
		if ($this->form_validation->run() == FALSE) {
			$login_form = $this->load->view('user/login', array(), true); 
			$register_form = $this->load->view('user/register', array(), true);
			$res['form'] = $login_form . $register_form;
			$res['success'] = false;
			$json_decode = json_encode($res, JSON_HEX_TAG | JSON_HEX_QUOT);
			echo $json_decode;
		} else {
			$user = new Entities\User();
			$user->setUsername(set_value('username'));
			$user->setPassword(set_value('password'));
			$this->em->persist($user);
			$this->em->flush();
			echo json_encode(array('success' => true));
			
		}
		
				
	}
	
	function logout()
 	{
 		$session_data = $this->session->userdata('logged_in');
	    $username = $session_data['username'];
 		$users = $this->em->getRepository('Entities\User')->findByUsername($username);
 		foreach ($users as $user) {
 			$user->setLastLogout(new \DateTime());
 			$this->em->persist($user);
			$this->em->flush();
 		}
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('home', 'refresh');
 	}
	
	public function validation_check()
	{		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$res = array();
		
		$username = $this->input->post('username');
		if (isset($username) && strlen($username)) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|callback_username_check|xss_clean');
			if ($this->form_validation->run('username') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('username', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
				
		$password = $this->input->post('password');
		if (isset($password) && strlen($password)) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			if ($this->form_validation->run('password') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('password', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
		
		$passwordVerify = $this->input->post('passwordVerify');
		if (isset($passwordVerify) && strlen($passwordVerify)) {
			$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required|matches[password]');
			if ($this->form_validation->run('passwordVerify') == FALSE) {
				$res['success'] = false;
				$res['error_msg'] = form_error('passwordVerify', '<div class="help-block">', '</div>'); 
			} else {
				$res['success'] = true;
			}
		}
		
		echo json_encode($res);
	}
	
	public function username_check($username)
	{
		$user = $this->em->getRepository('Entities\User')->findByUsername($username);
		if ($user) {
			$this->form_validation->set_message('username_check', sprintf('The username <strong>"%s"</strong> already exists.', $username));
			return false;
		} else {
			return true;
		}
	}
	
	public function user_check($password)
	{
		$username = $this->input->post('login-username');
		$users = $this->em->getRepository('Entities\User')->findByUsernameAndPassword($username, $password);
		if ($users) {
			$sess_array = array();
     		foreach($users as $user) {
       			$sess_array = array(
         			'id' => $user->getId(),
         			'username' => $user->getUsername()
       			);
       			$this->session->set_userdata('logged_in', $sess_array);
       			$user->setLastLogin(new \DateTime());
       			$this->em->persist($user);
				$this->em->flush();
     		}
			return true;
		} else {
			$this->form_validation->set_message('user_check', 'Invalid username or password');
			return false;
		}
	}
}