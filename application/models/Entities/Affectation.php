<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="affectations")
 * @author raiza
 *
 */
class Affectation
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Personne")
	 * @ORM\JoinColumn(name="pasteur_id", referencedColumnName="id")
	 * @var Personne
	 */
	protected $pasteur;
	
	/**
     * @ORM\Column(type="datetime")
     * @var datetime
     */
	protected $created;	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Eglise")
	 * @ORM\JoinColumn(name="last_eglise_id", referencedColumnName="id")
	 * @var Eglise
	 */
	protected $lastEglise;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Eglise")
	 * @ORM\JoinColumn(name="next_eglise_id", referencedColumnName="id")
	 * @var Eglise
	 */
	protected $nextEglise;
	
	
	/**
     * @ORM\PrePersist
     */
    public function timestamp()
    {
        if(is_null($this->created)) {
            $this->setCreated(new \DateTime());
        }
        return $this;
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
	
	public function getPasteur()
	{
		return $this->pasteur;
	}
	
	public function setPasteur($pasteur)
	{
		$this->pasteur = $pasteur;
		return $this;
	}
	
	public function getCreated()
	{
		return $this->created;
	}
	
	public function setCreated($created)
	{
		$this->created = $created;
		return $this;
	}
	
	public function getLastEglise()
	{
		return $this->lastEglise;
	}
	
	public function setLastEglise($lastEglise)
	{
		$this->lastEglise = $lastEglise;
		return $this;
	}
	
	public function getNextEglise()
	{
		return $this->nextEglise;
	}
	
	public function setNextEglise($nextEglise)
	{
		$this->nextEglise = $nextEglise;
		return $this;
	}
}