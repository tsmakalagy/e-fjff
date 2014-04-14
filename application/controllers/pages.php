<?php
session_start();
class Pages extends CI_Controller
{
	
	public function view($page = 'home')
	{	
		if ( ! file_exists('application/views/pages/'.$page.'.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}
		if($this->session->userdata('logged_in')) {
	     	$session_data = $this->session->userdata('logged_in');
	     	$data['username'] = $session_data['username'];
	   	}
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['content'] = $this->load->view('pages/'.$page, $data, true);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/layout', $data);
		$this->load->view('templates/footer');
	
	}
}