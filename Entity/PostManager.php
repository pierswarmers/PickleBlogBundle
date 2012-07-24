<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please views the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Pickle\Bundle\BlogBundle\Model\PostInterface;
use Pickle\Bundle\BlogBundle\Model\PostManager as BasePostManager;

/**
 * Pickle\Bundle\BlogBundle\Model\PostManager
 *
 * Abstract, persistence agnostic post manager class.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class PostManager extends BasePostManager
{
    /**
     * Entity manager.
     *
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Entity repository.
     *
     * @var EntityRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager The entity manager
     * @param string        $class         The fully-qualified class name of post
     */
    public function __construct(EntityManager $entityManager, $class)
    {
        parent::__construct($class);

        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository($this->getClass());
    }

    /**
     * {@inheritdoc}
     */
    public function createPost()
    {
        $class = $this->getClass();

        return new $class;
    }

    /**
     * {@inheritdoc}
     */
    public function persistPost(PostInterface $post)
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function removePost(PostInterface $post)
    {
        $this->entityManager->remove($post);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function findPost($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findPostBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function findPosts()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findPostsBy(array $criteria)
    {
        return $this->repository->findBy($criteria);
    }

    /**
     * {@inheritdoc}
     */
    public function createPaginator($sorter = null, $filterNotPublished = true)
    {
        $queryBuilder = $this->repository->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC');

        if ($filterNotPublished) {
            $queryBuilder->andWhere('p.published = true');
        } else {
            $queryBuilder->andWhere('p.published = false');
        }

        if (null !== $sorter) {
            $sorter->sort($queryBuilder);
        }

        return new Pagerfanta(new DoctrineORMAdapter($queryBuilder->getQuery()));
    }
}
