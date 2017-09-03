<?php

namespace AppBundle\Repository;

/**
 * TaxrefRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaxrefRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find Espece with paging system when needed
     *
     * @param int $page The page number
     * @param int $nbPerPage The number of results returned on page
     *
     * Return array of Taxref objects
     */
    public function findTaxrefs(int $page, int $nbPerPage)
    {
        $qb = $this->createQueryBuilder('t');
        $qb->orderBy('t.nomVern')
//            ->getQuery()
//            // Set default paging observation start
//            ->setFirstResult(($page - 1) * $nbPerPage)
//            // Set number of observations per page
//            ->setMaxResults($nbPerPage)
        ;
        return $qb
            ->getQuery()
            ->getResult()
        ;
        // Paginator replaces QueryBuilder method getResults(), with pagination setup
//        return new \Doctrine\ORM\Tools\Pagination\Paginator($qb, true);
    }
}
