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
     * add region method
     */
	public function addRegion($anarana,$slogan)
	{
	   
        $entities=new Entities\Region();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
		$this->em->persist($entities);
		$this->em->flush();
	}
     /**
     * add district method
     */
    public function addDistrict($anarana,$slogan,$foreignkey)
	{
	   
        $entities=new Entities\District();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
        $region=$this->em->getRepository('Entities\Region')->find($foreignkey);
        if (isset($region)) {
            $entities->setRegion($region);    
        }        
		$this->em->persist($entities);
		$this->em->flush();
        return $entities;
	}
    
     /**
     * add fivondronana method
     */
    public function addFivondronana($anarana,$slogan,$foreignkey)
	{
	   
        $entities=new Entities\Fivondronana();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
        $entities->setDistrict($foreignkey);
		$this->em->persist($entities);
		$this->em->flush();
	}
    
     /**
     * add firaisana method
     */
    public function addFiraisana($anarana,$slogan,$foreignkey)
	{
	   
        $entities=new Entities\Firaisana();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
        $entities->setFivondronana($foreignkey);
		$this->em->persist($entities);
		$this->em->flush();
	}
     /**
     * add fokotany method
     */
    public function addFokotany($anarana,$slogan,$foreignkey)
	{
	   
        $entities=new Entities\Fokotany();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
        $entities->setFiraisana($foreignkey);
		$this->em->persist($entities);
		$this->em->flush();
	}
    
    /**
     * find fokotany in firainsana
     */
     public function findFokotanyByFiraisana($idFiraisana,$limit=10)
	   {
		$sql = 'SELECT fkt FROM Entities\Fokotany fkt WHERE fkt.firaisana = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idFiraisana);
		return $query->getResult();		
	   }
     /**
     * find  firainsana in fivondronana
     */
     public function findFiraisanaByFivondronana($idFiv,$limit=10)
	   {
		$sql = 'SELECT fir FROM Entities\Firaisana fir WHERE fir.fivondronana = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idFiv);
		return $query->getResult();		
	   }
       
    /**
     * find   fivondronana in district
     */
     public function findFivondronanaByDistrict($idDist,$limit=10)
	   {
		$sql = 'SELECT fiv FROM Entities\Fivondronana fiv WHERE fiv.district = ?1';
		$query = $this->_em->createQuery($sql);
		$query->setParameter(1, $idDist);
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
		return $query->getResult();		
	   }     
       
       
    /**
     * List region 
     */
     public function findListRegion($limit=10)
	   {
		$sql = 'SELECT reg FROM Entities\Region reg';
		$query = $this->em->createQuery($sql);
        if($limit>0){
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
		$sql = 'SELECT dist FROM Entities\District dist WHERE dist.anarana=?1';        
		$query = $this->em->createQuery($sql);
        $query->setParameter(1,$name);
		return $query->getResult();		
	   } 
    /*public function addLocalite($localite,$anarana,$slogan,$foreignkey)
	{
	   
        $entities=new Entities\Region();
		$entities->setAnarana($anarana);
		$entities->setSlogan($slogan);
		$this->em->persist($entities);
		$this->em->flush();
	}*/
    
    

}