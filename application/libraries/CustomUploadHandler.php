<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once 'UploadHandler.php';
use Entities\File;

class CustomUploadHandler extends UploadHandler
{	
	protected $em = null;
	protected $CI = null;
	
	public function __construct($options)
	{
		$this->CI =& get_instance();
		$this->CI->load->library('doctrine');
		$this->em = $this->CI->doctrine->em;
		parent::__construct($options);
	}	
	
    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        $file = parent::handle_file_upload(
        	$uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        
        if (empty($file->error)) {
        	$myfile = new File();
	        $myfile->setName($file->name);
	        $myfile->setSize($file->size);
	        $myfile->setType($file->type);
	        $myfile->setRelativePath($file->relativePath);
	        
	        $this->em->persist($myfile);
	        $this->em->flush();
	        $file->id = $myfile->getId();
        }
        return $file;
    }

    protected function set_additional_file_properties($file) {        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        	$om = $this->getObjectManager();  
        	$myfile = $this->em->getRepository('Entities\File')->findOneByName($file->name);
        	if ($myfile instanceof Entities\File) {
        		$file->id = $myfile->getId();
        		$file->type = $myfile->getType();
        	} 	
        }
        $relativePath = urldecode(substr($file->url, strpos($file->url, '/files/')));
        $file->relativePath = $relativePath;
        parent::set_additional_file_properties($file);
    }

    public function delete($print_response = true) {
        $response = parent::delete(false);
        foreach ($response as $name => $deleted) {
        	if ($deleted) {
        		$myfile = $this->em->getRepository('Entities\File')->findOneByName($name);
        		if ($myfile instanceof Entities\File) {
        			$this->em->remove($myfile);	        		
	        		// deleting cropped images from db
	        		$images = $myfile->getImages();
	        		foreach ($images as $image) {
	        			if ($image instanceof Entities\Image) {
	        				$this->em->remove($image);
	        			}
	        		}	
	        		$this->em->flush();
        		}
        		
        	}
        } 
        return $this->generate_response($response, $print_response);
    }

	protected function trim_file_name($name, $type = null, $index = null, $content_range = null) 
	{
        $name = parent::trim_file_name($name, $type);
        // Your file name changes: $name = 'something';
        $ext = strrchr($name,".");
		$name = md5(uniqid(rand()));
		$name = substr($name,0,10);
		$name = $name . $ext;
        return $name;
    }
    
}