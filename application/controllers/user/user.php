<?php

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
		$attributeRepository = $this->em->getRepository('Entities\Attribute');
		$attributes = $attributeRepository->findAll();
		
		$data['attributes'] = $attributes;		
		$data['title'] = 'Attribute archive';
		$data['content'] = $this->load->view('attributes/index', $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/layout', $data);		
		$this->load->view('templates/footer');
	}
	
	public function login()
	{
		$data['title'] = 'Login - e-Fokonolona';
		
		$this->load->view('templates/header', $data);
		$this->load->view('user/login');		
		$this->load->view('templates/footer');
	}
	
	public function register()
	{
		$data['title'] = 'Register - e-Fokonolona';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean|md5');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passwordVerify]|md5');
		$this->form_validation->set_rules('passwordVerify', 'Password Confirmation', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/register');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('user/register');
			$this->load->view('templates/footer');
		}
		
				
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
}