<?php

namespace Cfp\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Cfp\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $githubId;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    protected $githubAccessToken;

    /**
     * @ORM\Column(type="string", type="string", length=100)
     */
    protected $fullName;

    /**
     * @ORM\OneToMany(targetEntity="Biography", mappedBy="user")
     */
    protected $biographies;

    /**
     * @ORM\OneToMany(targetEntity="Cfp\TalkBundle\Entity\Speaker", mappedBy="user")
     */
    protected $talks;


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
     * Set fullName
     *
     * @param string $fullName
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    
        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        // Important to call the parent constructor as well. Otherwise things like salts etc aren't initialized properly
        parent::__construct();
        $this->biographies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add biographies
     *
     * @param \Cfp\UserBundle\Entity\Biography $biographies
     * @return User
     */
    public function addBiographie(\Cfp\UserBundle\Entity\Biography $biographies)
    {
        $this->biographies[] = $biographies;
    
        return $this;
    }

    /**
     * Remove biographies
     *
     * @param \Cfp\UserBundle\Entity\Biography $biographies
     */
    public function removeBiographie(\Cfp\UserBundle\Entity\Biography $biographies)
    {
        $this->biographies->removeElement($biographies);
    }

    /**
     * Get biographies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBiographies()
    {
        return $this->biographies;
    }

    /**
     * Set githubId
     *
     * @param string $githubId
     * @return User
     */
    public function setGithubId($githubId)
    {
        $this->githubId = $githubId;
    
        return $this;
    }

    /**
     * Get githubId
     *
     * @return string 
     */
    public function getGithubId()
    {
        return $this->githubId;
    }

    /**
     * Set githubAccessToken
     *
     * @param string $githubAccessToken
     * @return User
     */
    public function setGithubAccessToken($githubAccessToken)
    {
        $this->githubAccessToken = $githubAccessToken;
    
        return $this;
    }

    /**
     * Get githubAccessToken
     *
     * @return string 
     */
    public function getGithubAccessToken()
    {
        return $this->githubAccessToken;
    }



    /**
     * Add talks
     *
     * @param \Cfp\TalkBundle\Entity\Speaker $talks
     * @return User
     */
    public function addTalk(\Cfp\TalkBundle\Entity\Speaker $talks)
    {
        $this->talks[] = $talks;
    
        return $this;
    }

    /**
     * Remove talks
     *
     * @param \Cfp\TalkBundle\Entity\Speaker $talks
     */
    public function removeTalk(\Cfp\TalkBundle\Entity\Speaker $talks)
    {
        $this->talks->removeElement($talks);
    }

    /**
     * Get talks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTalks()
    {
        return $this->talks;
    }
}
