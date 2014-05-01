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
     * add region method
     */
	public function addRegion($anarana,$slogan)
	{
	 $this->lr->addRegion($anarana,$slogan); 
    
	}
     /**
     * add district method
     */
    public function addDistrict($anarana,$slogan,$foreignkey)
	{
	   
      return $this->lr->addDistrict($anarana,$slogan,$foreignkey);
	}
    
     /**
     * add fivondronana method
     */
    public function addFivondronana($anarana,$slogan,$foreignkey)
	{
	   $this->lr->addFivondronana($anarana,$slogan,$foreignkey);
	}
    
     /**
     * add firaisana method
     */
    public function addFiraisana($anarana,$slogan,$foreignkey)
	{
	   
        $this->lr->addFiraisana($anarana,$slogan,$foreignkey);
	}
     /**
     * add fokotany method
     */
    public function addFokotany($anarana,$slogan,$foreignkey)
	{
	   
         $this->lr->addFokotany($anarana,$slogan,$foreignkey);
	}
    
    /**
     * find fokotany in firainsana
     */
     public function findFokotanyByFiraisana($idFiraisana,$limit=10)
	   {
		
        return $this->lr->findFokotanyByFiraisana($idFiraisana,$limit=10);	
	   }
     /**
     * find  firainsana in fivondronana
     */
     public function findFiraisanaByFivondronana($idFiv,$limit=10)
	   {
	       
           return $this->lr->findFiraisanaByFivondronana($idFiv,$limit=10);
			
	   }
       
    /**
     * find   fivondronana in district
     */
     public function findFivondronanaByDistrict($idDist,$limit=10)
	   {
	       return $this->lr->findFivondronanaByDistrict($idDist,$limit=10);
		
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
     *find district by name
     */
     public function findDistrictByName($name)
	   {
	       return $this->lr->findDistrictByName($name);
           }

}