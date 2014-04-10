<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_ad_adidy")
 * @author raiza
 *
 */
class Adidy
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_ad_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="datetime", length=128, name="fk_ad_daty")
	 * @var datetime
	 */
	protected $daty;
	
	/**
     * @ORM\ManyToOne(targetEntity="Karapokotany", inversedBy="adidies")
     * @ORM\JoinColumn(name="fk_ad_id_kp", referencedColumnName="fk_kp_id")
     * @var Entities\Karapokotany
     */
	protected $karapokotany;
	
	/**
     * @ORM\Column(type="integer", name="fk_ad_vita")
     * @var int
     */
	protected $vita;
	
	/**
	 * @ORM\Column(type="text", name="fk_ad_desc", nullable=true)
	 * @var text
	 */
	protected $description;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function getDaty()
	{
		return $this->daty;
	}
	
	public function setDaty($daty)
	{
		$this->daty = $daty;
		return $this;
	}
	
	public function getKarapokotany()
	{
		return $this->karapokotany;
	}
	
	public function setKarapokotany($karapokotany)
	{
		$this->karapokotany = $karapokotany;
		return $this;
	}
	
	public function getVita()
	{
		return $this->vita;
	}
	
	public function setVita($vita)
	{
		$this->vita = $vita;
		return $this;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}
}