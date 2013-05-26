<?php

namespace Cfp\ConferenceBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ConferenceRepository
 *
 */
class ConferenceRepository extends EntityRepository
{

    public function getLatest($limit = 15)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->addOrderBy('c.dtCreated', 'DESC')
                   ->setMaxResults($limit);

        return $qb->getQuery()
                  ->getResult();
    }

    public function getNextByCfp($limit = 15)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.cfpStart >= :now')
                   ->addOrderBy('c.cfpStart', 'DESC')
                   ->setMaxResults($limit);

        $qb->setParameter('now', date('Y-m-d H:i:s'));

        return $qb->getQuery()
                  ->getResult();
    }

    /**
     * Returns all conferences with currently open CFP's
     * @param int $limit
     * @return array
     */
    public function getOpenCfps($limit = 15)
    {
        $qb = $this->createQueryBuilder('c')
                   ->select('c')
                   ->where('c.cfpStart <= :now')
                   ->andWhere('c.cfpEnd >= :now')
                   ->addOrderBy('c.cfpStart', 'DESC')
                   ->setMaxResults($limit);

        $qb->setParameter('now', date('Y-m-d H:i:s'));

        return $qb->getQuery()
                  ->getResult();
    }

    public function getOpenCfpsCount()
    {
        return $this->getEntityManager()->createQueryBuilder()
                    ->select('COUNT(c.id)')
                    ->from('Cfp\ConferenceBundle\Entity\Conference', 'c')
                    ->where('c.cfpStart <= :now')
                    ->andWhere('c.cfpEnd >= :now')
                    ->setParameter('now', date('Y-m-d H:i:s'))
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function getCount()
    {
        return $this->getEntityManager()->createQueryBuilder()
                    ->select('COUNT(c.id)')
                    ->from('Cfp\ConferenceBundle\Entity\Conference', 'c')
                    ->getQuery()
                    ->getSingleScalarResult();
    }

}
