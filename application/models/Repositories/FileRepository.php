<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class FileRepository extends EntityRepository
{
	public function getDefaultFile()
	{		
		$defaultName = "no-photo.jpg";
		$query =  $this->_em->createQuery('SELECT f FROM Entities\File f WHERE f.name = ?1');
		$query->setParameter(1, $defaultName);
		return $query->getSingleResult();	
	}
	
}