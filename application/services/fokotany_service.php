<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fokotany_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
	}
	
	public function add($data = array(), $type = 'olona')
	{
		if ($type == 'andraikitra') {
			if (array_key_exists('anarana', $data)) {
				$andraikitra = new Entities\Andraikitra();
				$andraikitra->setAnarana($data['anarana']);
				$this->em->persist($andraikitra);
				$this->em->flush();	
				if ($andraikitra->getId()) {
					return true;
				}
			}
			
		} else if ($type == 'birao') {
			$address = null;
			$phone = null;
			$birao = new Entities\Birao();
			if (array_key_exists('fokotany', $data)) {
				$fokotany = $this->em->find('Entities\Fokotany', (int)$data['fokotany']);
				$birao->setFokotany($fokotany);
			}
			if (array_key_exists('address', $data) && strlen($data['address'])) {
				$address = $data['address'];
				$contact = new Entities\Contact();
				$contact->setType(1);
				$contact->setValue($address);
				$this->em->persist($contact);
				$this->em->flush();	
				$birao->addContact($contact);
			}
			if (array_key_exists('phone', $data) && strlen($data['phone'])) {
				$phone = $data['phone'];
				$contact = new Entities\Contact();
				$contact->setType(2);
				$contact->setValue($phone);
				$this->em->persist($contact);
				$this->em->flush();	
				$birao->addContact($contact);
			}				
			$this->em->persist($birao);
			$this->em->flush();
			if ($birao->getId()) {
				return true;
			}
		}
		return false;
	}
	
	public function edit($id, $data = array(), $type = 'olona')
	{
		if ($type == 'andraikitra') {
			$andraikitra = $this->em->find('Entities\Andraikitra', (int)$id);
			if ($andraikitra instanceof Entities\Andraikitra && array_key_exists('anarana', $data)) {
				$andraikitra->setAnarana($data['anarana']);
				$this->em->persist($andraikitra);
				$this->em->flush();	
				if ($andraikitra->getId()) {
					return true;
				}
			}
		} else if ($type == 'birao') {
			$birao = $this->em->find('Entities\Birao', (int)$id);
			if ($birao instanceof Entities\Birao) {
				if (array_key_exists('fokotany', $data)) {
					$fokotany = $this->em->find('Entities\Fokotany', (int)$data['fokotany']);
					$birao->setFokotany($fokotany);
				}
				if (array_key_exists('address', $data) && strlen($data['address'])) {
					$address = $data['address'];
					$c = $this->em->getRepository('Entities\Contact')->findOneByValue($address);
					if (!$c instanceof Entities\Contact) {
						$contact = new Entities\Contact();
						$contact->setType(1);
						$contact->setValue($address);
						$this->em->persist($contact);
						$this->em->flush();	
						$birao->addContact($contact);	
					}
					
				}
				if (array_key_exists('phone', $data) && strlen($data['phone'])) {
					$phone = $data['phone'];
					$c = $this->em->getRepository('Entities\Contact')->findOneByValue($phone);
					if (!$c instanceof Entities\Contact) {
						$contact = new Entities\Contact();
						$contact->setType(2);
						$contact->setValue($phone);
						$this->em->persist($contact);
						$this->em->flush();	
						$birao->addContact($contact);	
					}
				}				
				$this->em->persist($birao);
				$this->em->flush();
				if ($birao->getId()) {
					return true;
				}
			}
		}
		return false;
	}
	
	public function delete($id, $type = 'olona')
	{
		if ($type == 'andraikitra') {
			$andraikitra = $this->em->find('Entities\Andraikitra', (int)$id);
			if ($andraikitra instanceof Entities\Andraikitra) {
				$this->em->remove($andraikitra);
				$this->em->flush();	
				return true;
			}
		}
		return false;
	}
	
	public function findById($id, $type = 'olona')
	{
		if ($type == 'andraikitra') {
			$andraikitra = $this->em->find('Entities\Andraikitra', (int)$id);
			$res = array();
			if ($andraikitra instanceof Entities\Andraikitra) {
				$res['id'] = $andraikitra->getId();
				$res['anarana'] = $andraikitra->getAnarana();
				return $res;
			}
		} else if ($type == 'birao') {
			$birao = $this->em->find('Entities\Birao', (int)$id);
			$res = array();
			if ($birao instanceof Entities\Birao) {
				$res['id'] = $birao->getId();
				$fkt = $birao->getFokotany();
				$res['fokotany'] = array('id' => $fkt->getId(), 'name' => $fkt->getName(), 'district' => $fkt->getCommune()->getDistrict()->getName());
				$contacts = $birao->getContacts();
				if (isset($contacts) && count($contacts)) {
					foreach ($contacts as $contact) {
						$type = $contact->getType();
						if ($type == 1) { // adresse
							$res['address'] = $contact->getValue();
						} else if ($type == 2) { // phone
							$res['phone'] = $contact->getValue();
						}
					} 
				}
				return $res;
			}
		}
		return false;
	}
	
	public function lister($type = 'olona', $limit = 10, $offset = 0)
	{
		$return = array();
		
		if ($type == 'birao') {
			$sql = 'SELECT b FROM Entities\Birao b';
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
			$biraos = $query->getResult();
				
			foreach ($biraos as $item) {
				$res = array();
				$res['id'] = $item->getId();
				$res['fokotany'] = $item->getFokotany()->getName();
				$contacts = $item->getContacts();
				if (isset($contacts) && count($contacts)) {
					foreach ($contacts as $contact) {
						$type = $contact->getType();
						if ($type == 1) { // adresse
							$res['address'] = $contact->getValue();
						} else if ($type == 2) { // phone
							$res['phone'] = $contact->getValue();
						}
					} 
				}
				array_push($return, $res);
			}			
		} else if ($type == 'andraikitra') {
			$sql = 'SELECT a FROM Entities\Andraikitra a';
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
			$andraikitras = $query->getResult();
			foreach ($andraikitras as $item) {
				$res = array();
				$res['id'] = $item->getId();
				$res['anarana'] = $item->getAnarana();
				array_push($return, $res);
			}
		}
		return $return;
	}
	
	public function getFokotanyStartingBy($query)
	{
		$list = $this->em->getRepository('Entities\Fokotany')->getFokotanyStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$commune = $item->getCommune();
 			$district = $item->getCommune()->getDistrict();
 			$districtName = $district->getName();
 			$res = array('id' => $item->getId(), 'fokotany' => $item->getName(), 'district' => $districtName);
 			array_push($result, $res);
 		}
 		return $result;
	}
}