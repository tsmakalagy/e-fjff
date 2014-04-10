<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_fiv_fivondronana")
 * @author raiza
 *
 */
class Fivondronana
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_fiv_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_fiv_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="fk_fiv_slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\ManyToOne(targetEntity="District", inversedBy="fivondronanas")
     * @ORM\JoinColumn(name="fk_fiv_dist_id", referencedColumnName="fk_dist_id")
     * @var Entities\District
     */
	protected $district;
	
	/**
     * @ORM\OneToMany(targetEntity="Firaisana", mappedBy="fivondronana")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $firaisanas;
	
	public function __construct()
    {
    	$this->firaisanas = new Collection();
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
	
	public function getDistrict()
	{
		return $this->district;
	}
	
	public function setDistrict($district)
	{
		$this->district = $district;
		return $this;
	}
	
	public function getFiraisanas()
    {
    	return $this->firaisanas;
    }
    
    public function addFiraisana(Firaisana $firaisana)
    {
    	$firaisana->addPost($this);
    	$this->firaisanas[] = $firaisana;
    	return $this;
    }
    
	public function addFiraisanas(Collection $firaisanas)
    {
        foreach ($firaisanas as $firaisana) {
            $this->firaisanas->add($firaisana);
        }
        return $this;
    }

    public function removeFiraisanas(Collection $firaisanas)
    {
        foreach ($firaisanas as $firaisana) {
            $this->firaisanas->removeElement($firaisana);
        }
        return $this;
    }
}