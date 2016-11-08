<?php
/**
 * Created by IntelliJ IDEA.
 * User: whitea
 * Date: 07/11/2016
 * Time: 09:26
 */

namespace FirebaseChat\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FirebaseChatExtension extends ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $this->updateContainerParameters($mergedConfig, $container);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yml');
    }

    /**
     * Update parameters using configuration values.
     *
     * @param array $mergedConfig   The merged config
     * @param ContainerBuilder $container The container
     */
    protected function updateContainerParameters(array $mergedConfig, ContainerBuilder $container)
    {
        // Set a parameter for each configuration value
        if(!empty($mergedConfig['firebase_config']) && is_array($mergedConfig['firebase_config'])) {
            $firebaseConfig = $mergedConfig['firebase_config'];

            $container->setParameter('firebase_chat.firebase_config.app_url', $firebaseConfig['app_url']);
            $container->setParameter('firebase_chat.firebase_config.auth_token', $firebaseConfig['auth_token']);
            $container->setParameter('firebase_chat.firebase_config.chat_db_path', $firebaseConfig['chat_db_path']);
        }
    }
}