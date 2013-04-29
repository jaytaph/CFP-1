<?php

namespace Cfp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BiographyUrl
 *
 * @ORM\Table(name="biography_url")
 * @ORM\Entity
 */
class BiographyUrl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="Biography")
     */
    private $biography;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BiographyUrl
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BiographyUrl
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set biographyId
     *
     * @param integer $biographyId
     * @return BiographyUrl
     */
    public function setBiographyId($biographyId)
    {
        $this->biographyId = $biographyId;
    
        return $this;
    }

    /**
     * Get biographyId
     *
     * @return integer 
     */
    public function getBiographyId()
    {
        return $this->biographyId;
    }

    /**
     * Set biography
     *
     * @param \Cfp\UserBundle\Entity\Biography $biography
     * @return BiographyUrl
     */
    public function setBiography(\Cfp\UserBundle\Entity\Biography $biography = null)
    {
        $this->biography = $biography;
    
        return $this;
    }

    /**
     * Get biography
     *
     * @return \Cfp\UserBundle\Entity\Biography 
     */
    public function getBiography()
    {
        return $this->biography;
    }
}