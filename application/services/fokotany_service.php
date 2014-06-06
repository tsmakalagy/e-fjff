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
	
	public function add($data = array(), $type)
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
		} else if ($type == 'karapokotany') {
			$karapokotany = new Entities\Karapokotany();
			if (array_key_exists('birao', $data)) {
				$birao = $this->em->find('Entities\Birao', (int)$data['birao']);
				if ($birao instanceof Entities\Birao) {
					$karapokotany->setBirao($birao);	
				}				
			}
			if (array_key_exists('niaviana', $data)) {
				$niaviana = $this->em->find('Entities\Fokotany', (int)$data['niaviana']);
				if ($niaviana instanceof Entities\Fokotany) {
					$karapokotany->setNiaviana($niaviana);	
				}				
			}
			if (array_key_exists('laharana', $data) && strlen($data['laharana'])) {
				$laharana = $data['laharana'];				
				$karapokotany->setLaharana($laharana);
			}
			if (array_key_exists('nahatongavana', $data) && strlen($data['nahatongavana'])) {
				$nahatongavana = $data['nahatongavana'];				
				$karapokotany->setNahatongavana(new \DateTime($nahatongavana));
			}
			if (array_key_exists('address', $data) && strlen($data['address'])) {
				$address = $data['address'];				
				$karapokotany->setAdiresy($address);
			}	
			if (array_key_exists('faritra', $data) && strlen($data['faritra'])) {
				$faritra = $data['faritra'];				
				$karapokotany->setFaritra($faritra);
			}	
			$karapokotany->setInscription(new \DateTime());
			$this->em->persist($karapokotany);
			$this->em->flush();
			if ($karapokotany->getId()) {
				return true;
			}
		} else if ($type == 'olona') {
			$olona = new Entities\Olona();
			if (array_key_exists('karapokotany', $data)) {
				$karapokotany = $this->em->find('Entities\Karapokotany', (int)$data['karapokotany']);
				if ($karapokotany instanceof Entities\Karapokotany) {
					$olona->setKarapokotany($karapokotany);	
				}				
			}
			if (array_key_exists('andraikitra', $data)) {
				$andraikitra = $this->em->find('Entities\Andraikitra', (int)$data['andraikitra']);
				if ($andraikitra instanceof Entities\Andraikitra) {
					$olona->setAndraikitra($andraikitra);	
				}				
			}
			if (array_key_exists('anarana', $data) && strlen($data['anarana'])) {
				$anarana = $data['anarana'];				
				$olona->setAnarana($anarana);
			}
			if (array_key_exists('fanampiny', $data) && strlen($data['fanampiny'])) {
				$fanampiny = $data['fanampiny'];				
				$olona->setFanampiny($fanampiny);
			}
			if (array_key_exists('nahaterahana', $data) && strlen($data['nahaterahana'])) {
				$nahaterahana = $data['nahaterahana'];				
				$olona->setDatenaissance(new \DateTime($nahaterahana));
			}
			if (array_key_exists('cin', $data) && strlen($data['cin'])) {
				$cin = $data['cin'];				
				$olona->setCin($cin);
			}	
			if (array_key_exists('date_cin', $data) && strlen($data['date_cin'])) {
				$date_cin = $data['date_cin'];				
				$olona->setDatecin(new \DateTime($date_cin));
			}
			if (array_key_exists('sex', $data) && strlen($data['sex'])) {
				$sex = $data['sex'];				
				$olona->setSex($sex);
			}	
			if (array_key_exists('asa', $data) && strlen($data['asa'])) {
				$asa = $data['asa'];				
				$olona->setAsa($asa);
			}	
			$olona->setVelona(1);
			$this->em->persist($olona);
			$this->em->flush();
			if ($olona->getId()) {
				return true;
			}
		}
		return false;
	}
	
	public function edit($id, $data = array(), $type)
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
						$oldContacts = $birao->getContacts();
						foreach ($oldContacts as $oc) {
							$type = $oc->getType();
							if ($type === 1) {
								$birao->removeContact($oc);
								$this->em->remove($oc);
							}
						}
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
						$oldContacts = $birao->getContacts();
						foreach ($oldContacts as $oc) {
							$type = $oc->getType();
							if ($type === 2) {
								$birao->removeContact($oc);
								$this->em->remove($oc);
							}
						}
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
		} else if ($type == 'karapokotany') {
			$karapokotany = $this->em->find('Entities\Karapokotany', (int)$id);
			if ($karapokotany instanceof Entities\Karapokotany) {
				
				if (array_key_exists('birao', $data)) {
					$birao = $this->em->find('Entities\Birao', (int)$data['birao']);
					if ($birao instanceof Entities\Birao) {
						$karapokotany->setBirao($birao);	
					}				
				}
				if (array_key_exists('niaviana', $data)) {
					$niaviana = $this->em->find('Entities\Fokotany', (int)$data['niaviana']);
					if ($niaviana instanceof Entities\Fokotany) {
						$karapokotany->setNiaviana($niaviana);	
					}				
				}
				if (array_key_exists('laharana', $data) && strlen($data['laharana'])) {
					$laharana = $data['laharana'];				
					$karapokotany->setLaharana($laharana);
				}
				if (array_key_exists('nahatongavana', $data) && strlen($data['nahatongavana'])) {
					$nahatongavana = $data['nahatongavana'];				
					$karapokotany->setNahatongavana(new \DateTime($nahatongavana));
				}
				if (array_key_exists('address', $data) && strlen($data['address'])) {
					$address = $data['address'];				
					$karapokotany->setAdiresy($address);
				}	
				if (array_key_exists('faritra', $data) && strlen($data['faritra'])) {
					$faritra = $data['faritra'];				
					$karapokotany->setFaritra($faritra);
				}
				$this->em->persist($karapokotany);
				$this->em->flush();
				if ($karapokotany->getId()) {
					return true;
				}
			}			
		}
		return false;
	}
	
	public function delete($id, $type)
	{
		$entityClass = 'Entities\\' . ucfirst($type);
		$entity = $this->em->find($entityClass, (int)$id);
		if ($entity instanceof $entityClass) {
			$this->em->remove($entity);
			$this->em->flush();
			return true;
		}
		return false;
	}
	
	public function findById($id, $type)
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
		} else if ($type == 'karapokotany') {
			$karapokotany = $this->em->find('Entities\Karapokotany', (int)$id);
			$res = array();
			if ($karapokotany instanceof Entities\Karapokotany) {
				$res['id'] = $karapokotany->getId();
				$res['birao'] = array('id' => $karapokotany->getBirao()->getId(), 'name' => $karapokotany->getBirao()->getFokotany()->getName());
				$res['niaviana'] = array(
					'id' => $karapokotany->getNiaviana()->getId(), 
					'name' => $karapokotany->getNiaviana()->getName(),
					'district' => $karapokotany->getNiaviana()->getCommune()->getDistrict()->getName()
				);
				$res['laharana'] = $karapokotany->getLaharana();
				$res['faritra'] = $karapokotany->getFaritra();
				$res['nahatongavana'] = $karapokotany->getNahatongavana()->format('d/m/Y');
				$res['adiresy'] = $karapokotany->getAdiresy();
				return $res;
			}
		}
		return false;
	}
	
	public function lister($type, $limit = 10, $offset = 0)
	{
		$return = array();
		
		if ($type == 'birao') {
			$sql = 'SELECT b FROM Entities\Birao b ORDER BY b.id ASC';
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
			$sql = 'SELECT a FROM Entities\Andraikitra a ORDER BY a.id ASC';
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
		} else if ($type == 'karapokotany') {
			$loc = setlocale(LC_TIME, 'fr_FR.UTF-8'); // Locale Francais pour la date
			$sql = 'SELECT k FROM Entities\Karapokotany k ORDER BY k.inscription ASC';
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
			$karapokotanies = $query->getResult();
			foreach ($karapokotanies as $item) {
				$res = array();
				$res['id'] = $item->getId();
				$res['birao'] = array('id' => $item->getBirao()->getId(), 'name' => $item->getBirao()->getFokotany()->getName());
				$res['niaviana'] = array('id' => $item->getNiaviana()->getId(), 'name' => $item->getNiaviana()->getName());
				$laharana = $item->getLaharana();
				$res['laharana'] = isset($laharana) ? $laharana : ' - ';
				$faritra = $item->getFaritra();
				$res['faritra'] = isset($faritra) ? $faritra : ' - ';
				$nahatongavana = $item->getNahatongavana();
				$res['nahatongavana'] = isset($nahatongavana) ? strftime('%d %B %Y', $nahatongavana->getTimeStamp()) : ' - ';
				$inscription = $item->getInscription();
				$res['inscription'] = isset($inscription) ? date_format($inscription, 'd-F-Y') : ' - ';
				$adiresy = $item->getAdiresy();
				$res['adiresy'] = isset($adiresy) ? $adiresy : ' - ';
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
	
	public function getBiraoStartingBy($query)
	{
		$list = $this->em->getRepository('Entities\Birao')->getBiraoStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$res = array('id' => $item->getId(), 'fokotany' => $item->getFokotany()->getName());
 			array_push($result, $res);
 		}
 		return $result;
	}
	
	public function listKarapokotanyByBiraoId($biraoId)
	{
		$sql = 'SELECT k FROM Entities\Karapokotany k WHERE k.birao = ?1';
		$query = $this->em->createQuery($sql);
		$query->setParameter(1, $biraoId);
		return $query->getResult();		
	}
	
	public function listAndraikitra()
	{
		return $this->em->getRepository('Entities\Andraikitra')->findAll();
	}
}