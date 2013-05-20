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

    function findUsersByPattern($pattern = "", $returnThreshold = 10) {
        $users = $this->getEntityManager()->createQueryBuilder()
                      ->select('u.username, u.email, u.id')
                      ->from('Cfp\UserBundle\Entity\User', 'u')
                      ->where('u.username LIKE :pattern')
                      ->orWhere('u.email LIKE :pattern')
                      ->orWhere('u.fullName LIKE :pattern')
                      ->setParameter('pattern', '%'.$pattern.'%')
                      ->getQuery()
                      ->getResult();

        return count($users) < $returnThreshold ? $users : array();
    }

}
