<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library( array('doctrine', 'phpass') );
		$this->em = $CI->doctrine->em;	
	}
	
	public function register( $data )
	{
		$role = $this->em->getRepository('Entities\Role')->find(2); // simple utilisateur
		
		$name = isset($data['name']) ? $data['name'] : '';
		$email = $data['email'];
		$password = $this->phpass->hash( $data['password'] );
		
		$user = new Entities\User();
		$user->setName($name);
		$user->setEmail($email);
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
		$user->setLastLogout(new \DateTime());
		return $this->save($user);
	}
	
	public function findById($id)
	{
		return $this->em->getRepository('Entities\User')->find($id);
	}
}