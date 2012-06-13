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

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Pickle\Bundle\BlogBundle\Model\BlogInterface;

/**
 * Pickle\Bundle\BlogBundle\Model\Blog
 *
 * Abstract blog class with Doctrine mappings for persistence.
 *
 * @author Piers Warmers hello@pierswarmers.com
 *
 * @ORM\Table(name="pickle_blog")
 * @ORM\Entity(repositoryClass="Pickle\Bundle\BlogBundle\Model\BlogRepository")
 * @UniqueEntity(fields="guid", message="This GUID is already taken")
 */
abstract class Blog implements BlogInterface
{
    const STATUS_PUBLISHED = 'published';

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $guid
     *
     * @ORM\Column(name="guid", type="string", length=50, unique=true)
     */
    private $guid;
}