<?php

namespace Cfp\TalkBundle\Repository;

use Cfp\UserBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class TalkRepository extends EntityRepository
{
    function getCount()
    {
        return $this->getEntityManager()->createQueryBuilder()
                    ->select('COUNT(t.id)')
                    ->from('Cfp\TalkBundle\Entity\Talk', 't')
                    ->getQuery()
                    ->getSingleScalarResult();
    }


//SELECT * FROM `talk`
//LEFT JOIN speaker ON talk.id = speaker.talk_id
//WHERE speaker.user_id = 1;


    function findTalksForSpeaker(User $user) {
        return $this->getEntityManager()->createQueryBuilder('t')
                    ->select('t')
                    ->from('Cfp\TalkBundle\Entity\Talk', 't')
                    ->where('s.user = :user')
                    ->leftJoin('Cfp\TalkBundle\Entity\Speaker', 's', 'WITH', 's.talk = t.id')
                    ->setParameter('user', $user)
                    ->getQuery()
                    ->getResult();
    }


}
