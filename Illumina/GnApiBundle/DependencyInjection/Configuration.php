<?php

namespace Illumina\GnApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('illumina_gn');

        $rootNode
            ->children()
                ->scalarNode('base_url')
                    ->defaultNull()
                    ->info('The endpoint URL of the GN Site')
                    ->example('http://www.foo.bar/cas')
                    ->end()
                ->scalarNode('key')
                    ->defaultNull()
                    ->info('The private key for the GN site')
                    ->example('WEarQRBHuiWtsnveoabnq304y039u5gw4')
                    ->end()
                ->scalarNode('secret')
                    ->defaultNull()
                    ->info('The secret for the GN site')
                    ->example('SRTbn9sdrtkseQRB6rght89tltnETjhtW')
                    ->end()
            ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
