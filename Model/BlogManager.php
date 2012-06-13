<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Pickle\Bundle\BlogBundle\Model\BlogRepositoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Pickle\Bundle\BlogBundle\Model\BlogManager
 *
 * Suite of management logic for working with
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class BlogManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $entityRepository;

    /**
     * @var int
     */
    private $maxResults;

    /**
     * @param EntityManager $entityManager
     * @param string        $entityName
     * @param int           $maxResults
     *
     * @throws InvalidArgumentException
     */
    public function __construct(EntityManager $entityManager, $entityName, $maxResults)
    {
        $this->entityManager = $entityManager;
        $this->maxResults = $maxResults;

        $entityRepository = $this->entityManager->getRepository($entityName);

        if (!$entityRepository instanceof BlogRepositoryInterface) {
            throw new InvalidArgumentException(
                sprintf('%s must implement BlogRepositoryInterface', $entityRepository)
            );
        }

        $this->entityRepository = $this->entityManager->getRepository($entityName);
    }

    /**
     * Gets doctrine entity manager.
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Gets doctrine entity repository.
     *
     * @return EntityRepository
     */
    public function getEntityRepository()
    {
        return $this->entityRepository;
    }

    /**
     * This is a pagination aware fetch method which can be supplied with an options array
     * to specify: [status, max_results, first_result, order_by, order_by_order]
     *
     * @param array $options
     *
     * @return array|mixed
     */
    public function findAllBlogs(array $options = array())
    {
        $options = $this->resolveFindAllBlogsOptions($options);

        $query = $this->getEntityRepository()->createQueryBuilder('b')
            ->where('b.status = :status')
            ->setParameter('status', $this->getEntityRepository()->getClassName()::STATUS_PUBLISHED)
            ->orderBy('b.:order_by', $options['order_by_order'])
            ->setParameter('order_by', $options['order_by'])
            ->getQuery();

        return new Paginator($query, true);
    }

    /**
     * Resolve options with default values, then provide some basic checks.
     *
     * @param array $options
     *
     * @return array
     * @throws InvalidOptionsException
     */
    protected function resolveFindAllBlogsOptions(array $options = array())
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults(array(
            'status'          => $this->getEntityRepository()->getClassName()::STATUS_PUBLISHED,
            'max_results'     => $this->maxResults,
            'first_result'    => 0,
            'order_by'        => 'created_at',
            'order_by_order'  => 'ASC',
        ));

        $resolver->setAllowedValues(array(
            'order_by_order' => array('ASC', 'DESC'),
        ))->setAllowedTypes(array(
            'max_results'  => 'int',
            'first_result' => 'int',
            'order_by'     => 'string',
        ));

        if ($options['max_results'] > $safeLimit = 100) {
            throw new InvalidOptionsException(sprintf('"max_results" option has exceeded safe limit of %s.', $safeLimit));
        }

        return $resolver->resolve($options);
    }
}