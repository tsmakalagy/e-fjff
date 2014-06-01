<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fokotany")
 * @author raiza
 *
 */
class Fokotany
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
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="fokotanies")
     * @ORM\JoinColumn(name="id_commune", referencedColumnName="id")
     * @var Entities\Commune
     */
	protected $commune;
	
	/**
     * @ORM\OneToMany(targetEntity="Karapokotany", mappedBy="fokotany")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $karapokotanies;
	
	public function __construct()
    {
    	$this->karapokotanies = new Collection();
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
	
	public function getCommune()
	{
		return $this->commune;
	}
	
	public function setCommune($commune)
	{
		$this->commune = $commune;
		return $this;
	}
	
	public function getKarapokotanies()
    {
    	return $this->karapokotanies;
    }
    
    public function addKarapokotany(Karapokotany $karapokotany)
    {
    	$karapokotany->addPost($this);
    	$this->karapokotanies[] = $karapokotany;
    	return $this;
    }
    
	public function addKarapokotanies(Collection $karapokotanies)
    {
        foreach ($karapokotanies as $karapokotany) {
            $this->karapokotanies->add($karapokotany);
        }
        return $this;
    }

    public function removeKarapokotanies(Collection $karapokotanies)
    {
        foreach ($karapokotanies as $karapokotany) {
            $this->karapokotanies->removeElement($karapokotany);
        }
        return $this;
    }
}