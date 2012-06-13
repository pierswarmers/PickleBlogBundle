<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pickle\Bundle\BlogBundle\Model\BlogManager;
/**
 * @Route("/blog")
 *
 */
class BlogController extends Controller
{
    /**
     * This action handles the blog list.
     *
     * @param Request $request
     *
     * @return array Template variables
     *
     * @Route("/", name="blog_list")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return array('blogs' => $this->getManager()->findAllBlogs());
    }

    /**
     * Get the BlogManager object service.
     *
     * @return BlogManager
     */
    private function getManager() {
        return $this->get('pickle_blog.manager');
    }
}
