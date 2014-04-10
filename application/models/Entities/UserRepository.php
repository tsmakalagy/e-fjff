<?php
namespace Entities;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	public function findByUsername($username)
	{
		$sql = 'SELECT u FROM Entities\User u WHERE u.username = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $username);
		return $query->getResult();		
	}
	
	
}