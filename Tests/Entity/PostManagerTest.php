<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Tests\Entity;

use Pickle\Bundle\BlogBundle\Entity\PostManager;

/**
 * Pickle\Bundle\BlogBundle\Tests\Entity\PostManager
 *
 * Test the post manager.
 *
 * @author Piers Warmers <hello@pierswarmers.com>
 */
class PostManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create post method
     */
    public function testCreatePost()
    {
        $post = $this->getMockPost();
        $postManager = new PostManager($this->getMockEntityManager(), 'Pickle\Bundle\BlogBundle\Entity\Post');
        $this->assertInstanceOf('Pickle\Bundle\BlogBundle\Model\PostInterface', $postManager->createPost());
    }

    /**
     * Test the persisting of posts
     */
    public function testPersistPost()
    {
        $post = $this->getMockPost();

        $entityManager = $this->getMockEntityManager();
        $entityManager->expects($this->once())
            ->method('persist')
            ->with($this->equalTo($post));

        $entityManager->expects($this->once())
            ->method('flush');

        $postManager = new PostManager($entityManager, 'Pickle\Bundle\BlogBundle\Entity\Post');
        $postManager->persistPost($post);
    }

    private function getMockPost()
    {
        return $this->getMock('Pickle\Bundle\BlogBundle\Model\PostInterface');
    }

    private function getMockEntityManager()
    {
        $entityManager = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->setMethods(array('persist', 'remove', 'flush', 'getRepository'))
            ->getMock();

        $entityManager->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue(null));

        return $entityManager;
    }
}