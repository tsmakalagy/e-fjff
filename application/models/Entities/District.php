<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_dist_district")
 * @author raiza
 *
 */
class District
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_dist_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_dist_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="fk_dist_slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="districts")
     * @ORM\JoinColumn(name="fk_dist_reg_id", referencedColumnName="fk_reg_id")
     * @var Entities\Region
     */
	protected $region;
	
	/**
     * @ORM\OneToMany(targetEntity="Fivondronana", mappedBy="district")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $fivondronanas;
	
	public function __construct()
    {
    	$this->fivondronanas = new Collection();
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
	
	public function getAnarana()
	{
		return $this->anarana;
	}
	
	public function setAnarana($anarana)
	{
		$this->anarana = $anarana;
		return $this;
	}
	
	public function getSlogan()
	{
		return $this->slogan;
	}
	
	public function setSlogan($slogan)
	{
		$this->slogan = $slogan;
		return $this;
	}
	
	public function getRegion()
	{
		return $this->region;
	}
	
	public function setRegion($region)
	{
		$this->region = $region;
		return $this;
	}
	
	public function getFivondronanas()
    {
    	return $this->fivondronanas;
    }
    
    public function addFivondronana(Fivondronana $fivondronana)
    {
    	$fivondronana->addPost($this);
    	$this->fivondronanas[] = $fivondronana;
    	return $this;
    }
    
	public function addFivondronanas(Collection $fivondronanas)
    {
        foreach ($fivondronanas as $fivondronana) {
            $this->fivondronanas->add($fivondronana);
        }
        return $this;
    }

    public function removeFivondronanas(Collection $fivondronanas)
    {
        foreach ($fivondronanas as $fivondronana) {
            $this->fivondronanas->removeElement($fivondronana);
        }
        return $this;
    }
}