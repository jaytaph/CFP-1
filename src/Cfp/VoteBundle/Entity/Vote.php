<?php

namespace Cfp\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity
 */
class Vote
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
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="text", nullable=false)
     */
    private $remark;

    /**
     * @ORM\ManyToOne(targetEntity="Cfp\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Cfp\ConferenceBundle\Entity\Submission")
     */
    private $submission;



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
     * @return Vote
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
     * Set vote
     *
     * @param integer $vote
     * @return Vote
     */
    public function setVote($vote)
    {
        $this->vote = $vote;
    
        return $this;
    }

    /**
     * Get vote
     *
     * @return integer 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Vote
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
     * Set user
     *
     * @param \Cfp\ConferenceBundle\Entity\User $user
     * @return Vote
     */
    public function setUser(\Cfp\ConferenceBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Cfp\ConferenceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set submission
     *
     * @param \Cfp\ConferenceBundle\Entity\Submission $submission
     * @return Vote
     */
    public function setSubmission(\Cfp\ConferenceBundle\Entity\Submission $submission = null)
    {
        $this->submission = $submission;
    
        return $this;
    }

    /**
     * Get submission
     *
     * @return \Cfp\ConferenceBundle\Entity\Submission 
     */
    public function getSubmission()
    {
        return $this->submission;
    }
}