<?php

namespace Pickle\Bundle\BlogBundle\Model;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Pickle\Bundle\BlogBundle\Model\BlogInterface;

/**
 * Pickle\Bundle\BlogBundle\Model\BlogRepository
 *
 * Extends the default EntityRepository with some convenience access methods.
 *
 * @author Piers Warmers hello@pierswarmers.com
 */
class BlogRepository extends EntityRepository implements BlogRepositoryInterface
{

}