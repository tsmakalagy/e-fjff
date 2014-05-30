<?php
session_start();
class Pages extends GSM_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout_main");
	}
	
	public function view($page = 'home')
	{	
		if ( ! file_exists('application/views/pages/'.$page.'.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['content'] = $this->load->view('pages/'.$page, $data, true);
		
		$this->setData($data);
        $this->setContentView('pages/' . $page);
		
//		$this->load->view('templates/header', $data);
//		$this->load->view('templates/layout', $data);
//		$this->load->view('templates/footer');
	
	}
}