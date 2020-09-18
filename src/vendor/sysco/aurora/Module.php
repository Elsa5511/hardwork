<?php

namespace Sysco\Aurora;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();

        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $viewModel = $e->getApplication()->getMvcEvent()->getViewModel();
        $viewModel->auroraConfig = $serviceManager->get('Aurora\Config');

        $eventManager->attach(MvcEvent::EVENT_BOOTSTRAP, function($e) use ($serviceManager) {
                    $config = $serviceManager->get('Config');
                    $controller = $e->getTarget();
                    $controller->plugin('Paginator')->setParams($config['aurora']['pagination']);
                }, 0);

        $serviceManager->get('viewhelpermanager')->setFactory('mvcCssClass', function() use ($e) {
                    $viewHelper = new View\Helper\MvcCssClass($e->getRouteMatch());
                    return $viewHelper;
                });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/view.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Aurora\Config' => 'Sysco\Aurora\Factory\ConfigServiceFactory'
            )
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . substr(__NAMESPACE__, 6),
                ),
            ),
        );
    }

}
