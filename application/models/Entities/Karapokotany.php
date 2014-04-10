<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_kara_pokotany")
 * @author raiza
 *
 */
class Karapokotany
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_kp_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_kp_laharana")
	 * @var string
	 */
	protected $laharana;
	
	/**
     * @ORM\Column(type="datetime", name="fk_kp_date_inscription")
     * @var datetime
     */
	protected $inscription;
	
	/**
     * @ORM\OneToOne(targetEntity="Olona")
     * @ORM\JoinColumn(name="fk_kp_lohampianakaviana", referencedColumnName="fk_ol_id")
     * @var Entities\Olona
     **/
	protected $lohampianakaviana;
	
	/**
     * @ORM\Column(type="integer", name="fk_kp_faritra", nullable=true)
     * @var int
     */
	protected $faritra;
	
	/**
     * @ORM\Column(type="datetime", name="fk_kp_date_nahatongavana", nullable=true)
     * @var datetime
     */
	protected $nahatongavana;
	
	/**
     * @ORM\Column(type="datetime", name="fk_kp_date_nialana", nullable=true)
     * @var datetime
     */
	protected $nialana;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_kp_adiresy")
	 * @var string
	 */
	protected $adiresy;
	
	/**
     * @ORM\ManyToOne(targetEntity="Fokotany", inversedBy="karapokotanies")
     * @ORM\JoinColumn(name="fk_kp_fkt_id", referencedColumnName="fk_fkt_id")
     * @var Entities\Fokotany
     */
	protected $fokotany;
	
	/**
     * @ORM\ManyToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="fk_kp_fkt_niaviana", referencedColumnName="fk_fkt_id")
     * @var Entities\Fokotany
     **/
	protected $niaviana;
	
	/**
     * @ORM\ManyToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="fk_kp_fkt_andehanana", referencedColumnName="fk_fkt_id")
     * @var Entities\Fokotany
     **/
	protected $andehanana;
	
	/**
     * @ORM\OneToMany(targetEntity="Olona", mappedBy="karapokotany")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $olonas;
	
	/**
     * @ORM\OneToMany(targetEntity="Adidy", mappedBy="karapokotany")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $adidies;
	
	public function __construct()
    {
    	$this->olonas = new Collection();
    	$this->adidies = new Collection();
    }
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function getLaharana()
	{
		return $this->laharana;
	}
	
	public function setLaharana($laharana)
	{
		$this->laharana = $laharana;
		return $this;
	}
	
	public function getInscription()
	{
		return $this->inscription;
	}
	
	public function setInscription($inscription)
	{
		$this->inscription = $inscription;
		return $this;
	}
	
	public function getLohampianakaviana()
	{
		return $this->lohampianakaviana;
	}
	
	public function setLohampianakaviana($lohampianakaviana)
	{
		$this->lohampianakaviana = $lohampianakaviana;
		return $this;
	}
	
	public function getFaritra()
	{
		return $this->faritra;
	}
	
	public function setFaritra($faritra)
	{
		$this->faritra = $faritra;
		return $this;
	}
	
	public function getNahatongavana()
	{
		return $this->nahatongavana;
	}
	
	public function setNahatongavana($nahatongavana)
	{
		$this->nahatongavana = $nahatongavana;
		return $this;
	}
	
	public function getNialana()
	{
		return $this->nialana;
	}
	
	public function setNialana($nialana)
	{
		$this->nialana = $nialana;
		return $this;
	}
	
	public function getAdiresy()
	{
		return $this->adiresy;
	}
	
	public function setAdiresy($adiresy)
	{
		$this->adiresy = $adiresy;
		return $this;
	}
	
	public function getFokotany()
	{
		return $this->fokotany;
	}
	
	public function setFokotany($fokotany)
	{
		$this->fokotany = $fokotany;
		return $this;
	}
	
	public function getNiaviana()
	{
		return $this->niaviana;
	}
	
	public function setNiaviana($niaviana)
	{
		$this->niaviana = $niaviana;
		return $this;
	}
	
	public function getAndehanana()
	{
		return $this->andehanana;
	}
	
	public function setAndehanana($andehanana)
	{
		$this->andehanana = $andehanana;
		return $this;
	}
	
	public function getOlonas()
    {
    	return $this->olonas;
    }
    
    public function addOlona(Olona $olona)
    {
    	$olona->addPost($this);
    	$this->olonas[] = $olona;
    	return $this;
    }
    
	public function addOlonas(Collection $olonas)
    {
        foreach ($olonas as $olona) {
            $this->olonas->add($olona);
        }
        return $this;
    }

    public function removeOlonas(Collection $olonas)
    {
        foreach ($olonas as $olona) {
            $this->olonas->removeElement($olona);
        }
        return $this;
    }
    
	public function getAdidies()
    {
    	return $this->adidies;
    }
    
    public function addAdidy(Adidy $adidy)
    {
    	$adidy->addPost($this);
    	$this->adidies[] = $adidy;
    	return $this;
    }
    
	public function addAdidies(Collection $adidies)
    {
        foreach ($adidies as $adidy) {
            $this->adidies->add($adidy);
        }
        return $this;
    }

    public function removeAdidies(Collection $adidies)
    {
        foreach ($adidies as $adidy) {
            $this->adidies->removeElement($adidy);
        }
        return $this;
    }
	
}	
	
	