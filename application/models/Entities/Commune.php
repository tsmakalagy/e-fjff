<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="commune")
 * @author raiza
 *
 */
class Commune
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=256, name="name")
	 * @var string
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\ManyToOne(targetEntity="District", inversedBy="communes")
     * @ORM\JoinColumn(name="id_district", referencedColumnName="id")
     * @var Entities\District
     */
	protected $district;
	
	/**
     * @ORM\OneToMany(targetEntity="Fokotany", mappedBy="commune")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $fokotanies;
	
	public function __construct()
    {
    	$this->fokotanies = new Collection();
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
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
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
	
	public function getFokotanies()
    {
    	return $this->fokotanies;
    }
    
    public function addFokotany(Fokotany $fokotany)
    {
    	$this->fokotanies[] = $fokotany;
    	return $this;
    }
    
	public function addFokotanies(Collection $fokotanies)
    {
        foreach ($fokotanies as $fokotany) {
            $this->fokotanies->add($fokotany);
        }
        return $this;
    }

    public function removeFokotanies(Collection $fokotanies)
    {
        foreach ($fokotanies as $fokotany) {
            $this->fokotanies->removeElement($fokotany);
        }
        return $this;
    }
}