<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 * @author raiza
 *
 */
class Image
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**	 
	 * @ORM\Column(type="string", length=10)
	 * @var string
	 */
	protected $dimension;
	
	/**
	 * @ORM\ManyToOne(targetEntity="File", inversedBy="images")
	 * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
	 * @var File
	 */
	protected $file;
	
	/**
     * 
     * @ORM\Column(type="string", length=255)
     * @var string
     */
	protected $name;
	
	public function getId()
    {
    	return $this->id;
    }
    
    public function setId($id)
    {
    	$this->id = $id;
    }
    
	public function getDimension()
    {
    	return $this->dimension;
    }
    
    public function setDimension($dimension)
    {
    	$this->dimension = $dimension;
    }
    
	public function getFile()
    {
    	return $this->file;
    }
    
    public function setFile($file)
    {
    	$this->file = $file;
    }
	
	public function getName()
    {
    	return $this->name;
    }
    
    public function setName($name)
    {
    	$this->name = $name;
    }
}