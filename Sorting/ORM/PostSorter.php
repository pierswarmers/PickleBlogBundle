<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please views the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Sorting\ORM;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Doctrine\ORM\QueryBuilder;
use Pickle\Bundle\BlogBundle\Sorting\SorterInterface;

/**
 * Pickle\Bundle\BlogBundle\Model\BlogInterface
 *
 * Required methods for sorting.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class PostSorter extends ContainerAware implements SorterInterface
{
    /**
     * {@inheritdoc}
     */
    public function sort(QueryBuilder $sortable)
    {
        if (!$sortable instanceof QueryBuilder) {
            throw new InvalidArgumentException('Sorter must be an instance of "Doctrine\\ORM\\QueryBuilder".');
        }

        $request = $this->container->get('request');

        if (null === $sortProperty = $request->query->get('sort', null)) {
            return;
        }

        $sortOrder = $request->query->get('order', 'ASC');

        if (!in_array($sortOrder, array('ASC', 'DESC'))) {
            return;
        }

        $postClass = $this->container->getParameter('pickle_blog.model.post.class');
        $reflectionClass = new \ReflectionClass($postClass);

        if (!in_array($sortProperty, array_keys($reflectionClass->getDefaultProperties()))) {
            return;
        }

        $sortable->orderBy('p.' . $sortProperty, $sortOrder);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        $sortOrder = $this->container->get('request')->query->get('order', 'ASC');

        if (!in_array($sortOrder, array('ASC', 'DESC'))) {

            return;
        }

        return ($sortOrder == 'ASC') ? 'DESC' : 'ASC';
    }
}
