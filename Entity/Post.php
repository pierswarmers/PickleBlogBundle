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

use Pickle\Bundle\BlogBundle\Model\Post as BasePost;

/**
 * Pickle\Bundle\BlogBundle\Model\Post
 *
 * Abstract class for post entity. Doctrine superclass mappings are applied to this class.
 *
 * See: ../Resources/config/doctrine/Post.orm.xml
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class Post extends BasePost
{
}
