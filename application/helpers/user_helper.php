<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_connected() {
	$CI =& get_instance();
	return $CI->session->userdata('logged_in');
}

function display_username() {
	$CI =& get_instance();
	$session_data = $CI->session->userdata('logged_in');
	return $session_data['username'];
}