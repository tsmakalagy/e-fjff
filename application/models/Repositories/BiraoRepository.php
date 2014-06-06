<?php
namespace Repositories;

use Doctrine\ORM\EntityRepository;

class BiraoRepository extends EntityRepository
{
	public function getBiraoStartingBy($tag)
	{
		$tag = '%' . $tag . '%';
		$query =  $this->_em->createQuery('SELECT b FROM Entities\Birao b JOIN b.fokotany f WHERE f.name LIKE ?1');
		$query->setParameter(1, $tag);
		return $query->getResult();	
	}
	
}