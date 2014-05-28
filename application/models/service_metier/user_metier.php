<?php

class User_metier extends GSM_Model
{
	public function findByUsernameMetier($username)
	{
	    $this->load->library('doctrine');
		$this->em = $this->doctrine->em;
	    return   $this->em->getRepository('Entities\User')->findByUsername($username);
	}

}