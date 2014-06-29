<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="enfants")
 * @author raiza
 *
 */
class Enfant
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
	 * @ORM\Column(type="string", length=128, nullable=true)
	 * @var string
	 */
	protected $prenom;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
	protected $datenaissance;
	
	/**
	 * @ORM\Column(type="string", length=128, nullable=true)
	 * @var string
	 */
	protected $classe;
	
	/**
     * @ORM\Column(type="integer")
     * @var int
     */
	protected $sexe;
	
	/**
     * @ORM\ManyToMany(targetEntity="Personne", mappedBy="enfants")
     */
	protected $parents;
	
	public function __construct()
    {
    	$this->parents = new Collection();
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
	
	public function getPrenom()
	{
		return $this->prenom;
	}
	
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
		return $this;
	}
	
	public function getDatenaissance()
	{
		return $this->datenaissance;
	}
	
	public function setDatenaissance($datenaissance)
	{
		$this->datenaissance = $datenaissance;
		return $this;
	}
	
	public function getClasse()
	{
		return $this->classe;
	}
	
	public function setClasse($classe)
	{
		$this->classe = $classe;
		return $this;
	}
	
	public function getSexe()
	{
		return $this->sexe;
	}
	
	public function setSexe($sexe)
	{
		$this->sexe = $sexe;
		return $this;
	}
	
	public function getParents()
    {
    	return $this->parents;
    }
    
    public function addParent(Personne $parent)
    {
    	$this->parents[] = $parent;
    	return $this;
    }
    
	public function addParents(Collection $parents)
    {
        foreach ($parents as $parent) {
            $this->parents->add($parent);
        }
        return $this;
    }

    public function removeParents(Collection $parents)
    {
        foreach ($parents as $parent) {
            $this->parents->removeElement($parent);
        }
        return $this;
    }
}