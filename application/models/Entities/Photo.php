<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_photo")
 * @author raiza
 *
 */
class Photo
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_photo_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_photo_nom")
	 * @var string
	 */
	protected $nom;
	
	/**
	 * @ORM\Column(type="string", length=256, name="fk_photo_chemin")
	 * @var string
	 */
    protected $chemin;
    
    /**
     * @ORM\ManyToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="fk_photo_fkt_id", referencedColumnName="id")
     * @var Entities\Fokotany
     **/
    protected $fokotany;
    
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
	
	public function getChemin()
	{
		return $this->chemin;
	}
	
	public function setChemin($chemin)
	{
		$this->chemin = $chemin;
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
}