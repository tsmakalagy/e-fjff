<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="region")
 * @author raiza
 *
 */
class Region
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="name")
	 * @var string
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\OneToMany(targetEntity="District", mappedBy="region")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $districts;
	
	public function __construct()
    {
    	$this->districts = new Collection();
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
	
	public function getDistricts()
    {
    	return $this->districts;
    }
    
    public function addDistrict(District $district)
    {
    	$district->addPost($this);
    	$this->districts[] = $district;
    	return $this;
    }
    
	public function addDistricts(Collection $districts)
    {
        foreach ($districts as $district) {
            $this->districts->add($district);
        }
        return $this;
    }

    public function removeDistricts(Collection $districts)
    {
        foreach ($districts as $district) {
            $this->districts->removeElement($district);
        }
        return $this;
    }
}