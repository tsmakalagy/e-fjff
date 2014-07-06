<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fokotany_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
	}
	
	public function getFokotanyStartingBy($query)
	{
		$list = $this->em->getRepository('Entities\Fokotany')->getFokotanyStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$commune = $item->getCommune();
 			$district = $item->getCommune()->getDistrict();
 			$districtName = $district->getName();
 			$res = array('id' => $item->getId(), 'fokotany' => $item->getName(), 'district' => $districtName);
 			array_push($result, $res);
 		}
 		return $result;
	}	
	
}