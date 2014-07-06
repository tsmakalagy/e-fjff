<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="Eglise", inversedBy="postes")
     * @ORM\JoinColumn(name="eglise_id", referencedColumnName="id")
     *  @var Collection
     */
	protected $eglise;
	
	/**
     * @ORM\ManyToOne(targetEntity="Personne", inversedBy="postes")
     * @ORM\JoinColumn(name="pasteur_id", referencedColumnName="id")
     * @var Pasteur
     */
	protected $pasteur;
	
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
	
	/**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
	protected $current;
	
    
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function getEglise()
    {
    	return $this->eglise;
    }
    
    public function setEglise(Eglise $eglise)
    {
    	$this->eglise = $eglise;
    	return $this;
    }
        
	public function getPasteur()
    {
    	return $this->pasteur;
    }
    
    public function setPasteur(Personne $pasteur)
    {
    	$this->pasteur= $pasteur;
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
	
	public function getCurrent()
	{
		return $this->current;
	}
	
	public function setCurrent($current)
	{
		$this->current = $current;
		return $this;
	}
}