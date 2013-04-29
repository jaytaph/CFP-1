<?php

namespace Cfp\TalkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TalkUrl
 *
 * @ORM\Table(name="talk_url")
 * @ORM\Entity
 */
class TalkUrl
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
     * @ORM\ManyToOne(targetEntity="Talk")
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
     * Set name
     *
     * @param string $name
     * @return TalkUrl
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
     * @return TalkUrl
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
     * Set talkId
     *
     * @param integer $talkId
     * @return TalkUrl
     */
    public function setTalkId($talkId)
    {
        $this->talkId = $talkId;
    
        return $this;
    }

    /**
     * Get talkId
     *
     * @return integer 
     */
    public function getTalkId()
    {
        return $this->talkId;
    }

    /**
     * Set talk
     *
     * @param \Cfp\TalkBundle\Entity\Talk $talk
     * @return TalkUrl
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