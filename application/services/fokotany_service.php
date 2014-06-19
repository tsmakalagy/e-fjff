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
		}
		return false;
	}
	
	public function addFokonolona($data)
	{
		$olona = new Entities\Olona();
		$karapokotany = '';
		if (array_key_exists('karapokotany', $data)) {
			$karapokotanyId = (int)$data['karapokotany'];
			$karapokotany = $this->em->find('Entities\Karapokotany', $karapokotanyId);
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
		if (array_key_exists('vady', $data) && $data['vady']) { // Create spouse
			$vady = new Entities\Olona();
			if ($karapokotany instanceof Entities\Karapokotany) {
				$vady->setKarapokotany($karapokotany);	
			}
			if (array_key_exists('vady-andraikitra', $data)) {
				$andraikitra = $this->em->find('Entities\Andraikitra', (int)$data['vady-andraikitra']);
				if ($andraikitra instanceof Entities\Andraikitra) {
					$vady->setAndraikitra($andraikitra);	
				}				
			}
			if (array_key_exists('vady-anarana', $data) && strlen($data['vady-anarana'])) {
				$anarana = $data['vady-anarana'];				
				$vady->setAnarana($anarana);
			}
			if (array_key_exists('vady-fanampiny', $data) && strlen($data['vady-fanampiny'])) {
				$fanampiny = $data['vady-fanampiny'];				
				$vady->setFanampiny($fanampiny);
			}
			if (array_key_exists('vady-nahaterahana', $data) && strlen($data['vady-nahaterahana'])) {
				$nahaterahana = $data['vady-nahaterahana'];				
				$vady->setDatenaissance(new \DateTime($nahaterahana));
			}
			if (array_key_exists('vady-cin', $data) && strlen($data['vady-cin'])) {
				$cin = $data['vady-cin'];				
				$vady->setCin($cin);
			}	
			if (array_key_exists('vady-date_cin', $data) && strlen($data['vady-date_cin'])) {
				$date_cin = $data['vady-date_cin'];				
				$vady->setDatecin(new \DateTime($date_cin));
			}
			if (array_key_exists('vady-sex', $data) && strlen($data['vady-sex'])) {
				$sex = $data['vady-sex'];				
				$vady->setSex($sex);
			}	
			if (array_key_exists('vady-asa', $data) && strlen($data['vady-asa'])) {
				$asa = $data['vady-asa'];				
				$vady->setAsa($asa);
			}	
			$vady->setVelona(1);
			$this->em->persist($vady);
			$this->em->flush();
			$olona->setSpouse($vady);
			$this->em->persist($olona);
			$this->em->flush();
			$vady->setSpouse($olona);
			$this->em->persist($vady);
			$this->em->flush();
		}
		if (array_key_exists('zanaka', $data) && $data['zanaka']) { // Create zanaka
			$isany = isset($data['isany']) ? $data['isany'] : 0;
			for ($i = 0; $i < $isany; $i++) {
				$zanaka = new Entities\Olona();
				if ($karapokotany instanceof Entities\Karapokotany) {
					$zanaka->setKarapokotany($karapokotany);	
				}
				if (array_key_exists('zanaka-andraikitra-'.$i, $data)) {
					$andraikitra = $this->em->find('Entities\Andraikitra', (int)$data['zanaka-andraikitra-'.$i]);
					if ($andraikitra instanceof Entities\Andraikitra) {
						$zanaka->setAndraikitra($andraikitra);	
					}				
				}
				if (array_key_exists('zanaka-anarana-'.$i, $data) && strlen($data['zanaka-anarana-'.$i])) {
					$anarana = $data['zanaka-anarana-'.$i];				
					$zanaka->setAnarana($anarana);
				}
				if (array_key_exists('zanaka-fanampiny-'.$i, $data) && strlen($data['zanaka-fanampiny-'.$i])) {
					$fanampiny = $data['zanaka-fanampiny-'.$i];				
					$zanaka->setFanampiny($fanampiny);
				}
				if (array_key_exists('zanaka-nahaterahana-'.$i, $data) && strlen($data['zanaka-nahaterahana-'.$i])) {
					$nahaterahana = $data['zanaka-nahaterahana-'.$i];				
					$zanaka->setDatenaissance(new \DateTime($nahaterahana));
				}
				if (array_key_exists('zanaka-cin-'.$i, $data) && strlen($data['zanaka-cin-'.$i])) {
					$cin = $data['zanaka-cin-'.$i];				
					$zanaka->setCin($cin);
				}	
				if (array_key_exists('zanaka-date_cin-'.$i, $data) && strlen($data['zanaka-date_cin-'.$i])) {
					$date_cin = $data['zanaka-date_cin-'.$i];				
					$zanaka->setDatecin(new \DateTime($date_cin));
				}
				if (array_key_exists('zanaka-sex-'.$i, $data) && strlen($data['zanaka-sex-'.$i])) {
					$sex = $data['zanaka-sex-'.$i];				
					$zanaka->setSex($sex);
				}	
				if (array_key_exists('zanaka-asa-'.$i, $data) && strlen($data['zanaka-asa-'.$i])) {
					$asa = $data['zanaka-asa-'.$i];				
					$zanaka->setAsa($asa);
				}	
				$zanaka->setVelona(1);
				$this->em->persist($zanaka);
				$olona->addChild($zanaka);
				$this->em->persist($olona);
				
			}
		}	
		$this->em->flush();	
		if (array_key_exists('lohany', $data) && $data['lohany'] == 1) {
			$karapokotany->setLohampianakaviana($olona);
			$this->em->persist($karapokotany);	
		} 		
		$this->em->flush();
		
		if ($olona->getId()) {
			return true;
		}
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
			if ($type == 'karapokotany')  {
				foreach ($entity->getOlonas() as $item) {
					$this->em->remove($item);
					$this->em->flush();
				}
			} else if ($type == 'birao') {
				foreach ($entity->getKarapokotanies() as $item) {
					$this->em->remove($item);
					$this->em->flush();
				}
			}
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
			$biraoId = get_session_value('birao_id');
			if (is_numeric($biraoId)) {
				$sql = 'SELECT k FROM Entities\Karapokotany k WHERE k.birao = ?1 ORDER BY k.inscription ASC';
				
			} else {
				$sql = 'SELECT k FROM Entities\Karapokotany k ORDER BY k.inscription ASC';
			}
			
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
			if (is_numeric($biraoId)) {
				$query->setParameter(1, $biraoId);
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
		} else if ($type == 'olona') {
			$loc = setlocale(LC_TIME, 'fr_FR.UTF-8'); // Locale Francais pour la date
			$biraoId = get_session_value('birao_id');
			if (is_numeric($biraoId)) {
				$sql = 'SELECT o FROM Entities\Olona o JOIN o.karapokotany k WHERE k.birao = ?1 ORDER BY k.id ASC';
				
			} else {
				$sql = 'SELECT o FROM Entities\Olona o JOIN o.karapokotany k ORDER BY k.id ASC';
			}
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
			if (is_numeric($biraoId)) {
				$query->setParameter(1, $biraoId);
			}
			$olonas = $query->getResult();
			foreach ($olonas as $item) {
				$res = array();
				$res['id'] = $item->getId();
				$res['name'] = strtoupper(strtolower($item->getAnarana())) . ' ' . ucfirst(strtolower($item->getFanampiny()));
				$datenaissance = $item->getDatenaissance();
				$now = new \DateTime();
				if ($datenaissance instanceof \DateTime) {
					$interval = $now->diff($datenaissance);
					$res['age'] = $interval->y;	
				} else {
					$res['age'] = '-';
				}
				$res['cin'] = $item->getCin();
				$dateCin = $item->getDatecin();
				$res['datecin'] = isset($dateCin) ? strftime('%d %B %Y', $dateCin->getTimeStamp()) : '';
				$res['andraikitra'] = $item->getAndraikitra()->getAnarana();
				$res['asa'] = $item->getAsa();
				$res['adress'] = $item->getKarapokotany()->getAdiresy();
				$parents = $item->getParents();
				if (isset($parents) && count($parents)) {
					foreach ($parents as $parent) {
						$parentName = strtoupper(strtolower($parent->getAnarana())) . ' ' . ucfirst(strtolower($parent->getFanampiny()));
						$parentSex = $parent->getSex();
						$spouse = $parent->getSpouse();
						if ($parentSex == 1) {
							$res['dad'] = $parentName;	
							if ($spouse instanceof Entities\Olona) {
								$res['mom'] = strtoupper(strtolower($spouse->getAnarana())) . ' ' . ucfirst(strtolower($spouse->getFanampiny()));
							}						
						} else {
							$res['mom'] = $parentName;
							if ($spouse instanceof Entities\Olona) {
								$res['dad'] = strtoupper(strtolower($spouse->getAnarana())) . ' ' . ucfirst(strtolower($spouse->getFanampiny()));
							}						
						}
					}
				}
				$res['karapokotany'] = $item->getKarapokotany()->getId();
				$sex = $item->getSex();				
				$res['sex'] = ($sex == 1) ? 'Lahy' : 'Vavy';
				array_push($return, $res);
			}
		}
		return $return;
	}
	
	public function detailKarapokotany($karatraId)
	{
		$sql = 'SELECT o FROM Entities\Olona o WHERE o.karapokotany = ?1 ORDER BY o.datecin DESC';
		$query = $this->em->createQuery($sql);
		$query->setParameter(1, $karatraId);
		$olonas = $query->getResult();
		$return = array();
		foreach ($olonas as $item) {
			$res = array();
			$res['id'] = $item->getId();
			$res['name'] = strtoupper(strtolower($item->getAnarana())) . ' ' . ucfirst(strtolower($item->getFanampiny()));
			$datenaissance = $item->getDatenaissance();
			$now = new \DateTime();
			if ($datenaissance instanceof \DateTime) {
				$interval = $now->diff($datenaissance);
				$res['age'] = $interval->y;	
			} else {
				$res['age'] = '-';
			}
			$res['cin'] = $item->getCin();
			$dateCin = $item->getDatecin();
			$res['datecin'] = isset($dateCin) ? strftime('%d %B %Y', $dateCin->getTimeStamp()) : '';
			$res['andraikitra'] = $item->getAndraikitra()->getAnarana();
			$res['asa'] = $item->getAsa();
			$res['adress'] = $item->getKarapokotany()->getAdiresy();
			$parents = $item->getParents();
			$children = $item->getChildren();
			$spouse = $item->getSpouse();
			if (isset($parents) && count($parents)) {
				$res['type'] = 'Zanaka';
			} else if (isset($children) || isset($spouse)) {
				if ($item->getSex() == 1) {
					$res['type'] = 'Ray';	
				} else {
					$res['type'] = 'Reny';
				}
				
			}
			if ($item->isLohampianakaviana()) {
				$res['is_lohany'] = true;
			}
			$res['karapokotany'] = $item->getKarapokotany()->getId();
			$sex = $item->getSex();				
			$res['sex'] = ($sex == 1) ? 'Lahy' : 'Vavy';
			array_push($return, $res);
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