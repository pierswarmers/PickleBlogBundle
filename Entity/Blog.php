<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Entity;

use Pickle\Bundle\BlogBundle\Model\Blog as AbstractBlog;

/**
 * Concrete blog class which simply extends the AbstractBlog class. Selection of the concrete blog class can be
 * configured in settings.yml
 */
class Blog extends AbstractBlog
{

}