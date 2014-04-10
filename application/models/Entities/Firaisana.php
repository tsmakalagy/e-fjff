<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_fir_firaisana")
 * @author raiza
 *
 */
class Firaisana
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_fir_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_fir_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="fk_fir_slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\ManyToOne(targetEntity="Fivondronana", inversedBy="firaisanas")
     * @ORM\JoinColumn(name="fk_fir_fiv_id", referencedColumnName="fk_fiv_id")
     * @var Entities\Fivondronana
     */
	protected $fivondronana;
	
	/**
     * @ORM\OneToMany(targetEntity="Fokotany", mappedBy="firaisana")
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
	
	public function getFivondronana()
	{
		return $this->fivondronana;
	}
	
	public function setFivondronana($fivondronana)
	{
		$this->fivondronana = $fivondronana;
		return $this;
	}
	
	public function getFokotanies()
    {
    	return $this->fokotanies;
    }
    
    public function addFokotany(Fokotany $fokotany)
    {
    	$fokotany->addPost($this);
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