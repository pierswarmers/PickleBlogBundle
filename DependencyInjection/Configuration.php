<?php

/*
 * This file is part of the PickleBlogBundle package.
 *
 * (c) Piers Warmers hello@pierswarmers.com
 *
 * For the full copyright and license information, please views the LICENSE
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
                ->scalarNode('driver')->isRequired()->end()
                ->scalarNode('engine')->defaultValue('twig')->end()
                ->arrayNode('classes')
                    ->isRequired()
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('model')
                            ->isRequired()
                            ->children()
                                ->scalarNode('post')->isRequired()->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
//                    ->defaultValue('PickleBlogBundle:Blog')
        return $treeBuilder;
    }
}
