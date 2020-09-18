<?php

namespace Sysco\Aurora\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\Router\Http\RouteMatch;

class MvcCssClass extends AbstractHelper
{

    protected $routeMatch;

    public function __construct(RouteMatch $routeMatch)
    {
        $this->routeMatch = $routeMatch;
    }

    public function __invoke()
    {
        if ($this->routeMatch) {
            $module = strtolower(current(explode('\\', $this->routeMatch->getParam('__NAMESPACE__'))));
            $controller = strtolower($this->routeMatch->getParam('__CONTROLLER__', 'index'));
            $action = $this->routeMatch->getParam('action', 'index');

            if ($module) {
                return "{$module} {$module}-{$controller} {$module}-{$controller}-{$action} {$this->routeMatch->getMatchedRouteName()}";
            }

            return "{$controller} {$controller}-{$action} {$this->routeMatch->getMatchedRouteName()}";
        }
    }

}