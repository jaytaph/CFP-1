<?php

namespace Cfp\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    function getCount()
    {
        return $this->getEntityManager()->createQueryBuilder()
                    ->select('COUNT(u.id)')
                    ->from('Cfp\UserBundle\Entity\User', 'u')
                    ->getQuery()
                    ->getSingleScalarResult();
    }

}
