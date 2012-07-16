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

/**
 * Pickle\Bundle\BlogBundle\Model\PostManager
 *
 * Abstract, persistence agnostic post manager class.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 * @var string $class
 */
abstract class PostManager implements PostManagerInterface
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->class;
    }
}
