<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

final class InstagramDataRepository extends EntityRepository
{
    public function findOlderThanLimit(int $limit): array
    {
        $qb = $this->createQueryBuilder('i')
            ->orderBy('i.timestamp', 'DESC')
            ->setFirstResult($limit)
            ;

        return $qb->getQuery()->getResult();
    }
}
