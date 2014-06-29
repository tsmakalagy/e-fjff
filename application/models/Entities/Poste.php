<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="postes")
 * @author raiza
 *
 */
class Poste
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * @ORM\ManyToMany(targetEntity="Eglise", inversedBy="postes")
     * @ORM\JoinTable(name="eglises_postes",
     *              joinColumns={@ORM\JoinColumn(name="eglise_id", referencedColumnName="id", onDelete="CASCADE")},
     *              inverseJoinColumns={@ORM\JoinColumn(name="poste_id", referencedColumnName="id", onDelete="CASCADE")}
     *              )
     *  @var Collection
     */
	protected $eglises;
	
	/**
     * @ORM\ManyToMany(targetEntity="Personne", inversedBy="postes")
     * @ORM\JoinTable(name="pasteurs_postes",
     *              joinColumns={@ORM\JoinColumn(name="pasteur_id", referencedColumnName="id", onDelete="CASCADE")},
     *              inverseJoinColumns={@ORM\JoinColumn(name="poste_id", referencedColumnName="id", onDelete="CASCADE")}
     *              )
     *  @var Collection
     */
	protected $pasteurs;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
	protected $debut;
	
	/**
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
	protected $fin;
	
	public function __construct()
    {
    	$this->eglises = new Collection();
    	$this->pasteurs = new Collection();
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
	
	public function getEglises()
    {
    	return $this->eglises;
    }
    
    public function addEglise(Eglise $eglise)
    {
    	$eglise->addParent($this);
    	$this->eglises[] = $eglise;
    	return $this;
    }
    
	public function addEglises(Collection $eglises)
    {
        foreach ($eglises as $eglise) {
            $this->eglises->add($eglise);
        }
        return $this;
    }

    public function removeEglises(Collection $eglises)
    {
        foreach ($eglises as $eglise) {
            $this->eglises->removeElement($eglise);
        }
        return $this;
    }
    
	public function getPasteurs()
    {
    	return $this->pasteurs;
    }
    
    public function addPasteur(Personne $pasteur)
    {
    	$pasteur->addParent($this);
    	$this->pasteurs[] = $pasteur;
    	return $this;
    }
    
	public function addPasteurs(Collection $pasteurs)
    {
        foreach ($pasteurs as $pasteur) {
            $this->pasteurs->add($pasteur);
        }
        return $this;
    }

    public function removePasteurs(Collection $pasteurs)
    {
        foreach ($pasteurs as $pasteur) {
            $this->pasteurs->removeElement($pasteur);
        }
        return $this;
    }
    
	public function getDebut()
	{
		return $this->debut;
	}
	
	public function setDebut($debut)
	{
		$this->debut = $debut;
		return $this;
	}
	
	public function getFin()
	{
		return $this->fin;
	}
	
	public function setFin($fin)
	{
		$this->fin = $fin;
		return $this;
	}
}