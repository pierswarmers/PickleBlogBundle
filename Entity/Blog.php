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
use Pickle\Bundle\BlogBundle\Model\BlogInterface;

/**
 * Concrete blog class which simply extends the AbstractBlog class. Selection of the concrete blog class can be
 * configured in settings.yml
 *
 * @ORM\Entity(repositoryClass="Pickle\Bundle\BlogBundle\Model\BlogRepository")
 * @ORM\Table(name="pickle_blog")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields="guid", message="This GUID is already taken")
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

    const STATUS_PUBLISHED = 'published';
    const STATUS_REVIEW    = 'review';
    const STATUS_DRAFT     = 'draft';

    const COMMENT_STATUS_ALL   = 'all';
    const COMMENT_STATUS_USERS = 'users';
    const COMMENT_STATUS_NONE  = 'none';

    /**
     * @var string $guid
     *
     * @ORM\Column(name="guid", type="string", length=50, unique=true)
     */
    private $guid;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=150, nullable=true)
     */
    private $author;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string $contentFilter
     *
     * @ORM\Column(name="contentFilter", type="string", length=30, nullable=true)
     */
    private $contentFilter;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=100)
     *
     * @Assert\NotBlank()
     * @Assert\MinLength(2)
     * @Assert\MaxLength(100)
     */
    private $title;

    /**
     * @var string $excerpt
     *
     * @ORM\Column(name="excerpt", type="text", nullable=true)
     */
    private $excerpt;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var string $commentStatus
     *
     * @ORM\Column(name="comment_status", type="string", length=20, nullable=true)
     */
    private $commentStatus;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setPreUpdate()
    {

        if (!$this->guid) {
            $this->setGuid(sha1(uniqid(rand(0,999999).microtime())));
        }

        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $commentStatus
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
    }

    /**
     * @return string
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getFilteredContent()
    {
        return '-- filter -- ' . $this->content;
    }

    /**
     * @param string $contentFilter
     */
    public function setContentFilter($contentFilter)
    {
        $this->contentFilter = $contentFilter;
    }

    /**
     * @return string
     */
    public function getContentFilter()
    {
        return $this->contentFilter;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $excerpt
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
    }

    /**
     * @return string
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @param string $guid
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    /**
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}