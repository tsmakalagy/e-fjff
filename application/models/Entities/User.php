<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity(repositoryClass="Repositories\UserRepository")
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
	 * @ORM\Column(type="string", length=512, name="fk_us_name", nullable=true)
	 * @var string
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_us_username", nullable=true, unique=true)
	 * @var string
	 */
	protected $username;
	
	/**
	 * @ORM\Column(type="string", length=128, name="fk_us_email", unique=true)
	 * @var string
	 */
	protected $email;
	
	/**
	 * @ORM\Column(type="string", length=200, name="fk_us_password")
	 * @var string
	 */
	protected $password;
	
	/**
	 * @ORM\Column(type="string", length=32, name="fk_us_reset_code", nullable=true)
	 * @var string
	 */
	protected $resetCode;
	
	/**
	 * @ORM\Column(type="integer", name="fk_us_reset_time", nullable=true)
	 * @var integer
	 */
	protected $resetTime;
	
	/**
	 * @ORM\Column(type="string", length=255, name="fk_us_remember_code", nullable=true)
	 * @var string
	 */
	protected $rememberCode;
	
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
    
    /**
     * @ORM\ManyToOne(targetEntity="Birao")
     * @ORM\JoinColumn(name="birao_id", referencedColumnName="id")
     * @var Entities\Birao
     */
    protected $birao;
    
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
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
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
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
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
	
	public function getResetCode()
	{
		return $this->resetCode;
	}
	
	public function setResetCode($resetCode)
	{
		$this->resetCode = $resetCode;
		return $this;
	}
	
	public function getResetTime()
	{
		return $this->resetTime;
	}
	
	public function setResetTime($resetTime)
	{
		$this->resetTime = $resetTime;
		return $this;
	}
	
	public function getRememberCode()
	{
		return $this->rememberCode;
	}
	
	public function setRememberCode($rememberCode)
	{
		$this->rememberCode = $rememberCode;
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
    
    public function hasRole($roleName)
    {
    	$user_roles = $this->getRoles();
    	if (isset($user_roles)) {
    		foreach ($user_roles as $role) {
    			do {
	    			if ($roleName === $role->getLibelle()) {    				
	    				return true;
	    			} else {
	    				$role = $role->getParent();	
	    			}    				
    			} while ($role != null);
    		}
    	}
    	return false;
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