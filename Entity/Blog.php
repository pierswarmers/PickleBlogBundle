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
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Concrete blog class which simply extends the AbstractBlog class. Selection of the concrete blog class can be
 * configured in settings.yml
 *
 * @ORM\Entity(repositoryClass="Pickle\Bundle\BlogBundle\Model\BlogRepository")
 * @ORM\Table(name="pickle_blog")
 * @UniqueEntity(fields="guid", message="This GUID is already taken")
 *
 */
class Blog extends AbstractBlog
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
}