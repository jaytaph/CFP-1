<?php

namespace Cfp\TalkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Speaker
 *
 * @ORM\Table(name="speaker")
 * @ORM\Entity
 */
class Speaker
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
     * @ORM\ManyToOne(targetEntity="Cfp\TalkBundle\Entity\Talk")
     */
    private $talk;

    /**
     * @ORM\ManyToOne(targetEntity="Cfp\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(name="confirmed", type="boolean", nullable=false)
     */
    private $confirmed;

    /**
     * @ORM\Column(name="confirmCode", type="string", length=100, nullable=true)
     */
    private $confirmCode;


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
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return Speaker
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    
        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set confirmCode
     *
     * @param string $confirmCode
     * @return Speaker
     */
    public function setConfirmCode($confirmCode)
    {
        $this->confirmCode = $confirmCode;
    
        return $this;
    }

    /**
     * Get confirmCode
     *
     * @return string 
     */
    public function getConfirmCode()
    {
        return $this->confirmCode;
    }

    /**
     * Set talk
     *
     * @param \Cfp\TalkBundle\Entity\Talk $talk
     * @return Speaker
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

    /**
     * Set user
     *
     * @param \Cfp\UserBundle\Entity\User $user
     * @return Speaker
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