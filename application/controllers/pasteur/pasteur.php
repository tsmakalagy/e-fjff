<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pasteur extends FJFF_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->acl_auth->restrict_access('user');
		
		$this->setLayoutView("layout_admin");
	}
	
	public function add()
	{	
		$data['title'] = 'Pasteur';	
		$data['section_title'] = 'Ajouter Pasteur';
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->setData($data);
        $this->setContentView('pasteur/add');
	}	
	
}