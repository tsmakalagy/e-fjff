<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends GSM_Controller 
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
	
	public function index()
	{
		$data['title'] = 'Admin';
		$this->setData($data);
        $this->setContentView('admin/index');
	}	
	
}