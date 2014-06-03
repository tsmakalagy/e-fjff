<?php
session_start();
class Pages extends GSM_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout_main");
        $this->load->library('acl_auth');
	}
	
	public function view($page = 'home')
	{	
		if ( ! file_exists('application/views/pages/'.$page.'.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->acl_auth->restrict_access('guest');
		
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['content'] = $this->load->view('pages/'.$page, $data, true);
		if ($page == 'home') {
			$data['home_active'] = 'active';	
		}
		
		
		$this->setData($data);
        $this->setContentView('pages/' . $page);
	
	}
	
	public function not_authorized()
	{
		$data['title'] = 'Non autoris&eacute;';
		$this->setData($data);
        $this->setContentView('pages/not_authorized');
	}
}