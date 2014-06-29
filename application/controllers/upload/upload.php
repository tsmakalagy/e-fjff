<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends FJFF_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->service('upload_service', 'upload');		
	}
	
	public function index()
	{
		$this->setLayoutView(null);
		$options = array(
			'delete_type' => 'POST',
            'user_dirs' => true,
		);
		$this->load->library('UserUploadHandler', $options);
 		
	}
	
	public function crop()
	{
		$this->setLayoutView(null);
		$this->load->library('LiquenImg');
		$post = $this->input->post();		
		if (array_key_exists('source', $post)) {
			$source = $post['source'];
			$uploadPath = '';
			if (isset($source)) {
				$relativePath = urldecode(substr($source['file'], strpos($source['file'], '/files/')));
				$filename = urldecode(substr($source['file'], strrpos($source['file'], '/') + 1));
				$thePicture = PUBLIC_PATH . $relativePath;
				$uploadPath = substr($thePicture, 0, strrpos($thePicture, '/'));
				$cacheFolder = $uploadPath . '/cropped/';
				if (!is_dir($cacheFolder)) {
	                mkdir($cacheFolder, 0777, true);
	            }
				$this->liquenimg->setCacheFolder($cacheFolder);
			} else {
				$relativePath = urldecode(substr($source['file'], strpos($post->get('file'), '/files/')));
				$filename = urldecode(substr($source['file'], strrpos($post->get('file'), '/') + 1));
                $thePicture = PUBLIC_PATH . $relativePath;
				$uploadPath = substr($thePicture, 0, strrpos($thePicture, '/'));
				$cacheFolder = $uploadPath . '/cropped/';
				if (!is_dir($cacheFolder)) {
	                mkdir($cacheFolder, 0777, true);
	            }
				$this->liquenimg->setCacheFolder($cacheFolder);
				$post['url'] = $thePicture;
			}
			if (!is_file($thePicture)) exit('ERROR: Source image file not found');
			
			$size = getimagesize($thePicture);
			$type = image_type_to_mime_type($size[2]);
			$ft = '';
			switch( $type )
			{
				case 'image/jpeg':
					$ft = 'jpg';
					break;
				case 'image/gif':
					$ft = 'gif';
					break;
				case 'image/png':
					$ft = 'png';
					break;
			}
			$sizeRatio = $size[0] / $source['width'];
			$listWidth = $post['w'];
			$fileId = (int)$post['id'];
			$file = $this->upload->findFileById($fileId);			
			$success = true;
			$c = $post['c'];	
			$images = array();			
			foreach ($listWidth as $dim => $w) {		
				$w = (int)$w;				
				if ($w > 0) {
					$return = $this->liquenimg->genImage(array(
						'url' => $thePicture,
						'width' => $w,
						'oc' => '1',
						'ft' => $ft,
						'cx' => floor($c['x'] * $sizeRatio),
						'cy' => floor($c['y'] * $sizeRatio),
						'cw' => floor($c['w'] * $sizeRatio),
						'ch' => floor($c['h'] * $sizeRatio)
					));
					if (!$return) {
						$success = false;
						break;
					}				
					if ($file instanceof Entities\File && $success) {						
						$newName = urldecode(substr($return, strrpos($return, '/') + 1));
						$data = array(
							'name' => $newName,
							'dimension' => $dim,
							'file' => $file
						);
						$this->upload->saveImage($data);
					}
				}			
				$relativePath = substr($return, strpos($return, '/files/'));
				$images['image_'.$w] = preg_replace("|files/.*$|", $relativePath, $source['file']);	
			}	
			echo json_encode(array('success' => $success, 'images' => $images));
		}
		
	}
	
}