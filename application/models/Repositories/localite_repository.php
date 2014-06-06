<?php
/**
 * class localite_metier
 * CRUD localite
 */

class Localite_repository extends GSM_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('doctrine');
		$this->em = $this->doctrine->em;
	}    
    
    /**
     * find fokotany in commune
     */
    public function findFokotanyByCommune($idCommune,$limit=10)
	{
		$sql = 'SELECT fkt FROM Entities\Fokotany fkt WHERE fkt.commune = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idCommune);
		if ($limit > 0) {
           	$query->setMaxResults($limit); 
        }
		return $query->getResult();		
   	}
     
       
    /**
     * find   commune in district
     */
    public function findCommuneByDistrict($idDist,$limit=10)
	{
		$sql = 'SELECT c FROM Entities\Commune c WHERE c.district = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idDist);
		if ($limit > 0) {
           	$query->setMaxResults($limit); 
        }
		return $query->getResult();		
	}  
       
       
     /**
     * find district in region
     */
    public function findDistrictByRegion($idRegion,$limit=10)
	{
		$sql = 'SELECT dist FROM Entities\District dist WHERE dist.region = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idRegion);
		if ($limit > 0) {
           	$query->setMaxResults($limit); 
        }
		return $query->getResult();		
	}     
       
       
    /**
     * List region 
     */
    public function findListRegion($limit=10)
	{
		$sql = 'SELECT reg FROM Entities\Region reg';
		$query = $this->em->createQuery($sql);
        
		if ($limit > 0) {
           	$query->setMaxResults($limit); 
        }
		
		return $query->getResult();		
	}  
       
    /**
     * List district 
     */
    public function findListDistrict($limit=10,$offset=0)
	{
		$sql = 'SELECT dist FROM Entities\District dist';
		$query = $this->em->createQuery($sql);
        if($offset>0){
            $query->setFirstResult($offset);
        }
        if($limit>0){
           $query->setMaxResults($limit); 
        }
  
		
		return $query->getResult();		
	} 
       
    /**
     * List district 
     */	
	public function findDistrictByName($name)
	{
		$sql = 'SELECT dist FROM Entities\District dist WHERE dist.name=?1';        
		$query = $this->em->createQuery($sql);
        $query->setParameter(1,$name);
		return $query->getResult();		
	} 

}