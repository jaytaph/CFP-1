<?php

namespace Cfp\ConferenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity
 */
class Application
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
     * @var \DateTime
     *
     * @ORM\Column(name="dt_created", type="datetime", nullable=false)
     */
    private $dtCreated;

    /**
     * @ORM\ManyToOne(targetEntity="Conference")
     */
    private $conference;

    /**
     * @ORM\ManyToOne(targetEntity="Cfp\UserBundle\Entity\Biography")
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
     * Set dtCreated
     *
     * @param \DateTime $dtCreated
     * @return Application
     */
    public function setDtCreated($dtCreated)
    {
        $this->dtCreated = $dtCreated;
    
        return $this;
    }

    /**
     * Get dtCreated
     *
     * @return \DateTime 
     */
    public function getDtCreated()
    {
        return $this->dtCreated;
    }

    /**
     * Set conference
     *
     * @param \Cfp\ConferenceBundle\Entity\Conference $conference
     * @return Application
     */
    public function setConference(\Cfp\ConferenceBundle\Entity\Conference $conference = null)
    {
        $this->conference = $conference;
    
        return $this;
    }

    /**
     * Get conference
     *
     * @return \Cfp\ConferenceBundle\Entity\Conference 
     */
    public function getConference()
    {
        return $this->conference;
    }

    /**
     * Set biography
     *
     * @param \Cfp\UserBundle\Entity\Biography $biography
     * @return Application
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