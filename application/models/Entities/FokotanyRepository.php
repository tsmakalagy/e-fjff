<?php
namespace Entities;

use Doctrine\ORM\EntityRepository;

class FokotanyRepository extends EntityRepository
{
	public function getFokotanyStartingBy($tag)
	{
		$tag = '%' . $tag . '%';
		$query =  $this->_em->createQuery('SELECT f FROM Entities\Fokotany f WHERE f.name LIKE ?1');
		$query->setParameter(1, $tag);
		return $query->getResult();	
	}
	
}