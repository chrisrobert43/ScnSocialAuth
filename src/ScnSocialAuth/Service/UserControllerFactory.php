<?php
/**
 * ScnSocialAuth Module
 *
 * @category   ScnSocialAuth
 * @package    ScnSocialAuth_Service
 */

namespace ScnSocialAuth\Service;

use ScnSocialAuth\Controller\UserController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @category   ScnSocialAuth
 * @package    ScnSocialAuth_Service
 */
class UserControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();
        $hybridAuth = $services->get('HybridAuth');
        $moduleOptions = $services->get('ScnSocialAuth-ModuleOptions');
        $zfcUserOptions = $services->get('zfcuser_module_options');

        $controller = new UserController();
        $controller->setHybridAuth($hybridAuth);
        $controller->setOptions($moduleOptions);
        $controller->setZfcUserOptions($zfcUserOptions);

        return $controller;
    }
}
