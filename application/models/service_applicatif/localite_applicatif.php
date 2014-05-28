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
     * add region method
     */
	public function addRegion($anarana,$slogan)
	{
	 $this->lm->addRegion($anarana,$slogan); 
    
	}
     /**
     * add district method
     */
    public function addDistrict($anarana,$slogan,$foreignkey)
	{
	   
       return $this->lm->addDistrict($anarana,$slogan,$foreignkey);
	}
    
     /**
     * add fivondronana method
     */
    public function addFivondronana($anarana,$slogan,$foreignkey)
	{
	   $this->lm->addFivondronana($anarana,$slogan,$foreignkey);
	}
    
     /**
     * add firaisana method
     */
    public function addFiraisana($anarana,$slogan,$foreignkey)
	{
	   
        $this->lm->addFiraisana($anarana,$slogan,$foreignkey);
	}
     /**
     * add fokotany method
     */
    public function addFokotany($anarana,$slogan,$foreignkey)
	{
	   
         $this->lm->addFokotany($anarana,$slogan,$foreignkey);
	}
    
    /**
     * find fokotany in firainsana
     */
     public function findFokotanyByFiraisana($idFiraisana,$limit=10)
	   {
		
        return $this->lm->findFokotanyByFiraisana($idFiraisana,$limit=10);	
	   }
     /**
     * find  firainsana in fivondronana
     */
     public function findFiraisanaByFivondronana($idFiv,$limit=10)
	   {	       
           return $this->lm->findFiraisanaByFivondronana($idFiv,$limit=10);
			
	   }
       
    /**
     * find   fivondronana in district
     */
     public function findFivondronanaByDistrict($idDist,$limit=10)
	   {
	       return $this->lm->findFivondronanaByDistrict($idDist,$limit=10);
		
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
     public function findListRegionSA($limit=10)
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
     *find district by name
     */
     public function findDistrictByName($name)
	   {
	       return $this->lm->findDistrictByName($name);
           }      

}