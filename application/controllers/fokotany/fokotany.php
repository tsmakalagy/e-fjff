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
	
	public function add($type)
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
				if ($this->fkt->add($post, $type)) {
					redirect('fokotany/list/' . $type);	
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
				if ($this->fkt->add($post, $type)) {
					redirect('fokotany/list/' . $type);
				}
			}
		} else if ($type == 'karapokotany') {
			$data['section_title'] = 'Ajouter karapokotany';
			$this->form_validation->set_rules('birao', 'Birao', 'required');	
			$this->form_validation->set_rules('niaviana', 'Niaviana', 'required');
			$this->form_validation->set_rules('laharana', 'Laharana', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nahatongavana', 'Daty nahatongavana', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Adiresy', 'trim|xss_clean');
			$faritra = trim($this->input->post('faritra'));
			if (!empty($faritra)) {
				$this->form_validation->set_rules('faritra', 'Faritra', 'trim|numeric|xss_clean');	
			}	
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['birao'] = set_value('birao');
				$post['niaviana'] = set_value('niaviana');				 
				$post['laharana'] = set_value('laharana');
				$post['nahatongavana'] = set_value('nahatongavana');
				$post['address'] = set_value('address');
				$post['faritra'] = set_value('faritra');
				if ($this->fkt->add($post, $type)) {
					redirect('fokotany/list/' . $type);
				}
			}
		}
		$this->setData($data);
        $this->setContentView('fokotany/add_' . $type);
	}
	
	public function addFokonolona($biraoId)
	{
		$data['title'] = 'Olona - e-Fokonolona';
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$data['section_title'] = 'Ajouter olona';
		if (is_numeric($biraoId)) {
			$data['karapokotanies'] = $this->fkt->listKarapokotanyByBiraoId($biraoId);
			$data['andraikitras'] = $this->fkt->listAndraikitra();
		}
		$this->form_validation->set_rules('karapokotany', 'Karapokotany', 'required');	
		$this->form_validation->set_rules('andraikitra', 'Andraikitra', 'required');
		$this->form_validation->set_rules('anarana', 'Anarana', 'trim|required|xss_clean');
		$this->form_validation->set_rules('fanampiny', 'Fanampiny', 'trim|xss_clean');
		$this->form_validation->set_rules('nahaterahana', 'Daty nahaterahana', 'trim|xss_clean');
		$this->form_validation->set_rules('cin', 'Karapanondro', 'trim|xss_clean');
		$this->form_validation->set_rules('sex', 'Sexe', 'trim|xss_clean');
		$this->form_validation->set_rules('date_cin', 'Daty karapanondro', 'trim|xss_clean');
		$this->form_validation->set_rules('asa', 'Asa', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {
			$post = array();
			$post['karapokotany'] = set_value('karapokotany');
			$post['andraikitra'] = set_value('andraikitra');				 
			$post['anarana'] = set_value('anarana');
			$post['fanampiny'] = set_value('fanampiny');
			$post['nahaterahana'] = set_value('nahaterahana');
			$post['cin'] = set_value('cin');
			$post['sex'] = set_value('sex');
			$post['date_cin'] = set_value('date_cin');
			$post['asa'] = set_value('asa');
			if ($this->fkt->add($post, 'olona')) {
//				redirect('fokotany/list/' . $type);
				$data['success'] = 'Fokonolona a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s';
			}			
		}
		$this->setData($data);
        $this->setContentView('fokotany/add_olona');
	}
	
	public function liste($type)
	{
		$data['title'] = ucfirst($type) . ' - e-Fokonolona';
		if ($type == 'andraikitra') {
			$data['andraikitras'] = $this->fkt->lister($type, 0);
		} else if ($type == 'birao') {			
			$data['biraos'] = $this->fkt->lister($type, 0);
		} else if ($type == 'karapokotany') {			
			$data['karapokotanies'] = $this->fkt->lister($type, 0);
		} 
		$this->setData($data);
        $this->setContentView('fokotany/list_' . $type);
	}
	
	public function edit($type, $id)
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
				if ($this->fkt->edit($id, $post, $type)) {
					redirect('fokotany/list/' . $type);
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
				if ($this->fkt->edit($id, $post, $type)) {
					redirect('fokotany/list/' . $type);
				}
			}
		} else if ($type == 'karapokotany') {
			$data['section_title'] = 'Editer karapokotany';
			$this->form_validation->set_rules('birao', 'Birao', 'required');	
			$this->form_validation->set_rules('niaviana', 'Niaviana', 'required');
			$this->form_validation->set_rules('laharana', 'Laharana', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nahatongavana', 'Daty nahatongavana', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Adiresy', 'trim|xss_clean');
			$faritra = trim($this->input->post('faritra'));
			if (!empty($faritra)) {
				$this->form_validation->set_rules('faritra', 'Faritra', 'trim|numeric|xss_clean');	
			}	
			if ($karapokotany = $this->fkt->findById($id, $type)) {
				$data['b'] = array();
				$data['b'] = $karapokotany['birao'];
				$data['birao'] = $karapokotany['birao']['id'];
				$data['n'] = array();
				$data['n'] = $karapokotany['niaviana'];
				$data['niaviana'] = $karapokotany['niaviana']['id'];
				$data['laharana'] = $karapokotany['laharana'];
				$data['nahatongavana'] = $karapokotany['nahatongavana'];
				$data['address'] = $karapokotany['adiresy'];
				$data['faritra'] = $karapokotany['faritra'];
			}
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {
				$post = array();
				$post['birao'] = set_value('birao');
				$post['niaviana'] = set_value('niaviana');				 
				$post['laharana'] = set_value('laharana');
				$post['nahatongavana'] = set_value('nahatongavana');
				$post['address'] = set_value('address');
				$post['faritra'] = set_value('faritra');
				if ($this->fkt->edit($id, $post, $type)) {
					redirect('fokotany/list/' . $type);
				}
			}
		}
		$this->setData($data);
        $this->setContentView('fokotany/add_' . $type);
	}
	
	public function delete($type, $id)
	{
		$this->load->helper(array('url'));
		$this->setLayoutView(null);
		$res = array();
		if ($this->fkt->delete($id, $type)) {
			$res['success'] = true;
			$res['redirect'] = site_url('fokotany/list/' . $type);				
		} else {
			$res['success'] = false;
		}			
		echo json_encode($res);
		
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
	
	public function listBiraoAjax()
	{
		$this->setLayoutView(null);
		$get = $this->input->get();
		$query = $get['q'];
		$list = $this->fkt->getBiraoStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$id = $item['id'];
 			$fokotany = $item['fokotany'];
 			$res = array('id' => $id, 'text' => $fokotany);
 			array_push($result, $res);
 		}
 		echo json_encode($result);
	}

}