

<?php

class User_applicatif extends CI_Model
{
    	public function __construct()
	{
        $this->load->model('service_metier/user_metier','smu');
	}

	public function findByUsernameMetier($username)
	{
	    return  $this->smu->findByUsernameMetier($username);
	}

}