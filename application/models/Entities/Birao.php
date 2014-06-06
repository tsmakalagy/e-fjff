<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity(repositoryClass="Repositories\BiraoRepository")
 * @ORM\Table(name="birao")
 * @author raiza
 *
 */
class Birao
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * @ORM\OneToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="fokotany_id", referencedColumnName="id")
     **/
	protected $fokotany;
	
	/**
     * @ORM\ManyToMany(targetEntity="Contact")
     * @ORM\JoinTable(name="birao_contact",
     *      joinColumns={@ORM\JoinColumn(name="birao_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="contact_id", referencedColumnName="id", unique=true)}
     *      )
     **/
	protected $contacts;
	
	/**
     * @ORM\ManyToMany(targetEntity="Olona")
     * @ORM\JoinTable(name="birao_member",
     *      joinColumns={@ORM\JoinColumn(name="birao_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="olona_id", referencedColumnName="fk_ol_id", unique=true)}
     *      )
     **/
	protected $members;
	
	/**
     * @ORM\OneToMany(targetEntity="Karapokotany", mappedBy="birao")
     * @var \Doctrine\Common\Collections\Collection
     */
	protected $karapokotanies;
	
	public function __construct()
    {
    	$this->contacts = new Collection();
    	$this->karapokotanies = new Collection();
    	$this->members = new Collection();
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
	
	public function getFokotany()
	{
		return $this->fokotany;
	}
	
	public function setFokotany($fokotany)
	{
		$this->fokotany = $fokotany;
		return $this;
	}
    
	public function getContacts()
    {
    	return $this->contacts;
    }
    
    public function addContact(Contact $contact)
    {
    	$this->contacts[] = $contact;
    	return $this;
    }
    
	public function addContacts(Collection $contacts)
    {
        foreach ($contacts as $contact) {
            $this->contacts->add($contact);
        }
        return $this;
    }

    public function removeContacts(Collection $contacts)
    {
        foreach ($contacts as $contact) {
            $this->contacts->removeElement($contact);
        }
        return $this;
    }
    
	public function removeContact(Contact $contact)
    {
        $this->contacts->removeElement($contact);
        return $this;
    }
    
	public function getMembers()
    {
    	return $this->members;
    }
    
    public function addMember(Olona $member)
    {
    	$this->members[] = $member;
    	return $this;
    }
    
	public function addMembers(Collection $members)
    {
        foreach ($members as $member) {
            $this->members->add($member);
        }
        return $this;
    }

    public function removeMembers(Collection $members)
    {
        foreach ($members as $member) {
            $this->members->removeElement($member);
        }
        return $this;
    }
    
	public function getKarapokotanies()
    {
    	return $this->karapokotanies;
    }
    
    public function addKarapokotany(Karapokotany $karapokotany)
    {
    	$this->karapokotanies[] = $karapokotany;
    	return $this;
    }
    
	public function addKarapokotanies(Collection $karapokotanies)
    {
        foreach ($karapokotanies as $karapokotany) {
            $this->karapokotanies->add($karapokotany);
        }
        return $this;
    }

    public function removeKarapokotanies(Collection $karapokotanies)
    {
        foreach ($karapokotanies as $karapokotany) {
            $this->karapokotanies->removeElement($karapokotany);
        }
        return $this;
    }
    
}
	
	