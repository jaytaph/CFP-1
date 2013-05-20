<?php

namespace Cfp\TalkBundle\Repository;

use Cfp\TalkBundle\Entity\Talk;
use Cfp\UserBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class SpeakerRepository extends EntityRepository
{

    function findByUserAndTalk(User $user, Talk $talk) {
        return $this->getEntityManager()->createQueryBuilder('s')
                    ->select('s')
                    ->from('Cfp\TalkBundle\Entity\Speaker', 's')
                    ->where('s.user = :user')
                    ->andWhere('s.talk = :talk')
                    ->setParameter('user', $user)
                    ->setParameter('talk', $talk)
                    ->getQuery()
                    ->getResult();
    }


}
