<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_olona")
 * @author raiza
 *
 */
class Olona
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_ol_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_ol_anarana")
	 * @var string
	 */
	protected $anarana;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_ol_fanampiny", nullable=true)
	 * @var string
	 */
	protected $fanampiny;
	
	/**
     * @ORM\Column(type="datetime", name="fk_ol_date_naiss", nullable=true)
     * @var datetime
     */
	protected $datenaissance;
	
	/**
     * @ORM\Column(type="integer", name="fk_ol_velona")
     * @var int
     */
	protected $velona;
	
	/**
     * @ORM\ManyToOne(targetEntity="Karapokotany", inversedBy="olonas")
     * @ORM\JoinColumn(name="fk_ol_kp_id", referencedColumnName="fk_kp_id")
     * @var Entities\Karapokotany
     */
	protected $karapokotany;
	
	/**
	 * @ORM\Column(type="string", length=25, name="fk_ol_cin", nullable=true)
	 * @var string
	 */
	protected $cin;
	
	/**
     * @ORM\Column(type="integer", name="fk_ol_sex")
     * @var int
     */
	protected $sex;
	
	/**
     * @ORM\Column(type="datetime", name="fk_ol_date_cin", nullable=true)
     * @var datetime
     */
	protected $datecin;
	
	/**
     * @ORM\ManyToOne(targetEntity="Andraikitra", inversedBy="olonas")
     * @ORM\JoinColumn(name="fk_ol_andr_id", referencedColumnName="fk_andr_id")
     * @var Entities\Andraikitra
     */
	protected $andraikitra;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_ol_asa", nullable=true)
	 * @var string
	 */
	protected $asa;
	
	/**
     * @ORM\OneToOne(targetEntity="Olona")
     * @ORM\JoinColumn(name="spouse_id", referencedColumnName="fk_ol_id")
     **/
	protected $spouse;
	
	/**
     * @ORM\ManyToMany(targetEntity="Olona", mappedBy="children")
     */
	protected $parents;
	
	/**
     * @ORM\ManyToMany(targetEntity="Olona", inversedBy="parents")
     * @ORM\JoinTable(name="parents_children",
     *              joinColumns={@ORM\JoinColumn(name="parent_id", referencedColumnName="fk_ol_id")},
     *              inverseJoinColumns={@ORM\JoinColumn(name="child_id", referencedColumnName="fk_ol_id")}
     *              )
     */
	protected $children;
	
	public function __construct()
    {
    	$this->parents = new Collection();
    	$this->children = new Collection();
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
	
	public function getFanampiny()
	{
		return $this->fanampiny;
	}
	
	public function setFanampiny($fanampiny)
	{
		$this->fanampiny = $fanampiny;
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
	
	public function getVelona()
	{
		return $this->velona;
	}
	
	public function setVelona($velona)
	{
		$this->velona = $velona;
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
	
	public function getCin()
	{
		return $this->cin;
	}
	
	public function setCin($cin)
	{
		$this->cin = $cin;
		return $this;
	}
	
	public function getSex()
	{
		return $this->sex;
	}
	
	public function setSex($sex)
	{
		$this->sex = $sex;
		return $this;
	}
	
	public function getDatecin()
	{
		return $this->datecin;
	}
	
	public function setDatecin($datecin)
	{
		$this->datecin = $datecin;
		return $this;
	}
	
	public function getAndraikitra()
	{
		return $this->andraikitra;
	}
	
	public function setAndraikitra($andraikitra)
	{
		$this->andraikitra = $andraikitra;
		return $this;
	}
	
	public function getAsa()
	{
		return $this->asa;
	}
	
	public function setAsa($asa)
	{
		$this->asa = $asa;
		return $this;
	}
	
	public function getSpouse()
	{
		return $this->spouse;
	}
	
	public function setSpouse(Olona $spouse)
	{
		$this->spouse = $spouse;
		return $this;
	}
	
	public function getParents()
    {
    	return $this->parents;
    }
    
    public function addParent(Olona $parent)
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
    
	public function getChildren()
    {
    	return $this->children;
    }
    
    public function addChild(Olona $child)
    {
    	$child->addParent($this);
    	$this->children[] = $child;
    	return $this;
    }
    
	public function addChildren(Collection $children)
    {
        foreach ($children as $child) {
            $this->children->add($child);
        }
        return $this;
    }

    public function removeChildren(Collection $children)
    {
        foreach ($children as $child) {
            $this->children->removeElement($child);
        }
        return $this;
    }
}