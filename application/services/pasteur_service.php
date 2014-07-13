<?php use Entities\Poste;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasteur_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
		setlocale(LC_ALL, 'fr_FR');
	}
	
	public function add($data)
	{
		$pasteur = new Entities\Personne();		
		if (array_key_exists('pasteurFileId', $data) && $data['pasteurFileId']) {
			$fileId = (int)$data['pasteurFileId'];
			$file = $this->em->find('Entities\File', $fileId);
			if ($file instanceof Entities\File) {
				$pasteur->setFile($file);
			}
		}		
		if (array_key_exists('nom', $data) && strlen($data['nom'])) {
			$nom = $data['nom'];				
			$pasteur->setNom($nom);
		}
		if (array_key_exists('prenom', $data) && strlen($data['prenom'])) {
			$prenom = $data['prenom'];				
			$pasteur->setPrenom($prenom);
		}
		if (array_key_exists('datenaissance', $data) && strlen($data['datenaissance'])) {
			$datenaissance = $data['datenaissance'];				
			$pasteur->setDatenaissance(new \DateTime($datenaissance));
		}
		if (array_key_exists('sexe', $data) && $data['sexe']) {
			$sexe = $data['sexe'];				
			$pasteur->setSexe($sexe);
		}
		if (array_key_exists('statut', $data) && $data['statut']) {
			$statut = $data['statut'];				
			$pasteur->setStatut($statut);
		}		
		if (array_key_exists('telephone', $data) && strlen($data['telephone'])) {
			$telephone = $data['telephone'];				
			$pasteur->setTelephone($telephone);
		}
		if (array_key_exists('occupation', $data) && strlen($data['occupation'])) {
			$occupation = $data['occupation'];				
			$pasteur->setOccupation($occupation);
		}
		if (array_key_exists('datesab', $data) && strlen($data['datesab'])) {
			$datesab = $data['datesab'];				
			$pasteur->setDatesab(new \DateTime($datesab));
		}
		if (array_key_exists('dateosotra', $data) && strlen($data['dateosotra'])) {
			$dateosotra = $data['dateosotra'];				
			$pasteur->setDateosotra(new \DateTime($dateosotra));
		}
		
		$this->em->persist($pasteur);
		$this->em->flush();
		
		if (array_key_exists('current-poste', $data) && $data['current-poste']
			&& array_key_exists('current-debut', $data) && strlen($data['current-debut'])) {
			$egliseId = (int)$data['current-poste'];			
			$eglise = $this->em->find('Entities\Eglise', $egliseId);
			$currentDebut = $data['current-debut'];
			if ($eglise instanceof Entities\Eglise) {
				$currentPoste = new Entities\Poste();
				$currentPoste->setEglise($eglise);
				$currentPoste->setDebut(new \DateTime($currentDebut));
				$currentPoste->setCurrent(1);
				$currentPoste->setPasteur($pasteur);
				$this->em->persist($currentPoste);
				$this->em->flush();							
			}
		}
		if (array_key_exists('last-poste', $data) && count($data['last-poste'])
			&& array_key_exists('last-debut', $data) && count($data['last-debut'])) {
			$lastPostes = $data['last-poste'];
			$lastDebut = $data['last-debut'];
			foreach ($lastPostes as $key => $lastPoste) {
				$egliseId = (int)$lastPoste;
				$eglise = $this->em->find('Entities\Eglise', $egliseId);
				if ($eglise instanceof Entities\Eglise) {					
					$dates = explode(" - ", $lastDebut[$key]);
					$lastPoste = new Entities\Poste();
					$lastPoste->setEglise($eglise);
					$lastPoste->setDebut(new \DateTime($dates[0]));
					$lastPoste->setFin(new \DateTime($dates[1]));
					$lastPoste->setPasteur($pasteur);
					$this->em->persist($lastPoste);
					$this->em->flush();			
				}
			}
		}
		
		
		if (array_key_exists('vady', $data) && $data['vady']) { // Create spouse
			$vady = new Entities\Personne();
			if (array_key_exists('vadyFileId', $data) && $data['vadyFileId']) {
				$fileId = (int)$data['vadyFileId'];
				$file = $this->em->find('Entities\File', $fileId);
				if ($file instanceof Entities\File) {
					$vady->setFile($file);
				}
			}		
			if (array_key_exists('vady-nom', $data) && strlen($data['vady-nom'])) {
				$nom = $data['vady-nom'];				
				$vady->setNom($nom);
			}
			if (array_key_exists('vady-prenom', $data) && strlen($data['vady-prenom'])) {
				$prenom = $data['vady-prenom'];				
				$vady->setPrenom($prenom);
			}
			if (array_key_exists('vady-datenaissance', $data) && strlen($data['vady-datenaissance'])) {
				$datenaissance = $data['vady-datenaissance'];				
				$vady->setDatenaissance(new \DateTime($datenaissance));
			}
			if (array_key_exists('vady-sexe', $data) && $data['vady-sexe']) {
				$sexe = $data['vady-sexe'];				
				$vady->setSexe($sexe);
			}	
			if (array_key_exists('vady-telephone', $data) && strlen($data['vady-telephone'])) {
				$telephone = $data['vady-telephone'];				
				$vady->setTelephone($telephone);
			}
			if (array_key_exists('vady-occupation', $data) && strlen($data['vady-occupation'])) {
				$occupation = $data['vady-occupation'];				
				$vady->setOccupation($occupation);
			}
			if (array_key_exists('vady-datesab', $data) && strlen($data['vady-datesab'])) {
				$datesab = $data['vady-datesab'];				
				$vady->setDatesab(new \DateTime($datesab));
			}
			if (array_key_exists('vady-dateosotra', $data) && strlen($data['vady-dateosotra'])) {
				$dateosotra = $data['vady-dateosotra'];				
				$vady->setDateosotra(new \DateTime($dateosotra));
			}
			$vady->setStatut(1);
			$this->em->persist($vady);
			$this->em->flush();
			$pasteur->setConjoint($vady);
			$this->em->persist($pasteur);
			$this->em->flush();
			$vady->setConjoint($pasteur);
			$this->em->persist($vady);
			$this->em->flush();
		}
		
		if (array_key_exists('zanaka', $data) && $data['zanaka']) { // Create zanaka
			$isany = isset($data['isany']) ? $data['isany'] : 0;
			for ($i = 0; $i < $isany; $i++) {
				$zanaka = new Entities\Enfant();
				if (array_key_exists('zanaka-nom-'.$i, $data) && strlen($data['zanaka-nom-'.$i])) {
					$nom = $data['zanaka-nom-'.$i];				
					$zanaka->setNom($nom);
				}
				if (array_key_exists('zanaka-prenom-'.$i, $data) && strlen($data['zanaka-prenom-'.$i])) {
					$prenom = $data['zanaka-prenom-'.$i];				
					$zanaka->setPrenom($prenom);
				}
				if (array_key_exists('zanaka-datenaissance-'.$i, $data) && strlen($data['zanaka-datenaissance-'.$i])) {
					$datenaissance = $data['zanaka-datenaissance-'.$i];				
					$zanaka->setDatenaissance(new \DateTime($datenaissance));
				}
				if (array_key_exists('zanaka-sexe-'.$i, $data) && $data['zanaka-sexe-'.$i]) {
					$sexe = $data['zanaka-sexe-'.$i];				
					$zanaka->setSexe($sexe);
				}
				if (array_key_exists('zanaka-classe-'.$i, $data) && strlen($data['zanaka-classe-'.$i])) {
					$classe = $data['zanaka-classe-'.$i];				
					$zanaka->setClasse($classe);
				}
				$this->em->persist($zanaka);
				$pasteur->addEnfant($zanaka);
				$this->em->persist($pasteur);
			}
		}
		$this->em->flush();	
		if ($pasteur->getId()) {
			return true;
		}
		return false;
	}	
	
	public function listPasteur()
	{
		$loc = setlocale(LC_TIME, 'fr_FR.UTF-8'); // Locale Francais pour la date
		$sql = 'SELECT p FROM Entities\Personne p ORDER BY p.datesab ASC';
		$query = $this->em->createQuery($sql);
		$return = array();
		$pasteurs = $query->getResult();
		foreach ($pasteurs as $item) {			
			array_push($return, $this->personneObjectToArray($item));
		}
		return $return;
	}
	
	public function getPasteurById($id)
	{	
		$pasteur = $this->em->getRepository('Entities\Personne')->find($id);
		if ($pasteur instanceof Entities\Personne) {
			return $pasteur;
		}
		return false;
	}
	
	public function getPasteurArrayById($id)
	{	
		$pasteur = $this->em->getRepository('Entities\Personne')->find($id);
		if ($pasteur instanceof Entities\Personne) {
			return $this->personneObjectToArray($pasteur);
		}
		return false;
	}
	
	public function getConjointPasteurArrayById($id)
	{	
		$pasteur = $this->em->getRepository('Entities\Personne')->find($id);
		if ($pasteur instanceof Entities\Personne) {
			$conjoint = $pasteur->getConjoint();
			if ($conjoint instanceof Entities\Personne) {
				return $this->personneObjectToArray($conjoint);	
			}			
		}
		return false;
	}
	
	public function getEnfantPasteurArrayById($id)
	{	
		$pasteur = $this->em->getRepository('Entities\Personne')->find($id);
		$return = array();
		if ($pasteur instanceof Entities\Personne) {
			$enfants = $pasteur->getEnfants();
			if (isset($enfants) && count($enfants)) {
				$i = 1;
				foreach ($enfants as $enfant) {
					array_push($return, $this->enfantObjectToArray($enfant, $i++));
				}
				return $return;
			} else {
				$conjoint = $pasteur->getConjoint();
				if ($conjoint instanceof Entities\Personne) {
					$enfants = $conjoint->getEnfants();
					if (isset($enfants) && count($enfants)) {
						$i = 1;
						foreach ($enfants as $enfant) {
							array_push($return, $this->enfantObjectToArray($enfant, $i++));
						}
						return $return;
					}
				}
			}			
		}
		return false;
	}
	
	public function personneObjectToArray($object)
	{
		$res = array();
		$res['id'] = $object->getId();
		$res['name'] = strtoupper(strtolower($object->getNom())) . ' ' . ucfirst(strtolower($object->getPrenom()));
		$datenaissance = $object->getDatenaissance();
		$now = new \DateTime();
		if ($datenaissance instanceof \DateTime) {
			$interval = $now->diff($datenaissance);
			$res['age'] = strval($interval->y);	
		} else {
			$res['age'] = '-';
		}
		$occupation = $object->getOccupation();
		switch ($occupation) {
			case "1":
				$res['occupation'] = "Sekoly Ara-Baiboly";
				break;
			case "2":
				$res['occupation'] = "Mpitandrina";
				break;
			default:
				$res['occupation'] = "Hafa";
				break;
		}
		$postes = $object->getPostes();
		$res['last_poste'] = array();
		foreach ($postes as $poste) {
			$isCurrent = $poste->getCurrent();
			if ($isCurrent == 1) {
				$res['current_poste'] = $poste->getEglise()->getNom();
				$datedebut = $poste->getDebut();
				$res['current_debut'] = isset($datedebut) ? $this->displayDate($datedebut->getTimeStamp()) : '';
			} else {
				$datedebut = $poste->getDebut();
				$d = isset($datedebut) ? $this->displayDate($datedebut->getTimeStamp()) : '';
				$datefin = $poste->getFin();
				$f = isset($datefin) ? $this->displayDate($datefin->getTimeStamp()) : '';
				array_push($res['last_poste'], array(
					'eglise' => $poste->getEglise()->getNom(),
					'date' => $d . ' - ' . $f
				));		
			}
		}
		$res['sexe'] = ($object->getSexe() == 1) ? 'Lahy' : 'Vavy';
		$datesab = $object->getDatesab();
		$res['datesab'] = isset($datesab) ? $this->displayDate($datesab->getTimeStamp()) : '';
		$dateosotra = $object->getDateosotra();
		$res['dateosotra'] = isset($dateosotra) ? $this->displayDate($dateosotra->getTimeStamp()) : '';	
		$res['phone'] = $object->getTelephone();
		$conjoint = $object->getConjoint();
		if ($conjoint instanceof Entities\Personne) {
			$res['isVady'] = true;
		} else {
			$res['isVady'] = false;
		}
		$enfants = $object->getEnfants();
		if (isset($enfants) && count($enfants)) {
			$res['isZanaka'] = true;
		} else {
			if ($res['isVady']) {
				$enfants = $conjoint->getEnfants();
				if (isset($enfants) && count($enfants)) {
					$res['isZanaka'] = true;
				} else {
					$res['isZanaka'] = false;
				}	
			} else {
				$res['isZanaka'] = false;
			}			
		}
		$res['imgUrl'] = base_url('assets' . relative_image_path('md', $res['id']));
		return $res;
	}
	
	public function enfantObjectToArray($object, $num)
	{
		$res = array();
		$res['num'] = $num;
		$res['id'] = $object->getId();
		$res['name'] = strtoupper(strtolower($object->getNom())) . ' ' . ucfirst(strtolower($object->getPrenom()));
		$datenaissance = $object->getDatenaissance();
		$now = new \DateTime();
		if ($datenaissance instanceof \DateTime) {
			$interval = $now->diff($datenaissance);
			$res['age'] = strval($interval->y);	
		} else {
			$res['age'] = '-';
		}
		$res['sexe'] = ($object->getSexe() == 1) ? 'Lahy' : 'Vavy';
		$res['classe'] = $object->getClasse();
		return $res;
	}
	
	public function getImageRelativePath($dimension, $id)
	{
		$pasteur = $this->getPasteurById($id);
		if ($pasteur) {
			$file = $pasteur->getFile();
			if ($file instanceof Entities\File) {
				return $file->getImageRelativePathByDimension($dimension);
			} else {
				$f = $this->em->getRepository('Entities\File')->getDefaultFile();
				if ($f instanceof Entities\File) {
					return $f->getImageRelativePathByDimension($dimension);
				}
			}
		}
		return false;
	}
	
	private function displayDate($date)
	{
		return utf8_encode(ucwords(strftime('%d %B %Y', $date)));
	}
	
}