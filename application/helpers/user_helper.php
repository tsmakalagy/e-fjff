<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_connected() {
	$CI =& get_instance();
	return $CI->session->userdata('logged_in');
}

function display_name() {
	$CI =& get_instance();
	$session_data = $CI->session->all_userdata();
	if (array_key_exists( 'name', $session_data )) {
		$displayName = $session_data['name'];
	} else if (array_key_exists( 'username', $session_data )) {
		$displayName = $session_data['username'];
	} else if (array_key_exists( 'user_email', $session_data )) {
		$displayName = $session_data['user_email'];
		$displayName = substr($displayName, 0, strpos($displayName, '@')); 
	}
	return $displayName;
}

function has_role($roleName) {
	$CI =& get_instance();
	$CI->load->library('acl_auth');
	return $CI->acl_auth->has_role($roleName);
}