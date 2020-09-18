<?php

namespace Sysco\Aurora\View\Helper\Bootstrap;

use Zend\View\Helper\AbstractHelper;

class DefinitionList extends AbstractHelper
{

    public function __invoke($item, $args = array())
    {
        $defaults = array(
            'class_dl' => 'dl-horizontal',
            'extract_type' => 'class_methods',
        );

        $args = array_merge($defaults, $args);

        if (!$item) {
            throw new \Exception("Parameter passed to the function is not an object or an array");
        }
        ?>
        <dl class="<?php echo $args['class_dl'] ?>">
            <?php foreach ($args['terms'] as $key => $column): ?>
                <?php
                switch ($args['extract_type']) {
                    case 'extract_type':
                        $output = $item->{$key};
                        break;
                    case 'class_methods':
                        $output = $item->{'get' . ucfirst($key)}();
                        break;
                }
                if (isset($column['callback'])) {
                    $output = call_user_func_array($column['callback'], array($output, $this->getView(), $item));
                }
                ?>
                <dt><?php echo $column['label']; ?></dt>
                <dd><?php echo $output; ?></dd>
            <?php endforeach; ?>
        </dl>
        <?php
    }

}