<?php

namespace Cfp\ConferenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConferenceCommittee
 *
 * @ORM\Table(name="conference_committee")
 * @ORM\Entity
 */
class ConferenceCommittee
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
     * @ORM\ManyToOne(targetEntity="Conference")
     */
    private $conference;

    /**
     * @ORM\ManyToOne(targetEntity="Cfp\UserBundle\Entity\User")
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
     * Set conference
     *
     * @param \Cfp\ConferenceBundle\Entity\Conference $conference
     * @return ConferenceCommittee
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
     * Set user
     *
     * @param \Cfp\UserBundle\Entity\User $user
     * @return ConferenceCommittee
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