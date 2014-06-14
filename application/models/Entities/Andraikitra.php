<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_ol_andraikitra")
 * @author raiza
 *
 */
class Andraikitra
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_andr_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_andr_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
     * @ORM\OneToMany(targetEntity="Olona", mappedBy="andraikitra")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $olonas;
	
	public function __construct()
    {
    	$this->olonas = new Collection();
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
	
	public function getOlonas()
    {
    	return $this->olonas;
    }
    
    public function addOlona(Olona $olona)
    {
    	$this->olonas[] = $olona;
    	return $this;
    }
    
	public function addOlonas(Collection $olonas)
    {
        foreach ($olonas as $olona) {
            $this->olonas->add($olona);
        }
        return $this;
    }

    public function removeOlonas(Collection $olonas)
    {
        foreach ($olonas as $olona) {
            $this->olonas->removeElement($olona);
        }
        return $this;
    }
}