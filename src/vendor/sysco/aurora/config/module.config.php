<?php

return array(
    'view_helpers' => array(
        'invokables' => array(
            'bootstrapForm' => 'Sysco\Aurora\Form\View\Helper\Bootstrap\Form',
            'bootstrapFormRow' => 'Sysco\Aurora\Form\View\Helper\Bootstrap\FormRow',
            'bootstrapAlert' => 'Sysco\Aurora\View\Helper\Bootstrap\Alert',
            'bootstrapDl' => 'Sysco\Aurora\View\Helper\Bootstrap\DefinitionList',
            'bootstrapHtmlLink' => 'Sysco\Aurora\View\Helper\Bootstrap\HtmlLink',
            'MvcCssClass' => 'Sysco\Aurora\View\Helper\MvcCssClass',
            'ObjectUrl' => 'Sysco\Aurora\View\Helper\ObjectUrl',
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'partial/bootstrap/2/paginator' => __DIR__ . '/../view/partial/bootstrap/2/paginator.phtml',
            'partial/bootstrap/3/paginator' => __DIR__ . '/../view/partial/bootstrap/3/paginator.phtml',
            'partial/bootstrap/2/data-table' => __DIR__ . '/../view/partial/bootstrap/2/data-table.phtml',
            'partial/bootstrap/3/data-table' => __DIR__ . '/../view/partial/bootstrap/3/data-table.phtml',
            'partial/bootstrap/2/form-row' => __DIR__ . '/../view/partial/bootstrap/2/form-row.phtml',
            'partial/bootstrap/3/form-row' => __DIR__ . '/../view/partial/bootstrap/3/form-row.phtml',
            'partial/bootstrap/2/data-table-pagination' => __DIR__ . '/../view/partial/bootstrap/2/data-table-pagination.phtml',
            'partial/bootstrap/3/data-table-pagination' => __DIR__ . '/../view/partial/bootstrap/3/data-table-pagination.phtml',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'Paginator' => 'Sysco\Aurora\Controller\Plugin\Paginator'
        )
    ),
    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            )
        )
    ),
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                'types' => array(
                    'datetime' => 'Sysco\Aurora\Doctrine\DBAL\Types\DateTimeType',
                ),
            )
        )
    )
);