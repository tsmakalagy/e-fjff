<?php
/**
 * class Fokotany
 * CRUD Fokotany
 */

class Fokotany
{
	private $em = null;
	
    public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;
	}
	
	public function listerBirao()
	{
		$biraos = $this->em->getRepository('Entities\Birao')->findAll();
		return $biraos;
	}
			
}
	
   