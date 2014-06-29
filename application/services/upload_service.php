<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Entities\Image as Image;

class Upload_service
{
	protected $em = null;
	protected $CI = null;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library( 'doctrine' );
		$this->em = $this->CI->doctrine->em;	
	}
	
	public function findFileById($fileId)
	{
		return $this->em->find('Entities\File', $fileId);	
	}
	
	public function saveImage($data)
	{
		$image = new Image();
		if (array_key_exists('name', $data)) {
			$image->setName($data['name']);	
		}
		if (array_key_exists('dimension', $data)) {
			$image->setDimension($data['dimension']);	
		}
		if (array_key_exists('file', $data)) {
			$image->setFile($data['file']);	
		}
		
		$this->em->persist($image);
		$this->em->flush();
		if ($image->getId()) {
			return true;
		}
		return false;
	}
}