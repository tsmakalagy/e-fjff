<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	
	public function findByIdentity($identity, $type = 'email')
	{
		$sql = 'SELECT u FROM Entities\User u WHERE u.' . $type . ' = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $identity);
		return $query->getOneOrNullResult();
	}
	
	public function findByUsername($username)
	{
		$sql = 'SELECT u FROM Entities\User u WHERE u.username = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $username);
		return $query->getOneOrNullResult();		
	}
	
	public function findByEmail($email)
	{
		$sql = 'SELECT u FROM Entities\User u WHERE u.email = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $email);
		return $query->getOneOrNullResult();		
	}
	
	public function findByUserNameAndPassword($username, $password)
	{
		$sql = 'SELECT u FROM Entities\User u WHERE u.username = ?1 AND u.password = ?2';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $username);
		$query->setParameter(2, $password);
		return $query->getOneOrNullResult();
	}
	
	
	
}