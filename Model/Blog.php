<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please views the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Pickle\Bundle\BlogBundle\Model\Blog
 *
 * Abstract blog class with Doctrine mappings for persistence.
 *
 * @author Piers Warmers hello@pierswarmers.com
 */
abstract class Blog implements BlogInterface
{

}