<?php

return array(
    'factories' => array(
        'Locale' => function($sm) {
            $translator = $sm->get('translator');
            return new \Sysco\Aurora\View\Helper\Locale($translator->getLocale());
        },
        'BootstrapDataTable' => function($sm) {
            $routeMatch = $sm->getServiceLocator()->get('router')->match($sm->getServiceLocator()->get('request'));
            return new Sysco\Aurora\View\Helper\Bootstrap\DataTable($routeMatch);
        },
        'BootstrapPaginator' => function($sm) {
            $routeMatch = $sm->getServiceLocator()->get('router')->match($sm->getServiceLocator()->get('request'));
            return new Sysco\Aurora\View\Helper\Bootstrap\Paginator($routeMatch);
        }
    )
);