<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please views the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Sorting;

use Doctrine\ORM\QueryBuilder;

/**
 * Pickle\Bundle\BlogBundle\Sorting\SorterInterface
 *
 * Required methods for sorting.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
interface SorterInterface
{
    /**
     * Add sorting criteria to the QueryBuilder object.
     *
     * @param QueryBuilder $sortable
     */
    function sort(QueryBuilder $sortable);

    /**
     * Return the sort order.
     *
     * @return string
     */
    function getOrder();
}
