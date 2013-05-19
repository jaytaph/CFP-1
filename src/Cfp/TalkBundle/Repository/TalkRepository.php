<?php

namespace Cfp\TalkBundle\Repository;

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


}
