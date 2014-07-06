<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pasteur extends FJFF_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->load->service('eglise_service', 'eglise');
		$this->load->service('pasteur_service', 'pasteur');
		$this->acl_auth->restrict_access('user');
		
		$this->setLayoutView("layout_admin");
	}
	
	public function add()
	{	
		$data['title'] = 'Pasteur';	
		$data['section_title'] = 'Ajouter Pasteur';
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$post = $this->input->post();
		
		$this->form_validation->set_rules('nom', 'Nom', 'trim|xss_clean');
		$this->form_validation->set_rules('prenom', 'Prenom', 'trim|xss_clean');
		
		$statut = isset($post['statut']) ? $post['statut'] : '';
		$zanaka = isset($post['zanaka']) ? $post['zanaka'] : '';
		$isany = isset($post['isany']) ? $post['isany'] : 0;
		$isVady = false;
		$isZanaka = false;
		
		if (strlen($statut) && $statut == 1) {
			$isVady = true;
			$this->form_validation->set_rules('vady-nom', 'Nom', 'trim|xss_clean');
			$this->form_validation->set_rules('vady-prenom', 'Prenom', 'trim|xss_clean');
		}
		
		if (strlen($zanaka) && $zanaka == 1 && $isany) {
			$isZanaka = true;
			for ($i = 0; $i < $isany; $i++) {
				$this->form_validation->set_rules('zanaka-nom-' . $i, 'Nom', 'trim|xss_clean');
				$this->form_validation->set_rules('zanaka-prenom-' . $i, 'Prenom', 'trim|xss_clean');
				$this->form_validation->set_rules('zanaka-classe-' . $i, 'Classe', 'trim|xss_clean');
			}
		}
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {			 
			$post['nom'] = set_value('nom');
			$post['prenom'] = set_value('prenom');
			if ($isVady) {
				$post['vady'] = true;
				$post['vady-nom'] = set_value('vady-nom');
				$post['vady-prenom'] = set_value('vady-prenom');
			}
			if ($isZanaka) {
				$post['zanaka'] = true;
				for ($i = 0; $i < $isany; $i++) {
					$post['zanaka-nom-' . $i] = set_value('zanaka-nom-' . $i);
					$post['zanaka-prenom-' . $i] = set_value('zanaka-prenom-' . $i);
					$post['zanaka-classe-' . $i] = set_value('zanaka-classe-' . $i);
				}
			}
			if ($this->pasteur->add($post)) {
				$data['success'] = 'Pasteur a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s';
			} else {
				$data['success'] = 'Une erreur s\'est pass&eacute;';
			}			
		}
		
		$data['eglises'] = $this->eglise->listEglise();                       
		$this->setData($data);
        $this->setContentView('pasteur/add');
	}	
	
}