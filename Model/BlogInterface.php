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
 * Pickle\Bundle\BlogBundle\Model\BlogInterface
 *
 * Required methods for blog objects.
 *
 * @author Piers Warmers hello@pierswarmers.com
 */
interface BlogInterface extends \Serializable
{
    /**
     * Sets the GUID.
     *
     * @param string $guid
     */
    function setGuid($guid);

    /**
     * Gets GUID.
     *
     * @param string
     */
    function getGuid();

    /**
     * Sets the author.
     *
     * @param string $author
     */
    function setAuthor($author);

    /**
     * Gets author.
     *
     * @param string
     */
    function getAuthor();

    /**
     * Sets the created at date.
     *
     * @param \DateTime $createdAt
     */
    function setCreatedAt(\DateTime $createdAt);

    /**
     * Gets date.
     *
     * @param DateTime
     */
    function getCreatedAt();

    /**
     * Sets the updated at date.
     *
     * @param \DateTime $updatedAt
     */
    function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Gets updated at date.
     *
     * @param string
     */
    function getUpdatedAt();

    /**
     * Sets the content.
     *
     * @param string $content
     */
    function setContent($content);

    /**
     * Gets content.
     *
     * @param string
     */
    function getContent();

    /**
     * Gets filtered content.
     *
     * @param string
     */
    function getFilteredContent();

    /**
     * Sets the content filter.
     *
     * @param string $contentFilter
     */
    function setContentFilter($contentFilter);

    /**
     * Gets content filter.
     *
     * @param string
     */
    function getContentFilter();

    /**
     * Sets the title.
     *
     * @param string $title
     */
    function setTitle($title);

    /**
     * Gets title.
     *
     * @param string
     */
    function getTitle();

    /**
     * Sets the excerpt.
     *
     * @param string $excerpt
     */
    function setExcerpt($excerpt);

    /**
     * Gets excerpt.
     *
     * @param string
     */
    function getExcerpt();

    /**
     * Sets the status.
     *
     * @param string $status
     */
    function setStatus($status);

    /**
     * Gets status.
     *
     * @param string
     */
    function getStatus();

    /**
     * Sets the comment status.
     *
     * @param string $commentStatus
     */
    function setCommentStatus($commentStatus);

    /**
     * Gets comment status.
     *
     * @param string
     */
    function getCommentStatus();
}
