<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eglise_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
	}
	
	public function add($data)
	{
		$eglise = new Entities\Eglise();
		if (array_key_exists('fokotany', $data)) {
			$fokotany = $this->em->find('Entities\Fokotany', (int)$data['fokotany']);
			$eglise->setFokotany($fokotany);
		}
		if (array_key_exists('nom', $data) && strlen($data['nom'])) {
			$nom = $data['nom'];
			$eglise->setNom($nom);
		}
		$this->em->persist($eglise);
		$this->em->flush();
		if ($eglise->getId()) {
			return true;
		}
		return false;
	}	
	
	public function listEglise()
	{
		return $this->em->getRepository('Entities\Eglise')->findAll();
	}
	
}