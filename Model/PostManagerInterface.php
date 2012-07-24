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

use Pickle\Bundle\BlogBundle\Model\PostInterface;

/**
 * Pickle\Bundle\BlogBundle\Model\PostManagerInterface
 *
 * Define the required post manager methods and a stable working contract for logic using posts.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
interface PostManagerInterface
{
    /**
     * Returns fully-qualified class name of post.
     *
     * @return string
     */
    function getClass();

    /**
     * Creates new post object.
     *
     * @return PostInterface
     */
    function createPost();

    /**
     * Persist a post instance.
     *
     * @param PostInterface $post
     */
    function persistPost(PostInterface $post);

    /**
     * Removes post.
     *
     * @param PostInterface $post
     */
    function removePost(PostInterface $post);

    /**
     * Finds post by id.
     *
     * @param integer $id
     *
     * @return PostInterface
     */
    function findPost($id);

    /**
     * Finds post by criteria.
     *
     * @param array $criteria
     *
     * @return PostInterface
     */
    function findPostBy(array $criteria);

    /**
     * Finds all posts.
     *
     * @return array
     */
    function findPosts();

    /**
     * Finds posts by criteria.
     *
     * @param array $criteria
     *
     * @return array
     */
    function findPostsBy(array $criteria);

    /**
     * Creates a paginator instance.
     *
     * @param                 $sorter
     * @param Boolean         $filterNotPublished
     */
    function createPaginator($sorter = null, $filterNotPublished = true);
}
