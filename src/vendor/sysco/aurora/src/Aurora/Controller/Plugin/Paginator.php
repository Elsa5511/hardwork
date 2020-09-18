<?php

/* Reference: https://juriansluiman.nl/article/120/using-zend-framework-service-managers-in-your-application */

namespace Sysco\Aurora\Controller\Plugin;

use Zend\Mvc\MvcEvent;
use Zend\Paginator\Paginator as ZendPaginator;
use Zend\Paginator\Adapter\Iterator;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Paginator extends AbstractPlugin
{

    protected $_params = array('item_count_per_page' => 10);

    public function setParams($params = array())
    {
        $this->_params = $params;
        return $this;
    }

    public function getCurrentPage()
    {
        $controller = $this->getController();

        $event = $controller->getEvent();
        $router = null;
        $matches = null;

        if ($event instanceof MvcEvent) {
            $router = $event->getRouter();
            $matches = $event->getRouteMatch();
        } elseif ($event instanceof EventInterface) {
            $router = $event->getParam('router', false);
            $matches = $event->getParam('route-match', false);
        }

        return $matches->getParam('page', 1);
    }

    /**
     * 
     * @param Zend\Db\ResultSet $resulSet
     * @return Zend\Paginator\Paginator
     */
    public function paginate($resultSet, $params = array())
    {
        $currentPage = $this->getCurrentPage();

        $params = array_merge($this->_params, $params);

        $resultSet->buffer();

        $iteratorAdapter = new Iterator($resultSet);

        $paginator = new ZendPaginator($iteratorAdapter);
        $paginator
                ->setCurrentPageNumber($currentPage)
                ->setItemCountPerPage($params['item_count_per_page']);

        return $paginator;
    }

    public function paginateORM($paginator, $params = array())
    {
        $currentPage = $this->getCurrentPage();

        $params = array_merge($this->_params, $params);

        $paginator = new ZendPaginator($paginator);
        $paginator
                ->setCurrentPageNumber($currentPage)
                ->setItemCountPerPage($params['item_count_per_page']);

        return $paginator;
    }

}