<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends FJFF_Controller 
{
		
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->acl_auth->restrict_access('user');
		$this->setLayoutView("layout_admin");
	}
	
	public function index()
	{
		$data['title'] = 'Admin';
		$this->setData($data);
        $this->setContentView('home/index');
	}	
	
}