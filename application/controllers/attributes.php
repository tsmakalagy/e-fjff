<?php
//require_once "application/models/Entities/Attribute.php";

class Attributes extends CI_Controller 
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
}