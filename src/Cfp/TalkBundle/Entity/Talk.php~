<?php

namespace Cfp\TalkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Talk
 *
 * @ORM\Table(name="talk")
 * @ORM\Entity
 */
class Talk
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
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text", nullable=false)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Type", mappedBy="talk")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text", nullable=true)
     */
    private $remark;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="Cfp\TalkBundle\Entity\Speaker", inversedBy="talk")
     */
    private $speakers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set title
     *
     * @param string $title
     * @return Talk
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     * @return Talk
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    
        return $this;
    }

    /**
     * Get abstract
     *
     * @return string 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Talk
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    
        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Add type
     *
     * @param \Cfp\TalkBundle\Entity\Type $type
     * @return Talk
     */
    public function addType(\Cfp\TalkBundle\Entity\Type $type)
    {
        $this->type[] = $type;
    
        return $this;
    }

    /**
     * Remove type
     *
     * @param \Cfp\TalkBundle\Entity\Type $type
     */
    public function removeType(\Cfp\TalkBundle\Entity\Type $type)
    {
        $this->type->removeElement($type);
    }

    /**
     * Get type
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Add speakers
     *
     * @param \Cfp\TalkBundle\Entity\Speaker $speakers
     * @return Talk
     */
    public function addSpeaker(\Cfp\TalkBundle\Entity\Speaker $speakers)
    {
        $this->speakers[] = $speakers;
    
        return $this;
    }

    /**
     * Remove speakers
     *
     * @param \Cfp\TalkBundle\Entity\Speaker $speakers
     */
    public function removeSpeaker(\Cfp\TalkBundle\Entity\Speaker $speakers)
    {
        $this->speakers->removeElement($speakers);
    }

    /**
     * Get speakers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }

    /**
     * Set speakers
     *
     * @param \Cfp\TalkBundle\Entity\Speaker $speakers
     * @return Talk
     */
    public function setSpeakers(\Cfp\TalkBundle\Entity\Speaker $speakers = null)
    {
        $this->speakers = $speakers;
    
        return $this;
    }
}