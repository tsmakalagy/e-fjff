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

		$this->load->view('templates/header', $data);
		$this->load->view('user/register');
		$this->load->view('templates/footer');		
	}
	
	public function checkUsername()
	{		
		$post = $this->input->post();
		$username = trim($post['username']);
		$user = $this->em->getRepository('Entities\User')->findByUsername($username);
		if ($user) {
			$res['id'] = $user[0]->getId();	
		} else {
			$res['id'] = 0;
		}
		
		echo json_encode($res);
	}
	
	public function ajaxRegister()
	{
		
	}
}