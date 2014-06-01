<?php
/**
 * class localite_metier
 * CRUD localite
 */

class Localite_metier extends GSM_Model
{
    public function __construct()
	{
		parent::__construct();
		
        $this->load->model("repository/localite_repository","lr");
	}
   
    
    /**
     * find fokotany in commune
     */
    public function findFokotanyByCommune($idCommune,$limit=10)
	{
		return $this->lr->findFokotanyByCommune($idCommune,$limit=10);		
   	}
     
       
    /**
     * find   commune in district
     */
    public function findCommuneByDistrict($idDist,$limit=10)
	{
		return $this->lr->findCommuneByDistrict($idDist,$limit=10);
	}  
       
       
     /**
     * find district in region
     */
    public function findDistrictByRegion($idRegion,$limit=10)
	{
		return $this->lr->findDistrictByRegion($idRegion,$limit=10);
	}     
       
       
    /**
     * List region 
     */
    public function findListRegion($limit=10)
	{
		return $this->lr->findListRegion($limit=10);
	}  
       
    /**
     * List district 
     */
    public function findListDistrict($limit=10,$offset=0)
	{
		return $this->lr->findListDistrict($limit=10,$offset=0);	
	} 
       
    /**
     * List district 
     */	
	public function findDistrictByName($name)
	{
		return $this->lr->findDistrictByName($name);
	} 
}