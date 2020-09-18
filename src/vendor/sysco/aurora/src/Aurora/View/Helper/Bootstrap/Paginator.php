<?php

namespace Sysco\Aurora\View\Helper\Bootstrap;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\Router\Http\RouteMatch;

class Paginator extends AbstractHelper
{

    protected $_routeMatch;
    protected $_controller, $_action;

    public function __construct(RouteMatch $routeMatch)
    {
        $this->_routeMatch = $routeMatch;
        $this->_controller = $this->_routeMatch->getParam('controller', 'index');
        $this->_action = $this->_routeMatch->getParam('action', 'index');
    }

    /**
     * 
     * @param object $objectPaginator
     * @param string $style
     * @param string $partialName
     * @param array $params
     * @return type
     */
    public function __invoke($objectPaginator, $style = 'Sliding', $partialName = null, $params = array())
    {
        $bootstrapVersion = $this->getView()->layout()->auroraConfig['bootstrap_version'];

        if (null === $partialName)
            $partialName = 'partial/bootstrap/' . $bootstrapVersion . '/paginator';

        $route = $this->_routeMatch->getMatchedRouteName() . ((strpos($this->_routeMatch->getMatchedRouteName(), 'wildcard') || $this->_routeMatch->getLength() === 1) ? '' : '/wildcard' );

        $objectPaginator->setPageRange(5);

        $paginatorParams = array_merge(array(
            'route' => $route,
            'params' => array('controller' => $this->_controller, 'action' => $this->_action)
                ), $params);

        return $this->getView()
                        ->paginationControl($objectPaginator, $style, $partialName, $paginatorParams);
    }

}