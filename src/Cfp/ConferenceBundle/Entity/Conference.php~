<?php

namespace Cfp\ConferenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity
 */
class Conference
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
     * @var \DateTime
     *
     * @ORM\Column(name="dt_created", type="datetime", nullable=false)
     */
    private $dtCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_start", type="datetime", nullable=false)
     */
    private $dtStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_end", type="datetime", nullable=false)
     */
    private $dtEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cfp_start", type="datetime", nullable=false)
     */
    private $cfpStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cfp_end", type="datetime", nullable=false)
     */
    private $cfpEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="geo_long", type="decimal", nullable=true)
     */
    private $geoLong;

    /**
     * @var float
     *
     * @ORM\Column(name="geo_lat", type="decimal", nullable=true)
     */
    private $geoLat;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=25, nullable=true)
     */
    private $tag;



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
     * @return Conference
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
     * Set dtCreated
     *
     * @param \DateTime $dtCreated
     * @return Conference
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
     * Set dtStart
     *
     * @param \DateTime $dtStart
     * @return Conference
     */
    public function setDtStart($dtStart)
    {
        $this->dtStart = $dtStart;
    
        return $this;
    }

    /**
     * Get dtStart
     *
     * @return \DateTime 
     */
    public function getDtStart()
    {
        return $this->dtStart;
    }

    /**
     * Set dtEnd
     *
     * @param \DateTime $dtEnd
     * @return Conference
     */
    public function setDtEnd($dtEnd)
    {
        $this->dtEnd = $dtEnd;
    
        return $this;
    }

    /**
     * Get dtEnd
     *
     * @return \DateTime 
     */
    public function getDtEnd()
    {
        return $this->dtEnd;
    }

    /**
     * Set cfpStart
     *
     * @param \DateTime $cfpStart
     * @return Conference
     */
    public function setCfpStart($cfpStart)
    {
        $this->cfpStart = $cfpStart;
    
        return $this;
    }

    /**
     * Get cfpStart
     *
     * @return \DateTime 
     */
    public function getCfpStart()
    {
        return $this->cfpStart;
    }

    /**
     * Set cfpEnd
     *
     * @param \DateTime $cfpEnd
     * @return Conference
     */
    public function setCfpEnd($cfpEnd)
    {
        $this->cfpEnd = $cfpEnd;
    
        return $this;
    }

    /**
     * Get cfpEnd
     *
     * @return \DateTime 
     */
    public function getCfpEnd()
    {
        return $this->cfpEnd;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Conference
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
     * Set geoLong
     *
     * @param float $geoLong
     * @return Conference
     */
    public function setGeoLong($geoLong)
    {
        $this->geoLong = $geoLong;
    
        return $this;
    }

    /**
     * Get geoLong
     *
     * @return float 
     */
    public function getGeoLong()
    {
        return $this->geoLong;
    }

    /**
     * Set geoLat
     *
     * @param float $geoLat
     * @return Conference
     */
    public function setGeoLat($geoLat)
    {
        $this->geoLat = $geoLat;
    
        return $this;
    }

    /**
     * Get geoLat
     *
     * @return float 
     */
    public function getGeoLat()
    {
        return $this->geoLat;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Conference
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }
}