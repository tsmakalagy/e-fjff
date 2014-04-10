<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_fkt_fokotany")
 * @author raiza
 *
 */
class Fokotany
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_fkt_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_fkt_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
	 * @ORM\Column(type="string", length=256, nullable=true, name="fk_fkt_slogan")
	 * @var string
	 */
	protected $slogan;
	
	/**
     * @ORM\ManyToOne(targetEntity="Firaisana", inversedBy="fokotanies")
     * @ORM\JoinColumn(name="fk_fkt_fir_id", referencedColumnName="fk_fir_id")
     * @var Entities\Firaisana
     */
	protected $firaisana;
	
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
	
	public function getFiraisana()
	{
		return $this->firaisana;
	}
	
	public function setFiraisana($firaisana)
	{
		$this->firaisana = $firaisana;
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