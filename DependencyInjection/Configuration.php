<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pickle\Bundle\BlogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Piers Warmers hello@pierswarmers.com
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pickle_blog');

        $rootNode
            ->children()
                ->scalarNode('max_results')
                    ->defaultValue(10)
                ->end()
                ->scalarNode('entity_class')
                    ->defaultValue('PickleBlogBundle:Blog')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
