<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Tests\Model;

use Pickle\Bundle\BlogBundle\Model\Post;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Pickle\Bundle\BlogBundle\Tests\Model\Post
 *
 * Test the post model.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class PostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test ID
     *
     * @group model
     */
    public function testId()
    {
        $post = $this->getPost();
        $this->assertNull($post->getId());
        $post->setId(1);
        $this->assertEquals(1, $post->getId());
    }

    /**
     * Test GUID
     *
     * @group model
     */
    public function testGuid()
    {
        $post = $this->getPost();
        $this->assertNotNull($post->getGuid());
        $this->assertEquals(strlen($post->getGuid()), 40);
        $post->setGuid('123');
        $this->assertEquals('123', $post->getGuid());
    }

    /**
     * Test status
     *
     * @group model
     */
    public function testStatus()
    {
        $post = $this->getPost();
        $this->assertNotNull($post->getStatus());
        $this->assertEquals(Post::STATUS_DRAFT, $post->getStatus());
        $post->setStatus(Post::STATUS_REVIEW);
        $post->setStatus(Post::STATUS_REVIEW);
        $this->assertEquals(Post::STATUS_REVIEW, $post->getStatus());
    }

    /**
     * Test title
     *
     * @group model
     */
    public function testTitle()
    {
        $post = $this->getPost();
        $this->assertNull($post->getTitle());
        $post->setTitle('hey');
        $this->assertEquals('hey', $post->getTitle());
    }

    /**
     * Test slug
     *
     * @group model
     */
    public function testSlug()
    {
        $post = $this->getPost();
        $this->assertNull($post->getSlug());
        $post->setSlug('hey');
        $this->assertEquals('hey', $post->getSlug());
    }

    /**
     * Test createdAt
     *
     * @group model
     */
    public function testCreatedAt()
    {
        $post = $this->getPost();
        $this->assertNotNull($post->getCreatedAt());
        $this->assertEquals(new \DateTime('now'), $post->getCreatedAt());
        $post->setCreatedAt(new \DateTime('now'));
        $this->assertEquals(new \DateTime('now'), $post->getCreatedAt());
    }

    /**
     * Test updatedAt
     *
     * @group model
     */
    public function testUpdatedAt()
    {
        $post = $this->getPost();
        $this->assertNotNull($post->getUpdatedAt());
        $this->assertEquals(new \DateTime('now'), $post->getUpdatedAt());
        $post->setUpdatedAt(new \DateTime('now'));
        $this->assertEquals(new \DateTime('now'), $post->getUpdatedAt());
    }

    /**
     * Test content
     *
     * @group model
     */
    public function testContent()
    {
        $post = $this->getPost();
        $this->assertNull($post->getContent());
        $post->setContent('hey');
        $this->assertEquals('hey', $post->getContent());
    }

    /**
     * @return Post
     */
    protected function getPost()
    {
        return $this->getMockForAbstractClass('Pickle\Bundle\BlogBundle\Model\Post');
    }
}