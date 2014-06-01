<?php
/**
 * class localite_applicatif
 * CRUD localite
 */

class Localite_applicatif extends GSM_Model
{
    public function __construct()
	{
		parent::__construct();
		
        $this->load->model("service_metier/localite_metier","lm");
	}
    
    /**
     * find fokotany in commune
     */
    public function findFokotanyByCommune($idCommune,$limit=10)
	{
		return $this->lm->findFokotanyByCommune($idCommune,$limit=10);		
   	}
     
       
    /**
     * find   commune in district
     */
    public function findCommuneByDistrict($idDist,$limit=10)
	{
		return $this->lm->findCommuneByDistrict($idDist,$limit=10);
	}  
       
       
     /**
     * find district in region
     */
    public function findDistrictByRegion($idRegion,$limit=10)
	{
		return $this->lm->findDistrictByRegion($idRegion,$limit=10);
	}     
       
       
    /**
     * List region 
     */
    public function findListRegion($limit=10)
	{
		return $this->lm->findListRegion($limit=10);
	}  
       
    /**
     * List district 
     */
    public function findListDistrict($limit=10,$offset=0)
	{
		return $this->lm->findListDistrict($limit=10,$offset=0);	
	} 
       
    /**
     * List district 
     */	
	public function findDistrictByName($name)
	{
		return $this->lm->findDistrictByName($name);
	} 
}