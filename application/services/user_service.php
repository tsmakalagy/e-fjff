<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_service
{
	protected $em = null;
	protected $CI = null;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library( array('doctrine', 'phpass') );
		$this->em = $this->CI->doctrine->em;	
	}
	
	public function register( $data )
	{
		
		
		$name = isset($data['name']) ? $data['name'] : '';
		$username = $data['username'];
		$password = $this->CI->phpass->hash( $data['password'] );
		
		$user = new Entities\User();
		
		$roleId = isset($data['role']) ? $data['role'] : 2;
		$role = $this->em->getRepository('Entities\Role')->find($roleId);
			
		
		$user->setName($name);
		$user->setUsername($username);
		$user->setPassword($password);
		$user->addRole($role);
		$this->em->persist($user);
		$this->em->flush();
		
		if ($user->getId()) {
			return true;
		}
		return false;
	}
	
	public function findByEmail($email)
	{
		return $this->em->getRepository('Entities\User')->findByIdentity($email);
	}
	
	public function findByUsername($username)
	{
		return $this->em->getRepository('Entities\User')->findByIdentity($username, 'username');
	}
	
	public function save($user)
	{
		if ($user instanceof Entities\User) {
			$this->em->persist($user);
			$this->em->flush();	
		} else if (is_array($user)) {
			$data = $user;
			$user = new Entities\User();
			$class_vars = get_class_vars(get_class($user));
			foreach ($class_vars as $key => $value) {
				if (array_key_exists($key, $data)) {
					$user->set{ucfirst($key)}($data[$key]);
				}
			}
		}
		if ($user->getId()) {
			return true;
		}
		return false;
	}
	
	public function logout($id)
	{
		$user = $this->findById($id);
		if ($user instanceof Entities\User) {
			$user->setLastLogout(new \DateTime());
			return $this->save($user);	
		} else {
			return false;
		}		
	}
	
	public function findById($id)
	{
		return $this->em->getRepository('Entities\User')->find($id);
	}
	
	public function listRole()
	{
		return $this->em->getRepository('Entities\Role')->findAll();
	}
	
	public function getRoleByName($roleName)
	{
		return $this->em->getRepository('Entities\Role')->findByLibelle($roleName);
	}
	
	public function getUserRolename($userId)
	{
		$user = $this->findById($userId);
		$return = array();
		if ($user instanceof Entities\User) {
			$roles = $user->getRoles();			
			foreach ($roles as $role) {
				array_push($return, array('roleId' => $role->getId(), 'roleName' => $role->getLibelle()));
			}	
		}
		return $return;
	}
	
	public function listUser()
	{
		$users = $this->em->getRepository('Entities\User')->findAll();
		$return = array();
		if (isset($users) && count($users)) {
			foreach ($users as $user) {
				$res = array();
				$res['id'] = $user->getId();
				$res['name'] = $user->getName();
                $res['email'] = $user->getEmail();
				$roles = $user->getRoles();
				if (isset($roles) && count($roles)) {					
					foreach ($roles as $role) {
						$res['role'] = array('id' => $role->getId(), 'name' => $role->getLibelle());
					}
				}  
				$birao = $user->getBirao();
				if ($birao instanceof Entities\Birao) {
					$res['birao'] = array('id' => $birao->getId(), 'fokotany' => $birao->getFokotany()->getName());					
				}
				array_push($return, $res);
			}
		}
		return $return;
	}
	
	public function changeRole($data)
	{
		$userId = (int)$data['userId'];
		$roleId = (int)$data['roleId'];
		$user = $this->em->find('Entities\User', $userId);
		$role = $this->em->find('Entities\Role', $roleId);
		if ($user instanceof Entities\User && $role instanceof Entities\Role) {
			$currentRoles = $user->getRoles();
			foreach ($currentRoles as $item) {
				$user->removeRole($item);	
			}			
			$user->addRole($role);
			$this->em->persist($user);
			$this->em->flush();
			return true;
		}
		return false;
	}
	
	public function changeBirao($data)
	{
		$userId = (int)$data['userId'];
		$biraoId = (int)$data['biraoId'];
		$user = $this->em->find('Entities\User', $userId);
		$birao = $this->em->find('Entities\Birao', $biraoId);
		if ($user instanceof Entities\User && $birao instanceof Entities\Birao) {			
			$user->setBirao($birao);
			$this->em->persist($user);
			$this->em->flush();
			return true;
		}
		return false;
	}
}