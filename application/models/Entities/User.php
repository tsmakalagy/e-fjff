<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity(repositoryClass="Entities\UserRepository")
 * @ORM\Table(name="fk_fkt_user")
 * @author raiza
 *
 */
class User
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="fk_us_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_us_username")
	 * @var string
	 */
	protected $username;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_us_password")
	 * @var string
	 */
	protected $password;
	
	/**
     * @ORM\Column(type="datetime", name="fk_us_last_login", nullable=true)
     * @var datetime
     */
	protected $lastLogin;
	
	/**
     * @ORM\Column(type="datetime", name="fk_us_last_logout", nullable=true)
     * @var datetime
     */
	protected $lastLogout;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="fk_user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="fk_us_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="fk_ro_id")}
     * )
     */
    protected $roles;
    
	public function __construct()
    {
        $this->roles = new Collection();
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
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	
	public function getLastLogin()
	{
		return $this->lastLogin;
	}
	
	public function setLastLogin($lastLogin)
	{
		$this->lastLogin = $lastLogin;
		return $this;
	}
	
	public function getLastLogout()
	{
		return $this->lastLogout;
	}
	
	public function setLastLogout($lastLogout)
	{
		$this->lastLogout = $lastLogout;
		return $this;
	}
	
	public function getRoles()
    {
    	return $this->roles;
    }
    
    public function addRole(Role $role)
    {
    	$role->addPost($this);
    	$this->roles[] = $role;
    	return $this;
    }
    
	public function addRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $this->roles->add($role);
        }
        return $this;
    }

    public function removeRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $this->roles->removeElement($role);
        }
        return $this;
    }
	
}