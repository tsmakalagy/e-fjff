<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fokotany extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
		$this->load->library('acl_auth');
		$this->acl_auth->restrict_access('admin');
		$this->setLayoutView("layout_admin");
	}
	
	public function add($type = 'olona')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		$this->setData($data);
        $this->setContentView('fokotany/add_' . $type);
		
//		$data['content'] = $this->load->view('fokotany/add_' . $type, $data, true);
//		
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/layout', $data);		
//		$this->load->view('templates/footer');
	}

}