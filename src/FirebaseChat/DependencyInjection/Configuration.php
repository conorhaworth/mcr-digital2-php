<?php
/**
 * Created by IntelliJ IDEA.
 * User: whitea
 * Date: 07/11/2016
 * Time: 09:32
 */

namespace FirebaseChat\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('firebase_chat');

        // @formatter:off
        $rootNode
            ->children()
                ->arrayNode('firebase_config')
                    ->children()
                        ->scalarNode('app_url')->cannotBeEmpty()->example('https://exampleapp.firebaseio.com/')->end()
                        ->scalarNode('chat_db_path')->cannotBeEmpty()->example('/firebase/chat')->end()
                        ->scalarNode('auth_token')->cannotBeEmpty()->example('ZkjsavGSjkaKABSJkbasavvasjVAjhv')->end()
                    ->end()
                ->end() // firebase_config
            ->end()
        ;
        // @formatter:on

        return $treeBuilder;
    }
}