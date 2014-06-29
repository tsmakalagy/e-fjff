<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="personnes")
 * @author raiza
 *
 */
class Personne
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
     * @ORM\Column(type="integer")
     * @var int
     */
	protected $statut;
	
	/**
     * @ORM\Column(type="integer")
     * @var int
     */
	protected $occupation;	
	
	/**
     * @ORM\Column(type="integer", name="sexe")
     * @var int
     */
	protected $sexe;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
	protected $datesab;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
	protected $dateosotra;	
	
	/**
     * @ORM\ManyToMany(targetEntity="Poste", mappedBy="pasteurs")
     */
	protected $postes;
	
	/**
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumn(name="conjoint_id", referencedColumnName="id", onDelete="CASCADE")
     **/
	protected $conjoint;	
	
	/**
     * @ORM\ManyToMany(targetEntity="Enfant", inversedBy="parents")
     * @ORM\JoinTable(name="parents_enfants",
     *              joinColumns={@ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")},
     *              inverseJoinColumns={@ORM\JoinColumn(name="enfant_id", referencedColumnName="id", onDelete="CASCADE")}
     *              )
     */
	protected $enfants;
	
	/**
	 * @ORM\Column(type="string", length=128, nullable=true)
	 * @var string
	 */
	protected $telephone;
	
	/**
	 * @ORM\OneToOne(targetEntity="File")
	 * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
	 * @var File
	 */
	protected $file;
	
	public function __construct()
    {
    	$this->enfants = new Collection();
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
	
	public function getStatut()
	{
		return $this->statut;
	}
	
	public function setStatut($statut)
	{
		$this->statut = $statut;
		return $this;
	}
	
	public function getOccupation()
	{
		return $this->occupation;
	}
	
	public function setOccupation($occupation)
	{
		$this->occupation = $occupation;
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
	
	public function getDatesab()
	{
		return $this->datesab;
	}
	
	public function setDatesab($datesab)
	{
		$this->datesab = $datesab;
		return $this;
	}
	
	public function getDateosotra()
	{
		return $this->dateosotra;
	}
	
	public function setDateosotra($dateosotra)
	{
		$this->dateosotra = $dateosotra;
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
	
	public function getConjoint()
	{
		return $this->conjoint;
	}
	
	public function setConjoint(Personne $conjoint)
	{
		$this->conjoint = $conjoint;
		return $this;
	}
	
    
	public function getEnfants()
    {
    	return $this->enfants;
    }
    
    public function addEnfant(Enfant $enfant)
    {
    	$enfant->addParent($this);
    	$this->enfants[] = $enfant;
    	return $this;
    }
    
	public function addEnfants(Collection $enfants)
    {
        foreach ($enfants as $enfant) {
            $this->enfants->add($enfant);
        }
        return $this;
    }

    public function removeEnfants(Collection $enfants)
    {
        foreach ($enfants as $enfant) {
            $this->enfants->removeElement($enfant);
        }
        return $this;
    }
    
	public function getTelephone()
	{
		return $this->telephone;
	}
	
	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;
		return $this;
	}
	
	public function getFile()
	{
		return $this->file;
	}
	
	public function setFile($file)
	{
		$this->file = $file;
		return $this;
	}
}