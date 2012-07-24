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

/**
 * Pickle\Bundle\BlogBundle\Model\Post
 *
 * Abstract, persistence agnostic post class.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
abstract class Post implements PostInterface
{
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_REVIEW    = 'REVIEW';
    const STATUS_DRAFT     = 'DRAFT';

    const COMMENT_STATUS_ALL   = 'ALL';
    const COMMENT_STATUS_USERS = 'USERS';
    const COMMENT_STATUS_NONE  = 'NONE';

    /**
     * Id.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Post GUID.
     *
     * @var string
     */
    protected $guid;

    /**
     * Post status.
     *
     * @var string
     */
    protected $status;

    /**
     * Post title.
     *
     * @var string
     */
    protected $title;

    /**
     * Post slug.
     *
     * @var string
     */
    protected $slug;

    /**
     * Creation time.
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * Modification time.
     *
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Post content.
     *
     * @var string
     */
    protected $content;

    /**
     * Construct the default entity state.
     */
    public function __construct()
    {
        $this->guid = sha1(uniqid(rand(0, 999999) . microtime()));
        $this->status = self::STATUS_DRAFT;
        $this->incrementCreatedAt();
        $this->incrementUpdatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * {@inheritdoc}
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function incrementCreatedAt()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function incrementUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
