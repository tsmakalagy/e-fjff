<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eglise extends FJFF_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->load->service('fokotany_service', 'fkt');
		$this->load->service('eglise_service', 'eglise');
		$this->acl_auth->restrict_access('user');
		$this->setLayoutView("layout_admin");
	}
	
	public function add()
	{	
		$data['title'] = 'Eglise';	
		$data['section_title'] = 'Ajouter Eglise';
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|xss_clean');
		$post = $this->input->post();	
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {
			$post['nom'] = set_value('nom');
			if ($this->eglise->add($post)) {
				$data['success'] = 'Une &eacute;glise a &eacute;t&eacute; cre&eacute; avec succ&egrave;s';
			}				
		}
		$this->setData($data);
        $this->setContentView('eglise/add');
	}
	
	public function listFokotanyAjax()
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