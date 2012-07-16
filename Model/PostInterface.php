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
 * Pickle\Bundle\BlogBundle\Model\PostInterface
 *
 * Define the required post methods and a stable working contract for logic using posts.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
interface PostInterface
{
    /**
     * Returns the id.
     *
     * @return mixed
     */
    function getId();

    /**
     * Sets the id.
     *
     * @param mixed $id
     */
    function setId($id);

    /**
     * Returns the GUID.
     *
     * @return string
     */
    function getGuid();

    /**
     * Sets the GUID.
     *
     * @param string $guid
     */
    function setGuid($guid);

    /**
     * Returns the status.
     *
     * @return string
     */
    function getStatus();

    /**
     * Sets the status.
     *
     * @param string $status
     */
    function setStatus($status);

    /**
     * Returns the title.
     *
     * @return string
     */
    function getTitle();

    /**
     * Sets the title.
     *
     * @param string $title
     */
    function setTitle($title);

    /**
     * Returns the slug.
     *
     * @return string
     */
    function getSlug();

    /**
     * Sets the slug.
     *
     * @param string $slug
     */
    function setSlug($slug);

    /**
     * Gets date.
     *
     * @return \DateTime
     */
    function getCreatedAt();

    /**
     * Sets the created at datetime.
     *
     * @param \DateTime $createdAt
     */
    function setCreatedAt(\DateTime $createdAt);

    /**
     * Sets the created at datetime to "NOW"
     */
    function incrementCreatedAt();

    /**
     * Gets updated at datetime.
     *
     * @return \DateTime
     */
    function getUpdatedAt();

    /**
     * Sets the updated at date.
     *
     * @param \DateTime $updatedAt
     */
    function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Sets the updated at datetime to "NOW"
     */
    function incrementUpdatedAt();

    /**
     * Returns the content.
     *
     * @return string
     */
    function getContent();

    /**
     * Sets the content.
     *
     * @param string $content
     */
    function setContent($content);
}
