<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fokotany extends GSM_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->load->service('fokotany_service', 'fkt');
		$this->acl_auth->restrict_access('user_fokotany');
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
			$biraoId = get_session_value('birao_id');
			$post = $this->input->post();
			if (is_numeric($biraoId)) {
				$b = $this->fkt->findById($biraoId, 'birao');
				if (isset($b) && count($b)) {
					$data['section_title'] = $b['fokotany']['name'];
					$post['birao'] = $b['id'];	
				}
				
			} else {
				$data['biraos'] = $this->fkt->lister('birao', 0);
			}
			
			$this->form_validation->set_rules('laharana', 'Laharana', 'trim|xss_clean');
			$this->form_validation->set_rules('nahatongavana', 'Daty nahatongavana', 'trim|xss_clean');
			$this->form_validation->set_rules('address', 'Adiresy', 'trim|xss_clean');
			$faritra = trim($this->input->post('faritra'));
			if (!empty($faritra)) {
				$this->form_validation->set_rules('faritra', 'Faritra', 'trim|numeric|xss_clean');	
			}	
			if ($this->form_validation->run() == FALSE) {
				$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
			} else {							 
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
	
	public function addFokonolona()
	{
		$data['title'] = 'Olona - e-Fokonolona';
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$data['section_title'] = 'Ajouter olona';
		$biraoId = get_session_value('birao_id');
		$post = $this->input->post();
		if (is_numeric($biraoId)) {
			$b = $this->fkt->findById($biraoId, 'birao');
			if (isset($b) && count($b)) {
				$data['section_title'] = $b['fokotany']['name'];
			}
			$data['karapokotanies'] = $this->fkt->listKarapokotanyByBiraoId($biraoId);			
		} else {
			$data['biraos'] = $this->fkt->lister('birao', 0);
		}
		$data['andraikitras'] = $this->fkt->listAndraikitra();
		
		
		$this->form_validation->set_rules('anarana', 'Anarana', 'trim|xss_clean');
		$this->form_validation->set_rules('fanampiny', 'Fanampiny', 'trim|xss_clean');
		$this->form_validation->set_rules('cin', 'Karapanondro', 'trim|xss_clean');
		$this->form_validation->set_rules('asa', 'Asa', 'trim|xss_clean');
		
		$vady = isset($post['vady']) ? $post['vady'] : '';
		$zanaka = isset($post['zanaka']) ? $post['zanaka'] : '';
		$isany = isset($post['isany']) ? $post['isany'] : 0;
		$isVady = false;
		$isZanaka = false;
		if (strlen($vady) && $vady == 1) {
			$isVady = true;
			$this->form_validation->set_rules('vady-anarana', 'Anarana', 'trim|xss_clean');
			$this->form_validation->set_rules('vady-fanampiny', 'Fanampiny', 'trim|xss_clean');
			$this->form_validation->set_rules('vady-cin', 'Karapanondro', 'trim|xss_clean');
			$this->form_validation->set_rules('vady-asa', 'Asa', 'trim|xss_clean');
		}
		
		if (strlen($zanaka) && $zanaka == 1 && $isany) {
			$isZanaka = true;
			for ($i = 0; $i < $isany; $i++) {
				$this->form_validation->set_rules('zanaka-anarana-' . $i, 'Anarana', 'trim|xss_clean');
				$this->form_validation->set_rules('zanaka-fanampiny-' . $i, 'Fanampiny', 'trim|xss_clean');
				$this->form_validation->set_rules('zanaka-cin-' . $i, 'Karapanondro', 'trim|xss_clean');
				$this->form_validation->set_rules('zanaka-asa-' . $i, 'Asa', 'trim|xss_clean');
			}
		}
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {			 
			$post['anarana'] = set_value('anarana');
			$post['fanampiny'] = set_value('fanampiny');
			$post['cin'] = set_value('cin');
			$post['asa'] = set_value('asa');
			if ($isVady) {
				$post['vady'] = true;
				$post['vady-anarana'] = set_value('vady-anarana');
				$post['vady-fanampiny'] = set_value('vady-fanampiny');
				$post['vady-cin'] = set_value('vady-cin');
				$post['vady-asa'] = set_value('vady-asa');
			}
			if ($isZanaka) {
				$post['zanaka'] = true;
				for ($i = 0; $i < $isany; $i++) {
					$post['zanaka-anarana-' . $i] = set_value('zanaka-anarana-' . $i);
					$post['zanaka-fanampiny-' . $i] = set_value('zanaka-fanampiny-' . $i);
					$post['zanaka-cin-' . $i] = set_value('zanaka-cin-' . $i);
					$post['zanaka-asa-' . $i] = set_value('zanaka-asa-' . $i);
				}
			}
			if ($this->fkt->addFokonolona($post)) {
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
		} else if ($type == 'olona') {
			$data['olonas'] = $this->fkt->lister($type, 0);
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
			$biraoId = get_session_value('birao_id');
			$post = $this->input->post();
			if (is_numeric($biraoId)) {
				$b = $this->fkt->findById($biraoId, 'birao');
				if (isset($b) && count($b)) {
					$data['section_title'] = $b['fokotany']['name'];
					$post['birao'] = $b['id'];	
				}
				
			} else {
				$data['biraos'] = $this->fkt->lister('birao', 0);
			}
			
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
	
	public function listKarapokotanyByBiraoId($biraoId)
	{
		$this->setLayoutView(null);
		$list = $this->fkt->listKarapokotanyByBiraoId($biraoId);
		$result = array();
		foreach ($list as $item) {
 			$id = $item->getId();
 			$laharana = $item->getLaharana();
 			$res = array('id' => $id, 'text' => $laharana);
 			array_push($result, $res);
 		}
 		echo json_encode($result);	
	}
	
	public function detailKarapokotanyAjax($karatraId)
	{
		$list = $this->fkt->detailKarapokotany($karatraId);
		$karatra = $this->fkt->findById($karatraId, 'karapokotany');
		$this->setLayoutView(null);
		$result = array();
		$detail_karatra = $this->load->view('fokotany/detail_karatra', array('data' => $list, 'karatra' => $karatra), true);
 		$json_decode = json_encode($detail_karatra, JSON_HEX_TAG | JSON_HEX_QUOT);
		echo $json_decode;
	}

}