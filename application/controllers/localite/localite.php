<?php
class Localite extends CI_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
	}
	
	public function add($type = 'region')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		
		$data['content'] = $this->load->view('localite/add_' . $type, $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/layout', $data);		
		$this->load->view('templates/footer');
	}

}