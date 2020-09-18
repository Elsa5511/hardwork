<?php

namespace Sysco\Aurora\View\Helper\Bootstrap;

use Zend\Mvc\Router\Http\RouteMatch;
use Zend\View\Helper\AbstractHelper;

class DataTable extends AbstractHelper
{

    protected $matchedRouteName;
    protected $matchedRouteParams;

    public function __construct(RouteMatch $routeMatch)
    {
        $this->matchedRouteName = $routeMatch->getMatchedRouteName() . (strpos($routeMatch->getMatchedRouteName(), 'wildcard') ? '' : '/wildcard' );
        $this->matchedRouteParams = $routeMatch->getParams();
    }

    private function arrayMerge(array $array1, array $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => $value) {
            if (is_array($value) && isset($merged [$key]) && is_array($merged [$key])) {
                $merged [$key] = $this->arrayMerge($merged [$key], $value);
            } else {
                $merged [$key] = $value;
            }
        }

        return $merged;
    }

    private function proccessActions(&$args, $baseParams)
    {
        $actions = array_key_exists('actions', $args) ? $args['actions'] : array(
            'add' => true,
            'options' => array(
                'edit' => true,
                'delete' => true
            ),
            'group' => array(
                'delete-selected' => true
            )
        );

        if ($actions) {
            if (array_key_exists('add', $actions)) {
                if (true === $actions['add']) {
                    $actions['add'] = array(
                        'label' => $this->getView()->translate('Add new'),
                        'attributes' => array(
                            'href' => $this->getView()->url($this->matchedRouteName, array_merge($baseParams, array('action' => 'add'))),
                            'data-rel' => 'add'
                        )
                    );
                }
            }

            if (array_key_exists('options', $actions)) {
                if (array_key_exists('edit', $actions['options'])) {
                    if (true === $actions['options']['edit']) {
                        $actions['options']['edit'] = array(
                            'label' => $this->getView()->translate('Edit'),
                            'icon' => 'edit',
                            'attributes' => array(
                                'href' => $this->getView()->url($this->matchedRouteName, array_merge($baseParams, array('action' => 'edit', 'id' => ':' . $args['object_id']))),
                                'data-rel' => 'edit'
                            )
                        );
                    }
                }

                if (array_key_exists('delete', $actions['options'])) {
                    if (true === $actions['options']['delete']) {
                        $actions['options']['delete'] = array(
                            'label' => $this->getView()->translate('Delete'),
                            'icon' => 'trash',
                            'attributes' => array(
                                'href' => $this->getView()->url($this->matchedRouteName, array_merge($baseParams, array('action' => 'delete', 'id' => ':' . $args['object_id']))),
                                'data-rel' => 'delete'
                            )
                        );
                    }
                }
            }

            if (array_key_exists('group', $actions)) {
                if (array_key_exists('delete-selected', $actions['group'])) {
                    if (true === $actions['group']['delete-selected']) {
                        $actions['group']['delete-selected'] = array(
                            'label' => $this->getView()->translate('Delete selected'),
                            'attributes' => array(
                                'href' => $this->getView()->url($this->matchedRouteName, array_merge($baseParams, array('action' => 'delete'))),
                                'data-rel' => 'delete-selected'
                            )
                        );
                    }
                }
            }

            $args['actions'] = $actions;
        }
    }

    protected function getParams($params)
    {
        $baseParams = array();

        foreach ($this->matchedRouteParams as $key => $param) {
            if (in_array($key, $params)) {
                $baseParams[$key] = $param;
            }
        }

        return $baseParams;
    }

    public function __invoke($items, $args = array())
    {
        $bootstrapVersion = $this->getView()->layout()->auroraConfig['bootstrap_version'];

        $args = $this->arrayMerge(array(
            'id' => uniqid(),
            'object_id' => 'id',
            'extract_type' => 'class_methods',
            'table_class' => 'table',
            'table_row_class' => null,
            'table_container_class' => null,
            'table_foot' => true,
            'search' => $this->getView()->translate('Search'),
            'item_count_per_page' => true,
            'params' => array(
                'basic' => array(
                    'controller', 'action'
                ),
                'advanced' => array(
                    's'
                )
            )
                ), $args);

        $basicParams = $this->getParams($args['params']['basic']);
        $advancedParams = $this->getParams($args['params']['advanced']);

        $this->proccessActions($args, $basicParams);

        return $this->getView()->partial('partial/bootstrap/' . $bootstrapVersion . '/data-table', array(
                    'args' => $args,
                    'items' => $items,
                    'params' => array(
                        'matched' => $this->matchedRouteParams,
                        'basic' => $basicParams,
                        'advanced' => $advancedParams
                    ),
                    'matchedRouteName' => $this->matchedRouteName
                        )
        );
    }

}