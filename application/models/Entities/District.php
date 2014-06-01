<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="district")
 * @author raiza
 *
 */
class District
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
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="districts")
     * @ORM\JoinColumn(name="id_region", referencedColumnName="id")
     * @var Entities\Region
     */
	protected $region;
	
	/**
     * @ORM\OneToMany(targetEntity="Commune", mappedBy="district")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $communes;
	
	public function __construct()
    {
    	$this->communes = new Collection();
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
	
	public function getRegion()
	{
		return $this->region;
	}
	
	public function setRegion($region)
	{
		$this->region = $region;
		return $this;
	}
	
	public function getCommunes()
    {
    	return $this->communes;
    }
    
    public function addCommune(Commune $commune)
    {
    	$commune->addPost($this);
    	$this->communes[] = $commune;
    	return $this;
    }
    
	public function addCommunes(Collection $communes)
    {
        foreach ($communes as $commune) {
            $this->communes->add($commune);
        }
        return $this;
    }

    public function removeCommunes(Collection $communes)
    {
        foreach ($communes as $commune) {
            $this->communes->removeElement($commune);
        }
        return $this;
    }
}