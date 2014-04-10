<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fk_ro_role")
 * @author raiza
 *
 */
class Role
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_ro_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=25, name="fk_ro_libelle")
	 * @var string
	 */
	protected $libelle;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="fk_ro_parent", referencedColumnName="fk_ro_id")
     * @var Entities\Role
     */
	protected $parent;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function getLibelle()
	{
		return $this->libelle;
	}
	
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;
		return $this;
	}
	
	public function getParent()
	{
		return $this->parent;
	}
	
	public function setParent($parent)
	{
		$this->parent = $parent;
		return $this;
	}
}