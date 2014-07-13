<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once 'CustomUploadHandler.php';
class UserUploadHandler extends CustomUploadHandler
{
	
	
	public function __construct($options)
	{
		$options['script_url'] = $this->get_full_url() . '/upload';
		parent::__construct($options);
	}
	
	/** 
	 * Set file directory
	 */
	protected function get_user_id()
	{
		return 'users';
	}	
	
}