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
     * @ORM\ManyToOne(targetEntity="Birao")
     * @ORM\JoinColumn(name="birao_id", referencedColumnName="id")
     * @var Entities\Birao
     **/
    protected $birao;
    
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
	
	public function getBirao()
	{
		return $this->birao;
	}
	
	public function setBirao($birao)
	{
		$this->birao = $birao;
		return $this;
	}
}