<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
	
}