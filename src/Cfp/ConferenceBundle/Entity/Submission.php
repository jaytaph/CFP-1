<?php

namespace Cfp\ConferenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Submission
 *
 * @ORM\Table(name="submission")
 * @ORM\Entity
 */
class Submission
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
     * @ORM\Column(name="remarks", type="text", nullable=true)
     */
    private $remarks;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_created", type="datetime", nullable=false)
     */
    private $dtCreated;

    /**
     * @ORM\ManyToOne(targetEntity="Application")
     */
    private $application;


    /**
     * @ORM\ManyToOne(targetEntity="Cfp\TalkBundle\Entity\Talk")
     */
    private $talk;


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
     * Set remarks
     *
     * @param string $remarks
     * @return Submission
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    
        return $this;
    }

    /**
     * Get remarks
     *
     * @return string 
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set dtCreated
     *
     * @param \DateTime $dtCreated
     * @return Submission
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
     * Set application
     *
     * @param \Cfp\ConferenceBundle\Entity\Application $application
     * @return Submission
     */
    public function setApplication(\Cfp\ConferenceBundle\Entity\Application $application = null)
    {
        $this->application = $application;
    
        return $this;
    }

    /**
     * Get application
     *
     * @return \Cfp\ConferenceBundle\Entity\Application 
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set talk
     *
     * @param \Cfp\TalkBundle\Entity\Talk $talk
     * @return Submission
     */
    public function setTalk(\Cfp\TalkBundle\Entity\Talk $talk = null)
    {
        $this->talk = $talk;
    
        return $this;
    }

    /**
     * Get talk
     *
     * @return \Cfp\TalkBundle\Entity\Talk 
     */
    public function getTalk()
    {
        return $this->talk;
    }
}