<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="eglises")
 * @author raiza
 *
 */
class Eglise
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128)
	 * @var string
	 */
	protected $nom;
	
	/**
     * @ORM\OneToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="fokotany_id", referencedColumnName="id")
     * @var Entities\Fokotany
     */
	protected $fokotany;
	
	/**
     * @ORM\ManyToMany(targetEntity="Poste", mappedBy="pasteurs")
     */
	protected $postes;
	
	public function __construct()
    {
    	$this->postes = new Collection();
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
	
	public function getNom()
	{
		return $this->nom;
	}
	
	public function setNom($nom)
	{
		$this->nom = $nom;
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
	
	public function getPostes()
    {
    	return $this->postes;
    }
    
    public function addPoste(Poste $poste)
    {
    	$poste->addParent($this);
    	$this->postes[] = $poste;
    	return $this;
    }
    
	public function addPostes(Collection $postes)
    {
        foreach ($postes as $poste) {
            $this->postes->add($poste);
        }
        return $this;
    }

    public function removePostes(Collection $postes)
    {
        foreach ($postes as $poste) {
            $this->postes->removeElement($poste);
        }
        return $this;
    }
}