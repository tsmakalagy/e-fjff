<?php
class Fokotany extends CI_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
	}
	
	public function add($type = 'karatra')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		
		$data['content'] = $this->load->view('fokotany/add_' . $type, $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/layout', $data);		
		$this->load->view('templates/footer');
	}

}