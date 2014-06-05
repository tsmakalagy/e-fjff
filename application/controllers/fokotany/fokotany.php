<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fokotany extends GSM_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->load->service('fokotany_service', 'fkt');
		$this->acl_auth->restrict_access('admin');
		$this->setLayoutView("layout_admin");
	}
	
	public function add($type = 'olona')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		if ($type == 'andraikitra') {
			$data['section_title'] = 'Ajouter andraikitra';
			$this->form_validation->set_rules('anarana', 'Anarana', 'trim|required|xss_clean');	
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['anarana'] = set_value('anarana');
				if ($this->fkt->add($post, 'andraikitra')) {
					$data['success'] = 'Andraikitra a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s';
				}				
			}
		} else if ($type == 'birao') {
			$data['section_title'] = 'Cr&eacute;er birao';
			$this->form_validation->set_rules('fokotany', 'Fokotany', 'required');	
			$this->form_validation->set_rules('address', 'Adiresy', 'trim|xss_clean');
			$phone = trim($this->input->post('phone'));
			if (!empty($phone)) {
				$this->form_validation->set_rules('phone', 'Finday', 'trim|numeric|xss_clean');	
			}	
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['fokotany'] = set_value('fokotany');
				$post['address'] = set_value('address');				 
				$post['phone'] = set_value('phone');
				if ($this->fkt->add($post, 'birao')) {
					$data['success'] = 'Birao a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s';
				}
			}
		}
			
		$this->setData($data);
        $this->setContentView('fokotany/add_' . $type);
	}
	
	public function liste($type = 'olona')
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		if ($type == 'andraikitra') {
			$data['andraikitras'] = $this->fkt->lister('andraikitra', 0);
		} else if ($type == 'birao') {			
			$data['biraos'] = $this->fkt->lister('birao', 0);
		} 
		$this->setData($data);
        $this->setContentView('fokotany/list_' . $type);
	}
	
	public function edit($type = 'olona', $id)
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		if ($type == 'andraikitra') {
			$data['section_title'] = 'Editer andraikitra';
			$this->form_validation->set_rules('anarana', 'Anarana', 'trim|required|xss_clean');	
			if ($andraikitra = $this->fkt->findById($id, 'andraikitra')) {
				$data['anarana'] = $andraikitra['anarana'];	
			}
			
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['anarana'] = set_value('anarana');
				if ($this->fkt->edit($id, $post, 'andraikitra')) {
					$data['success'] = 'Andraikitra a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s';
				}
			}
			
		} else if ($type == 'birao') {
			$data['section_title'] = 'Editer birao';
			
			$this->form_validation->set_rules('fokotany', 'Fokotany', 'required');	
			$this->form_validation->set_rules('address', 'Adiresy', 'trim|xss_clean');
			$phone = trim($this->input->post('phone'));
			if (!empty($phone)) {
				$this->form_validation->set_rules('phone', 'Finday', 'trim|numeric|xss_clean');	
			}	
			if ($birao = $this->fkt->findById($id, 'birao')) {
				$data['fokotany'] = $birao['fokotany']['id'];
				$data['name'] = $birao['fokotany']['name'];
				$data['district'] = $birao['fokotany']['district'];
				$data['address'] = $birao['address'];
				$data['phone'] = $birao['phone'];
			}
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['fokotany'] = set_value('fokotany');
				$post['address'] = set_value('address');				 
				$post['phone'] = set_value('phone');
				if ($this->fkt->edit($id, $post, 'birao')) {
					$data['success'] = 'Birao a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s';
				}
			}
		}
		$this->setData($data);
        $this->setContentView('fokotany/add_' . $type);
	}
	
	public function delete($type = 'olona', $id)
	{
		$this->load->helper(array('url'));
		$this->setLayoutView(null);
		$res = array();
		if ($type == 'andraikitra') {
			if ($this->fkt->delete($id, 'andraikitra')) {
				$res['success'] = true;
				$res['redirect'] = site_url('fokotany/list/andraikitra');				
			} else {
				$res['success'] = false;
			}			
			echo json_encode($res);
		}
		
	}
	
	public function listAjax()
	{
		$this->setLayoutView(null);
		$get = $this->input->get();
		$query = $get['q'];
		$list = $this->fkt->getFokotanyStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$id = $item['id'];
 			$fokotany = $item['fokotany'];
 			$district = $item['district'];
 			$res = array('id' => $id, 'text' => $fokotany, 'district' => $district);
 			array_push($result, $res);
 		}
 		echo json_encode($result);
	}

}