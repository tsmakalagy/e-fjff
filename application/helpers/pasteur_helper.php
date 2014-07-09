<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function relative_image_path($dimension, $id) {
	$CI =& get_instance();
	$CI->load->service('pasteur_service', 'pasteur');
	
	return $CI->pasteur->getImageRelativePath($dimension, $id);
}

function getDataURI($image, $mime = '') {
	return 'data: '.(function_exists('mime_content_type') ? mime_content_type($image) : $mime).';base64,'.base64_encode(file_get_contents($image));
}