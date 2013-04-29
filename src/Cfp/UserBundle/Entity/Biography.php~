<?php

namespace Cfp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biography
 *
 * @ORM\Table(name="biography")
 * @ORM\Entity
 */
class Biography
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
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text", nullable=false)
     */
    private $biography;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_added", type="datetime", nullable=false)
     */
    private $dtAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_updated", type="datetime", nullable=false)
     */
    private $dtUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;


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
     * Set description
     *
     * @param string $description
     * @return Biography
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return Biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    
        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set dtAdded
     *
     * @param \DateTime $dtAdded
     * @return Biography
     */
    public function setDtAdded($dtAdded)
    {
        $this->dtAdded = $dtAdded;
    
        return $this;
    }

    /**
     * Get dtAdded
     *
     * @return \DateTime 
     */
    public function getDtAdded()
    {
        return $this->dtAdded;
    }

    /**
     * Set dtUpdated
     *
     * @param \DateTime $dtUpdated
     * @return Biography
     */
    public function setDtUpdated($dtUpdated)
    {
        $this->dtUpdated = $dtUpdated;
    
        return $this;
    }

    /**
     * Get dtUpdated
     *
     * @return \DateTime 
     */
    public function getDtUpdated()
    {
        return $this->dtUpdated;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Biography
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set user
     *
     * @param \Cfp\UserBundle\Entity\User $user
     * @return Biography
     */
    public function setUser(\Cfp\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Cfp\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}